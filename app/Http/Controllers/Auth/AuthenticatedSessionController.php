<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    // Get the authenticated user
    $user = Auth::user();

    // Logic to redirect based on role
    if ($user->role === 'admin') {
        return redirect()->intended(route('admin.dashboard'));
    } 
    
    if ($user->role === 'teacher') {
        return redirect()->intended(route('teacher.dashboard'));
    }

    if ($user->role === 'management') {
        return redirect()->intended(route('management.dashboard'));
    }

    // Default for students or others
    return redirect()->intended(route('student.dashboard'));
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    // This redirects to your '/' route (Home)
    return redirect('/')->with('status', 'You have been safely logged out.');
}
}
