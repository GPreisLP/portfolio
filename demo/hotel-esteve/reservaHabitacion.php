<script type="text/javascript">
    //VARIABLES PARA LOS VALORES DE LOS SERVICIOS Y LAS HABITACIONES
    var total=0; //Valor total de la habitación y los servicios
    var ciudad=''; //Valor = "BCN" o "COR", según ciudad seleccionada en el desplegable
    var descuento=0; //Si seleccionan descuento, vale el valor del descuento.
    var habitacion='sin seleccionar';//Utilizada para cambiar el precio de la habitación
    var validator='0';
    var descuento=0;
    var puntosTrasReserva=0;
</script>

<?php
    session_start();
    //Si hay sesion iniciada...
	if(!(isset($_SESSION["nombre"]))){
		echo '<script language="javascript">
                alert("Es necesario que inicies sesión para poder reservar una habitación");
                location.href="index.php";
              </script>';
	}
?>
<?php include 'header.php' ?>
<?php 
    $tempEntrada = split("-",$_POST["entrada"]);
    $tempSalida = split("-",$_POST["salida"]);
    
    $entrada = intval($tempEntrada[2]);
    $salida = intval($tempSalida[2]);
    
    $dias=$salida-$entrada;
    echo '<script type="text/javascript">
            var dias='.$dias.';
            puntosTrasReserva+=(dias*100);
            if(dias>=7){
                puntosTrasReserva+=500;
            }else if(dias>=30){
                puntosTrasReserva+=5000;
            }else if(dias>=365){
                puntosTrasReserva+=10000;
            }
          </script>'
