<?php
    session_start();
    //abrimos el fichero
    $fichero = fopen("users.txt","a+");
    //leemos el fichero mientras no se acabe
    while(!feof($fichero)){
        //obtenemos el texto
        $temp = fgets($fichero,4096);
        //spliteamos por :
        //mail:passwd:dni:nombre:apellido:pnts:tlf
        $usuario = split (":", $temp);
        //Si existe el usuario y la contraseña coincide
        if($usuario[0] == $_POST["mail"]){
            if($usuario[1] == $_POST["pass"]){
                //Obtenemos los datos y lo almacenamos en $_SESSION para 
                // tener persistencia de sesion
                $_SESSION["email"] = $usuario[0];
                $_SESSION["nombre"] = $usuario[3];
                $_SESSION["apellidos"] = $usuario[4];
                $_SESSION["telefono"] = $usuario[6];
                $_SESSION["puntos"] = $usuario[5];
                //BreakPoint casero
                echo $_SESSION["nombre"];
            }
        }
    }
    //cerramos el fichero
    fclose($fichero);
    //redireccionamos inicie sesión o no
    header('Location: ../index.php');
?>