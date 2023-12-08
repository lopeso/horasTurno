<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use CodeIgniter\Controller\Registros;
use App\Models\Turno;

class HoraTrabalhada extends Controller
{
    public function index($saved = Null){
    if($saved){
        echo "ss";
    }
        echo(View('navBar'));
        
        echo(View('input_hora'));
        //echo(view('output_hora'));
    }
    
    public function pegaHora(){
       
        if($this->request->getMethod() == "post"){
            $horaEntrada = $this->request->getVar('horaEntrada');
            $horaSaida = $this->request->getVar('horaSaida');
           
           
            $horaEntrada = new Time($horaEntrada);
            $horaSaida = new Time($horaSaida);
            //realiza a análise das horas
           // $resultado = 
           
          //  echo var_dump($horaEntrada, $horaSaida) . "<br>";
			$intervalo = $horaEntrada->diff($horaSaida);

            $data = ['horaEntradaView' => $horaEntrada,
                    'horaSaidaView' =>    $horaSaida, 
                    'intervaloView' =>    $intervalo ,
                    'resultadoView' =>    $this->analisaHora($horaEntrada, $horaSaida),
                    'registros' =>        $this->read_registros()	
                ]; 
            
            echo(View('navBar'));      
            //echo(View('input_hora'));
            echo view('output_hora', $data);
            //echo (view('page_analise', $data));    
		
         return 	$data;

            
                             		
        }

    }
    
    public function save_registro($entrada,   $saida ){
        if($this->request->getMethod() == "post"){
            $horaEntrada = new Time($entrada);
            $horaSaida = new Time($saida);
            
           // $novo = $this->analisaHora($entrada, $saida);
            $model = model(Turno::class);
            $diferencaHoras = $horaSaida->diff($horaEntrada);
            $diferencaHoras = $diferencaHoras->h . ":" . $diferencaHoras->i .":". $diferencaHoras->s;
            
            $diferencaMinutos = $horaSaida->diff($horaEntrada);
            $analisaHoras = $this->analisaHora($horaEntrada, $horaSaida);
            $horasDiurnas = $analisaHoras['totalHorasDiurnas'] . ":". $analisaHoras['totalMinutosDiurnos'];
        
            $horasNoturnas = $analisaHoras['totalHorasNoturnas'] . ":" . $analisaHoras['totalMinutosNoturnos']; 
            
            //var_dump($horasDiurnas);
            $treta= $model->save([
                'horaEntrada'  => $horaEntrada->toDateTimeString(),
                'HoraSaida'  => $horaSaida->toDateTimeString(),
                'TotalTurno' => $diferencaHoras,
                'HorasDiurnas' =>  $horasDiurnas,
                'HorasNoturnas' => $horasNoturnas
                //'HorasNoturnas' =>  $horaEntrada->subHours
                ]);
             if($treta){
           
                    $data['registros'] = $this->read_registros();

         //       return "salvo com sucesso";
            return 	view('navBar') .

                    view('input_success').
					//View('input_hora')  .
                    View('input_hora') .
					//view('output_hora', $data) ;
                    //view('output_hora', $data) .
                    view('registro_output', $data);
                   

                             		
        }
        else
             {
                return "erro";
             }   
             

        //$data['saved'] = True;  
        
            }
    }

    public function read_registros(){
        $model = model(Turno::Class);
        $data['registro'] = $model->getTurno();
            return view('registro_output', $data);
        }
    
    
    public function analisaHora($horaEntrada, $horaSaida){
        $horarioInicial = new Time($horaEntrada);
        $horarioFinal = new Time($horaSaida);
		//define parametros do início e fim do turno no
        $inicioNoturno = 22;
        $fimNoturno = 5;
		$totalHorasNoturnas = 0;
        $totalHorasDiurnas = 0;
		$totalMinutosDiurnos = 0;
		$totalMinutosNoturnos = 0;
		$controle = 0;
        // Calcula a diferença total em horas
        $diferencaHoras = $horarioInicial->difference($horarioFinal)->getHours();
        $diferencaMinutos = $horarioInicial->difference($horarioFinal)->getMinutes();
    
		//verifica valores 
		$hora = $horaEntrada->getHour() - $horaSaida->getHour();
		$minutos = $horaEntrada->getMinute() - $horaSaida->getMinute();
		//echo $minutos;
        // Ajusta a diferença se for negativa (hora de entrada maior que hora de saída)
		
         if ($diferencaHoras < 0 ) {
			$diferencaHoras = 24 + $diferencaHoras;
			//echo 'treta';
		}
		
		
		//echo $hora;
		//echo $minutos
        
        // Verifica a quantidade de horas noturnas e diurnas
		//echo $horaEntrada->getHour();
		
        for ($i = 0; $i < $diferencaHoras; $i++) {
			
            $horaAtual = $horarioInicial->addHours($i);
			//vai entrar aqui pra substituir a função que está sendo executada aqui
			//$this->classificaHora($horaAtual);
			  //echo $horaAtual->getHour();
            // Verifica se a hora está no período noturno
				   	   
				if ($horaAtual->getHour() >= $inicioNoturno || $horaAtual->getHour() <$fimNoturno) {
						$totalHorasNoturnas++;
						//echo $horaAtual . ': Noturna ';		
				
                
                    } else {		
						  
						$totalHorasDiurnas++;
                       // echo $horaAtual . ': diurna';
						 
				}
				
				 if($horaAtual->getHour() == $horaSaida->getHour()){
							
							$totalHorasDiurnas--;
				// 			//echo "mmm";
						
				// 		 // echo $horaAtual . ': Diurna ';
			 	}
                
				
            }
            //$totalMinutosDiurnos = 60- $totalMinutosDiurnos;
            //$totalMinutosNoturnos == 60- $totalMinutosNoturnos;
            //$totalHorasDiurnas --;
            
            
				
            //echo $horarioInicial;
  
        return [
            'diferencaHoras' => $diferencaHoras,
            'diferencaMinutos' => $minutos,
            'totalHorasNoturnas' => $totalHorasNoturnas,
			'totalMinutosNoturnos' => $totalMinutosNoturnos,	
			'totalHorasDiurnas' => $totalHorasDiurnas,
            'totalMinutosDiurnos' => $totalMinutosDiurnos
        ];
		
		//fim da função a ser substituida
    }

  
    public function classificaHora($horarioInicial, $horarioFinal){
            while($horarioFinal->getHour()){

            }
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
    
    
 
   
 
    