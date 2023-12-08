<div class=" center container row white z-depth-1" >
    <div class="col s2">
        <p>id</p>
    </div>
<!--//hora entras -->
    <div class="col s2">
        <p>Entrada</p>
    </div>
<!--//hora saida -->
    <div class="col s2">
        <p>Saida </p>
    </div>
    <!--//hora noturnas-->
    <div class="col s3">
         <p>Hora Diurnas </p>
    </div>
    <!--//hora diurnas -->
    <div class="col s3">
    <p>Hora Noturnas</p>
        
    </div>
<!-- total turno -->
    <!-- <div class="col s2">
        <p>Total turno</p> 
        
    </div> -->
</div>

<?php foreach($registro as $registros){ 
    if($registro){?>
    <div class="center container row white z-depth-1" >     
      <div class="col s2">
      <?php  
            echo $registros['id']; ?>
        </div>
        <div class="col s2">
            <?php echo $registros['horaEntrada'];?>
        </div>
        <div class="col s2">
        <?php echo $registros['HoraSaida']; ?>
        </div>
        <div class="col s3">
            <?php echo $registros['HorasDiurnas'];?>
        </div>
        <div class="col s3">
            <?php echo $registros['HorasNoturnas']; ?>
        </div>
        <!-- :<div class="col s3"> -->
            <?php// echo $registros['TotalTurno']; ?>
        <!-- </div> -->
    <?php
    }?>
    </div>
       
<?php }?>




</div>
    
