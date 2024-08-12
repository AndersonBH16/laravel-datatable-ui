<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papeleta extends Model
{
    use HasFactory;

    protected $table = 'papeletas';
    protected $primaryKey = 'idpapeletas';
    protected $fillable = ['nro', 'idpers', 'detalle'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'idpers', 'idpers');
    }

    public function detallePapeletas()
    {
        return $this->hasMany(DetallePapeleta::class, 'idpapeleta', 'idpapeleta');
    }
}
