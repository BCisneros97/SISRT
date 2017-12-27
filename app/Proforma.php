<?php

namespace App;

class Proforma extends Model
{
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';

    public function tipo()
    {
        if ($this->tipo == 'I')
            return 'Instalación';
        elseif ($this->tipo == 'M')
            return 'Mantenimiento';
        else
            return 'Reparación';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'dni_u', 'dni');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ruc_c', 'ruc');
    }

    public function piezas()
    {
        return $this->belongsToMany(Pieza::class, 'detalle_proforma', 'codigo_p', 'id_p')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }

    public function servicio()
    {
        return $this->hasOne(Servicio::class, 'codigo_p');
    }
}
