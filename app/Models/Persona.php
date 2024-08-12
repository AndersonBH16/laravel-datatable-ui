<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';
    protected $primaryKey = 'idpers';
    protected $fillable = ['apellidos', 'nombres', 'cargo', 'plaza'];

    public function usuarios()
    {
        return $this->hasOne(Usuario::class, 'idpers');
    }

    public function papeletas(){
        return $this->hasMany(Papeleta::class, 'idpers');
    }
}
