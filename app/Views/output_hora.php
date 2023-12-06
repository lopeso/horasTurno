<div class="col s4">
    <?php 

 
    echo "hora Entrada -> " . $horaEntradaView->toTimeString() . "<br>";
    echo "Hora Saída ->" . $horaSaidaView->toTimeString() ;
   // echo "<br>Foram " . $intervaloView->h . " horas e " .$intervaloView->i . "minutos <br>" ;
    
    echo "<br>horas noturnas: " . ($resultadoView['totalHorasNoturnas']);
    echo "<br>horas diurnas: " . ($resultadoView['totalHorasDiurnas']);
    //echo "<br>diferenca Horas: " . $resultadoView['diferencaHoras'];
    //echo "<br>diferenca Minutos: " . $resultadoView['diferencaMinutos'];
    // echo 'Horas: ' . $intervaloView->getHours() . '<br>';
    // echo 'Minutos: ' . $intervaloView->getMinutes() . '<br>';
    // echo "<br>" . $horaSaidaView->getHour();
    
    echo  '<br>'. $horaEntradaView->getHour() . ":" .  $horaEntradaView->getMinute();
    echo  '<br>'. $horaSaidaView->getHour() . ":" .  $horaEntradaView->getMinute() . '<br>';
    $hora = $horaEntradaView->getHour() - $horaSaidaView->getHour();
    $minutos = $horaEntradaView->getMinute() - $horaSaidaView->getMinute();
    
//   while($hora != 0){
//         echo "tempo gasto: " . $hora . ":" . $minutos;
//         $hora--;

//    }
    echo "tempo gasto: " . $hora . ":" . $minutos;
   
    // var_dump($intervaloView);
    
   
    ?>
</div>
</div>
</div>