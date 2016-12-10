
<?php
/*-----------------------
Autor: Obed Alvarado
http://www.obedalvarado.pw
Fecha: 12-06-2015
Version de PHP: 5.6.3
----------------------------*/

  # conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'softec');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
  $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
  if($action == 'ajax'){
    include 'pagination.php'; //incluir el archivo de paginación
    //las variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 5; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    //Cuenta el número total de filas de la tabla*/
    $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM historico_compra ");
    if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
    $total_pages = ceil($numrows/$per_page);
    $reload = 'index.php';
    //consulta principal para recuperar los datos
    $query = mysqli_query($con,"SELECT * FROM historico_compra JOIN insumo ON historico_compra.ID_INSUMO = insumo.COD_INSUMO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA
JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO ORDER BY ID_HISTORICO ASC  LIMIT $offset,$per_page");
    
    if ($numrows>0){
      ?>
    <div id='resultados'>
      <div id="agrega-registros">  
        <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
            <tr class="table-info" align="center">
                <td class="td">#</td>
                <td class="td">Fec. Compra</td>
                <td class="td">Categoría Insumo</td>
                <td class="td">Marca Insumo</td>
                <td class="td">Modelo Insumo</td>
                <td class="td">Cantidad Comprada</td>
                <td class="td">Precio Compra</td>
                <td class="td">Precio Venta</td>
                <!--td class="td">Opciones</td-->
            </tr> 
          <tbody>
          <?php 
            while($row = mysqli_fetch_array($query)){
              $fecha=date("d/m/Y", strtotime($row['FECHA_COMPRA_H']));
              $compra=$row['PRECIO_COMPRA_H'];
              $venta=$row['PRECIO_VENTA_H'];
          ?>
            <tr style="background: #fff;" align="center">
              <td class="td"><?php echo $row['ID_HISTORICO'] ?></td>
              <td class="td"><?php echo $fecha ?></td>
              <td class="td"><?php echo $row['CATEGORIA_DESCRIPCION'] ?></td>
              <td class="td"><?php echo $row['MARCA_INS_DESC'] ?></td>
              <td class="td"><?php echo $row['INS_MODELO_DESC'] ?></td>
              <td class="td"><?php echo $row['INSUMO_CANTIDAD'] ?></td>
              <td class="td"><?php echo "$" .number_format ($compra,2); ?></td>
              <td class="td"><?php echo "$" .number_format ($venta,2); ?></td>
              <!--td>               
                <a href="javascript:eliminarcompra(<?php //echo $row['ID_HISTORICO']?>);">
                  <button type="button" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                  </button>
                </a>
              </td-->
            </tr>
          <?php         
            }
          ?>
          </tbody>
        </table>
      </div>  
    </div>    
    <div class="table-pagination pull-right">
      <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
    </div>
    
      <?php
      
    } else {
      ?>
      <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
      <?php
    }
  }
?>