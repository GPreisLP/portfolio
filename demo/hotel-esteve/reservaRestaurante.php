<script type="text/javascript">
    //VARIABLES PARA LOS VALORES DE LOS SERVICIOS Y LAS HABITACIONES
    var total=0; //Valor total de la habitación y los servicios
    var ciudad=''; //Valor = "BCN" o "COR", según ciudad seleccionada en el desplegable
    var descuento=0; //Si seleccionan descuento, vale el valor del descuento.
    var validator='0';
    var descuento=0;
    var puntosTrasReserva=0;
    var puntosMenus=0;
    var menus=0;
</script>

<?php
    session_start();
    //Si hay sesion iniciada...
	if(!(isset($_SESSION["nombre"]))){
		echo '<script language="javascript">
                alert("Es necesario que inicies sesión para poder realizar una reserva en el restaurante");
                location.href="index.php";
              </script>';
	}
?>

<script>
    
    function precio(valor){
        total=valor*10;
        precioTrasDescuento();
    }
    
    function precioTrasDescuento(){
        var res = 'Total: '+(total-((total*descuento)/100));
        document.getElementById('euros').value=res;
    }
    
    
    function puntosPorMenus(cantidad){
        menus=cantidad;
        puntosMenus=cantidad*100;
        precio(cantidad);
    }
    
    function resetearTodo(){
        total=0;
        descuento=0;
        
        document.getElementById("BCN").selectedIndex = 0;
        document.getElementById("COR").selectedIndex = 0;
    }
      
    //Muestra los descuentos si decide usar puntos
    function mostrarPuntos(puntos) {
		if (puntos == "si"){
		    document.getElementById("cantidadPuntos").style.display="inline-block";
		}else if (puntos == "no"){
		    document.getElementById("cantidadPuntos").style.display="none";
		    document.getElementById("selectPuntos").selectedIndex = 0;
		    descuento=0;
		    precioTrasDescuento();
		    puntosTrasDescuento();
		}
    }


    function puntosTrasDescuento(){
        var tmp1= document.getElementById('selectPuntos').value;
        var tmp2 = "<?php echo $_SESSION['puntos']; ?>";
        var descuento = parseInt(tmp1);
        var puntos= parseInt(tmp2);
        var puntosPostDescuento=puntos-descuento;
        document.getElementById('puntosRestantes').value=puntosPostDescuento;
        document.getElementById('puntosPostReserva').value=puntosPostDescuento+puntosMenus;
        
    }


 //Muestra diferentes partes del formulario según ciudad seleccionada
    function ciudadSeleccionada(ciudadSel) {
		if (ciudadSel == "BCN"){
		    ciudad="BCN";
		    document.getElementById("BCN").style.display="inline-block";
		    document.getElementById("COR").style.display="none";
		    validator='1';
		}else if (ciudadSel == "COR"){
		    ciudad="COR";
		    document.getElementById("BCN").style.display="none";
		    document.getElementById("COR").style.display="inline-block";
		}else{
		    ciudad='';
		    document.getElementById("BCN").style.display="none";
		    document.getElementById("COR").style.display="none";
		}
		resetearTodo();
		var res = 'Total: '+total;
        document.getElementById('euros').value=res;
    }
    
    var tmp = "<?php echo $_SESSION['puntos']; ?>";
    var puntosActuales = parseInt(tmp);
    
    //Muestra si puedes usar el descuento seleccionado condicionalmente a los puntos que dispongas.
    function comparar(puntos){
        if (puntosActuales >= puntos){
            if(puntos==0){
                descuento=0;
            }else{
                alert("Descuento permitido. Puntos que se usarán: "+puntos);
                "<?php $puntos=puntos;?>"
                if(puntos == 500){
                    descuento = 5;
                }else if(puntos == 1000){
                    descuento = 10;
                }else if(puntos == 1500){
                    descuento = 15;
                }else if(puntos == 2000){
                    descuento = 20;
                }else if(puntos == 3000){
                    total=0;
                }
            }
        }else{
            alert("No dispones de tantos puntos como para solicitar este descuento");
            document.getElementById("selectPuntos").selectedIndex = 0;
            descuento=0;
        }
        puntosTrasDescuento();
        precioTrasDescuento();
    }
</script> 
    
<?php include 'header.php' ?>



