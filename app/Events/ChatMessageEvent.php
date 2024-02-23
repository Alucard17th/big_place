<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;


class ChatMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $nickname;
    public $message;
    public $recipientId; // Add recipient identifier


    public function __construct(string $nickname, string $message, $recipientId)
    {
        // Log::info('Event class constructor called.');
        // Log::info('Nickname: ' . $nickname);
        // Log::info('Message: ' . $message);
        // Log::info('Recipient ID: ' . $recipientId);

        //
        $this->nickname = $nickname;
        $this->message = $message;
        $this->recipientId = $recipientId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $channel = new PrivateChannel('chat.' . $this->recipientId);
        Log::info('Broadcasting on channel: ' . $channel->name);
        return $channel;
    }

    public function broadcastAs()
    {
        return 'chat-message';
    }
}
