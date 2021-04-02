<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class AddCuenta extends ShouldBeStored
{
    /** @var array */
    public $accountAttributes;

    public function __construct(array $accountAttributes)
    {
        $this->accountAttributes = $accountAttributes;
    }
}
