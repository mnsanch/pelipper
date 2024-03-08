<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\pppcategories;

class pppCategory extends Controller
{
    // public function index() {
    //     $posts = pppcategories::all()->toarray();
    //     return $posts;
    // }
    public function index()
    {
        return CategoryResource::collection(pppcategories::all());
    }

}
