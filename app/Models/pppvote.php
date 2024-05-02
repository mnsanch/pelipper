<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pppvote extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id ',
        'pppposts_id',
        'vote'
    ];
    public $timestamps = false;
}
