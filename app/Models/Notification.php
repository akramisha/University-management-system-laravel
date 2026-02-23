<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'sender_id', 'title', 'description', 'priority', 
        'icon', 'color', 'is_pinned', 'metadata'
    ];

    // Who sent this notification?
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Which users have received/read this? (Many-to-Many relationship)
    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('is_read', 'is_favorite', 'read_at')
                    ->withTimestamps();
    }
    protected $casts = [
    'metadata' => 'array',
    'is_pinned' => 'boolean'
];
}