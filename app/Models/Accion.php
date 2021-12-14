<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'lugar',
        'descripcion',
        'reparacion',
        'fechaEntrada',
        'fechaSalida',        
    ];

    public function molde()
    {
        return $this->belongsTo(Molde::class);
    }
}
