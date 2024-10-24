<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'dui', 'direccion', 'telefono', 'correo', 'fecha_registro',
    ];

    public function creditos() {
        return $this->hasMany(Credito::class);
    }

    public function pagos() {
        return $this->hasMany(Pago::class);
    }
}


