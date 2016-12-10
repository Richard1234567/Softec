<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="content">
        <div class="filtro">
        	<form id="frm_filtro" method="post" action="">
                <ul>
                    <li><label>Nacimiento: &nbsp;&nbsp; del</label> 
                    	<input type="text" name="del" id="del" size="15" class="datepicker" /> 
                        al 
                        <input type="text" name="al" id="al" size="15" class="datepicker" /></li>
                    <li><label>Nombre/Email:</label> <input type="text" name="nombre_email" size="25" /></li>
                    <li><label>Pais:</label>
                        <select name="pais">
                            <option value="0">--</option>
                            <!-- Listar Paises -->
                            <?php
                            $query = mysql_query("SELECT * FROM pais"); 
                            while($row = mysql_fetch_array($query)){
                                ?>
                                <option value="<?php echo $row['id_pais'] ?>">
                                    <?php echo $row['nombre_pais'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>                	
                    </li>
                    <li>
                    	<button type="button" id="btnfiltrar">Filtrar</button>
                    </li>                
                    <li>
                    	<a href="javascript:;" id="btncancel">Todos</a>
                    </li>
                </ul>
            </form>
        </div>
        <table cellpadding="0" cellspacing="0" id="data">
        	<thead>
            	<tr>
                    <th width="22%"><span title="nacimiento">Fecha Nacimiento</span></th>
                    <th width="35%"><span title="nombre">Nombre</span></th>
                    <th width="30%"><span title="email">Email</span></th>
                    <th><span title="nombre_pais">Pais</span></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
	</div>
</body>
<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="busca_pais.js"></script>
</html>