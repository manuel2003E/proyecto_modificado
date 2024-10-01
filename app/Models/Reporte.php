<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'credito_id',
        'monto_pagado',
        'fecha_pago',
        'observaciones',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function credito()
    {
        return $this->belongsTo(Credito::class);
    }
}
