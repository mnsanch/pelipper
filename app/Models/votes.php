<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class votes extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id ',
        'posts_id',
        'vote'
    ];
    public $timestamps = false;
}
