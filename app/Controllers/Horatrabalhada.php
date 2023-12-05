<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
class HoraTrabalhada extends Controller
{
    
    public function index(){
        //$this->load->helper('url');

        //$this->load->view('navBar');
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
            echo(View('input_hora'));
            echo view('output_hora', $data);

           
            //var_dump($treta);
            
           // $treta = new Time();
           
          
           
         
            
        }
        //return view('input_hora');
    }

 
    

}
    

?>