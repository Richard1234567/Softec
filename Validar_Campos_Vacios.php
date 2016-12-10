<?php
function validar_campos_vacios($campo) 
  {
  	if ($campo == "") { 
    	$campo = 'Sin Datos';

    }
    return $campo;
  }
?>