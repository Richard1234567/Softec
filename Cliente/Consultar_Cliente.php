<?php 

    include '../conexion.php';

    $id = $_GET['id'];

    //var_dump($id);

    $sql = "select * from equipo join persona on RELA_PERSONA = ID_PERSONA  
            join marca on RELA_MARCA = ID_MARCA join modelo on RELA_MODELO = ID_MODELO
            where  ID_PERSONA = '".$id."'";

    $resultado = mysql_query($sql);        

 ?>

<form class="form-horizontal" id="formLibro">
<?php while ( $reg = mysql_fetch_array($resultado)) { ?>
    <div class="form-group">
    </div>
    <div class="form-group">
        <label for="titulo" class="control-label col-xs-5">Fec Alta:</label>
        <div class="col-xs-5">
            <input id="titulo" name="titulo" type="text" class="form-control" value="<?echo $reg['FECHA_ALTA'];?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="autor" class="control-label col-xs-5">Obs:</label>
        <div class="col-xs-5">
            <textarea class="form-control" rows="3" name="" disabled><?php echo $reg ['OBSERVACION'];?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="añop" class="control-label col-xs-5">Marca:</label>
        <div class="col-xs-5">
            <input id="añop" name="añop" type="text" class="form-control" value="<?echo $reg['MARCA_DESCRIPCION'];?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="nrop" class="control-label col-xs-5">Modelo:</label>
        <div class="col-xs-5">
            <input id="nrop" name="nrop" type="text" class="form-control" value="<?echo $reg['MODELO_DESCRIPCION'];?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="ediccion" class="control-label col-xs-5">Estado del Equipo:</label>
        <div class="col-xs-5">
           <?php 
            if ($reg ['RELA_ESTADO'] == 1) { ?>
            <button class="form-control button-estado btn-warning" disabled>En Diágnostico</button>

            <?} elseif ($reg ['RELA_ESTADO'] == 2) { ?>
            <button class="form-control button-estado btn-info" disabled>En Reparación</button>   

            <?} else { ?>
            <button class="form-control button-estado btn-success" disabled>Terminado</button>

            <?php }  ?>  
        </div>
    </div>
</form> 
<?php } ?> 
