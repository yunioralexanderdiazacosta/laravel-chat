<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\StorableEvents\AddCuenta;
use App\StorableEvents\DeleteCuenta;
use App\StorableEvents\AddMonto;
use App\StorableEvents\SubtractMonto;
use Ramsey\Uuid\Uuid;;

class Cuenta extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function createCuenta(array $attributes): Cuenta
    {
        /*
         * Let's generate a uuid.
         */
        $attributes['uuid'] = (string) Uuid::uuid4();

        /*
         * The account will be created inside this event using the generated uuid.
         */
        event(new AddCuenta($attributes));

        /*
         * The uuid will be used the retrieve the created account.
         */
        return static::uuid($attributes['uuid']);
    }

    public function montoAdd(int $amount)
    {
        event(new AddMonto($this->uuid, $amount));
    }

    public function montoSubtract(int $amount)
    {
        event(new SubtractMonto($this->uuid, $amount));
    }

    public function removeCuenta()
    {
        event(new deleteCuenta($this->uuid));
    } 

    public static function uuid(string $uuid): ?Cuenta
    {
        return static::where('uuid', $uuid)->first();
    }  
}
