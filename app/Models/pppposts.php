<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pppposts extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_User',
        'ID_Category',
        'Post',
        'Image',
        'Upvote',
        'Downvote'
    ];
}
