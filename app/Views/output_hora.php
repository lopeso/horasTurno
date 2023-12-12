<br>
<div class="row container white  valign-wrapper z-depth-2">
        
        <div class="col s4">
            <p>Hora Entrada: <?= $resultadoView['horaEntrada']->toTimeString() ?></p>
            <p>Hora Saida: <?= $resultadoView['horaSaida']->toTimeString() ?> </p>
        </div> 
        <div class="col s4">
            <p>Horas Diurnas: <?= $resultadoView['periodoDiurno']->toTimeString() ?>;
	        <p>Horas Noturnas: <?= $resultadoView['periodoNoturno']->toTimeString() ?>;
        </div>
              
        <div class="col s4 center">
            <?php
            //echo $saved;
         
             echo form_open('horaTrabalhada/save_registro/'.$resultadoView['horaEntrada']->toTimeString() . '/' . $resultadoView['horaSaida']->toTimeString()  ); 
                    $data = [
                    'name'      => 'submit',
                    'value'     => 'Registrar!',
                    'class'      => 'btn'
                    
                ];
                echo form_submit($data) ;
                echo form_close();
            
            ?>
        </div>
        

    <?php
  
   // echo "<br>Foram " . $intervaloView->h . " horas e " .$intervaloView->i . "minutos <br>" ;
    
    ?>   
    
 <?php   
	//echo "<br>diferenca Horas: " . $resultadoView['diferencaHoras'];
    //echo "<br>diferenca Minutos: " . $resultadoView['diferencaMinutos'];
    // echo 'Horas: ' . $intervaloView->getHours() . '<br>';
    // echo 'Minutos: ' . $intervaloView->getMinutes() . '<br>';
    // echo "<br>" . $horaSaidaView->getHour();
    
   // echo  '<br>'. $horaEntradaView->getHour() . ":" .  $horaEntradaView->getMinute();
  //  echo  '<br>'. $horaSaidaView->getHour() . ":" .  $horaEntradaView->getMinute() . '<br>';
   // $hora = $horaEntradaView->getHour() - $horaSaidaView->getHour();
    //$minutos = $horaEntradaView->getMinute() - $horaSaidaView->getMinute();
    
//   while($hora != 0){
//         echo "tempo gasto: " . $hora . ":" . $minutos;
//         $hora--;
	//echo $totalMinutosDiurnos;
//    }
   // echo "tempo gasto: " . $hora . ":" . $minutos;
   
    // var_dump($intervaloView);
    
   
    ?>
</div>
