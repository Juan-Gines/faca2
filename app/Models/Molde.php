<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Molde extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'nombre',
        'ubicacionReal',
        'ubicacionActual',
        'versionActual',
        'estado',
        'estadoTexto',
        'cavidades',
        'comentario',
    ];    
    public function accions()
    {
        return $this->hasMany(Accion::class);
    }
    
    
}
