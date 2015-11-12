<?php
    //abrimos el fichero
    $fichero = fopen("users.txt","a+");
    //leemos el fichero mientras no se acabe
    $validador=0;
    $puntos=0;
    while(!feof($fichero) && $validador==0){
        //obtenemos el texto
        $temp = fgets($fichero,4096);
        //spliteamos por :
        //mail:passwd:dni:nombre:apellido:pnts
        $usuario = split (":", $temp);
        if($usuario[0] == $_POST["email"]){
            echo '<script language="javascript">
                    alert("user existe");
                    location.href="newuser.php";
                  </script>';
            $validador=1;
        }
    }
    //Si el usuario no existe, introduce los datos en el fichero
    if($validador==0){
        if($_POST["socio"]=="si"){
            $puntos=1500;
        }
        $tempString=$_POST["email"].':'.$_POST["password"].':'.$_POST["dni"].':'.$_POST["name"].':'.$_POST["lastName"].':'.$puntos.":".$_POST["tlf"].":";
        fwrite($fichero, $tempString.PHP_EOL);
    }
    //cerramos el fichero
    fclose($fichero);
    //redireccionamos
    header('Location: ../index.php');
?>