<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\comments;
use App\Http\Resources\commentresource;
use App\Http\Requests\StoreCommentRequest;




class commentsController extends Controller
{
    public function index()
    {
        $comments = comments::get();
        return commentresource::collection($comments);
    }

    public function commentspost($id)
    {
        $comments = comments::where('ID_Post',$id)->get()->reverse();
        return commentresource::collection($comments);
    }

    public function store($id, StoreCommentRequest $request) {
        $validatedData = $request->validated();
        $validatedData['ID_User'] = auth()->id();   
        $validatedData['ID_Post'] = $id;   
        $post = comments::create($validatedData);
        return new commentresource($post);
    }

    public function destroy($id){
        $posts = comments::find($id);
        $posts->delete();
        return response()->json(['success'=>true, 'data'=> 'Comentario eliminada']);
    }
}
