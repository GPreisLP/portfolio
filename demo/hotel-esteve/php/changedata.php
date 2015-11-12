<?php
    session_start();
    //LEEMOS EL FICHERO
    $fichero = fopen("users.txt","a+");
    $local = 0;
    //leemos el fichero mientras no se acabe
    while(!feof($fichero)){
        //obtenemos el texto
        $temp = fgets($fichero,4096);
        //spliteamos por :
        //mail:passwd:dni:nombre:apellido:pnts:tlf
        $usuario = split (":", $temp);
        //Localizamos la linea en la que el usuario y contraseña coinciden
        if($usuario[0] == $_SESSION["email"]){
            //Establecemos los datos como los de serie solo para modificar los que nos interesa
            $email = $usuario[0];
            $passwd = $usuario[1];
            $dni  = $usuario[2];
            $nombre  = $usuario[3];
            $apellido  = $usuario[4];
            $puntos  = $usuario[5];
            $telefono  = $usuario[6];
            //COMPROBACIONES DE ALTERACION DE DATOS Y MODIFICAMOS LOS QUE COINCIDAN
            if($_SESSION["email"] != $_POST["email"]){
                echo 'cambio de mail</br>';
                $email = $_POST["email"];
            };
            if($_SESSION["nombre"] != $_POST["name"]){
                echo 'cambio de nombre</br>';
                $nombre = $_POST["name"];
            };
            if($_SESSION["apellidos"] != $_POST["lastName"]){
                echo 'cambio de apellidos</br>';
                $apellido = $_POST["lastName"];
            };
            if($_SESSION["telefono"] != $_POST["tlf"]){
                echo 'cambio de telefono</br>';
                $telefono = $_POST["tlf"];
            };
            if($_POST["password"] == $usuario[1]){
                if($_POST["passwordnew"] != $usuario[1] && strlen($_POST["passwordnew"]) > 0){
                    $passwd = $_POST["passwordnew"];
                };
            };
            $tempString=$email.':'.$passwd.':'.$dni.':'.$nombre.':'.$apellido.':'.$puntos.":".$telefono.":";
            /*********************************************************************/
            $archivo_array = file("users.txt");
            unset($archivo_array[$local]);
            $archivo_string = implode('', $archivo_array);
            file_put_contents("users.txt", $archivo_string);
            /************************************************************************/
            fwrite($fichero, $tempString.PHP_EOL);
            $local++;
        }
    }
    //cerramos el fichero
    fclose($fichero);
    //redireccionamos
   // header('Location: ../index.php');
?>