<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'molde_id',
        'numero',
        'descripcion',        
        'ubicacion',                
        'estado',
        'estadoTexto',
        'cavidades',
        'comentario',        
        'fotoPieza',        
    ];

    public function accions()
    {
        return $this->hasMany(Accion::class);
    }

    public function molde(){
        return $this->belongsTo(Molde::class);
    }
}
