<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExerciseRequest;
use App\Models\pppposts;
use App\Http\Resources\pruebaresource;
use App\Models\pppcategories;




class pppPostController extends Controller
{
    public function index() {
        $posts = pppposts::with('media')->get();
        return pruebaresource::collection($posts);
        // $posts = pppposts::all()->toarray();
        // return $posts;
    }

    public function destroy($id){
        $posts = pppposts::find($id);
        $posts->delete();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

    public function store(StoreExerciseRequest $request) {
        // $posts = $request->all();
        // $postscreado = pppposts::create($posts);
        // return response()->json(['success'=>true, 'data'=> $postscreado]);

        $this->authorize('exercise-create');

        $validatedData = $request->validated();
        $validatedData['ID_User'] = auth()->id();   
        $exercise = pppposts::create($validatedData);
        // $categories = explode(",", $request->ID_Category);
        // $category = pppcategories::findMany($categories);
        // $exercise->categories()->attach($category);
        if ($request->hasFile('thumbnail')) {
            $exercise->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-posts');
        }
        var_dump($exercise);
        return new pruebaresource($exercise);

    }

}
