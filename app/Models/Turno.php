<?php

namespace App\Models;

use CodeIgniter\Model;

class Turno extends Model
{
    var $horaEntrada;
    var $horaSaida;
    var $periodoDiurno;
    var $periodoNoturno;

    protected $table = 'registro_turno';
    protected $allowedFields = ['id',
                                'horaEntrada',
                                'HoraSaida',
                                'HorasDiurnas',
                                'HorasNoturnas', 
                                'TotalTurno'];
public function save_turno(){
    $this->save([
                'horaEntrada'  => $horarioEntrada->toTimeString(),
                'HoraSaida'  => $horarioSaida->toTimeString(),
                'HorasDiurnas' =>  $periodoDiurno->toTimeString(),
                'HorasNoturnas' => $periodoNoturno->toTimestring(),
                'TotalTurno' => $periodoTurno->toTimeString()
                ]);

}

public function loadAllTurnos($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    
}
