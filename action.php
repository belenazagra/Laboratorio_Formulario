<?php

    include("datos.php");
    include("funciones.php");

    if ($baseformulario = conectarBase($host,$usuario,$clave,$base) ){
        @mysqli_query($baseformulario, "SET NAMES 'utf8'");
        if (isset($_POST["nombre"],$_POST["apellido1"],$_POST["apellido2"],$_POST["email"],$_POST["userlogin"],$_POST["userpassword"]) and $_POST["nombre"]!="" and $_POST["apellido1"]!="" and $_POST["apellido2"]!="" and $_POST["email"]!="" and $_POST["userlogin"]!="" and $_POST["userpassword"]!=""){
            // Recuperar datos del formulario en variables
            $nombre = $_POST["nombre"];
            $apellido1 = $_POST["apellido1"];
            $apellido2 = $_POST["apellido2"];
            $email = $_POST["email"];
            $login = $_POST["userlogin"];
            $password = $_POST["userpassword"];

            // Insertar los valores de las variables a la BBDD
            $consulta = "INSERT INTO formulario (id,nombre,apellido1,apellido2,email,userlogin,userpassword) VALUES('0','$nombre','$apellido1','$apellido2','$email','$login','$password')";
            
            // Consultar si el email ya está dentro de la BBDD
            $consultaEmail = "SELECT email FROM formulario";
            
            try{

                $emailsFormulario = mysqli_query($baseformulario, $consultaEmail);
                $arrayEmailsFormulario = mysqli_fetch_all($emailsFormulario);
                
                $cuentaEmail = 0;
                foreach ($arrayEmailsFormulario as $emailRegistrado){
                    if ($emailRegistrado[0] == $email){
                        $cuentaEmail = $cuentaEmail+1;
                    }
                }

                if($cuentaEmail != 0){
                    echo'<script type="text/javascript">
                        alert("Este email ya está registrado");
                        window.location.href="index.html";
                        </script>';

                } else if (mysqli_query($baseformulario, $consulta) ){
                    echo'<script type="text/javascript">
                        alert("Registro completado con éxito.");
                        window.location.href="index.html";
                        </script>';

                } else {
                echo'<script type="text/javascript">
                    alert("Error en el registro.");
                    window.location.href="index.html";
                    </script>';
                }
            } catch (mysqli_sql_exception $e) {
                echo'<script type="text/javascript">
                alert("Error en la consulta.");
                window.location.href="index.html";
                </script>';
            }

        } else {
            echo'<script type="text/javascript">
                alert("Complete el formulario.");
                window.location.href="index.html";
                </script>';
        }

    } else {
        echo'<script type="text/javascript">
        alert("Servicio interrumpido.");
        window.location.href="index.html";
        </script>';    }


?> 