<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable=[
        'numero',
        'maquina_id',
        'referencia_id',
        'numero',
        'totalPiezas',
        'estado',
        'observaciones',
        'fechaInicio',
        'fechaFin',
        'tiempoCiclo',
        'pesoPieza',
        'cavidades',
        'material',
    ];
}
