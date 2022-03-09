<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia_id',        
        'tipo',
        'lugar',
        'descripcion',
        'reparacion',
        'fechaEntrada',
        'fechaSalida',
        'fechaPrueba',
        'ok',        
    ];
    
    public function referencia()
    {
        return $this->belongsTo(Referencia::class);
    }    
}
