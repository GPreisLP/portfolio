<?php
//CONSTANTES PARA OPERAR
	define("k1",1000);
	define("m1",1000000);
	
//ARRAYS CON LOS CONTENIDOS DE CADA COLOR
	$negre = array('Negre',0,0,1,0);
	$marro = array('Marr&oacute;',1,1,10,1);
	$vermell = array('Vermell',2,2,100,2);
	$taronja = array('Taronja',3,3,1*k1,0);
	$groc = array('Groc',4,4,10*k1,0);
	$verd = array('Verd',5,5,100*k1,0.5);
	$blau = array('Blau',6,6,m1,0.25);
	$lila = array('Lila',7,7,10*m1,0.1);
	$gris = array('Gris',8,8,0,0.05);
	$blanc = array('Blanc',9,9,0,0);
	$or = array('Or',0,0,0.1,5);
	$plata = array('Plata',0,0,0.01,10);
		
//ARRAY DE LOS ARRAYS
	$colors = array(
		0 => $negre,
		1 => $marro,
		2 => $vermell,
		3 => $taronja,
		4 => $groc,
		5 => $verd,
		6 => $blau,
		7 => $lila,
		8 => $gris,
		9 => $blanc,
		10 => $or,
		11 =>$plata
	);
	
	$valor1='null';
	$valor2='null';
	$multi='null';
	$tole='null';
	$valor1_2='null';
	$valor2_2='null';
	$multi_2='null';
	$tole_2='null';
	$valor1Value='null';
	$valor2Value='null';
	$multiValue='null';
	$toleValue='null';
