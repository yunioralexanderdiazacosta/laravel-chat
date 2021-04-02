<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaccionContador extends Model
{
    use HasFactory;
    protected $table = 'transaccion_contadors';
    protected $guarded = [];
}