<div class="content">
   <!-- <div class="content-top">-->
   
    <div class="contact">
        <div class="contact-bottom">
                <div class="form">
                    <span class="register"><h1 style="color:white;">Vas a reservar en el restaurante como: <?php echo $_SESSION["nombre"]?></h1></span>
                    <br/><br/>
                    <form action="php/facturaRestaurante.php" name="registroHabitacion" method="post" class="cmxform" id="contactForm">
                        <div class="ciudadRestaurante" style="float:right;">
                            <span><h1>¿En que cuidad quiere realizar la reserva?</h1></span>
                            <span>
                                <select id="selectCiudad" name="ciudad" onchange="ciudadSeleccionada(this.value);">
                                    <option selected="selected" value="null">Seleccione una opción</option>
                                    <option value="BCN">Barcelona</option>
                                    <option value="COR">Cornell&aacute; de Llobregat</option>
                                </select>
                            </span>
                            <div id="BCN" style="display:none;">
                                <span>
                                    <select id="cantidadMenuBCN" name="cantidadMenuBCN" onchange="puntosPorMenus(this.value);">
                                        <option selected="selected" value=0>Seleccione una opción</option>
                                        <option value=1>1</option>
                                        <option value=2>2</option>
                                        <option value=3>3</option>
                                        <option value=4>4</option>
                                        <option value=5>5</option>
                                        <option value=6>6</option>
                                        <option value=7>7</option>
                                        <option value=8>8</option>
                                        <option value=9>9</option>
                                        <option value=10>10</option>
                                    </select>
                                </span>
                            </div>
                            <div id="COR" style="display:none;">
                                <span>
                                    <select id="cantidadMenuCOR" name="cantidadMenuCOR" onchange="puntosPorMenus(this.value);">
                                        <option selected="selected" value=0>Seleccione una opción</option>
                                        <option value=1>1</option>
                                        <option value=2>2</option>
                                        <option value=3>3</option>
                                        <option value=4>4</option>
                                        <option value=5>5</option>
                                        <option value=6>6</option>
                                        <option value=7>7</option>
                                        <option value=8>8</option>
                                        <option value=9>9</option>
                                        <option value=10>10</option>
                                    </select>
                                </span>
                            </div>
                            <div>
                                <br/>
                                <span style="color:white;">---------------------------------------------</span>
                                
                                <input type="text" id="euros" readonly name="euros" value=''/> €
                            </div>
                        </div>
                        <div>
                            <span class="register"><h1>Datos de registro</h1></span>
                            <span><label for="email">Nombre de quien reserva la habitaci&oacute;n</label></span>
                            <span><input type="text" id="name" name="name" required="required"/></span>
                            <span><label for="lastName">Apellidos</label></span>
                            <span><input type="text" id="lastName" name="lastName" required="required"/></span>
                            <span><label for="dni">DNI</label></span>
                            <span><input type="text" id="dni" name="dni" maxlength=9 required="required"/></span>
                            <span><label for="tlf">Tel&eacute;fono</label></span>
                            <span><input for="tlf" type="number" maxlength=9 id="tlf" name="tlf" required="required"/></span>
                        </div>
                        
                        <div>
                            <span class="register"><h1>Actualmente tienes <?php echo $_SESSION["puntos"] ?> puntos.<br/>¿Quieres usar puntos?</h1></span>
                            <span>
                                <input type="radio" name="puntos" value="si" onchange="mostrarPuntos(this.value);"/>Si
                                <input type="radio" name="puntos" value="no" onchange="mostrarPuntos(this.value);"/>No
                            </span>
                        </div>
                        <div id="cantidadPuntos" style="display:none;">
                            <span><label for="puntos">Puntos a utilizar</label></span>
                            <span>
                                <select id="selectPuntos" name="puntos" onchange="comparar(this.value);">
                                    <option selected="selected" value=0>Seleccione una opción</option>
                                    <option value=500>5% descuento - 500 puntos</option>
                                    <option value=1000>10% descuento - 1.000 puntos</option>
                                    <option value=1500>15% descuento - 1.500 puntos</option>
                                    <option value=2000>20% descuento - 2.000 puntos</option>
                                    <option value=3000>Men&uacute; gratuito - 3.000 puntos</option>
                                </select>
                            </span>
                            <span><label for="puntosRestantes">Puntos tras el descuento</label></span>
                            <input type="text" id="puntosRestantes" readonly name="puntosRestantes" value=''/>
                            <span><label for="puntosPostReserva">Puntos tras el descuento</label></span>
                            <input type="text" id="puntosPostReserva" readonly name="puntosPostReserva" value=''/>
                        </div>
                        <br/>
                        <div>
                       	   <button class="tsc_c3b_large tsc_c3b_white tsc_button">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            
    	</div>
        <div class="clear"></div>
    </div>
<?php include 'footer.php' ?>