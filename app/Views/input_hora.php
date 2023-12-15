<br>
<div class="row container  white  z-depth-2">
  <br>
<!-- <input type="text" class="datepicker"> -->
<div class="valign-wrapper">
    <div class="col s4">
    <?php
          echo form_open('horaTrabalhada/montaTurnoCall'); ?>
          <label for="horaEntrada">Hora entrada</label>
          <?php
          
            $data = [
                'name'      => 'horaEntrada',
                'type'      => 'text',
                'class'     =>"timepicker input-field inline valign"
            ];
                echo form_input($data);
          ?>
        </div>
          
          <div class="col s4 ">
            <label for="horaSaida">Hora Saída </label>
                <?php
                
                $data = [
                    'name'      => 'horaSaida',              
                    'type'      => 'text',
                    'class'     =>"timepicker input-field inline valign"
                ];
                    echo form_input($data);
              ?>
          </div>
          <div class="col s4 center valign">
        
          <?php 
      
         
          $data = [
            'name'      => 'submit',
            'value'     => 'Enviar!',
            'class'      => 'btn input-field inline',
            'style' => 'padding-bottom: 23px'
        ];
          echo  form_submit($data);


          echo form_close(); ?>
         
        </div>
      </div><br>
    </div>
<script type="text/javascript">
 $(document).ready(function(){
    $('.datepicker').datepicker();
    $('.timepicker').timepicker();
  });

</script>
     
     
      
 