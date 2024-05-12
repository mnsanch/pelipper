<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\posts;
use App\Models\votes;
use App\Http\Resources\postresource;
use App\Http\Resources\editpostresource;
use App\Models\categories;




class PostController extends Controller
{
    // funcion cojer todos los posts
    public function index()
    {
        $posts = posts::with('media')->get();
    
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name;
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        
        return postresource::collection($posts);
    }
    
    // funcion cojer todos los posts del mas nuevo al mas antiguo
    public function indexreverse() {
        $posts = posts::with('media')->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name; 
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        $reversedPosts = $posts->reverse();
        return postresource::collection($reversedPosts);
    }

    // funcion cojoer los posts mejor valorados
    public function indexpositivo() {
        $posts = posts::with('media')->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name; 
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        $posts = $posts->sortByDesc('Totalvotes');
        
        return postresource::collection($posts);
    } 

    // funcion cojoer los posts menor valorados
    public function indexnegativo() {
        $posts = posts::with('media')->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name; 
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        $posts = $posts->sortBy('Totalvotes');
        
        return postresource::collection($posts);
    } 

    // funcion cojoer los posts con mas posts negativos
    public function indexodiado() {
        $posts = posts::with('media','comments')->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name; 
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        $posts = $posts->sortBy('Downvote');
        
        return postresource::collection($posts);
    } 

    // funcion cojoer los posts con mas votado independientemente del voto
    public function indexvotado() {
        $posts = posts::with('media')->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name; 
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
            $post->Globalvotes = (($post->Upvote) - ($post->Downvote)); 
        }
        $posts = $posts->sortByDesc('Globalvotes');
        
        return postresource::collection($posts);
    } 

    public function indexusuario($id)
    {
        $posts = posts::with(['media', 'user'])->where('ID_User',$id)->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name;
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        
        return postresource::collection($posts);
    }

    // funcion eliminar post
    public function destroy($id){
        $posts = posts::find($id);
        $posts->delete();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

    // funcion crear post
    public function store(StorePostRequest $request) {
        $validatedData = $request->validated();
        $validatedData['ID_User'] = auth()->id();   
        $post = posts::create($validatedData);
        $categories = explode(",", $request->ID_Category);
        $category = categories::findMany($categories);
        $post->categories()->attach($category);
        if ($request->hasFile('thumbnail')) {
            $post->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-posts');
        }
        return new postresource($post);

    }

    // funcion cojer solo un post por id
    public function getPost($id)
    {
        $post = posts::findOrFail($id);
        $post->Avatar = $post->user->avatar; 
        $post->nombre_usuario = $post->user->name; 
        $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        return new postresource($post);
    }

    // funcion cojer post para editar
     public function getPostedit($id)
    {
        $post = posts::findOrFail($id);
        $categories = $post->categories()->pluck('id')->toArray(); 
        $post['ID_Category'] = $categories; 
        $posts = new editpostresource($post);

        if ($posts->ID_User != auth()->id()) {
            return false;
        } else {
            return $posts;
        }
    }

    // funcion actualizar post
    public function update( $id, StorePostRequest $request)
    {
        $post = posts::find($id);
        $post->update($request->validated());
        $category = categories::findMany($request->ID_Category);
        $post->categories()->sync($category);
        if($request->hasFile('thumbnail')) {
            $post->media()->delete();
            $post->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-posts');
        }elseif ($request->thumbnail=="") {
            $post->media()->delete();
            }
        return new postresource($post);
        
    }

    // funcion poner upvote
    public function upvote($id) {
        $post = posts::findOrFail($id);
        $creado = votes::where('posts_id', $id)->first();
        if ($creado!=null) {
            $post->increment('Downvote');
            $post->votes()->detach();
        }
        $creacion['user_id'] = auth()->id();   
        $post->votes()->attach($creacion, ['vote' => 1]);
        $post->increment('Upvote');
        return new postresource($post);
    }

    // funcion poner downvote
    public function downvote($id) {
        $post = posts::findOrFail($id);
        $creado = votes::where('posts_id', $id)->first();
        if ($creado!=null) {
            $post->decrement('Upvote');
            $post->votes()->detach();
        }
        $creacion['user_id'] = auth()->id();   
        $post->votes()->attach($creacion, ['vote' => 0]);
        $post->decrement('Downvote');
        return response()->json(['status' => 'success', 'message' => 'Upvote count updated successfully']);
    }

    // funcion quitarupvote
    public function quitarupvote($id) {
        $post = posts::findOrFail($id);
        $post->decrement('Upvote');
        $post->votes()->detach();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

    // funcion quitardownvote
    public function quitardownvote($id) {
        $post = posts::findOrFail($id);
        $post->increment('Downvote');
        $post->votes()->detach();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

}
