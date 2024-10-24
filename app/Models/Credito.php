<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id', 'monto_credito', 'tasa_interes', 'estado_credito', 'dia_gracia', 'dias_atraso', 'monto_mora_diario', 'monto_total_mora',
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function pagos() {
        return $this->hasMany(Pago::class);
    }

    // Método para calcular la mora acumulada
    public function calcularMora() {
        $this->dias_atraso = now()->diffInDays($this->dia_gracia);
        $this->monto_total_mora = $this->dias_atraso * $this->monto_mora_diario;
        $this->save();
    }
}


