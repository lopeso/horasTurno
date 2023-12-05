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
            
           
          //  echo var_dump($horaEntrada, $horaSaida) . "<br>";
          $intervalo = $horaEntrada->diff($horaSaida);
            $data = ['horaEntradaView' => $horaEntrada,
                    'horaSaidaView' => $horaSaida, 
                    'intervaloView' => $intervalo ];

        
            
            echo(View('navBar'));
            echo (view('page_analise', $data));
            echo(View('input_hora'));
            echo view('output_hora', $data);
           
            
        }
    }
    public function analisaHora($horaEntrada, $horaSaida){
        $horarioInicial = new Time($horaEntrada);
        $horarioFinal = new Time($horaSaida);
    
        // Calcula a diferença total em horas
        $diferencaHoras = $horarioInicial->difference($horarioFinal)->getHours();
    
        $inicioNoturno = 22;
        $fimNoturno = 5;
    
        $totalHorasNoturnas = 0;
        $totalHorasDiurnas = 0;
    
        // Verifica a quantidade de horas noturnas e diurnas
        for ($i = 0; $i < $diferencaHoras; $i++) {
            $horaAtual = $horarioInicial->addHours($i);
    
            // Verifica se a hora está no período noturno
            if (($horaAtual->getHour() >= $inicioNoturno && $horaAtual->getHour() <= 23) || ($horaAtual->getHour() >= 0 && $horaAtual->getHour() < $fimNoturno)) {
                $totalHorasNoturnas++;
            } else {
                $totalHorasDiurnas++;
            }
        }
        echo $totalHorasDiurnas . " " . $totalHorasNoturnas;
        return [
            'totalHorasNoturnas' => $totalHorasNoturnas,
            'totalHorasDiurnas' => $totalHorasDiurnas
        ];
    }
    
    
    
   
   

 
    

}
    

?>