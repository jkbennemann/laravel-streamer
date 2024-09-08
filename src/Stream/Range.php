<?php

declare(strict_types=1);

namespace Prwnr\Streamer\Stream;

class Range
{
    public const FIRST = '-';

    public const LAST = '+';

    public const FORWARD = 1;

    public const BACKWARD = 2;


    private string $start = self::FIRST;
    private string $stop = self::LAST;
    private int $direction = self::FORWARD;

    public function __construct(
        string $start = self::FIRST,
        string $stop = self::LAST,
        int $direction = self::FORWARD
    ) {
        $this->start = $start;
        $this->stop = $stop;
        $this->direction = $direction;
    }

    public function getStart(): string
    {
        return $this->start;
    }

    public function getStop(): string
    {
        return $this->stop;
    }

    public function getDirection(): int
    {
        return $this->direction;
    }
}
