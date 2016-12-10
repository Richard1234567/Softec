<?php
/*
 * paging.php
 * 
 * Elaborado por: Moisés Icaza
 * Fecha: 01/08/2013
 * 
 * Paginación de registros utilizando PHP (5.4)
 * y componentes de Bootstrap.
 * 
 */

/* constantes */
include '../conexion.php';

/* variables */
$order="FALLA_DESC ASC";
$url = basename($_SERVER ["PHP_SELF"]);
$limit_end = 3;
$init = ($ini-1) * $limit_end;

/* querys */
$sql="SELECT COUNT(*) FROM falla";
$select = "SELECT *FROM falla ORDER BY $order";
$select .= " LIMIT $init, $limit_end";



if ($mysql->connect_error) 
{
  die("Error al conectarse al servidor");
   
}else{
   
  $num = mysql_query($sql);
  $x = mysql_fetch_array($num);
 
  $total = ceil($x[0]/$limit_end);

  echo "<table border='1' class='table table-bordered table-hover'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th><b>#</b></th>";
  echo "<th><b>Falla descripcion</b></th>";
  //echo "<th><b>Cédula</b></th>";
  //echo "<th><b>Fecha de nacimiento</b></th>";
  //echo "<th><b>País</b></th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
 
  $c = mysql_query($select);
  while($rows = mysql_fetch_array($c))
  {
    echo "<tr>";
    echo "<td>".$rows['ID_FALLA']."</td>";
    echo "<td>".$rows['FALLA_DESC']."</td>";
    //echo "<td>".$rows['cedula']."</td>";
    //echo "<td>".$rows['f_nacimiento']."</td>";
    //echo "<td>".$rows['pais']."</td>";
    echo "</tr>";
  }
 
  echo "</tbody>";
  echo "<table>";
 
  /* numeración de registros [importante]*/
  echo "<div class='pagination'>";
  echo "<ul>";
  /****************************************/
  if(($ini - 1) == 0)
  {
    echo "<li><a href='#'>&laquo;</a></li>";
  }
  else
  {
    echo "<li><a href='$url?pos=".($ini-1)."'><b>&laquo;</b></a></li>";
  }
  /****************************************/
  for($k=1; $k <= $total; $k++)
  {
    if($ini == $k)
    {
      echo "<li><a href='#'><b>".$k."</b></a></li>";
    }
    else
    {
      echo "<li><a href='$url?pos=$k'>".$k."</a></li>";
    }
  }
  /****************************************/
  if($ini == $total)
  {
    echo "<li><a href='#'>&raquo;</a></li>";
  }
  else
  {
    echo "<li><a href='$url?pos=".($ini+1)."'><b>&raquo;</b></a></li>";
  }
  /*******************END*******************/
  echo "</ul>";
  echo "</div>";
}
?>