?>
<script>
    function puntosTrasDescuento(){
        var tmp1= document.getElementById('selectPuntos').value;
        var tmp2 = "<?php echo $_SESSION['puntos']; ?>";
        var descuento = parseInt(tmp1);
        var puntos= parseInt(tmp2);
        var puntosPostDescuento=puntos-descuento;
        document.getElementById('puntosRestantes').value=puntosPostDescuento;
        document.getElementById('puntosPostReserva').value=puntosPostDescuento+puntosTrasReserva;
        
    }
    
    //RESETEA todas las opciones referentes a la habitacion
    function resetearTodo(){
        total=0;
        habitacion='sin seleccionar';
        
        document.registroHabitacion.servicioCOR.checked == false;
        document.registroHabitacion.saunaBCN.checked == false;
        document.registroHabitacion.piscinaBCN.checked == false;
        document.registroHabitacion.gymBCN.checked == false;
        document.registroHabitacion.servicioBCN.checked == false;
        
        document.registroHabitacion.servicioCOR.value='no';
        document.registroHabitacion.saunaBCN.value='no';
        document.registroHabitacion.piscinaBCN.value='no';
        document.registroHabitacion.gymBCN.value='no';
        document.registroHabitacion.servicioBCN.value='no';
    }
    
    //Muestra los descuentos si decide usar puntos
    function mostrarPuntos(puntos) {
		if (puntos == "si"){
		    document.getElementById("cantidadPuntos").style.display="inline-block";
		}else if (puntos == "no"){
		    document.getElementById("cantidadPuntos").style.display="none";
		    descuento=0;
		    precio('');
		    puntosTrasDescuento();
		}
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
    
    //Muestra los puntos restantes tras aplicar el descuento
    
    
    //Muestra si puedes usar el descuento seleccionado condicionalmente a los puntos que dispongas.
    function comparar(puntos){
        if (puntosActuales >= puntos){
            if(puntos==0){
                descuento=0;
            }else{
                alert("Descuento permitido. Puntos que se usarán: "+puntos);
                "<?php $puntos=puntos;?>"
                if(puntos == 1000){
                    descuento = 5;
                }else if(puntos == 3000){
                    descuento = 10;
                }else if(puntos == 5000){
                    descuento = 25;
                }else if(puntos == 10000){
                    descuento = 50;
                }else if(puntos == 20000){
                    dias-=2;
                    if(dias<=0){
                        total=0;
                    }
                }
                
                //FALTA FIN DE SEMANA
            }
        }else{
            alert("No dispones de tantos puntos como para solicitar este descuento");
            document.getElementById("selectPuntos").selectedIndex = 0;
            descuento=0;
        }
        puntosTrasDescuento();
        precio('');
        
    }
    //modifica dinamicamente el valor total de la reserva
    function precio(valor){
        
        if (ciudad=='BCN'){
            //PRECIO HABITACIÓN INDIVIDUAL BCN: 50€, PRECIO DOBLE: 100€
            if(valor == 'individual'){
                 if(habitacion=='doble'){
                    total-=50;
                }else{
                    total+=50;
                }
                habitacion='individual';
            }else if (valor == 'doble'){
                if(habitacion =='individual'){
                    total+=50;
                }else{
                    total+=100;
                }
                habitacion='doble';
            }else if (valor == 'null'){
                if (habitacion == 'individual'){
                    total-=50;
                }else if (habitacion == 'doble'){
                    total-=100;
                }
            }else if(valor == 'servicioBCN'){
                if(document.registroHabitacion.servicioBCN.checked == true){
                    document.registroHabitacion.servicioBCN.value='si';
                    puntosTrasReserva+=100;
                    total+=10;
                }else if(document.registroHabitacion.servicioBCN.checked == false){
                    document.registroHabitacion.servicioBCN.value='no';
                    total-=10;
                }
            }else if(valor == 'gymBCN'){
                if(document.registroHabitacion.gymBCN.checked == true){
                    document.registroHabitacion.gymBCN.value='si';
                    total+=7;
                    puntosTrasReserva+=50;
                }else if(document.registroHabitacion.gymBCN.checked == false){
                    document.registroHabitacion.gymBCN.value='no';
                    total-=7;
                }
            }else if(valor == 'piscinaBCN'){
                if(document.registroHabitacion.piscinaBCN.checked == true){
                    document.registroHabitacion.piscinaBCN.value='si';
                    total+=6;
                    puntosTrasReserva+=50;
                }else if(document.registroHabitacion.piscinaBCN.checked == false){
                    document.registroHabitacion.piscinaBCN.value='no';
                    total-=6;
                }
            }else if(valor == 'saunaBCN'){
                if(document.registroHabitacion.saunaBCN.checked == true){
                    document.registroHabitacion.saunaBCN.value='si';
                    total+=5;
                    puntosTrasReserva+=50;
                }else if(document.registroHabitacion.saunaBCN.checked == false){
                    document.registroHabitacion.saunaBCN.value='no';
                    total-=5;
                }
            }
        }else if (ciudad=='COR'){
            //PRECIO HABITACIÓN INDIVIDUAL CORNELLA: 20€, PRECIO DOBLE: 40€
            if(valor == 'individual'){
                if(habitacion=='doble'){
                    total-=20;
                }else{
                    total+=20;
                }
                habitacion='individual';
            }else if (valor == 'doble'){
                if(habitacion=='individual'){
                    total+=20;
                }else{
                    total+=40;
                }
                habitacion='doble';
                
            }else if (valor == 'null'){
                if (habitacion == 'individual'){
                    total-=20;
                }else if (habitacion == 'doble'){
                    total-=40;
                }
            }else if(valor == 'servicioCOR'){
                if(document.registroHabitacion.servicioCOR.checked == true){
                    document.registroHabitacion.servicioCOR.value='si';
                    total+=10;
                    puntosTrasReserva+=100;
                }else if(document.registroHabitacion.servicioCOR.checked == false){
                    document.registroHabitacion.servicioCOR.value='no';
                    total-=10;
                }
            }
        }
        var res = 'Total: '+((total*dias)-(((total*dias)*descuento)/100));
        document.getElementById('euros').value=res;
    }
</script>



<div class="content">
   <!-- <div class="content-top">-->
   
    <div class="contact">
        <div class="contact-bottom">
                <div class="form">
                    <span class="register"><h1 style="color:white;">Vas a registrar una habitación como: <?php echo $_SESSION["nombre"]?></h1></span>
                    <br/><br/>
                    <form action="php/facturaHabitacion.php" name="registroHabitacion" method="post" class="cmxform" id="contactForm">
                        <div class="ciudadHotel" style="float:right;">
                            <span><label for="fechaEntrada">Fecha de entrada</label></span>
                            <input type="text" id="fechaEntrada" readonly name="fechaEntrada" value='<?php echo $_POST["entrada"] ?>'/>
                            <span><label for="fechaSalida">Fecha de entrada</label></span>
                            <input type="text" id="fechaSalida" readonly name="fechaSalida" value='<?php echo $_POST["salida"] ?>'/>
                            <br/><br/>
                            <span><h1>¿En que cuidad quiere realizar la reserva?</h1></span>
                            <span>
                                <select id="selectCiudad" name="ciudad" onchange="ciudadSeleccionada(this.value);">
                                    <option selected="selected" value="null">Seleccione una opción</option>
                                    <option value="BCN">Barcelona</option>
                                    <option value="COR">Cornell&aacute; de Llobregat</option>
                                </select>
                            </span>
                            <!--////////////////PARTE DE MENU SI LA CIUDAD SELECCIONADA ES BARCELONA////////////////-->
                            <div id="BCN" style="display:none">
                                <span><h1>Ciudad seleccionada: Barcelona</h1></span>
                                <select id="habitacionBCN" name="habitacionBCN" onchange="precio(this.value)">
                                    <option selected="selected" value="null">Seleccione una opción</option>
                                    <option value="individual">Habitaci&oacute;n individual</option>
                                    <option value="doble">Habitaci&oacute;n doble</option>
                                </select>
                                <span><h1>Servicio de habitaciones</h1></span>
                                <span>
                                    <input type="checkbox" name="servicioBCN" value="no" onchange="precio(this.name)"/>
                                </span>
                                <span><h1>Gimnasio</h1></span>
                                <span>
                                    <input type="checkbox" name="gymBCN" value="no" onchange="precio(this.name)"/>
                                </span>
                                <span><h1>Sauna</h1></span>
                                <span>
                                    <input type="checkbox" name="saunaBCN" value="no" onchange="precio(this.name)"/>
                                </span>
                                <span><h1>Piscina</h1></span>
                                <span>
                                    <input type="checkbox" name="piscinaBCN" value="no" onchange="precio(this.name)"/>
                                </span>
                            </div>
                            <!--////////////////PARTE DE MENU SI LA CIUDAD SELECCIONADA ES CORNELLA////////////////-->
                            <div id="COR" style="display:none">
                                <span><h1>Ciudad seleccionada: Cornell&aacute;</h1></span>
                                <select id="habitacionCOR" name="habitacionCOR" onchange="precio(this.value)">
                                    <option selected="selected" value="null">Seleccione una opción</option>
                                    <option value="individual">Habitaci&oacute;n individual</option>
                                    <option value="doble">Habitaci&oacute;n doble</option>
                                </select>
                                <span><h1>Servicio de habitaciones</h1></span>
                                <span>
                                    <input type="checkbox" name="servicioCOR" value="no" onchange="precio(this.name);"/>
                                    
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
                                    <option value=1000>5% descuento - 1.000 puntos</option>
                                    <option value=3000>10% descuento - 3.000 puntos</option>
                                    <option value=5000>25% descuento - 5.000 puntos</option>
                                    <option value=10000>50% descuento - 10.000 puntos</option>
                                    <option value=20000>Fin de semana gratis - 20.000 puntos</option>
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