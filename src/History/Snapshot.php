<?php

declare(strict_types=1);

namespace Prwnr\Streamer\History;

use Carbon\Carbon;
use Illuminate\Support\Contracts\ArrayableInterface;
use Prwnr\Streamer\Contracts\Replayable;

class Snapshot implements ArrayableInterface
{
    public const KEY_SEPARATOR = '-';

    /**
     * Event name.
     */
    private string $name;

    /**
     * Unique event resource identifier.
     */
    private string $identifier;

    private Carbon $date;

    private string $id;

    /**
     * Snapshot constructor.
     */
    public function __construct(string $id, Replayable $event)
    {
        $this->id = $id;
        $this->name = $event->name();
        $this->identifier = $event->getIdentifier();
        $this->date = Carbon::now();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDate(): Carbon
    {
        return $this->date;
    }

    /**
     * Returns combination of event name and identifier.
     */
    public function getKey(): string
    {
        return $this->name . self::KEY_SEPARATOR . $this->identifier;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'identifier' => $this->identifier,
            'date' => $this->date->format('Y-m-d H:i:s'),
        ];
    }
}
