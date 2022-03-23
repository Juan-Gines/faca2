<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Molde extends Model
{
    use HasFactory;

    // use Searchable;

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
        return $this->hasMany(Referencia::class);
    }    
}
