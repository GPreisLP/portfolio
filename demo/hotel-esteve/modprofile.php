<!--php
   En esta plana es donde se modificaran los datos de los usuarios.
   Para no tener que reyenar la informacion de nuevo, cargara los valores
   por defecto que tiene establecidos
-->
<?php include 'header.php' ?>
<div class="content">
    <div class="content-top">
    <div class="contact">
        <div class="form">
            <form action="php/changedata.php" method="post" class="cmxform" id="contactForm">
                <div>
                    <span class="register"><h1>Datos de inicio de sesión</h1></span>
                    <span><label for="email">Correo electr&oacute;nico</label></span>
                    <span><input type="email" id="email" name="email" value="<?php echo $_SESSION["email"] ?>"/></span>
                    <span><label for="password">Contraseña antigua</label></span>
                    <span><input type="password" id="password" name="password"/></span>
                    <span><label for="passwordnew">Contraseña nueva</label></span>
                    <span><input type="password" id="passwordnew" name="passwordnew"/></span>
                </div>
                <div>
                    <span class="register"><h1>Datos personales</h1></span>
                    <span><label for="name">Nombre</label></span>
                    <span><input type="text" id="name" name="name" value="<?php echo $_SESSION["nombre"] ?>" /></span>
                    <span><label for="lastName">Apellidos</label></span>
                    <span><input type="text" id="lastName" name="lastName" value="<?php echo $_SESSION["apellidos"] ?>" /></span>
                    <span><label for="tlf">Tel&eacute;fono</label></span>
                    <span><input for="tlf" type="number" maxlength=9 id="tlf" name="tlf" value="<?php echo $_SESSION["telefono"] ?>" /></span>
                </div>
                <br/>
                <div>
               	   <button class="tsc_c3b_large tsc_c3b_white tsc_button">Actualizar datos</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<?php include 'footer.php' ?>