<br>

<div class="row container white  valign-wrapper z-depth-2">
<?php
$atributos= ['class' => 'col s12 center '];

echo form_open('horaTrabalhada/save_registro/', $atributos); 
?>               
      <div class="row">
        <div class="input-field col s4">
          <input disabled placeholder="Placeholder" id="first_name" value="<?= $horarioEntrada->toTimeString() ?>" type="time" class="validate">
          <label for="first_name">Hora Entrada</label>
        </div>
        <div class="input-field col s4">
          <input disabled placeholder="Placeholder" id="first_name" value="<?= $horarioSaida->toTimeString() ?>" type="time" class="validate">
          <label for="first_name">Horario Saida</label>
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
            <input disabled placeholder="Placeholder" id="first_name" value="<?= $periodoDiurno->toTimeString() ?>" type="time" class="validate">
            <label for="first_name">Horas Diurnas</label>
            </div>
            <div class="input-field col s4">
            <input disabled placeholder="Placeholder" id="first_name" value="<?= $periodoNoturno->toTimeString() ?>" type="time" class="validate">
            <label for="first_name">Horaas Noturnas</label>
            </div>
            <div class="input-field col s4">
            <input disabled placeholder="Placeholder" id="first_name" value="<?= $periodoTurno->format("%H:%I") ?>" type="time" class="validate">
            <label for="first_name">Total Horas</label>
            </div>
        
        </div>
      </div>
      <?php
      echo form_close();
?>
      </div>
<script type="text/javascript">

var slider = document.getElementById('test-slider');
  noUiSlider.create(slider, {
   start: [20, 80],
   connect: true,
   step: 1,
   orientation: 'horizontal', // 'horizontal' or 'vertical'
   range: {
     'min': 0,
     'max': 100
   },
   format: wNumb({
     decimals: 0
   })
  });

</script>