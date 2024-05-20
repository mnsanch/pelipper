<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChatRequest;
use App\Http\Resources\chatresource;

use App\Models\User;
use App\Models\chat;


class ChatController extends Controller
{
    public function getchat($id)
    {
        $chats = Chat::where([['user_id', $id],['receiver_id', auth()->id()],])->orWhere([['user_id', auth()->id()],['receiver_id', $id],])->get();
        
        return chatresource::collection($chats);
    }

    public function getalluserchat($id)
    {
        $chats = Chat::where('user_id', $id)->orWhere('receiver_id', $id)->get();
        $chats = $chats->reverse();
        $lastchats=[];
        $asdf=false;
        foreach ($chats as $chat) {
            foreach ($lastchats as $qwerty) {
                if (($qwerty->user_id==$chat->user_id && $qwerty->receiver_id==$chat->receiver_id)||($qwerty->user_id==$chat->receiver_id && $qwerty->user_id==$chat->receiver_id)) {
                    $asdf=true;
                    break;
                }
                
            }
            if ($asdf==false) {
                $lastchats[] = $chat;
            }
            $asdf=false;
        }
        
        return chatresource::collection($lastchats);
    }

    public function store(StoreChatRequest $request) {
        $validatedData = $request->validated();
        $id = auth()->id(); 
        $user = User::findOrFail($id);
        $user->chat()->attach($id, ['receiver_id' => $validatedData['receiver_id'], 'chat' => $validatedData['chat'], 'created_at' => date('Y-m-d H:i:s')
]);        
        return $user;

    }
}
