// JavaScript Document
// variable general para ordenar los registros
var ordenar = '';
$(document).ready(function(){

	// Llamando a la funcion de busqueda al
	// cargar la pagina
	filtrar()

	// Configuracion del calendario
	//var dates = $( "#del, #al" ).datepicker({
	//		yearRange: "-50",
	//		defaultDate: "+1w",
	//		changeMonth: true,
	//		changeYear: true,
	//		onSelect: function( selectedDate ) {
	//			var option = this.id == "del" ? "minDate" : "maxDate",
	//				instance = $( this ).data( "datepicker" ),
	//				date = $.datepicker.parseDate(
	//					instance.settings.dateFormat ||
	//					$.datepicker._defaults.dateFormat,
	//					selectedDate, instance.settings );
	//			dates.not( this ).datepicker( "option", option, date );
	//		}
	//});

	// filtrar al darle click al boton
	$("#btnfiltrar").click(function(){ filtrar() });

	// boton cancelar
	// limpia todas las cajas de busqueda
	$("#btncancel").click(function(){ 
		$(".filtro input").val('')
		$(".filtro select").find("option[value='0']").attr("selected",true)
		filtrar() 
	});

	// ordenar por campos
	$("#data th span").click(function(){
		var orden = '';
		//si existe algun orden de forma descendente
		if($(this).hasClass("desc"))
		{
			// eliminamos orden descendente y ascendente.
			$("#data th span").removeClass("desc").removeClass("asc")
			$(this).addClass("asc");
			ordenar = "&orderby="+$(this).attr("title")+" asc"		
		}else
		{
			$("#data th span").removeClass("desc").removeClass("asc")
			$(this).addClass("desc");
			ordenar = "&orderby="+$(this).attr("title")+" desc"
		}
		filtrar()
	});
});

// funcion general para hacer el filtro
function filtrar()
{	
	// funcion ajax de jquery, hara la peticion enviandole
	// los parametros, y este devolvera resultado en formato
	// json
	$.ajax({
		data: $("#frm_filtro").serialize()+ordenar,
		type: "POST",
		dataType: "json",
		url: "ajax.php?action=listar",
			success: function(data){
				var html = '';
				// si la consulta ajax devuelve datos
				if(data.length > 0){
					// hacemos un bucle al json, para recorrer cada registro
					// e irlos almacenando en filas html
					$.each(data, function(i,item){
						html += '<tr>'
							html += '<td>'+item.nacimiento+'</td>'
							html += '<td>'+item.nombre+'</td>'
							html += '<td>'+item.email+'</td>'
							html += '<td>'+item.pais+'</td>'
						html += '</tr>';

					});					
				}
				// si no hay datos mostramos mensaje de no encontraron registros
				if(html == '') html = '<tr><td colspan="4" align="center">No se encontraron registros..</td></tr>'
				// añadimos  a nuestra tabla todos los datos encontrados mediante la funcion html
				$("#data tbody").html(html);
			}
	  });
}