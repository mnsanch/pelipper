<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\categories;

class CategoryController extends Controller
{
    // public function index() {
    //     $posts = categories::all()->toarray();
    //     return $posts;
    // }
    public function index()
    {
        return CategoryResource::collection(categories::all());
    }

    public function category($id)
    {
        return categories::findOrFail($id);
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('category-create');
        $category = categories::create($request->validated());

        return new CategoryResource($category);
    }

    public function update($id, StoreCategoryRequest $request)
    {
        $this->authorize('category-edit');
        $category = categories::findOrFail($id);

        $category->update($request->validated());

        return new CategoryResource($category);
    }

    public function destroy($id){
        $category = categories::find($id);
        $category->delete();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

}
