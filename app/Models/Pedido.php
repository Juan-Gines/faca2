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
        'totalPiezas',
        'estado',
        'observaciones',
        'fechaInicio',
        'fechaFin',
        'tiempoCiclo',
        'pesoPieza',
        'cavidades',
        'material',
        'tipo',
    ];

    public function referencia()
    {
        return $this->belongsTo(Referencia::class);
    }

    public function maquina()
    {
        return $this->belongsTo(Maquina::class);
    }

    public function producciones()
    {
        return $this->hasMany(Produccion::class);
    }

    public function mermas()
    {
        return $this->hasMany(Merma::class);
    }
}
