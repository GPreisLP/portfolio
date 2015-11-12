<?php
// Funcion de inicio de sesion
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Hoteles Esteve | Contactanos </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <script src="js/libs/jquery-1.6.2.min.js"></script>
        <script src="js/basic-jquery-slider.js"></script>
        <link href="css/sesion.css" rel="stylesheet" type="text/css" media="all"/>
        <link href='https://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>


    </head>
    <body>
        <div class="header">
         	<div class="wrap">
         		<div class="wrapper">
             		<div class="logo">
            			<a href="index.php"><img src="images/logo.png" /></a>
            		</div>
             	<div class="menu">
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="tariff.php">Tarifas</a></li>
        				<li><a href="services.php">Servicios</a></li>
        				<li><a href="food&beverage.php">Restaurante</a></li>
        				<li><a href="contact.php">Contacto</a></li>
        			</ul>
        			<div class="clear"></div> 
        		</div>
            	<div id="container">
                    <div id="banner">
                        <ul class="bjqs">
                            <li><img src="images/banner3.jpg" title="Automatically generated caption"></li>
                            <li><img src="images/banner2.jpg" title="Automatically generated caption"></li>
                            <li><img src="images/banner1.jpg" title="Automatically generated caption"></li>
                        </ul>
                     </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#banner').bjqs({
                            'animation' : 'slide',
                            'width' : 920,
                            'height' : 450
                        });
                    });
                </script>