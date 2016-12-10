<html>
<head>        
<script language="JavaScript">    
    function calcular()
    {
        var precio =  parseFloat( document.getElementById("precio_no_impuesto").value);    
        var cant = parseFloat( document.getElementById("cant").value);               
        var impuesto = parseFloat( document.getElementById("impuesto").value);               
        var total = document.getElementById("total").value = cant * precio *(impuesto*0.01 + 1);  
        console.log(total);        
        return 0;
    }    
</script>    
</head>


<body onload="calcular();">

<form method="GET" action="#">
<table>
<tbody>
<tr>
<td>Id del producto: </td>
<td><input type="text" name="id_product" value="15" readonly size="3"></td>
</tr>
<tr>
<td>Precio:</td>
<td><input type="text" id="precio_no_impuesto" value="100" size="5" onkeyup="calcular();"></td>
</tr>
<tr>
<td>Cantidad:</td>
<td><input type="text" id="cant" value="1" size="5" onkeyup="calcular();"></td>
</tr>
<tr>
<td>Impuestos:</td>
<td>
    <select name="impuesto" id="impuesto" onchange="calcular();">
        <option value="0" selected>Ninguna</option>
        <option value="13">13</option>
        <option value="21">21</option>
    </select>
        
</td>
</tr>

<tr>
<td>Total:</td>
<td><input type="text" name="total" value="" id="total" size="3"></td>
</tr>
</table>
<p/>
</form>
