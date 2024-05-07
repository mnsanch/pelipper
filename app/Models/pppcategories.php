<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pppcategories extends Model
{
    use HasFactory;
    protected $fillable = ['Category_Name'];
    public $timestamps = false; 


    public function posts()
    {
        return $this->belongsToMany(pppposts::class, 'ppppost_categories');
    }

}
