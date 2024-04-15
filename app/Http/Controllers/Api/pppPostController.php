<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorepppPostRequest;
use App\Models\pppposts;
use App\Models\User;
use App\Http\Resources\pruebaresource;
use App\Models\pppcategories;




class pppPostController extends Controller
{
    public function index()
    {
        $posts = pppposts::with(['media', 'user'])->get();
    
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name;
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        
        return pruebaresource::collection($posts);
    }
    
    
    public function indexreverse() {
        $posts = pppposts::with('media')->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name; 
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        $reversedPosts = $posts->reverse();
        return pruebaresource::collection($reversedPosts);
    }

    public function indexpositivo() {
        $posts = pppposts::with('media')->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name; 
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        $posts = $posts->sortByDesc('Totalvotes');
        
        return pruebaresource::collection($posts);
    } 

    public function indexnegativo() {
        $posts = pppposts::with('media')->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name; 
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        $posts = $posts->sortBy('Totalvotes');
        
        return pruebaresource::collection($posts);
    } 

    public function indexodiado() {
        $posts = pppposts::with('media')->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name; 
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        $posts = $posts->sortBy('Downvote');
        
        return pruebaresource::collection($posts);
    } 
    public function indexvotado() {
        $posts = pppposts::with('media')->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name; 
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
            $post->Globalvotes = (($post->Upvote) - ($post->Downvote)); 
        }
        $posts = $posts->sortByDesc('Globalvotes');
        
        return pruebaresource::collection($posts);
    } 

    public function indexusuario($id)
    {
        $posts = pppposts::with(['media', 'user'])->get();
        $postsuser = [];
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name;
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
            if ($post->ID_User==$id) {
                array_push($postsuser, $post);
            }
        }
        
        return pruebaresource::collection($postsuser);
    }

    public function destroy($id){
        $posts = pppposts::find($id);
        $posts->delete();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

    public function store(StorepppPostRequest $request) {
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
        $post= pppposts::with(['media'])->findOrFail($id);
        return new pruebaresource($post);

        
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
