<br>

<div class="row container white  valign-wrapper z-depth-2">

<?php
$atributos= ['class' => 'col s12 center', 'method'=>'POST'];

echo form_open('horaTrabalhada/save_registro/', $atributos); 
?>               
      <div class="row">
      <br>
        <div class="input-field col s4">
          <input readonly placeholder="Placeholder" id="checkin" value="<?= $horarioEntrada->toTimeString() ?>" type="time" class="validate" name="horarioEntrada">
          <label for="checkin">Hora Entrada</label>
        </div>
        <div class="input-field col s4">
          <input readonly placeholder="Placeholder" id="checkout" value="<?= $horarioSaida->toTimeString() ?>" type="time" class="validate" name='horarioSaida'>
          <label for="checkout">Horario Saida</label>
        </div>
        <div class="input-field col s4">
        <?php 
            $data = [
                        'name'      => 'submit',
                        'value'     => 'Registrar!',
                        'class'      => 'btn disabled'
                        
                    ];
                    echo form_submit($data) ;
                    
            ?>
          </div>
    
      </div>
      <div class="row">
         <div class="input-field col s4">
            <input readonly placeholder="Placeholder" id="horasDia" value="<?= $periodoDiurno->toTimeString() ?>" name="periodoDiurno" type="time" class="validate">
            <label for="horasDia">Horas Diurnas</label>
            </div>
            <div class="input-field col s4">
            <input readonly placeholder="Placeholder" id="horasNoite" value="<?= $periodoNoturno->toTimeString() ?>" name="periodoNoturno" type="time" class="validate" name="horasNoite">
            <label for="horasNoite">Horas Noturnas</label>
            </div>
            <div class="input-field col s4">
            <input readonly placeholder="Placeholder" id="turno" value="<?= $periodoTurno->format("%H:%I") ?>" name="periodoTurno" type="time" class="validate">
            <label for="turno">Total Horas</label>
            </div>
        
        </div>
        <?php
        $progresso = $periodoTurno->h *60 + $periodoTurno->i;
        $montaperiodo = ($periodoDiurno->getHour() * 60 + $periodoDiurno->getMinute())* 100;
        $progresso = $montaperiodo/$progresso;
        $progresso =  round($progresso, 2) . "%";
        
       // echo $progresso;
        ?>
        <div class="container row">
          <div class="progress col s8 right ">
           
          
               <div class="determinate tooltipped" data-tooltip="período diurno: <?= $progresso ?> do periodo trabalhado." id="barra" style="width: <?= $progresso ?>"> 

                
               
          </div>
      </div>
      </div>
      <?php
      echo form_close();
?>
      
      </div>
<script type="text/javascript">
 $(document).ready(function(){
    $('.tooltipped').tooltip();
  });



 

</script>