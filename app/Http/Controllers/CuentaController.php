<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cuenta;
class CuentaController extends Controller
{
    public function store()
    {
        $data = [
            "name" => "Aaron"
        ];
        Cuenta::createCuenta($data);

        return response()->json([
            'message' => 'ok'
        ], 200);
    }

    public function addMonto()
    {   
        $cuenta = Cuenta::uuid('5d878a7a-ccd9-4eaf-9fc2-c18c75846b33');
        $cuenta->montoAdd(75000);
        
        return response()->json([
            'message' => 'ok'
        ], 200);
    }

    public function subtractMonto()
    {

    }
}
