<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;
class MTurno extends Model
{
    public Time $horaEntrada;
    public Time $horaSaida;
    public Time $periodoDiurno;
    public Time $periodoNoturno;
    var $turno;  

    protected $table = 'registro_turno';
    protected $allowedFields = ['id',
                                'horaEntrada',
                                'HoraSaida',
                                'HorasDiurnas',
                                'HorasNoturnas', 
                                'TotalTurno'];
public function montaTurno(){

    //variáveis presentes no arquivo
    $horaAtual = $_POST['horaEntrada'];
    $horaFinal = $_POST['horaSaida'];
    //$this->horaSaida = $_POST['horaSaida'];

    $this->periodoDiurno = new Time('00:00:00');
    $this->periodoNoturno=  new Time('00:00:00');
    
    $horaAtual = new Time($horaAtual);
    $horaFinal = new Time($horaFinal);

    $this->horaEntrada = $horaAtual; 
    $this->horaSaida = $horaFinal; 
    
    $this->comparaHoras();
    
    //$this->horaEntrada->getHour();
    //var_dump($this->turno->h);
    $data = ['horarioEntrada' => $this->horaEntrada,
            'horarioSaida' => $this->horaSaida,
            'periodoDiurno' => $this->periodoDiurno,
            'periodoNoturno' => $this->periodoNoturno,
            'periodoTurno' => $this->turno];// . $this->horaSaida;
    return;
    //view('navBar');
    // view('output_comparaHora', $data);
}

public function comparaHoras(){
   // $horaAtual= new Time($horaInicial);
  //  $horaFinal= new Time($horaInicial);
    
    $diferencaMinutosIniciais = 60 - $this->horaEntrada->getMinute();
    $diferencaHoras = 
    //echo '<br>' . $horaInicial->getMinute();
    $horaAtual= new Time($this->horaEntrada);
    $horaFinal = new Time($this->horaSaida);
    
    
     if($this->horaEntrada->getHour() >= $horaFinal->getHour()){
         $horaFinal = $horaFinal->addDays(1);
        
     }

     //seta o valor de hora trabalahadas em um turno
     $this->turno = $horaFinal->diff($this->horaEntrada);
    //primeira hora
    if($this->horaEntrada->getHour() > 22 || $this->horaEntrada->getHour() <=5 && $this->horaEntrada->getMinute() != 0 && $controle =0){
        $this->periodoNoturno = $this->periodoNoturno->addMinutes($diferencaMinutosIniciais);
        $horaAtual = $horaAtual->setMinute(00);
        $horaAtual = $horaAtual->addHours(1);
      
    }else{
        $this->periodoDiurno = $this->periodoDiurno->addMinutes($diferencaMinutosIniciais);
        $horaAtual = $horaAtual->setMinute(00);
        $horaAtual = $horaAtual->addHours(1);
    
    }

   //echo verifica valores da hora final;

    if($this->horaEntrada->getHour() >= 22 || $this->horaSaida->getHour() <=5 ){
       // $this->periodoNoturno = $this->periodoNoturno->addMinutes($horaFinal->getMinute());
    
        //$this->periodoNoturno = $this->periodoNoturno->subHours(1);
       // echo "          " . $horaAtual->toTimeString();
    }else{
        $this->periodoDiurno = $this->periodoDiurno->addMinutes($this->horaSaida->getMinute());

    }


     for($i = 0; $i < $this->turno->h -1 ; $i++){
           if($horaAtual->getHour() >=22 ||$horaAtual->getHour() < 5 ){
              $this->periodoNoturno = $this->periodoNoturno->addHours(1);
           } 
           $horaAtual = $horaAtual->addHours(1);  
       }
 
       $aux = $this->turno->format('%H:%i');
       $aux = new Time($aux);

       $diff = $this->periodoNoturno->toTimeString();
       
       $diff = new Time($diff);
       $aux = $aux->diff($diff);
       $aux = new Time($aux->format('%H:%i'));
       $this->periodoDiurno =  $aux;

       //var_dump($aux);
   // $horasDia = $this->turno->h - $this->periodoNoturno->getHour();
  //  $this->periodoDiurno = $this->periodoDiurno->addHours($horasDia);
    //echo $treta2->format('%H:%i');
        
    return;
}


protected function save_turno(){
    $this->save([
                'horaEntrada'  => $this->horaEntrada,
                'HoraSaida'  => $this->horaSaida,
                'HorasDiurnas' =>  $this->periodoDiurno,
                'HorasNoturnas' => $this->periodoNoturno(),
                'TotalTurno' => $this->turno()
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
