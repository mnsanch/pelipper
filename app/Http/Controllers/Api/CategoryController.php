<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\categories;

class CategoryController extends Controller
{
    // funcion cojer todas las categorias
    public function index()
    {
        return CategoryResource::collection(categories::all());
    }

    // funcion cojer categoria por id
    public function category($id)
    {
        return categories::findOrFail($id);
    }

    // funcion crear categoria
    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('category-create');
        $category = categories::create($request->validated());

        return new CategoryResource($category);
    }

    // funcion actualizar categoria
    public function update($id, StoreCategoryRequest $request)
    {
        $this->authorize('category-edit');
        $category = categories::findOrFail($id);

        $category->update($request->validated());

        return new CategoryResource($category);
    }

    // funcion eliminar categoria
    public function destroy($id){
        $category = categories::find($id);
        $category->delete();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

}
