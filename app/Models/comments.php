<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $fillable = ['ID_User','ID_Post','Comment'];

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_User');
    }
}
