$(document).ready(function(){
			compra(1);
		});
		//$('#hola').on('click', function(){
		//	alert();
		//});


		function compra(page){
			var q= $("#q").val();
			$("#compras").fadeIn('slow');
			//console.log('http://localhost/buscador/ajax/productos_factura.php?action=&page='+page+'&q='+q);
			$.ajax({
				url:'http://localhost/buscador/ajax/productos_compras.php?action=&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#compras').html('<img src="http://localhost/buscador/ajax/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#compras').html('');
					
				}
			})
		}

function agrega(id, descri)
{
	var id_n = gen_id();
	///alert(id_n);
	var a = "<tr id='fila"+id_n+"'><td><input type='text' name='codigo[]' value='"+id+"' class='form-control' readonly></td><td><input type='text' name='descrip[]' value='"+descri+"' class='form-control' readonly></td><td><input type='text' id='can"+id_n+"' name='cantidad[]' class='form-control'></td><td><input type='text' name='monto[]' onChange='calculo("+id_n+");' id='precioC"+id_n+"' class='form-control'></td><td><input type='text' name='venta[]' class='form-control'><input type='hidden' name='sub_prod[]' id='sub_producto"+id_n+"' class='form-control'></td><td><div><button type='button' class='btn btn-danger' onclick='eliminar("+id_n+")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Eliminar</button></div></td></tr>";
	$( "#tablaAlineamientos" ).append(a);
}

$("#myCompras").modal('hide');


function calculo(idFila){

	//tasa de impuesto
	var sub  = 0;
	var iva  = 21;
	var total = 0;
	//monto a calcular el impuesto
	var cantidad   = $("#can"+idFila).val();
	var monto = $("#precioC"+idFila).val();
	//alert(typeof monto);

	//calsulo del impuesto
	var sub = (cantidad * monto);
	var sub_total_gral =  0;
	//cargo en cada hidden de subtotal
	$("#sub_producto"+idFila).val(sub);	
	//LLAMAR A CALCULAR TOTALES PARA MOSTRAR
	sub_total_gral = parseInt(calcular_totales());
	var iva = (sub_total_gral * iva)/100;
	var total = sub_total_gral + iva; 
	//se carga el sub en el campo correspondien te
	$("#sub").val(sub_total_gral);
	//se carga el iva en el campo correspondien te
	$("#iva").val(iva);
	//se carga el total en el campo correspondiente
	$("#total").val(total);
   
}
function calcular_totales(){
	var i = 0;
	var total = 0;
		var data = []; 
	    var table = document.getElementById( 'tablaAlineamientos' );
	    var input = table.getElementsByTagName('input'); 
		    for ( var z = 0; z < input.length; z++ ) { 
		    	if(input[z].name=="sub_prod[]"){
		    		
    				total = parseInt(total) + parseInt(input[z].value);	
        		}
			} 
		return total;
}

function gen_id(){
	var i = 0;
		var data = []; 
	    var table = document.getElementById( 'tablaAlineamientos' );
	    var input = table.getElementsByTagName('input'); 
		    for ( var z = 0; z < input.length; z++ ) { 
		    	if(input[z].name=="cantidad[]"){
        			i = i + 1;
        		}
			} 
		return i;
}

function eliminar(id){
	$("#fila"+id).remove();
	//$( ".hello" ).remove();
	calculo(id-1);
}