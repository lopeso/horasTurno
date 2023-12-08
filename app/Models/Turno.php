<?php

namespace App\Models;

use CodeIgniter\Model;

class Turno extends Model
{
    protected $table = 'registro_turno';
    protected $allowedFields = ['id', 'horaEntrada', 'HoraSaida', 'HorasDiurnas', 'HorasNoturnas', 'TotalTurno'];

public function getTurno($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function setTurno(){
        
    }
}
