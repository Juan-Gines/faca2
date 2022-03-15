<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merma extends Model
{
    use HasFactory;

    protected $fillable=[
        'pedido_id',
        'fecha',
        'sala',
        'purga',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
