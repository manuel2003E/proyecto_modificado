<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ['credito_id', 'cliente_id', 'monto_pago', 'fecha_pago', 'metodo_pago'];

    public function credito()
    {
        return $this->belongsTo(Credito::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
