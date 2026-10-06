<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeviceUpdatedEvent implements ShouldBroadcastNow
{
    use Dispatchable, SerializesModels;
    public function __construct(
        public string $deviceUuid,
        public array $data,
    )
    {
    }

    public function broadcastOn(): Channel
    {
        return new Channel('device.' . $this->deviceUuid);
    }

    public function broadcastAs(): string
    {
        return 'device.updated';
    }
}
