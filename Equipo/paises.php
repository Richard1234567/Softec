

<?php 
if (is_array($_GET['lista'])) {
        $selected = '';
        $num_countries = count($_GET['lista']);
        $current = 0;
        foreach ($_GET['lista'] as $key => $value) {
            if ($current != $num_countries-1)
                $selected .= $value.', ';
            else
                $selected .= $value.'.';
            $current++;
        }
    }
    else {
        $selected = 'Debes seleccionar un país';
    }

    echo '<div>Has seleccionado: '.$selected.'</div>';    
?>        