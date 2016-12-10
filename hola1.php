<html>
<head>        
<script language="JavaScript">    
    function calcula_interes()
    {
        var precio=  parseFloat(document.getElementById("precio_no_impuesto").value);    
        var impuesto = 1+(parseFloat( document.getElementById("impuesto").value)/100);                      
        var interes= (parseFloat( document.getElementById("interes").value)/100);        
        var cuotas=  parseInt( document.getElementById("cuotas").value);
        var tipo_interes= document.getElementById("tipo_interes").value;
        
        if (tipo_interes =='compuesto')        
            // Calculo el interes como interes *compuesto*
            var interes_total = Math.pow(1+interes,cuotas);
        else        
            // Calculo el interes como interes *simple*
            var interes_total = 1+(interes * cuotas);
            
                
        var total = document.getElementById("total").value = (precio*impuesto*interes_total)/cuotas;                
    }    
</script>    
</head>


<body onload="calcula_interes();">

<form method="GET" action="#">
<tbody>

<tr>
<td>Precio(sin iva):</td>
<td><input type="text" id="precio_no_impuesto" value="100" size="5" onkeyup="calcula_interes();"></td>
</tr>

<tr>
<td>Cuotas:</td>
<td>
    <select id="cuotas" onchange="calcula_interes();">
        <option value="6" selected>6</option>        
        <option value="12">12</option>
        <option value="36">36</option>
    </select>
        
</td>
</tr>

<tr>
<td>Interes %</td>
<td><input type="text" id="interes" value="3" size="1" onchange="calcula_interes();"></td>
</tr>
<tr>

<tr>
<td>Tipo de interes</td>
<td>
    <select id="tipo_interes" onchange="calcula_interes();">
        <option value="simple" selected>Simple</option>        
        <option value="compuesto">Compuesto</option>        
    </select>
        
</td>
</tr>


<tr>
<td>Iva:</td>
<td>
    <select id="impuesto" onchange="calcula_interes();">
        <option value="0" selected>Ninguna</option>
        <option value="16">10</option>
        <option value="30">21</option>
    </select>
        
</td>
</tr>

<tr>
<td>Total:</td>
<td><input type="text" name="total" value="" id="total" size="3"></td>
</tr>

</body>
</html> <html>
<head>        
<script language="JavaScript">    
    function calcula_interes()
    {
        var precio=  parseFloat(document.getElementById("precio_no_impuesto").value);    
        var impuesto = 1+(parseFloat( document.getElementById("impuesto").value)/100);                      
        var interes= (parseFloat( document.getElementById("interes").value)/100);        
        var cuotas=  parseInt( document.getElementById("cuotas").value);
        var tipo_interes= document.getElementById("tipo_interes").value;
        
        if (tipo_interes =='compuesto')        
            // Calculo el interes como interes *compuesto*
            var interes_total = Math.pow(1+interes,cuotas);
        else        
            // Calculo el interes como interes *simple*
            var interes_total = 1+(interes * cuotas);
            
                
        var total = document.getElementById("total").value = (precio*impuesto*interes_total)/cuotas;                
    }    
</script>    
</head>


<body onload="calcula_interes();">

<form method="GET" action="#">
<tbody>

<tr>
<td>Precio(sin iva):</td>
<td><input type="text" id="precio_no_impuesto" value="100" size="5" onkeyup="calcula_interes();"></td>
</tr>

<tr>
<td>Cuotas:</td>
<td>
    <select id="cuotas" onchange="calcula_interes();">
        <option value="6" selected>6</option>        
        <option value="12">12</option>
        <option value="36">36</option>
    </select>
        
</td>
</tr>

<tr>
<td>Interes %</td>
<td><input type="text" id="interes" value="3" size="1" onchange="calcula_interes();"></td>
</tr>
<tr>

<tr>
<td>Tipo de interes</td>
<td>
    <select id="tipo_interes" onchange="calcula_interes();">
        <option value="simple" selected>Simple</option>        
        <option value="compuesto">Compuesto</option>        
    </select>
        
</td>
</tr>


<tr>
<td>Iva:</td>
<td>
    <select id="impuesto" onchange="calcula_interes();">
        <option value="0" selected>Ninguna</option>
        <option value="16">10</option>
        <option value="30">21</option>
    </select>
        
</td>
</tr>

<tr>
<td>Total:</td>
<td><input type="text" name="total" value="" id="total" size="3"></td>
</tr>

</body>
</html> 