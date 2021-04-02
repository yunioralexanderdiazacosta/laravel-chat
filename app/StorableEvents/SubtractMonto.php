<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class SubtractMonto extends ShouldBeStored
{
    /** @var string */
    public $accountUuid;

    /** @var int */
    public $amount;

    public function __construct(string $accountUuid, int $amount)
    {
        $this->accountUuid = $accountUuid;
        $this->amount = $amount;
    }
}
