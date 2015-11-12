<script type="text/javascript">
    //VARIABLES PARA LOS VALORES DE LOS SERVICIOS Y LAS HABITACIONES
    var total=0; //Valor total de la habitación y los servicios
    var ciudad=''; //Valor = "BCN" o "COR", según ciudad seleccionada en el desplegable
    var descuento=0; //Si seleccionan descuento, vale el valor del descuento.
    var habitacion='sin seleccionar';//Utilizada para cambiar el precio de la habitación
    var validator='0';
    var dias=0;
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



<?php include 'footer.php'?>