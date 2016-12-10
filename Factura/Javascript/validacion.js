$(document).on("ready",inicio);

function inicio(){
	$("span.help-block").hide();
	$("#btnvalidar").click(function(){
		if(validar()==false)
			alert("los campos no estan validados");
		else{
			alert("los campos estan validados");
		}
	});
	$("#apellido").keyup(validar);
}

function validar(){
	var valor = document.getElementById("apellido").value;
	/*
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		$("#iconotexto").remove();
		$("#apellido").parent().parent().attr("class","form-group has-error has-feedback");
		$("#apellido").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#apellido").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
	  	return false;
	}
	else if( isNaN(valor) ) {
		$("#iconotexto").remove();
		$("#texto").parent().parent().attr("class","form-group has-error has-feedback");
		$("#texto").parent().children("span").text("Debe ingresar caracteres numericos").show();
		$("#texto").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	} */
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		$("#iconotexto").remove();
		$("#apellido").parent().parent().attr("class","form-group has-error has-feedback");
		$("#apellido").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#apellido").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	  	return false;
	}  	
	
}