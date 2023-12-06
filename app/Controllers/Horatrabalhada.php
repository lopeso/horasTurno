<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
class HoraTrabalhada extends Controller
{
    public function index(){
    
        echo(View('navBar'));
        echo(View('input_hora'));
    }
    
    public function pegaHora(){
       
        if($this->request->getMethod() == "post"){
            $horaEntrada = $this->request->getVar('horaEntrada');
            $horaSaida = $this->request->getVar('horaSaida');
           
           
            $horaEntrada = new Time($horaEntrada);
            $horaSaida = new Time($horaSaida);
            
            $resultado = $this->analisaHora($horaEntrada, $horaSaida);
           
          //  echo var_dump($horaEntrada, $horaSaida) . "<br>";
          $intervalo = $horaEntrada->diff($horaSaida);
            $data = ['horaEntradaView' => $horaEntrada,
                    'horaSaidaView' =>    $horaSaida, 
                    'intervaloView' =>    $intervalo ,
                    'resultadoView' =>    $resultado
                ]; 
            
            echo(View('navBar'));      
            echo(View('input_hora'));
            echo view('output_hora', $data);
            //echo (view('page_analise', $data));        
            
        }
    }
    public function analisaHora($horaEntrada, $horaSaida){
        $horarioInicial = new Time($horaEntrada);
        $horarioFinal = new Time($horaSaida);
    
        $inicioNoturno = 22;
        $fimNoturno = 5;
    
        // Calcula a diferença total em horas
        $diferencaHoras = $horarioInicial->difference($horarioFinal)->getHours();
        $diferencaMinutos = $horarioInicial->difference($horarioFinal)->getMinutes();
    
        // Ajusta a diferença se for negativa (hora de entrada maior que hora de saída)
        if ($diferencaHoras < 0) {
            $diferencaHoras = 24 + $diferencaHoras;
        }
    
        $totalHorasNoturnas = 0;
        $totalHorasDiurnas = 0;
        
        // Verifica a quantidade de horas noturnas e diurnas
        for ($i = 0; $i < $diferencaHoras; $i++) {
            $horaAtual = $horarioInicial->addHours($i);
            
            // Verifica se a hora está no período noturno
            if ($horaAtual->getHour() >= $inicioNoturno || $horaAtual->getHour() <=$fimNoturno) {
                $totalHorasNoturnas++;
            } else {
                $totalHorasDiurnas++;
            }
        }
    
        return [
            'diferencaHoras' => $diferencaHoras,
            'diferencaMinutos' => $diferencaMinutos,
            'totalHorasNoturnas' => $totalHorasNoturnas,
            'totalHorasDiurnas' => $totalHorasDiurnas
        ];
    }

    
    public function classificaHora($hora){
        $horarioNoturno = 0;
        $horarioDiurno = 0;
        if($hora >22 || $hora <5){
            return $horarioNoturno++;
        }else{
            return $horarioDiurno++;
        }
        
    }

    
    // while($hora> 0){
    //         echo '<br>' .$hora;
    //         $hora--;

    //     }
    
    // var_dump($intervaloView);
    
    
    
   
   

 
    

}
    

?>