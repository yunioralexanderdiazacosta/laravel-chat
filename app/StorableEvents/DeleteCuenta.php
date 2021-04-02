<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class DeleteCuenta extends ShouldBeStored
{
    /** @var string */
    public $accountUuid;

    public function __construct(string $accountUuid)
    {
        $this->accountUuid = $accountUuid;
    }
}
