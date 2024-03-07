<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pppposts;

class pppPostController extends Controller
{
    public function index() {
        $posts = pppposts::all()->toarray();
        return $posts;
    }

    public function destroy($id){
        $posts = pppposts::find($id);
        $posts->delete();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

    public function store(Request $request) {
        $posts = $request->all();
        $postscreado = pppposts::create($posts);
        return response()->json(['success'=>true, 'data'=> $postscreado]);

    }
    // public function store(StoreExerciseRequest $request)
    // {
    //     $this->authorize('exercise-create');

    //     $validatedData = $request->validated();
    //     $validatedData['user_id'] = auth()->id();
    //     $exercise = Exercise::create($validatedData);

    //     $categories = explode(",", $request->categories);
    //     $category = Category::findMany($categories);
    //     $exercise->categories()->attach($category);

    //     if ($request->hasFile('thumbnail')) {
    //         $exercise->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-exercises');
    //     }

    //     return new ExerciseResource($exercise);
    // }
    

}
