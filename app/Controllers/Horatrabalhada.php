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
            //realiza a análise das horas
            $resultado = $this->analisaHora($horaEntrada, $horaSaida);
           
          //  echo var_dump($horaEntrada, $horaSaida) . "<br>";
			$intervalo = $horaEntrada->diff($horaSaida);
            $data = ['horaEntradaView' => $horaEntrada,
                    'horaSaidaView' =>    $horaSaida, 
                    'intervaloView' =>    $intervalo ,
                    'resultadoView' =>    $resultado
                ]; 
            
          //  echo(View('navBar'));      
         //   echo(View('input_hora'));
         //   echo view('output_hora', $data);
         //   //echo (view('page_analise', $data));    
			
           return 	view('navBar') .
					View('input_hora')  .
					view('output_hora', $data);
				
        }
    }
    public function analisaHora($horaEntrada, $horaSaida){
        $horarioInicial = new Time($horaEntrada);
        $horarioFinal = new Time($horaSaida);
		//define parametros do início e fim do turno no
        $inicioNoturno = 22;
        $fimNoturno = 5;
    
        // Calcula a diferença total em horas
        $diferencaHoras = $horarioInicial->difference($horarioFinal)->getHours();
        $diferencaMinutos = $horarioInicial->difference($horarioFinal)->getMinutes();
    
        // Ajusta a diferença se for negativa (hora de entrada maior que hora de saída)
        if ($diferencaHoras < 0) {
            $diferencaHoras = 24 + $diferencaHoras;
        }
		$hora = $horaEntrada->getHour() - $horaSaida->getHour();
		$minutos = $horaEntrada->getMinute() - $horaSaida->getMinute();
		
		//echo $hora;
		//echo $minutos;
		
        $totalHorasNoturnas = 0;
        $totalHorasDiurnas = 0;
		$totalMinutosDiurnos = 0;
		$totalMinutosNoturnos = 0;
        
        // Verifica a quantidade de horas noturnas e diurnas
		//echo $horaEntrada->getHour();
        for ($i = 0; $i < $diferencaHoras; $i++) {
            $horaAtual = $horarioInicial->addHours($i);
			//$this->classificaHora($horaAtual);
			
			
            //echo $horaAtual->getHour();
            // Verifica se a hora está no período noturno
				   if($horaAtual->getHour() == $horaSaida->getHour()){
						$totalMinutosDiurnos = $minutos * -1;
						$totalMinutosNoturnos = 0 ;
						$totalHorasDiurnas--;
				   } 
				   
				  
				   
				   if ($horaAtual->getHour() >= $inicioNoturno || $horaAtual->getHour() <$fimNoturno) {
						$totalHorasNoturnas++;
						echo $horaAtual . ': Noturna ';
						
					} else {		
						  
						$totalHorasDiurnas++;
						  echo $horaAtual . ': Diurna ';
					}	
        }
  
        return [
            'diferencaHoras' => $diferencaHoras,
            'diferencaMinutos' => $minutos,
            'totalHorasNoturnas' => $totalHorasNoturnas,
            'totalHorasDiurnas' => $totalHorasDiurnas,
			'totalMinutosNoturnos' => $totalMinutosNoturnos,
            'totalMinutosDiurnos' => $totalMinutosDiurnos
        ];
    }


    public function classificaHora($hora){
        $horarioNoturno = 0;
        $horarioDiurno = 0;
		$hora = $hora->getHour();
        if($hora >22 || $hora <5){
            return $horarioNoturno++;
        }else{
            return $horarioDiurno++;
        }
	
        
    }
}
    
    // while($hora> 0){
    //         echo '<br>' .$hora;
    //         $hora--;

    //     }
    
    // var_dump($intervaloView);
    
    
 
   
 
    