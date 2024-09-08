<?php

declare(strict_types=1);

namespace Prwnr\Streamer\Eloquent;

use Prwnr\Streamer\Contracts\Event;

class EloquentModelEvent implements Event
{
    private string $name;
    private array $payload;

    public function __construct(string $name, array $payload)
    {
        $this->name = $name;
        $this->payload = $payload;
    }

    /**
     * Event name. Can be any string
     * This name will be later used as event name for listening.
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Event type. Can be one of the predefined types from this contract.
     */
    public function type(): string
    {
        return Event::TYPE_EVENT;
    }

    /**
     * Event payload that will be sent as message to Stream.
     */
    public function payload(): array
    {
        return $this->payload;
    }
}
