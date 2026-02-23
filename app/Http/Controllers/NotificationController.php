<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    // 1. Show all notifications for the logged-in user
  public function index(Request $request)
{

$user = Auth::user();
    $query = $user->notifications()->with('sender');

    // NEW: Check if a filter is applied in the URL
    if ($request->has('priority') && $request->priority != 'all') {
        $query->where('priority', $request->priority);
    }

    $notifications = $query->orderBy('is_pinned', 'desc')
                          ->latest()
                          ->paginate(20)
                          ->withQueryString(); // This keeps the filter active when clicking "Next Page"

    // Stats remain the same (calculate from all notifications)
   $stats = [
    'total' => $user->notifications()->count(),
    'unread' => $user->notifications()->wherePivot('is_read', false)->count(),
    'important' => $user->notifications()->where('priority', 'important')->count(),
    'urgent' => $user->notifications()->where('priority', 'urgent')->count(),
    // ADD THIS BACK:
    'sent_this_week' => Notification::where('sender_id', $user->id)
            ->where('created_at', '>=', now()->startOfWeek())
            ->count(),
];
  
    // 1. Define the specific variable the view is looking for
    $unreadCount = $user->notifications()
        ->wherePivot('is_read', false)
        ->count();

  
    // 3. Add unreadCount to the compact function
    return view('management.notification.view', compact('notifications', 'stats', 'unreadCount'));
}

public function create()
{
    // Points to resources/views/management/notification/create.blade.php
    return view('management.notification.create');
}

    // 2. Admin: Store a new notification and send to all users
 public function store(Request $request)
{
    // 1. Validation
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'priority' => 'required|in:normal,important,urgent',
        'icon' => 'required',
        'color' => 'required',
        'attachment' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:5120',
    ]);

    // 2. Prepare Metadata (Poll Options) BEFORE creating the notification
    $metadata = null;
    if ($request->has('options')) {
        // Remove empty inputs from the array
        $filteredOptions = array_filter($request->options);
        
        if (!empty($filteredOptions)) {
            $optionsMap = [];
            foreach ($filteredOptions as $opt) {
                $optionsMap[$opt] = 0; // Initialize vote count at 0
            }
            $metadata = ['poll_options' => $optionsMap];
        }
    }

    // 3. Handle File Attachment
    $attachmentPath = null;
    if ($request->hasFile('attachment')) {
        $attachmentPath = $request->file('attachment')->store('notifications', 'public');
    }

    // 4. Create the Notification ONCE
    $notification = Notification::create([
        'sender_id' => auth()->id(),
        'title' => $request->title,
        'description' => $request->description,
        'priority' => $request->priority,
        'icon' => $request->icon,
        'color' => $request->color,
        'is_pinned' => $request->has('is_pinned') ? 1 : 0,
        'attachment_path' => $attachmentPath,
        'metadata' => $metadata, // This saves the options to the DB
    ]);

    // 5. Attach to all users
    $notification->users()->attach(\App\Models\User::pluck('id'));

    return redirect()->route('management.notification.view')
                     ->with('success', 'Notification sent successfully!');
}
public function edit($id)
{
    $notification = Notification::findOrFail($id);
    return view('management.notification.edit', compact('notification'));
}

public function update(Request $request, $id)
{
    $notification = Notification::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'priority' => 'required',
    ]);

    // Update the notification fields
    $notification->update([
        'title' => $request->title,
        'description' => $request->description,
        'priority' => $request->priority,
        'icon' => $request->icon,
        'color' => $request->color,
        'is_pinned' => $request->has('is_pinned') ? 1 : 0,
    ]);

    return redirect()->route('management.notification.view')
                     ->with('success', 'Notification updated successfully!');
}

public function destroy($id)
{
    $notification = Notification::findOrFail($id);
    
    // Detach from users first (the pivot table)
    $notification->users()->detach();
    
    // If there is a file attached, delete it from storage
    if ($notification->attachment_path) {
        Storage::disk('public')->delete($notification->attachment_path);
    }

    $notification->delete();

    return redirect()->back()->with('success', 'Notification deleted successfully!');
}

    // 3. Mark as Read (using the pivot table)
    public function markAsRead($id)
    {
        $user = Auth::user();
        $user->notifications()->updateExistingPivot($id, [
            'is_read' => true,
            'read_at' => now()
        ]);

        return response()->json(['success' => true]);
    }

    // 4. Toggle Favorite
    public function toggleFavorite($id)
    {
        $user = Auth::user();
        $notification = $user->notifications()->where('notification_id', $id)->first();
        
        if ($notification) {
            $newStatus = !$notification->pivot->is_favorite;
            $user->notifications()->updateExistingPivot($id, ['is_favorite' => $newStatus]);
        }

        return back();
    }
    // Add this new method to the same controller
public function vote(Request $request, $id)
{
    $notification = Notification::findOrFail($id);
    $optionSelected = $request->option;
    
    // Get the current metadata array
    $metadata = $notification->metadata;

    // Check if the option exists in our metadata
    if (isset($metadata['poll_options'][$optionSelected])) {
        // Increment the number
        $metadata['poll_options'][$optionSelected]++; 
        
        // Save it back (Casting in Model handles the JSON conversion)
        $notification->metadata = $metadata;
        $notification->save();
        
        
        return back()->with('success', 'Your choice "' . $optionSelected . '" has been recorded!');
    }

    return back()->with('error', 'Invalid option selected.');
}
public function markAllRead()
{
    Auth::user()->notifications()
        ->wherePivot('is_read', false)
        ->updateExistingPivot(Auth::user()->notifications()->pluck('notification_id'), [
            'is_read' => true,
            'read_at' => now()
        ]);

    return response()->json(['success' => true]);
}
}