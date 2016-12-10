$('.a').on('click',function(){
var trPrincipal = this.offsetParent.parentElement; //Buscamos el TR principal
// var firstName = trPrincipal.children[0].outerText; //Capturamos el FirstName
var idproducto=trPrincipal.children[0].outerText;
var nombreprod=trPrincipal.children[1].outerText;
var peso=trPrincipal.children[3].outerText+' '+trPrincipal.children[2].outerText;
var precio=trPrincipal.children[5].outerText;

// var lastName = trPrincipal.children[1].outerText+' '+trPrincipal.children[2].outerText; //Capturamos el LastName

$(".othertable").append("<tr><td>"+
idproducto+"</td><td>"+
nombreprod
+"</td><td>"+
peso+"</td><td>"+
precio+"<td><input type='number' placeholder='Ingresar cantidad'/></td><td><p class='subTotal'></p></td><td><input type='button' class='btneli' id='idbotoneli' value='Eliminar'></td></tr>");
  trPrincipal.style.display = "none"; //Ocultamos el TR de la Primer Tabla
  var btn_ = document.querySelectorAll(".btneli"); // Buscamos todos los elementos que tengan la clase .btneli
  for(var a in btn_){ //Iteramos la variable btn_
var b = btn_[a];
if(typeof b == "object"){ //Solo necesitamos los objetos
  b.onclick = function (){ //Asignamos evento click
    var trBtn = this.offsetParent.parentElement; // buscamos el tr principal de la segunda tabla
    var firstNameBtn = trBtn.children[0].outerText; //Capturamos el FirstName de la segunda tabla
    trBtn.remove(); // eliminamos toda la fila de la segunda tabla
    var tbl = document.querySelectorAll(".table td:first-child"); //Obtenemos todos los primeros elementos td de la primera tabla
    for(var x in tbl){ //Iteramos los elementos obtenidos
      var y = tbl[x];
      if(typeof y == "object"){ //solo nos interesan los object
        if (y.outerText == firstNameBtn){ //comparamos el texto de la variable y vs el firstNameBtn
           var t = y.parentElement; //capturamos el elemento de la coincidencia
          t.style.display = ""; //actualizamos el estilo display dejándolo en vacío y esto mostrará nuevamente la fila tr de la primera tabla
        }
      }
    }
  }
} //Termina onclick
  }//Termina For

    //Emprezamos buscando todos los inputs tipo Number
  var a = document.querySelectorAll("input[type='number']");
  if(a != undefined || a != null){
a.forEach(function (x){ //De todo el resultado iteramos con un Foreach
  var precio = Number(x.parentElement.previousSibling.textContent); // Localizamos el Precio dentro de la tabla
  x.onkeyup = function (){ //Asignamos un Metodo del teclado; 
    this.offsetParent.nextElementSibling.children[0].innerHTML = (precio * x.value); //Calculamos el subtotal y se lo agregamos en la columna
    generarTotal(); // Ejecutamos una funcion que se genera el Total
  }
});//Foreach
  }//if

  function generarTotal(){ //Funcion que genera el total
var a = document.querySelectorAll(".subTotal"); //Buscamos todos los subtotales
if(a != undefined || a != null){
  var total = new Number(); //creamos variable tipo Number llamada Total
  a.forEach(function (x){ //Iteramos el array a que contiene los subtotales
    total += Number(x.textContent); // Vamos sumando todos los subtotales en la variable total
  });
  var t_ = document.getElementById("total"); //Buscamos el input que tiene Id: total
  t_.value = total.toFixed(2);  // le asignamos por la propiedad value el valos de todos los subtotales con 2 decimales
  generarIGV(); // Generamos el IVa General de las Ventas con la funcion generarIGV
}
  }

  function generarIGV(){ //Funcion que calcula el IVA
var a = document.getElementById("total"); //Buscamos el elemento Total para extraer el total de las ventas
var igv = 0.18; //AQUI se coloca el iva que deseas calcular, par este efecto he puesto el 18%. 
var b = document.getElementById("igv"); // Buscamos el campo con Id igv
var operacion = Number(a.value) * igv; // calculamos el IGV
b.value = operacion.toFixed(2); // Le asignamos al campo con Id igv el IVA mediante la propiedad value.
generartotaltotal();

}

function generartotaltotal(){
  var txtigv=document.getElementById("igv");
  var txttotal=document.getElementById("total");
  var txttotaltotal=document.getElementById("totaltotal");
  var operaciontotal=Number(txtigv.value)+Number(txttotal.value);
  txttotaltotal.value=operaciontotal.toFixed(2);

}




});