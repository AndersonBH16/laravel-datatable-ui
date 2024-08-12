<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'iduser';
    protected $fillable = ['idpers', 'condicion'];

    public function persona(){
        return $this->belongsTo(Persona::class, 'idpers');
    }
}
