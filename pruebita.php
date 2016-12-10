<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>JHJKGHJKGKGKG</title>
 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="Plugin Gratis para autocompletar un input con jQuery y Ajax" name="description" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="jquery.js" charset="utf-8"></script>
        <script src="js/jquery-1.4.2.min.js"></script>
 
        <script type="text/javascript" src="main.js"></script>
 
 
 
 
 
 
<script type="text/javascript">
  function borrar(obj,valor,iva,totales,descuento) {
  fila = obj.parentNode.parentNode;
  document.getElementById('tabla').removeChild(fila);
 
 
  total = total - valor;
$("#txttotal").val(total);
 
 
 
 iva  = total * 0.19;
$("#txtiva").val(iva);
 
 
totales=total + iva- descuento ;
  $("#txttotales").val(totales);
 
  }
</script>
 
 
 
 
 
 
</head>
 
 
<body>
 
 
 
<form name='form1' id='form1' action='comision/reporte_entrada_producto_bodega.php' method='post'>
 <table width='90%' height='180' align='center'  class='tabl' >
 
            <tr>
            <td colspan='6'  align='center' class='td'  >INGRESO DE PRODUCTOS A BODEGA</td>
            </tr>
            <tr>
            <td class='td1' >&nbsp;&nbsp;&nbsp;Nº ORDEN COMPRA</td>
            <td class='td1' ><input type='text' name='txtordencompra' id='txtordencompra' size='30' class='Campo' /></td>
			<td class='td1' >Nº DOCUMENTO</td>
            <td class='td1' ><input type='text' name='txtnumerodocumento' id='txtnumerodocumento' size='30' class='Campo'/></td>
			<td class='td1' >TIPO DOCUMENTO</td>
            <td class='td1' >
            <?php
            //require("../SistemaBodega/clase.php");
	        //$c=new sistema_bodega();
	        //$c->conexion();
			//$c->llenarcombotipodocumento();
            ?>
			</td>
            </tr>
 
            <tr>
            <td class='td1' >&nbsp;&nbsp;&nbsp;FECHA DOCUMENTO</td>
            <td class='td1' ><input type='text' name='txtfechadocumento' id='txtfechadocumento' size='30' class='Campo' /></td>
            <td class='td1' >DESCUENTO</td>
            <td class='td1' ><input type='text' name='txtDescuento' id='txtDescuento' size='30' class='Campo' value="0" /></td>
			<td class='td1' >PROVEEDOR</td>
            <td class='td1' >
            <?php
			//$c->llenarcomboproveedor();
			 ?>
			</td>
            </tr>
 
 
             <tr>
            <td class='td1' >&nbsp;&nbsp;&nbsp;OBSERVACION</td>
            <td class='td1' colspan="5"><textarea name="txtobservacion" cols="" rows="" class='Campo'></textarea></td>
 
            </tr>
 
            <tr>
            <td class='td1' >&nbsp;&nbsp;&nbsp;PRODUCTO</td>
            <td class='td1' ><div class="autocomplete" ><input type='text' name='txtNombres' id='txtNombres' size="30"  data-source="search.php?search=" /></div></td>
            <td class='td1' >CANTIDAD</td>
            <td class='td1' ><input type='text' name='txtApellidos' id='txtApellidos' size='30' class='Campo' /></td>
			<td class='td1' >VALOR</td>
            <td class='td1' ><input type='text' name='txtTelefono' id='txtTelefono' size='30' class='Campo' /><input name="btnInsertar" id="btnInsertar" type="button" value="Insertar" class="" /></td>
            </tr>
            </table>
 
<br />
  <table width='90%' height='' align='center' bgcolor='#FFFFFF' class='tabl' id="tblDatos" >
           <tbody id="tabla">
           <tr class='tr'>
           <td   align='center' class='td'><strong>Producto</strong></td>
           <td   align='center' class='td'><strong>Cantidad</strong></td>
           <td   align='center' class='td'><strong>Precio</strong></td>
            <td   align='center' class='td'><strong>Subtotal</strong></td>
           <td   align='center' class='td'><strong>Eliminar</strong></td>
 
           </tr>
 
 <script type="text/javascript" charset="utf-8">
 var total = 0;
 var iva = 0;
 var totales = 0;
