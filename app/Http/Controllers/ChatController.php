<?php

namespace App\Http\Controllers;

use App\Events\Chat\MessageCreated;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function sendMessage(Request $request)
    {
        $user = $request->user();

        broadcast(new MessageCreated($user, $request->message))->toOthers();

        return response()->json([
            'status'    => 'success',
            'data'      => [
                'user'      => ['id' => $user->id, 'name' => $user->name],
                'message'   => $request->message,
                'created_at'=> now()->format('g:i a')
            ]
        ], 200);
    }
}
