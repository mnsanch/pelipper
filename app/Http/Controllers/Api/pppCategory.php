<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
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

    public function category($id)
    {
        return pppcategories::findOrFail($id);
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('category-create');
        $category = pppcategories::create($request->validated());

        return new CategoryResource($category);
    }

    public function update($id, StoreCategoryRequest $request)
    {
        $this->authorize('category-edit');
        $category = pppcategories::findOrFail($id);

        $category->update($request->validated());

        return new CategoryResource($category);
    }

    public function destroy($id){
        $category = pppcategories::find($id);
        $category->delete();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

}
