
<?php echo form_open("horaTrabalhada/analisaHora/".$horaEntradaView."/".$horaSaidaView ."/"); 
    $data = [
        'name'      => 'submit',
        'value'     => 'Enviar!',
        'class'      => 'btn',
    ];

    echo  form_submit($data);

    echo form_close();
?>