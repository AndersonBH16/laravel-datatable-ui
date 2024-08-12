<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePapeleta extends Model
{
    use HasFactory;

    protected $table = 'detpapeletas';
    protected $primaryKey = 'iddetpapeletas';
    protected $fillable = ['idpapeletas', 'hsalida', 'hregreso'];

    public function papeleta()
    {
        return $this->belongsTo(Papeleta::class, 'idpapeleta');
    }
}
