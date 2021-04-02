<?php

namespace App\Projectors;
use App\StorableEvents\AddMonto;
use App\StorableEvents\SubtractMonto;
use App\Models\TransaccionContador;
use Spatie\EventSourcing\Models\StoredEvent;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class TransaccionesCuentasProjector extends Projector
{
    public function onMontoAdd(AddMonto $event)
    {
        $transacciones = TransaccionContador::firstOrCreate(['account_uuid' => $event->accountUuid]);
        $transacciones->count +=1;
        $transacciones->save();   
    }

    public function onMontoSubtract(SubtractMonto $event)
    {
        $transacciones = TransaccionContador::firstOrcreate(['account_uuid' => $event->accountUuid]);
        $transacciones->count +=1;
        $transacciones->save();
    }
}
