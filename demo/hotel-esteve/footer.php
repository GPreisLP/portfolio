		<div class="footer">
			<div class="wrap">
				<div class="footer-top">	
					<div class="sub-footer">	
						<div class="footer-menu">			 
							<h3>Imágenes aleatorias</h3>
						 	<div class="footer-pic">			
						    	<div class="footer-img">
								    <a href=""><img src="images/pic22.jpg"></a>
								</div>
								<div class="footer-img">
								    <a href=""><img src="images/pic23.jpg"></a>
								</div>
								<div class="footer-img">
								    <a href=""><img src="images/pic25.jpg"></a>
								</div>
								<div class="footer-img">
								    <a href=""><img src="images/pic24.jpg"></a>
								</div>
								<div class="footer-img">
								    <a href=""><img src="images/pic26.jpg"></a>
								</div>
								<div class="footer-img">
								    <a href=""><img src="images/pic27.jpg"></a>
								</div>
								<div class="clear"></div>
							</div>
						</div> 
					</div>
				  	
					<div class="sub-footer1">	
						<h2>Redes sociales</h2>
							<ul>
							    <li><a href="https://www.facebook.com/">Visitanos en Facebook</a></li>
								<li><a href="https://www.twitter.com/">Siguenos en Twitter</a></li>
								<li><a href="https://www.tumblr.com/">Curiosea en nuestro Tumblr</a></li>
								<li><a href="https://www.youtube.com/?hl=es&gl=ES">Entra a nuestro canal de Youtube</a></li>
								<li><a href="https://plus.google.com/">Agreganos a tus circulos en Google+</a></li>
						   </ul>
					</div>
			
					<div class="sub-footer1">	
						<h2>Inicia sesi&oacute;n</h2>
						<div class="contact">
							<?php
								//Si hay sesion iniciada...
								if(isset($_SESSION["nombre"])){
									echo '<div id="text">Bienvenido '.$_SESSION["nombre"]."<br>";
									echo 'Tienes un total de '.$_SESSION["puntos"].' puntos.</div>';
									
									echo '<div class="sesion"><form action="php/logout.php" method="post">
											<button class="tsc_c3b_large tsc_c3b_white tsc_button" style="float:right">Cerrar sesi&oacute;n</button>
										  </form>';
									echo '<form action="profile.php" method="post">
										 	<button class="tsc_c3b_large tsc_c3b_white tsc_button" style="float:left">Mi Perfil</button>
										  </form></div>';
								}
								else{ 
									//Si no hay sesion iniciada...
									echo '<form action="php/login.php" method="post">
											<div>
											    <label class="sr-only" for="ejemplo_email_2" >Email</label>
											    <input type="email" class="form-control" id="ejemplo_email_2"
											           placeholder="Introduce tu email" name="mail">
											</div>
											<div>
											    <label class="sr-only" for="ejemplo_password_2" >Contraseña</label>
											    <input type="password" class="form-control" id="ejemplo_password_2" 
											           placeholder="Contraseña" name="pass">
											</div>
											<div class="checkbox">
											    <label>
											    	<input type="checkbox"> No cerrar sesión
											    </label>
											</div>
											<button class="tsc_c3b_large tsc_c3b_white tsc_button">Entrar</button>
									     </form>';
									echo '<form id="registro" action="newuser.php" method="post">
										  	<button class="tsc_c3b_large tsc_c3b_white tsc_button" style="float:right">Registrate</button>
										  </form>';
								}
							?>				
						</div>
					</div>
					<div class="clear"></div>
				</div>		
			</div>
		</div>	
		<div class="footer-bottom">
			<div class="wrap">	
				<div class="copy">
					<p>&copy; 2015 Todos los derechos reservados | Diseñado por Cristian Fernandez y Joan Carles L&oacute;pez</p>
				</div>
			</div>
		</div>
	</body>
</html>