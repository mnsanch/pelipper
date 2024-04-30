<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class pppposts extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'ID_User',
        'Title',
        'Post'
    ];

    protected $table = 'pppposts';

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_User');
    }
    public function categories()
    {
        return $this->belongsToMany(pppcategories::class, 'ppppost_categories');
    }

    public function comments()
    {
        return $this->hasMany(pppcomments::class, 'ID_Post')->with('user');
    }

    public function votes()
    {
        $userId = Auth::id();
        return $this->hasMany(pppvote::class, 'pppposts_id')->where('pppuser_id', $userId);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useFallbackUrl('/images/placeholder.jpg')
            ->useFallbackPath(public_path('/images/placeholder.jpg'));
    }
}
