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
            $treta = $this->analisaHora($horaEntrada, $horaSaida);
            $data = ['horaEntradaView' => $horaEntrada,
                    'horaSaidaView' =>    $horaSaida, 
                    'intervaloView' =>    $intervalo,
                    'resultadoView' =>    $this->analisaHora($horaEntrada, $horaSaida),
                    'registros' =>        $this->read_registros()	
                ]; 
            
            echo view('navBar');      
            //echo(View('input_hora'));
            echo view('output_hora', $data);
            //echo (view('page_analise', $data));    
		
         return $data;

            
                             		
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
            
            //$diferencaMinutos = $horaSaida->diff($horaEntrada);
            $analisaHoras = $this->analisaHora($horaEntrada, $horaSaida);
            $horasDiurnas = $analisaHoras['totalHorasDiurnas'] . ":". $analisaHoras['totalMinutosDiurnos'];
            $horasNoturnas = $analisaHoras['totalHorasNoturnas'] . ":" . $analisaHoras['totalMinutosNoturnos']; 
            
            //var_dump($horasDiurnas);
            $treta= $model->save([
                'horaEntrada'  => $horaEntrada->toDateTimeString(),
                'HoraSaida'  => $horaSaida->toDateTimeString(),
                'TotalTurno' => $analisaHoras['diferencaHoras'],
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
        $model = model(Turno::Class); //cria o objeto time para possibilitar operações na view
        $data['registro'] = $model->getTurno();
            return view('registro_output', $data);
        }
    
    
    public function analisaHora($horaEntrada, $horaSaida){
        $horarioInicial = new Time($horaEntrada);
        $horarioFinal = new Time($horaSaida);
		//define parametros do início e fim do turno no
        $diferencaHoras = $horarioInicial->difference($horarioFinal)->getHours();
    $diferencaMinutos = $horarioInicial->difference($horarioFinal)->getMinutes() % 60;

    // Verifica se a hora de entrada é maior que a hora de saída (indicando uma troca de dia)
    if ($diferencaHoras < 0 ) {
        $diferencaHoras = 24 + $diferencaHoras;
        $diferencaMinutos = 60 - $diferencaMinutos;
    }

    $totalHorasNoturnas = 0;
    $totalHorasDiurnas = 0;
    $totalMinutosDiurnos = 0;
    $totalMinutosNoturnos = 0;
    $inicioNoturno = 22;
    $fimNoturno =  5;

		
	
    for ($i = 0; $i < $diferencaHoras; $i++) {
        $horaAtual = $horarioInicial->addHours($i);

        if ($horaAtual->getHour() >= $inicioNoturno || $horaAtual->getHour() < $fimNoturno) {
            $totalHorasNoturnas++;
            $totalMinutosNoturnos += $horaAtual->format('i');
            echo '<br' . $totalMinutosNoturnos;
            
        } else {
            $totalHorasDiurnas++;
            $totalMinutosDiurnos += $horaAtual->format('i');
        }
    }//var_dump($horaAtual);
        // Ajuste nos minutos noturnos
       $totalMinutosNoturnos = $totalMinutosNoturnos % 60;
        // Ajuste nos minutos diurnos
       $totalMinutosDiurnos = $totalMinutosDiurnos % 60;

  
        return [
            'diferencaHoras' => $diferencaHoras,
            'diferencaMinutos' => $diferencaMinutos,
            'totalHorasNoturnas' => $totalHorasNoturnas,
			'totalMinutosNoturnos' => $totalMinutosNoturnos,	
			'totalHorasDiurnas' => $totalHorasDiurnas,
            'totalMinutosDiurnos' => $totalMinutosDiurnos
        ];
		
		//fim da função a ser substituida
    }


}
//     public function classificaHora($horarioInicial, $horarioFinal){
//         $horaAtual = $horarioInicial->getHour();

//         while($horarioAtual->getHour() =! $horarioFinal->getHour()){
//             echo $horarioAtual;
//         }
//             $horarioNoturno = 0;
//             $horarioDiurno = 0;
//             $hora = $hora->getHour();
//             if($hora >22 || $hora <5){
//                 return $horarioNoturno++;
//             }else{
//                 return $horarioDiurno++;
//         }
	
        
//     }
// }
    
    
//}
   