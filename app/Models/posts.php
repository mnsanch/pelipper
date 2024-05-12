<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class posts extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'ID_User',
        'Title',
        'Post'
    ];

    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_User');
    }
    public function categories()
    {
        return $this->belongsToMany(categories::class, 'post_categories');
    }

    public function comments()
    {
        return $this->hasMany(comments::class, 'ID_Post')->with('user');
    }

    public function votes()
    {
        $userId = Auth::id();
        return $this->belongsToMany(users::class, 'votes')->select('votes.posts_id', 'votes.users_id', 'votes.vote')->where('votes.users_id', $userId);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useFallbackUrl('/images/placeholder.jpg')
            ->useFallbackPath(public_path('/images/placeholder.jpg'));
    }
}
