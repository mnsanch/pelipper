<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorepppPostRequest;
use App\Models\pppposts;
use App\Http\Resources\pruebaresource;
use App\Models\pppcategories;




class pppPostController extends Controller
{
    public function index() {
        $posts = pppposts::with('media')->get();
        $reversedPosts = $posts->reverse();
        return pruebaresource::collection($reversedPosts);
    }

    public function destroy($id){
        $posts = pppposts::find($id);
        $posts->delete();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

    public function store(StorepppPostRequest $request) {
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

    public function getPost($id)
    {
        return pppposts::findOrFail($id);
    }


    public function update(pppposts $post, StorepppPostRequest $request)
    {

        
        if ($post->user_id !== auth()->id() && !auth()->user()->hasPermissionTo('post-all')) {
            return response()->json(['status' => 405, 'success' => false, 'message' => 'You can only edit your own posts']);
        } else {
            $post->update($request->validated());
            //error_log(json_encode($request->categories));

            return new pruebaresource($post);
        }
    }

    public function upvote($id) {
        $post = pppposts::findOrFail($id);
        $post->increment('Upvote');
        return response()->json(['status' => 'success', 'message' => 'Upvote count updated successfully']);
    }

    public function downvote($id) {
        $post = pppposts::findOrFail($id);
        $post->decrement('Downvote');
        return response()->json(['status' => 'success', 'message' => 'Downvote count updated successfully']);
    }
    

}
