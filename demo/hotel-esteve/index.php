<?php include 'header.php' ?>
<div class="content">
<div class="content-top">
		<div class="grid">
			<h4>Plaza restaurante</h4>
			<div class="booking">	
				<form action="reservaRestaurante.php" id="reservation-form">
					<fieldset>
		                <div class="field">
		                	<button id="button" type="submit">Realizar reserva
		                </div>
	             	</fieldset>
       			</form>
        		<div class="clear"></div>
			</div>
		</div>
		<div class="grid1">
			<div class="tariff">
			   	<div class="text">
		 			<h2>Reservas</h2>
					<p>Nuestro servicio permite reservar online habitaciones y mesas en nuestro restaurante. Puedes seleccionar una fecha y comprobar si existen plazas disponibles en nuestras 100 habitaciones. Trabajamos para facilitarte las cosas. Trabajamos por t&iacute;.</p>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="grid2">
			<h4>Reserva habitaci&oacute;n</h4>
			<div class="booking">	
				<form action="reservaHabitacion.php" method="post">
					<div class="reserva">
                    	<span><h1>Fecha de entrada<input type="date" name="entrada" required="required"/></h1></span>
                        <span><h1>Fecha de salida:&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="salida" required="required"/></h1></span>
                    </div>
                    <br/>
	                <div class="field">
	                	<button id="button" type="submit">Realizar reserva
	                </div>
       			</form>
        		<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
      </div>
   </div>
  </div>
 </div>
</div>
<div class="content-bottom">
	<div class="wrap">
		<div class="bottom-gallery">			
				<div class="bottom-image">
					<img src="images/pic.jpg">
				</div>
				<div class="bottom-image">
					<img src="images/pic4.jpg">
				</div>
				<div class="bottom-image">
					<img src="images/pic10.jpg">
				</div>
				<div class="bottom-image1">
					<img src="images/pic7.jpg">
				</div>
				<div class="clear"></div>
		</div>
	 </div>
</div>
<?php include 'footer.php'?>