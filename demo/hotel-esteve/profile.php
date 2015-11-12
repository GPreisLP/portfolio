<?php include 'header.php'; ?>
<div class="content">
    <form action="profile.php" method="post">
        <button class="tsc_c3b_large tsc_c3b_white tsc_button" style="float:left">Gestionar puntos</button>
    </form>
    <form action="modprofile.php" method="post">
        <button class="tsc_c3b_large tsc_c3b_white tsc_button" style="float:left">Modificar datos</button>
        <br/><br/><br/>
    </form>
    <?php
        session_start();
        //abrimos el fichero
        $fichero = fopen("php/users.txt","a+");
        //leemos el fichero mientras no se acabe
        while(!feof($fichero)){
            //obtenemos el texto
            $temp = fgets($fichero,4096);
            //spliteamos por :
            //mail:passwd:dni:nombre:apellido:pnts
            $usuario = split (":", $temp);
            //Si existe el usuario leeremos los datos
            if($usuario[0] == $_SESSION["email"]){
                echo '<span class="profile">';
                    echo '<span class="profileTitle">Correo electr&oacute;nico:</span> '.$usuario[0].'<br/>';
                    echo '<span class="profileTitle">Contraseña:</span> '.$usuario[1].'<br/>';
                    echo '<span class="profileTitle">Nombre:</span> '.$usuario[3].'<br/>';
                    echo '<span class="profileTitle">Apellidos:</span> '.$usuario[4].'<br/>';
                    echo '<span class="profileTitle">D.N.I:</span> '.$usuario[2].'<br/>';
                    echo '<span class="profileTitle">Tel&eacute;fono:</span> '.$usuario[6].'<br/>';
                    echo '<span class="profileTitle">Puntos:</span> '.$usuario[5].'<br/>';
                echo '</span>';
            }
        }
        fclose($fichero);
    ?>
</div>
<?php include 'footer.php'; ?>