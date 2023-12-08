<br>
<div class="row container white  z-depth-2">
  
<div class="valign-wrapper">
    <div class="col s4">
    <?php
          echo form_open('horaTrabalhada/pegaHora'); ?>
          <label for="horaEntrada">Hora entrada</label>
          <?php
          
            $data = [
                'name'      => 'horaEntrada',
                'type'      => 'time'
            ];
                echo form_input($data);
          ?>
        </div>
          
          <div class="col s4 ">
            <label for="horaSaida">Hora Saída </label>
                <?php
                
                $data = [
                    'name'      => 'horaSaida',              
                    'type'      => 'time'
                ];
                    echo form_input($data);
              ?>
          </div>
          <div class="col s4 center ">
        
          <?php 
      
         
          $data = [
            'name'      => 'submit',
            'value'     => 'Enviar!',
            'class'      => 'btn'
        ];
          echo "<br> <br>" . form_submit($data);


          echo form_close(); ?>
        </div>
      </div>
    </div>
    
     
     
      
 