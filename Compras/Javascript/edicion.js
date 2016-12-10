$(document).on('ready', funcPrincipal);

function funcPrincipal() 
{
	$("#btnNuevoAlineamiento").on('click', funcNuevoAlineamiento);
    $("body").on('click', ".btn-danger", funcEliminarFila);
    
}

function funcEliminarFila() 
{
    $(this).parent().parent().fadeOut( "slow", function() { $(this).remove(); } );
}


function funcNuevoAlineamiento() 
{
	$("#tablaAlineamientos")
	.append
	(
		$('<tr>')
        .append
        (
        	$('<td>')
            .append
            (
            	$('<input>').attr('type', 'text').addClass('form-control').attr('name', 'codigo[]').attr('value', '1')
            )
        )
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'cantidad[]')
            )
        )
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'precio[]')
            )
        )
        .append
        (
        	$('<td>')
            .append
            (
            	$('<input>').attr('type', 'text').addClass('form-control').attr('name', 'venta[]')
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            /*
            .append
            (
                $('<div>').addClass('btn btn-primary').text('Guardar')
            ) */
            .append
            (
                $('<div>').addClass('btn btn-danger').text('Eliminar')
            )            
        )         
    );
	//.append("<tr><td>123</td><td>456</td></tr>");
}