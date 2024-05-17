<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChatRequest;
use App\Http\Resources\chatresource;

use App\Models\chat;


class ChatController extends Controller
{
    public function getchat($id)
    {
        $chats = Chat::where([['user_id', $id],['receiver_id', auth()->id()],])->orWhere([['user_id', auth()->id()],['receiver_id', $id],])->get();
        
        return chatresource::collection($chats);
    }

    public function store(StoreChatRequest $request) {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();   
        $post = chat::create($validatedData);        
        return $post;

    }
}
