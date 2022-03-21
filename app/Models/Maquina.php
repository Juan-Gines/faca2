<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;

    protected $fillable=[
        'numero',
        'descripcion',
        'sala',
        'activa',
        'pedido_id',
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}