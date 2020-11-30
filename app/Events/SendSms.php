<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendSms implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public $broadcastQueue = 'send-sms';

    public $channel_name = "sms";

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message, $channel_name = "sms")
    {
        $this->message = $message;
        $this->channel_name = $channel_name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->channel_name);
    }

    public function broadcastAs(){
        return 'sms.created';
    }

    public function broadcastWith()
    {
        return [
            'message_id' => $this->message->id,
            'phone' => '+993'.$this->message->phone,
            'name' => $this->message->user->name,
            'message' => $this->message->message,
        ];
    }
}
