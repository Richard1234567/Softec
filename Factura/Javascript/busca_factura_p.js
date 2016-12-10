function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function Buscar() {
	q = document.getElementById('q').value;
	c = document.getElementById('resultados');
	ajax = objetoAjax();
	ajax.open("GET","../ajax/Buscar_Factura.php?q="+q);
	ajax.onreadystatechange=function() {
		if (ajax.readyState == 4) {
			c.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null)
}