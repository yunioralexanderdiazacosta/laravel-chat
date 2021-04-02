<?php

namespace App\Projectors;
use App\Models\Cuenta;
use App\StorableEvents\AddCuenta;
use App\StorableEvents\AddMonto;
use App\StorableEvents\SubtractMonto;
use App\StorableEvents\DeleteCuenta;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class BalanceCuentaProjector extends Projector
{
    public function onCuentaAdd(AddCuenta $event)
    {
        Cuenta::create($event->accountAttributes);
    }

    public function onMontoAdd(AddMonto $event)
    {
        $cuenta = Cuenta::uuid($event->accountUuid);
        $cuenta->balance += $event->amount;
        $cuenta->save();
    }

    public function onMontoSubtract(SubtractMonto $event)
    {
        $cuenta = Cuenta::uuid($event->accountUuid);
        $cuenta->balance -= $event->amount;
        $cuenta->save();
    }

    public function onCuentaDelete(DeleteCuenta $event)
    {
        Cuenta::uuid($event->accountUuid)->delete();
    }
}
