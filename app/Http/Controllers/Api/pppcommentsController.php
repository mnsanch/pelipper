<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pppcomments;
use App\Http\Resources\commentresource;
use App\Http\Requests\StoreCommentRequest;




class pppcommentsController extends Controller
{
    public function index()
    {
        $comments = pppcomments::get();
        return commentresource::collection($comments);
    }

    public function commentspost($id)
    {
        $comments = pppcomments::where('ID_Post',$id)->get();
        return commentresource::collection($comments);
    }

    public function store($id, StoreCommentRequest $request) {
        $validatedData = $request->validated();
        $validatedData['ID_User'] = auth()->id();   
        $validatedData['ID_Post'] = $id;   
        $post = pppcomments::create($validatedData);
        return new commentresource($post);
    }

    public function destroy($id){
        $posts = pppcomments::find($id);
        $posts->delete();
        return response()->json(['success'=>true, 'data'=> 'Comentario eliminada']);
    }
}
