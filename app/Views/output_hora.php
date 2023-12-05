<div class="col s4">
    <?php 

 
    echo "hora Entrada -> " . $horaEntradaView->toTimeString() . "<br>";
    echo "Hora Saída ->" . $horaSaidaView->toTimeString() ;
    echo "<br>Foram " . $intervaloView->h . " horas e " .$intervaloView->i . "minutos <br>" ;
 
    var_dump($horaEntradaView);
    if($horaEntradaView->getHour()>= 22 ||$horaEntradaView->getHour() >5){
        echo $horaEntradaView->hour . ":" .$horaEntradaView->minute;

    };

    
    
    // echo 'Horas: ' . $intervaloView->getHours() . '<br>';
    // echo 'Minutos: ' . $intervaloView->getMinutes() . '<br>';
    // var_dump($horaSaidaView);
    // var_dump($intervaloView);

   
    ?>
</div>
</div>
</div>