?>
<html>
	<head>
		<title>Ex8_JoanCarles_LopezPuig</title>
	</head>
	<body>
		<table border=1>
				<tr>
					<td>Color</td>
					<td>Valor 1</td>
					<td>Valor 2</td>
					<td>Multiplicador</td>
					<td>Tolerancia</td>
				</tr>
				<?php
					echo('<tr>');
					for($i=0;$i<=11;$i++){
						foreach($colors[$i] as $valor){
							echo('<td>'.$valor.'</td>');
						}
						echo('</tr>');
					}
				?>
		</table>
		<br>
		<table border=1>
			<thead>
				<th>Colores a valores</th>
				<th>Valores a colores</th>
			</thead>
			<tr>
				<td>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<table border=1>
							<tr>
								<td>Primer valor</td>
								<td>Segundo valor</td>
								<td>Multiplicador</td>
								<td>Tolerancia</td>
							</tr>
							<tr>
								<td>
									<select name="valor1">
										<option value="null" selected="selected">----</option>
										<option value="Negre">Negre</option>
										<option value="Marro">Marr&oacute;</option>
										<option value="Vermell">Vermell</option>
										<option value="Taronja">Taronja</option>
										<option value="Groc">Groc</option>
										<option value="Verd">Verd</option>
										<option value="Blau">Blau</option>
										<option value="Lila">Lila</option>
										<option value="Gris">Gris</option>
										<option value="Blanc">Blanc</option>
										<option value="Or">Or</option>
										<option value="Plata">Plata</option>
									</select>
								</td>
								<td>
									<select name="valor2">
										<option value="null" selected="selected">----</option>
										<option value="Negre">Negre</option>
										<option value="Marro">Marr&oacute;</option>
										<option value="Vermell">Vermell</option>
										<option value="Taronja">Taronja</option>
										<option value="Groc">Groc</option>
										<option value="Verd">Verd</option>
										<option value="Blau">Blau</option>
										<option value="Lila">Lila</option>
										<option value="Gris">Gris</option>
										<option value="Blanc">Blanc</option>
										<option value="Or">Or</option>
										<option value="Plata">Plata</option>
									</select>
								</td>
								<td>
									<select name="multi">
										<option value="null" selected="selected">----</option>
										<option value="Negre">Negre</option>
										<option value="Marro">Marr&oacute;</option>
										<option value="Vermell">Vermell</option>
										<option value="Taronja">Taronja</option>
										<option value="Groc">Groc</option>
										<option value="Verd">Verd</option>
										<option value="Blau">Blau</option>
										<option value="Lila">Lila</option>
										<option value="Gris">Gris</option>
										<option value="Blanc">Blanc</option>
										<option value="Or">Or</option>
										<option value="Plata">Plata</option>
									</select>
								</td>
								<td>
									<select name="tole">
										<option value="null" selected="selected">----</option>
										<option value="Negre">Negre</option>
										<option value="Marro">Marr&oacute;</option>
										<option value="Vermell">Vermell</option>
										<option value="Taronja">Taronja</option>
										<option value="Groc">Groc</option>
										<option value="Verd">Verd</option>
										<option value="Blau">Blau</option>
										<option value="Lila">Lila</option>
										<option value="Gris">Gris</option>
										<option value="Blanc">Blanc</option>
										<option value="Or">Or</option>
										<option value="Plata">Plata</option>
									</select>
								</td>
							</tr>
						</table>
						<input type="submit" value="Enviar" />	
					</form>
					<?php
						//ASIGNAR VALOR AL VALOR 1
						if(!isset($_POST['valor1'])){
							echo("---");
						}else{
							if($_POST['valor1']=='Negre'){
								$valor1=$negre[1];
							}else if($_POST['valor1']=='Marro'){
								$valor1=$marro[1];
							}else if($_POST['valor1']=='Vermell'){
								$valor1=$vermell[1];
							}else if($_POST['valor1']=='Taronja'){
								$valor1=$taronja[1];
							}else if($_POST['valor1']=='Groc'){
								$valor1=$groc[1];
							}else if($_POST['valor1']=='Verd'){
								$valor1=$verd[1];
							}else if($_POST['valor1']=='Blau'){
								$valor1=$blau[1];
							}else if($_POST['valor1']=='Lila'){
								$valor1=$lila[1];
							}else if($_POST['valor1']=='Gris'){
								$valor1=$gris[1];
							}else if($_POST['valor1']=='Blanc'){
								$valor1=$blanc[1];
							}else if($_POST['valor1']=='Or'){
								$valor1=$or[1];
							}else if($_POST['valor1']=='Plata'){
								$valor1=$plata[1];
							}else{
								$valor1='---';
							}
						}
						//ASIGNAR VALOR AL VALOR 2
						if(!isset($_POST['valor2'])){
							echo("---");
						}else{
							if($_POST['valor2']=='Negre'){
								$valor2=$negre[2];
							}else if($_POST['valor2']=='Marro'){
								$valor2=$marro[2];
							}else if($_POST['valor2']=='Vermell'){
								$valor2=$vermell[2];
							}else if($_POST['valor2']=='Taronja'){
								$valor2=$taronja[2];
							}else if($_POST['valor2']=='Groc'){
								$valor2=$groc[2];
							}else if($_POST['valor2']=='Verd'){
								$valor1=$verd[2];
							}else if($_POST['valor2']=='Blau'){
								$valor2=$blau[2];
							}else if($_POST['valor2']=='Lila'){
								$valor2=$lila[2];
							}else if($_POST['valor2']=='Gris'){
								$valor2=$gris[2];
							}else if($_POST['valor2']=='Blanc'){
								$valor2=$blanc[2];
							}else if($_POST['valor2']=='Or'){
								$valor2=$or[2];
							}else if($_POST['valor2']=='Plata'){
								$valor2=$plata[2];
							}else{
								$valor2='---';
							}
						}
						//ASIGNAR VALOR AL MULTIPLICADOR
						if(!isset($_POST['multi'])){
							echo("---");
						}else{
							if($_POST['multi']=='Negre'){
								$multi=$negre[3];
							}else if($_POST['multi']=='Marro'){
								$multi=$marro[3];
							}else if($_POST['multi']=='Vermell'){
								$multi=$vermell[3];
							}else if($_POST['multi']=='Taronja'){
								$multi=$taronja[3];
							}else if($_POST['multi']=='Groc'){
								$multi=$groc[3];
							}else if($_POST['multi']=='Verd'){
								$valor1=$verd[3];
							}else if($_POST['multi']=='Blau'){
								$multi=$blau[3];
							}else if($_POST['multi']=='Lila'){
								$multi=$lila[3];
							}else if($_POST['multi']=='Gris'){
								$multi=$gris[3];
							}else if($_POST['multi']=='Blanc'){
								$multi=$blanc[3];
							}else if($_POST['multi']=='Or'){
								$multi=$or[3];
							}else if($_POST['multi']=='Plata'){
								$multi=$plata[3];
							}else{
								$multi='---';
							}
						}
						//ASIGNAR VALOR A LA Tolerancia
						if(!isset($_POST['tole'])){
							echo("---");
						}else{
							if($_POST['tole']=='Negre'){
								$tole=$negre[4];
							}else if($_POST['tole']=='Marro'){
								$tole=$marro[4];
							}else if($_POST['tole']=='Vermell'){
								$tole=$vermell[4];
							}else if($_POST['tole']=='Taronja'){
								$tole=$taronja[4];
							}else if($_POST['tole']=='Groc'){
								$tole=$groc[4];
							}else if($_POST['tole']=='Verd'){
								$valor1=$verd[4];
							}else if($_POST['tole']=='Blau'){
								$tole=$blau[4];
							}else if($_POST['tole']=='Lila'){
								$tole=$lila[4];
							}else if($_POST['tole']=='Gris'){
								$tole=$gris[4];
							}else if($_POST['tole']=='Blanc'){
								$tole=$blanc[4];
							}else if($_POST['tole']=='Or'){
								$tole=$or[4];
							}else if($_POST['tole']=='Plata'){
								$tole=$plata[4];
							}else{
								$tole='---';
							}
						}
						echo('<br>Valor 1: '.$valor1.'<br/>Valor 2: '.$valor2.'<br/>Multiplicador: '.$multi.'<br/>Tolerancia: '.$tole);
						$valorTotal=$valor1.$valor2;
						$valorTotal=$valorTotal*$multi;
						if($valorTotal>=k1 && $valorTotal<m1){
							$valorTotal=$valorTotal/k1.'k';
						}else if($valorTotal>=m1){
							$valorTotal=$valorTotal/m1.'m';
						}
						echo('<br/>TOTAL: '.$valorTotal.'&#8486; tolerancia +/-'.$tole.'%');
					?>
				</td>
				<td>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<table border=1>
							<tr>
								<td>Primer valor</td>
								<td>Segundo valor</td>
								<td>Multiplicador</td>
								<td>Tolerancia</td>
							</tr>
							<tr>
								<td>
									<select name="valor1Value">
										<option value="null" selected="selected">----</option>
										<option value="Negre">0</option>
										<option value="Marro">1</option>
										<option value="Vermell">2</option>
										<option value="Taronja">3</option>
										<option value="Groc">4</option>
										<option value="Verd">5</option>
										<option value="Blau">6</option>
										<option value="Lila">7</option>
										<option value="Gris">8</option>
										<option value="Blanc">9</option>
										<option value="Or">0</option>
										<option value="Plata">0</option>
									</select>
								</td>
								<td>
									<select name="valor2Value">
										<option value="null" selected="selected">----</option>
										<option value="Negre">0</option>
										<option value="Marro">1</option>
										<option value="Vermell">2</option>
										<option value="Taronja">3</option>
										<option value="Groc">4</option>
										<option value="Verd">5</option>
										<option value="Blau">6</option>
										<option value="Lila">7</option>
										<option value="Gris">8</option>
										<option value="Blanc">9</option>
										<option value="Or">0</option>
										<option value="Plata">0</option>
									</select>
								</td>
								<td>
									<select name="multiValue">
										<option value="null" selected="selected">----</option>
										<option value="Negre">1</option>
										<option value="Marro">10</option>
										<option value="Vermell">100</option>
										<option value="Taronja">1k</option>
										<option value="Groc">10k</option>
										<option value="Verd">100k</option>
										<option value="Blau">1m</option>
										<option value="Lila">10m</option>
										<option value="Gris">0</option>
										<option value="Blanc">0</option>
										<option value="Or">0.1</option>
										<option value="Plata">0.01</option>
									</select>
								</td>
								<td>
									<select name="toleValue">
										<option value="null" selected="selected">----</option>
										<option value="Negre">0</option>
										<option value="Marro">1</option>
										<option value="Vermell">2</option>
										<option value="Taronja">0</option>
										<option value="Groc">0</option>
										<option value="Verd">0.5</option>
										<option value="Blau">0.25</option>
										<option value="Lila">0.1</option>
										<option value="Gris">0.05</option>
										<option value="Blanc">0</option>
										<option value="Or">5</option>
										<option value="Plata">10</option>
									</select>
								</td>
							</tr>
						</table>
						<input type="submit" value="Enviar" />	
					</form>
					<?php
						//ASIGNAR VALOR AL VALOR 1
						if(!isset($_POST['valor1Value'])){
							echo("---");
						}else{
							if($_POST['valor1Value']=='Negre'){
								$valor1Value=$negre[0];$valor1_2=$negre[1];
							}else if($_POST['valor1Value']=='Marro'){
								$valor1Value=$marro[0];$valor1_2=$marro[1];
							}else if($_POST['valor1Value']=='Vermell'){
								$valor1Value=$vermell[0];$valor1_2=$vermell[1];
							}else if($_POST['valor1Value']=='Taronja'){
								$valor1Value=$taronja[0];$valor1_2=$taronja[1];
							}else if($_POST['valor1Value']=='Groc'){
								$valor1Value=$groc[0];$valor1_2=$groc[1];
							}else if($_POST['valor1Value']=='Verd'){
								$valor1Value=$verd[0];$valor1_2=$verd[1];
							}else if($_POST['valor1Value']=='Blau'){
								$valor1Value=$blau[0];$valor1_2=$blau[1];
							}else if($_POST['valor1Value']=='Lila'){
								$valor1Value=$lila[0];$valor1_2=$lila[1];
							}else if($_POST['valor1Value']=='Gris'){
								$valor1Value=$gris[0];$valor1_2=$gris[1];
							}else if($_POST['valor1Value']=='Blanc'){
								$valor1Value=$blanc[0];$valor1_2=$blanc[1];
							}else if($_POST['valor1Value']=='Or'){
								$valor1Value=$or[0];$valor1_2=$or[1];
							}else if($_POST['valor1Value']=='Plata'){
								$valor1Value=$plata[0];$valor1_2=$plata[1];
							}else{
								$valor1Value='---';
							}
						}
						//ASIGNAR VALOR AL VALOR 2
						if(!isset($_POST['valor2Value'])){
							echo("---");
						}else{
							if($_POST['valor2Value']=='Negre'){
								$valor2Value=$negre[0];$valor2_2=$negre[2];
							}else if($_POST['valor2Value']=='Marro'){
								$valor2Value=$marro[0];$valor2_2=$marro[2];
							}else if($_POST['valor2Value']=='Vermell'){
								$valor2Value=$vermell[0];$valor2_2=$vermell[2];
							}else if($_POST['valor2Value']=='Taronja'){
								$valor2Value=$taronja[0];$valor2_2=$taronja[2];
							}else if($_POST['valor2Value']=='Groc'){
								$valor2Value=$groc[0];$valor2_2=$groc[2];
							}else if($_POST['valor2Value']=='Verd'){
								$valor2Value=$verd[0];$valor2_2=$verd[2];
							}else if($_POST['valor2Value']=='Blau'){
								$valor2Value=$blau[0];$valor2_2=$blau[2];
							}else if($_POST['valor2Value']=='Lila'){
								$valor2Value=$lila[0];$valor2_2=$lila[2];
							}else if($_POST['valor2Value']=='Gris'){
								$valor2Value=$gris[0];$valor2_2=$gris[2];
							}else if($_POST['valor2Value']=='Blanc'){
								$valor2Value=$blanc[0];$valor2_2=$blanc[2];
							}else if($_POST['valor2Value']=='Or'){
								$valor2Value=$or[0];$valor2_2=$or[2];
							}else if($_POST['valor2Value']=='Plata'){
								$valor2Value=$plata[0];$valor2_2=$plata[2];
							}else{
								$valor2Value='---';
							}
						}
						//ASIGNAR VALOR AL MULTIPLICADOR
						if(!isset($_POST['multiValue'])){
							echo("---");
						}else{
							if($_POST['multiValue']=='Negre'){
								$multiValue=$negre[0];$multi_2=$negre[3];
							}else if($_POST['multiValue']=='Marro'){
								$multiValue=$marro[0];$multi_2=$marro[3];
							}else if($_POST['multiValue']=='Vermell'){
								$multiValue=$vermell[0];$multi_2=$vermell[3];
							}else if($_POST['multiValue']=='Taronja'){
								$multiValue=$taronja[0];$multi_2=$taronja[3];
							}else if($_POST['multiValue']=='Groc'){
								$multiValue=$groc[0];$multi_2=$groc[3];
							}else if($_POST['multiValue']=='Verd'){
								$multiValue=$verd[0];$multi_2=$verd[3];
							}else if($_POST['multiValue']=='Blau'){
								$multiValue=$blau[0];$multi_2=$blau[3];
							}else if($_POST['multiValue']=='Lila'){
								$multiValue=$lila[0];$multi_2=$lila[3];
							}else if($_POST['multiValue']=='Gris'){
								$multiValue=$gris[0];$multi_2=$gris[3];
							}else if($_POST['multiValue']=='Blanc'){
								$multiValue=$blanc[0];$multi_2=$blanc[3];
							}else if($_POST['multiValue']=='Or'){
								$multiValue=$or[0];$multi_2=$or[3];
							}else if($_POST['multiValue']=='Plata'){
								$multiValue=$plata[0];$multi_2=$plata[3];
							}else{
								$multiValue='---';
							}
						}
						//ASIGNAR VALOR A LA Tolerancia
						if(!isset($_POST['toleValue'])){
							echo("---");
						}else{
							if($_POST['toleValue']=='Negre'){
								$toleValue=$negre[0];$tole_2=$negre[4];
							}else if($_POST['toleValue']=='Marro'){
								$toleValue=$marro[0];$tole_2=$marro[4];
							}else if($_POST['toleValue']=='Vermell'){
								$toleValue=$vermell[0];$tole_2=$vermell[4];
							}else if($_POST['toleValue']=='Taronja'){
								$toleValue=$taronja[0];$tole_2=$taronja[4];
							}else if($_POST['toleValue']=='Groc'){
								$toleValue=$groc[0];$tole_2=$groc[4];
							}else if($_POST['toleValue']=='Verd'){
								$toleValue=$verd[0];$tole_2=$verd[4];
							}else if($_POST['toleValue']=='Blau'){
								$toleValue=$blau[0];$tole_2=$blau[4];
							}else if($_POST['toleValue']=='Lila'){
								$toleValue=$lila[0];$tole_2=$lila[4];
							}else if($_POST['toleValue']=='Gris'){
								$toleValue=$gris[0];$tole_2=$gris[4];
							}else if($_POST['toleValue']=='Blanc'){
								$toleValue=$blanc[0];$tole_2=$blanc[4];
							}else if($_POST['toleValue']=='Or'){
								$toleValue=$or[0];$tole_2=$or[4];
							}else if($_POST['toleValue']=='Plata'){
								$toleValue=$plata[0];$tole_2=$plata[4];
							}else{
								$toleValue='---';
							}
						}
						echo('<br>Valor 1: '.$valor1Value.'<br/>Valor 2: '.$valor2Value.'<br/>Multiplicador: '.$multiValue.'<br/>Tolerancia: '.$toleValue);
						$valorTotal=$valor1_2.$valor2_2;
						$valorTotal=$valorTotal*$multi_2;
						if($valorTotal>=k1 && $valorTotal<m1){
							$valorTotal=$valorTotal/k1.'k';
						}else if($valorTotal>=m1){
							$valorTotal=$valorTotal/m1.'m';
						}
						echo('<br/>TOTAL: '.$valorTotal.'&#8486; tolerancia +/-'.$tole_2.'%');
					?>
				</td>
			</tr>
		</table>
		<?php
			
		?>
		
	</body>
</html>