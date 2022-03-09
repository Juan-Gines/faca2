<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Molde extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'descripcion',
        'versionActual',
        'ubicacionReal',
        'ubicacionActual',        
        'estado',
        'estadoTexto',
        'cavidades',
        'comentario',        
    ];    
    
    public function referencias()
    {
        return $this->hasMany(Version::class);
    }    
}
