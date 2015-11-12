<?php include 'header.php' ?>
<div class="content">
    <div class="content-top">
    <div class="contact">
        <div class="form">
            <form action="register.php" method="post" class="cmxform" id="contactForm">
                <div>
                    <span class="register"><h1>Datos de registro</h1></span>
                    <span><label for="email">Correo electr&oacute;nico</label></span>
                    <span><input type="email" id="email" name="email" required="required"/></span>
                    <span><label for="password">Contraseña</label></span>
                    <span><input type="password" id="password" name="password" required="required"/></span>
                </div>
                <div>
                    <span class="register"><h1>Datos personales</h1></span>
                    <span><label for="name">Nombre</label></span>
                    <span><input type="text" id="name" name="name" required="required"/></span>
                    <span><label for="lastName">Apellidos</label></span>
                    <span><input type="text" id="lastName" name="lastName" required="required"/></span>
                    <span><label for="dni">DNI</label></span>
                    <span><input type="text" id="dni" name="dni" maxlength=9 required="required"/></span>
                    <span><label for="tlf">Tel&eacute;fono</label></span>
                    <span><input for="tlf" type="number" maxlength=9 id="tlf" name="tlf" required="required"/></span>
                </div>
                <div>
                    <span class="register"><h1>¿Quieres ser socio?</h1></span>
                    <span>
                        <input type="radio" name="socio" value="si"/>Si
                        <input type="radio" name="socio" value="no"/>No
                    </span>
                </div>
                <br/>
                <div>
               	   <button class="tsc_c3b_large tsc_c3b_white tsc_button">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<?php include 'footer.php' ?>