<?php
include("datos.php");
include("funciones.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laboratorio consulta usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
</br>
<div class="container z-depth-1-half">
<table class="highlight" >
		<tr class="card-panel teal lighten-2 white-text">
			<th>Nombre</th>
			<th>Primer apellido</th>
			<th>Segundo apellido</th>	
		</tr>
<?php        
if ($baseformulario = conectarBase($host,$usuario,$clave,$base) ){
    $consultaUsuarios="SELECT nombre, apellido1, apellido2 FROM formulario";
    $usuariosFormulario = mysqli_query($baseformulario, $consultaUsuarios);

        while ($arrayUsauriosFormulario = mysqli_fetch_array($usuariosFormulario)){
        ?>
        
        <tr>
            <td><?php echo $arrayUsauriosFormulario['nombre'] ?></td>
            <td><?php echo $arrayUsauriosFormulario['apellido1'] ?></td>
            <td><?php echo $arrayUsauriosFormulario['apellido2'] ?></td>
        </tr>
    <?php 

        }
    } else {
        echo'<script type="text/javascript">
        alert("Servicio interrumpido.");
        window.location.href="index.html";
        </script>';    
    }
    ?>

</table> 

    <div class="section center-align">
    <input class="btn waves-light" type="button" onclick="location.href='index.html';" name="boton" value="formulario">
    </div>   
</div>   
    
</body>
</html>


        



