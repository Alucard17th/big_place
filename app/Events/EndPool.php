<?php
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class EndPool implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $senderId;
    public $message;
    public $recipientId; 

    public function __construct($senderId, string $message, $recipientId)
    {
        $this->senderId = $senderId;
        $this->message = $message;
        $this->recipientId = $recipientId;
    }

    public function broadcastOn()
    {
        $channel = new PrivateChannel('chat.' . $this->recipientId);
        return $channel;
    }
}