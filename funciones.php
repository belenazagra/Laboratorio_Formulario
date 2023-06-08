<?php

function conectarBase($a1,$a2,$a3,$a4){
    if (!$enlacefunciones = @mysqli_connect($a1,$a2,$a3)){
        return false;
    } elseif (!mysqli_select_db($enlacefunciones, $a4)){
        return false;
    } else {
        return $enlacefunciones;
    }
}


?>