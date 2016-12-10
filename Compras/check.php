<html>
<head>
</head>
<body>
<script type="text/javascript">
function Suma1(isChecked, valor){
    if (isChecked) {
        siniva1 = (parseFloat(document.sumar1.totalsiniva1.value) + parseFloat(valor)).toFixed(2);
    } else {
        siniva1 = (parseFloat(document.sumar1.totalsiniva1.value) - parseFloat(valor)).toFixed(2);
    }
document.sumar1.totalsiniva1.value = siniva1;
document.sumar1.total1.value = (parseFloat(document.sumar1.totalactual.value) + parseFloat(siniva1 * 1.16)).toFixed(2);
}



function Suma2(isChecked, valor){
    if (isChecked) {
        siniva2 = (parseFloat(document.sumar2.totalsiniva2.value) + parseFloat(valor)).toFixed(2);
    } else {
        siniva2 = (parseFloat(document.sumar2.totalsiniva2.value) - parseFloat(valor)).toFixed(2);
    }
document.sumar2.totalsiniva2.value = siniva2;
document.sumar2.total2.value =  parseFloat(siniva2 * 1.16).toFixed(2);
}

 </script>
<body>
<table border="1">
<tr>
<td>
<form name="sumar1" method="POST">
<p><b><font color="#999999">Importe Actual con IVA 16%</font></b> <input type="text" value="200.00" id="totalactual" name="totalactual" disabled /> &euro;</p>
<p>Televisi&oacute;n LG <input type="checkbox" value="2000.00" id="Prod1" name="Prod1" onClick="Suma1(this.checked,this.value)" />2000,00 &euro;</p>
<p>Televisi&oacute;n Sony <input type="checkbox" value="1505.99" id="Prod2" name="Prod2" onClick="Suma1(this.checked,this.value)" />1505,99 &euro;</p>
<p>Televisi&oacute;n Panasonic <input type="checkbox" value="1151.99" id="Prod3" name="Prod3" onClick="Suma1(this.checked,this.value)" />1151,99 &euro;</p> 
<input type="hidden" value="0.00" id="totalsiniva1" name="totalsiniva1" />   
<p><b><font color="#999999">Importe Total con IVA 16%</font></b> <input id="pago" class="resultado" type="text" id="total1" name="total1" value="200" disabled /> &euro;</p>
</form>
</td>
</tr>
</table>

<br /><br />

<?php 
include '../conexion.php';
$resultado = mysql_query("SELECT * FROM precio") or mysql_error(($conexion));
?>

<table border="1">
<tr>
<td>
<form name="sumar2" method="POST">
<p>Consola X-Box <input type="checkbox" value="199.99" id="Prod4" name="Prod4" onClick="Suma2(this.checked,this.value)" />199,99 &euro;</p>
<p>Consola PlayStation <input type="checkbox" value="176.50" id="Prod5" name="Prod5" onClick="Suma2(this.checked,this.value)" />176,50 &euro;</p>
<p>Consola Wii <input type="checkbox" value="195.99" id="Prod6" name="Prod6" onClick="Suma2(this.checked,this.value)" />195,99 &euro;</p>
<input type="hidden" value="0.00" id="totalsiniva2" name="totalsiniva2" />    
<p><b><font color="#999999">Importe Total con IVA 16%</font></b> <input id="pago" class="resultado" type="text" id="total2" name="total2" value="0" disabled /> &euro;</p>
</form>
</td>
</tr>
</table>
</body>
</html>