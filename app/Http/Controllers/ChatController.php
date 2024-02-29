<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Pusher\Pusher;
use App\Events\Notify;
use Illuminate\Support\Facades\Log;


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $redirectUrl = request('redirectUrl');
        $receiverId = request('receiver');
        $userIds = [];
        $messages = Message::where('from', auth()->user()->id)->orWhere('to', auth()->user()->id)->get();
        $userIds = $messages->pluck('from')->merge($messages->pluck('to'))->unique()->toArray();
        // If $receiverId is not null and doesn't exist in $userIds, add it
        if ($receiverId !== null && !in_array($receiverId, $userIds)) {
            $userIds[] = $receiverId;
        }
        
        $users = User::whereIn('id', $userIds)->where('id', '!=', auth()->user()->id)->get();
        return view('recruiter.chat.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $from = auth()->user()->id;
        $textMessage = $request->message;
        $recipientId = $request->receiver_id;

        event (new \App\Events\EndPool($from, $textMessage, $recipientId));

        $message = new Message();
        $message->from = $from;
        $message->to = $recipientId;
        $message->message = $textMessage;
        $message->is_read = 0; // message will be unread when sending message
        $message->user_id = $from ; // message will be unread when sending message
        $message->save();

        // return response()->json(['success' => 'Chat Message Sent!']);
        return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $from = auth()->user()->id;
        $messages = Message::where(function($query) use ($from, $id) {
            $query->where('from', $from)
                  ->where('to', $id);
        })->orWhere(function($query) use ($from, $id) {
            $query->where('from', $id)
                  ->where('to', $from);
        })->get();

        return response()->json($messages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
