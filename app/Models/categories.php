<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = ['Category_Name'];
    public $timestamps = false; 


    public function posts()
    {
        return $this->belongsToMany(posts::class, 'post_categories');
    }

}
