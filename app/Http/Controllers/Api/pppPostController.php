<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pppposts;

class pppPostController extends Controller
{
    public function index() {
        // return "Hola mundo";
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
    

}
