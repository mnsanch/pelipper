<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorepppPostRequest;
use App\Models\pppposts;
use App\Models\pppvote;
use App\Http\Resources\pruebaresource;
use App\Models\pppcategories;




class pppPostController extends Controller
{
    public function index()
    {
        $posts = pppposts::with('media')->get();
    
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
        $posts = pppposts::with('media','comments')->get();
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
        $posts = pppposts::with(['media', 'user'])->where('ID_User',$id)->get();
        foreach ($posts as $post) {
            $post->Avatar = $post->user->avatar; 
            $post->nombre_usuario = $post->user->name;
            $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        }
        
        return pruebaresource::collection($posts);
    }

    public function destroy($id){
        $posts = pppposts::find($id);
        $posts->delete();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

    public function store(StorepppPostRequest $request) {
        $validatedData = $request->validated();
        $validatedData['ID_User'] = auth()->id();   
        $post = pppposts::create($validatedData);
        $categories = explode(",", $request->ID_Category);
        $category = pppcategories::findMany($categories);
        $post->categories()->attach($category);
        if ($request->hasFile('thumbnail')) {
            $post->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-posts');
        }
        return new pruebaresource($post);

    }

    public function getPost($id)
    {
        $post = pppposts::findOrFail($id);
        $post->Avatar = $post->user->avatar; 
        $post->nombre_usuario = $post->user->name; 
        $post->Totalvotes = (($post->Upvote) + ($post->Downvote)); 
        return new pruebaresource($post);
    }
    public function getPostedit($id)
    {
        $post = pppposts::findOrFail($id);
        $posts = new pruebaresource($post);

        if ($posts->ID_User != auth()->id()) {
            return false;
        } else {
            return $posts;
        }
    }


    public function update( $id, StorepppPostRequest $request)
    {
        $post = pppposts::find($id);
        $post->update($request->validated());
        $category = pppcategories::findMany($request->ID_Category);
        $post->categories()->sync($category);
        if($request->hasFile('thumbnail')) {
            $post->media()->delete();
            $post->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-posts');
        }
        return new pruebaresource($post);
        
    }

    public function upvote($id) {
        $post = pppposts::findOrFail($id);
        $creacion['pppuser_id'] = auth()->id();   
        $creacion['vote'] = 1;   
        $creacion['pppposts_id'] = $id;   
        $voto = pppvote::create($creacion);
        $post->increment('Upvote');
        return response()->json(['status' => 'success', 'message' => 'Upvote count updated successfully']);
    }

    public function downvote($id) {
        $post = pppposts::findOrFail($id);
        $creacion['pppuser_id'] = auth()->id();   
        $creacion['vote'] = 0;   
        $creacion['pppposts_id'] = $id;   
        $voto = pppvote::create($creacion);
        $post->decrement('Downvote');
        return response()->json(['status' => 'success', 'message' => 'Upvote count updated successfully']);
    }

    public function quitarupvote($id) {
        $post = pppposts::findOrFail($id);
        $post->decrement('Downvote');
        $voto = pppvote::where('pppuser_id', auth()->id())->where('pppposts_id', $id)->firstOrFail();
        $voto->delete();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

    public function quitardownvote($id) {
        $post = pppposts::findOrFail($id);
        $post->increment('Upvote');
        $voto = pppvote::where('pppuser_id', auth()->id())->where('pppposts_id', $id)->firstOrFail();
        $voto->delete();
        return response()->json(['success'=>true, 'data'=> 'Tarea eliminada']);
    }

}
