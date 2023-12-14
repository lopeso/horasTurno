<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use CodeIgniter\Controller\Registros;
use App\Models\Turno;
use DateTime;

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
           
           // $data = [
           //         'resultadoView' =>    $this->analisaHora($horaEntrada, $horaSaida),
                    
             //   ]; 
           // ]]
           $resultado = $this->analisaHora($horaEntrada, $horaSaida);
           $data =['resultadoView'=> $resultado] ;
            echo view('navBar');      
            //echo(View('input_hora'));
           return view('output_hora', $data);
            //echo (view('page_analise', $data));    
		
         //return $comparaHora($horaEntrada, $horaSaida);           		
        }

    }

    public function comparaHora(){
        $horaInicial = new Time($this->request->getVar('horaEntrada'));
        $horaFinal = new Time($this->request->getVar('horaSaida')); 
        $periodoDiurno = new Time('00:00:00');
        $periodoNoturno = new Time('00:00:00');
        // $horaEntrada = ;
        //    $horaSaida = ;
        

        $controle = 0;
        $diferencaMinutosIniciais = 60 - $horaInicial->getMinute();
        //echo '<br>' . $horaInicial->getMinute();
        $horaAtual= new Time($horaInicial);
        
         if($horaInicial->getHour() >= $horaFinal->getHour()){
             $horaFinal = $horaFinal->addDays(1);
             $controle = 1;
         }
         $turno= $horaFinal->diff($horaInicial);
        //echo $horaInicial  . "<br>";
       // echo $horaFinal . "<br>";
       // echo $turno->format("%H:%I") . "  ";
        //verificação primeira hora  
        if($horaInicial->getHour() >= 22 && $horaInicial->getMinute() != 0 || $horaInicial->getHour() <=5 && $horaInicial->getMinute() != 0){
          $periodoNoturno = $periodoNoturno->addMinutes($diferencaMinutosIniciais);
            
        }
       else 
            $periodoDiurno = $periodoDiurno->addMinutes($diferencaMinutosIniciais);
          
        //echo '<br>' . $horaAtual->toDateTimeString();
        //echo '<br>' . $horaFinal->toDateTimeString();
        $horaAtual = $horaAtual->setMinute(00);
        $horaAtual = $horaAtual->addHours(1);
        //echo '<br>' . $horaAtual->toTimeString();//echo ":";
        
        // //roda o período de trabalho adcionando valores ao período noturno ou diurno baseado na hora
        for($i = 0; $i < $turno->h; $i++){
              if($horaAtual->getHour() >=22 ||$horaAtual->getHour() < 5){
                 $periodoNoturno = $periodoNoturno->addHours(1);
              }else{
                  $periodoDiurno = $periodoDiurno->addHours(1);
              }    
              $horaAtual = $horaAtual->addHours(1);  
          }

        //echo verifica valores da hora final;
        if($horaAtual->getHour() > 22 || $horaAtual->getHour() <5){
            $periodoNoturno = $periodoNoturno->addMinutes($horaFinal->getMinute());
            $periodoNoturno = $periodoNoturno->subHours(1);
           // echo "          " . $horaAtual->toTimeString();
        }else{
            $periodoDiurno = $periodoDiurno->addMinutes($horaFinal->getMinute());
            $periodoDiurno = $periodoDiurno->subHours(1);
        }

       
      //  echo '<br>' . $periodoDiurno->toTimeString();
       // echo '<br>' . $periodoNoturno->toTimeString();
        
     

        //monta o objeto turno
        $expediente = new Turno();
        $expediente->horaEntrada = $horaInicial->getTimestamp();
        $expediente->horaSaida = $horaFinal->getTimestamp();
        $expediente->periodoDiurno = $periodoDiurno->getTimestamp();
        $expediente->periodoNoturno = $periodoNoturno->getTimestamp();
        
        $data = [
            'horarioEntrada' =>$horaInicial,
            'horarioSaida'  => $horaFinal,
            'periodoDiurno' => $periodoDiurno,
            'periodoNoturno'=> $periodoNoturno,
            'periodoTurno'  => $turno,
            'turno'         => $expediente
        ];
     
       // var_dump($dia);
        echo view ('navBar');
        
        return view('output_comparaHora', $data);

        
}

    public function save_registro(){
    //parse_str($_SERVER['QUERY_STRING'], $_GET); 
        var_dump($_POST);    
    $treta = $this->request->getVar('horasNoite');
    $treta = $this->request->getVar('horarioEntrada');    
    var_dump($treta);
        $horaEntrada = $this->request->getVar('horaEntrada');
        $horaSaida = $this->request->getVar('horarioSaida');
        //echo $data['horarioEntrada'];
        if($this->request->getMethod() == "get"){
           
           $model = model(Turno::class);
            
        //     $treta= $model->save([
        //         'horaEntrada'  => $horarioEntrada->toTimeString(),
        //         'HoraSaida'  => $horarioSaida->toTimeString(),
        //         'HorasDiurnas' =>  $periodoDiurno->toTimeString(),
        //         'HorasNoturnas' => $periodoNoturno->toTimestring(),
        //         'TotalTurno' => $periodoTurno->toTimeString()
        //         ]);
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
                return "erro de inserção no banco";
             }   
        
         }else return 'erro no método';
    
        }
    public function read_registros(){
        $model = model(Turno::Class); //cria o objeto time para possibilitar operações na view
        $data['registro'] = $model->loadAllTurnos();
            return view('registro_output', $data) . view('input_hora');
        }
    
    
    public function analisaHora($horaEntrada, $horaSaida){
        $horarioInicial = new Time($horaEntrada);
        $horarioFinal = new Time($horaSaida);
		//define parametros do início e fim do turno no
        $diferencaHoras = $horarioInicial->difference($horarioFinal);
        $diferencaMinutos = $horarioInicial->difference($horarioFinal)->getMinutes() % 60;
        $totalHorasNoturnas = 0;
        $totalHorasDiurnas = 0;
        $totalMinutosDiurnos = 0;
        $totalMinutosNoturnos = 0;
        $inicioNoturno = 22;
        $fimNoturno =  5;
    
  // echo  $diferencaHoras->getHours() . ':'. $diferencaHoras->minutes%60 . '<br>';    // -2557
       
    //echo '<br>' . $diferencaHoras->getHours();
    $treta = $horarioInicial->difference($horarioFinal);
    //echo $treta->getHours . ":" . $treta->getMinutes();

    echo ' ================== <br>';
    // Verifica se a hora de entrada é maior que a hora de saída (indicando uma troca de dia)
    if ($diferencaHoras->getHours() < 0 ) {
         $totalHorasDiurnas = 24 + $diferencaHoras->getHours();
     }
   
    $diferencaMinutos =  $diferencaHoras->minutes;
    $diferencaHoras = $diferencaHoras->getHours();
        
    $periodoDiurno = new Time('00:00:00');
    $periodoNoturno = new Time('00:00:00');
    $horaAtual = new Time($horarioInicial);
    
    // //echo '<br>' . $periodoNoturno->toTimeString();
    //  $i=0;
    //  echo $treta;
    $minutosInicio =  $horarioInicial->getMinute();
    //testandoa  primeira hora do turno para adicionar minutos
    //echo '<br>' . $periodoDiurno->toTimeString();
    // if($i==0 && $horaAtual->getHour() >= $inicioNoturno || $horaAtual->getHour() <= $fimNoturno && $i=0 ) {
       
    //     $periodoDiurno= $periodoDiurno->subMinutes($minutosInicio);
    //    //  echo '<br>entrou a noite removeu ' .  $periodoDiurno->getMinute(). ' ao periodo diurno';
    
    //      }else{
    //         $periodoDiurno = $periodoDiurno->subMinutes($minutosInicio);
        
    //   //  echo '<br>entrou de dia removeu ' .  $periodoDiurno->getMinute(). ' ao periodo noturno ';
      
    //      } 
    $diferencaPrimeiraHora = 60 - $horarioInicial->getMinute(); 
   if ($horarioInicial->getHour() >= $inicioNoturno || $horarioInicial->getHour() < $fimNoturno ){
    
        $periodoNoturno= $periodoNoturno->addMinutes($diferencaPrimeiraHora);
        $periodoNoturno = $periodoNoturno->subHours(1);
        $periodoDiurno = $periodoDiurno->addHours(1);
    //$periodoNoturno= $periodoNoturno->subHours(1);
    echo '<br> entrou a noite' . $periodoNoturno->toTimeString();
   }
      else{
        $periodoDiurno = $periodoDiurno->addMinutes($diferencaPrimeiraHora);
        $periodoDiurno = $periodoDiurno->subHours(1);
       
    }
   echo $horaAtual;
   //echo $diferencaHoras; 
 
    for ($i=0; $i <= $diferencaHoras; $i++) {
        echo '<br>' . $horaAtual->toTimeString();
            if ($horaAtual->getHour() >= $inicioNoturno || $horaAtual->getHour() < $fimNoturno) {
                $totalHorasNoturnas++;
                $periodoNoturno = $periodoNoturno->addHours(1);
                echo '<br> Hora Noturna contabilizada' . $periodoNoturno->toTimeString();              
            }else{
                $totalHorasDiurnas++;
                $periodoDiurno = $periodoDiurno->addHours(1);
                echo '<br> Hora Diurna contabilizada' . $periodoDiurno->toTimeString();
            } 
            $horaAtual = $horarioInicial->addHours($i);     
    }

    $diferencaUltimaHora = $horaAtual->difference($horarioFinal);
    //echo "<br>" .$diferencaUltimaHora->getHours() . ":" . $diferencaUltimaHora->getMinutes()%60;
   
       if ($horaAtual->getHour() >= $inicioNoturno || $horaAtual->getHour() < $fimNoturno){
        $periodoNoturno = $periodoNoturno->addMinutes($horarioFinal->getMinute());
       
        
     }
        $periodoDiurno = $periodoDiurno->addMinutes($horarioFinal->getMinute());
    

   
    //contador de horas
   
    
    echo '<br>Ultima Hora: ' . $horaAtual . '<br>';
    //testando a última hora para pegar horario final
  
    // if($horaAtual->getHour() ==  $horarioFinal->getHour() && $horaAtual->getHour() >= $inicioNoturno || $horaAtual->getHour() ==  $horarioFinal->getHour() && $horaAtual->getHour() <= $fimNoturno) {
    //     $periodoNoturno = $periodoNoturno->addMinutes($horarioFinal->getMinute());
    //    echo '<br> saiu a noite, adcionou: ' . $periodoNoturno->getMinute() . ' ao periodo noturno';
    //     }else{
    //      $periodoDiurno = $periodoDiurno->addMinutes($horarioFinal->getMinute());
    //      echo '<br> saiu de dia, adcionou: ' . $periodoDiurno->getMinute() .' ao periodo diurno';
    //     }
        echo '<br> ================== <br>';
  
        return [
            'horaEntrada' =>$horarioInicial,
            'horaSaida' =>$horarioFinal,
            'diferencaHoras' => $treta,
            //'diferencaMinutos' => $diferencaMinutos,
            //'totalHorasNoturnas' => $totalHorasNoturnas,
			//'totalMinutosNoturnos' => $totalMinutosNoturnos,	
			//'totalHorasDiurnas' => $totalHorasDiurnas,
            //'totalMinutosDiurnos' => $totalMinutosDiurnos,
            'periodoDiurno' => $periodoDiurno,
            'periodoNoturno' => $periodoNoturno
        ];
		
		//fim da função a ser substituida
    }


   public function classificaHora(){
        $time1 = Time::parse('December 10, 2023 15:05:00', 'America/Chicago');
        $time2 = Time::parse('December 10, 2023 23:15:00', 'America/Chicago');

        $time3 = Time::parse('December 10, 2023 19:06:00', 'America/Chicago');
        $time4 = Time::parse('December 11, 2023 06:59:00', 'America/Chicago');

        $time5 = Time::parse('December 10, 2023 23:59:00', 'America/Chicago');
        $time6 = Time::parse('December 11, 2023 08:02:00', 'America/Chicago');
    
        $turno1= $this->analisaHora($time1, $time2);

        $turno2 = $this->analisaHora($time3, $time4);
        $turno3 = $this->analisaHora($time5, $time6);

        $data = ['turno1'=>$turno1,
                'turno2'=> $turno2,
                'turno3'=> $turno3];

        return view('turnos_test', $data);

        
     }
// }
} 
 
//}
   