<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computador extends Model
{
    use HasFactory;
    public function getRouteKeyName()
{
    return 'id';
    
}
protected $primaryKey = 'id';


    protected $table = 'computadores';

    protected $fillable = [
        'marca',
        'modelo',
        'ram_gb',
        'almacenamiento_gb',
        'precio',     
        'tipo_id'
    ];

    public function tipo()
    {
        return $this->belongsTo(TipoComputador::class, 'tipo_id');
    }
}

