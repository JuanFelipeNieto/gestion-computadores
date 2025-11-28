<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoComputador extends Model
{
    use HasFactory;

    protected $table = 'tipo_computadores';
    protected static function boot()
{
    parent::boot();

    static::deleting(function ($tipo) {
        // Eliminar todos los computadores que pertenecen a este tipo
        $tipo->computadores()->delete();
    });
}

    protected $fillable = [
        'nombre'
    ];

    public function computadores()
    {
        return $this->hasMany(Computador::class, 'tipo_id');
    }
}