var i = 0;
 
    $(function() {
		$("#btnInsertar").click(addUsuario);
 
	});
 
 
 
 
	function addUsuario(){
 
		var Nombres=$('#txtNombres').val();
		var apellidos=$("#txtApellidos").val();
		var telefono=$("#txtTelefono").val();
		var descuento=$("#txtDescuento").val();
		var tablaDatos= $("#tblDatos");
		var valor=(apellidos*telefono)
 
 
		if(Nombres!="" || apellidos!="" || telefono!=""  ){
tablaDatos.append("<tr><td><input type='text' name='fruit[]' value='"+Nombres+"' autofocus readonly style='background-color:#FFF' /></td><td><input type='text' name='cantidad[]' value='"+apellidos+"'  autofocus readonly style='background-color:#FFF' aling='center' class='Campo' /></td><td><input type='text' name='precio[]' value='"+telefono+"' autofocus readonly style='background-color:#FFF' class='Campo' /></td><td><input type='text'  name='valor[]' value='"+valor+"'  autofocus readonly style='background-color:#FFF' class='Campo'/></td><td align='center'><input type='button' onclick='borrar(this,"+valor+","+iva+","+totales+","+descuento+")' value='ELIMINAR' /></td><td><input type='hidden'  name='valor[]' value='"+descuento+"'/></td></tr>");
 
total = total + valor;
 iva  = total * 0.19;
 
 totales=total + iva - descuento
 
$("#txttotal").val(total);
 
$("#txtiva").val(iva);
 
$("#txtdescuento").val(descuento);
 
$("#txttotales").val(totales);
 
 
 
			reset_campos();
		}
 
 
 
	}
 
 
 
 
	function reset_campos(){
		$("#txtNombres").val("");
		$("#txtApellidos").val("");
		$("#txtTelefono").val("");
 
 
    }
 
 
 
 
 
 
 
 
$(".delete").live('click', function(event) {
	$(this).parent().parent().remove(tr);
});
 
 
</script>
 
 
</tbody>
</table>
<BR />
 
	       <table width='30%'  height=''  style="float:right;  margin-right:65px"   class='tabl' id="tblDatos">
            <tr class='tr'>
           <td align='center' class='td' colspan="2" width='30%'><b>TOTAL</b></td>
           </tr>
           <tr class='tr'>
           <td class='td1' width='15%'>&nbsp;&nbsp;&nbsp;Neto</td><td align='center' class='td1' width='15%'><input type="text" name="txttotal" id="txttotal" value="" class="Campo" autofocus readonly style='background-color:#FFF' /></td>
           </tr>
            <tr class='tr'>
           <td class='td1' width='15%'>&nbsp;&nbsp;&nbsp;Iva</td><td align='center' class='td1' width='15%'><input type="text" name="txtiva" id="txtiva" value="" class="Campo" autofocus readonly style='background-color:#FFF'/></td>
           </tr>
             <tr class='tr'>
           <td class='td1' width='15%'>&nbsp;&nbsp;&nbsp;Descuento</td><td align='center' class='td1' width='15%'><input type="text" name="txtdescuento" id="txtdescuento" value="" class="Campo" autofocus readonly style='background-color:#FFF'/></td>
           </tr>
 
            <tr class='tr'>
           <td class='td1' width='15%'>&nbsp;&nbsp;&nbsp;Total</td><td align='center' class='td1' width='15%'><input type="text" name="txttotales" id="txttotales" value="" class="Campo" autofocus readonly style='background-color:#FFF'/></td>
           </tr>
           <tr class='tr'>
           <td align='center'  colspan="2"  width='30%'><input type='submit' value='GRABAR DATOS' name='btnenv' id='btnenv' class='button' /></td>
           </tr>
           </table>
 
 </form>
 
 
</body>
</html>