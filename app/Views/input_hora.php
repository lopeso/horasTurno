<div class="valign-wrapper">
    <div class="row container ">
<?php echo form_open('horaTrabalhada/pegaHora'); ?>
    <div class="col s3">
          <p>Hora entrada</p>
          <?php
          
            $data = [
                'name'      => 'horaEntrada',
                
                'type'      => 'time'
            ];
                echo form_input($data);
          ?>
        </div>
          
          <div class="col s3">
          <p>Hora saída</p>
          <?php
          
          $data = [
              'name'      => 'horaSaida',              
              'type'      => 'time'
          ];
              echo form_input($data);
        ?>
          </div>
          <div class="col s2">
          <?php 
          

         
          $data = [
            'name'      => 'submit',
            'value'     => 'Enviar!',
            'class'      => 'btn'
        ];
          echo "<br> <br>" . form_submit($data);



          echo form_close(); ?>
          </div>
        
     

 