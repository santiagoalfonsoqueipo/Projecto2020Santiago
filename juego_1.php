<?php
session_start();
    if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
      // actualizador fondos variable
     $id = $_SESSION['id_usuario'];

     include 'assets/includes/conex.php';
     $id_select = $_SESSION['id_usuario'];
     $sql2 = "SELECT cantidad FROM fondos WHERE id_usuario='$id_select' ";
     $result2 = $conn->query($sql2);
     if ($result2->num_rows > 0) {
         while($row = $result2->fetch_assoc()) {
            $_SESSION['cantidad'] = $row['cantidad'];
         }
      }   
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" width=device-width, initial-scale=.5>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
     <link rel="stylesheet" href="./assets/css/juegos.css">
     
  </head>
<body class="fondojuego" >
 
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="privado.php">Inicio</a>
	  <a href="configuracion.php">Configuraicon</a>

	</div>


	






	<div class="container-fluid" id="main">
	
		<div style="height: 60px;"  class=" row">
			<div onclick="openNav()" id="padd" class="shadow-lg  text-center align-bottom  mh-100 col-sm-2  bg-dark text-white azul_borde" style="width: 100px; height: 100px";> Menu </div>
			<div id="padd" class="shadow-lg   mh-100 col-sm-5  bg-dark text-white efecto" style="width: 100px; height: 200px"; > <a  href='privado.php'>Santiago's casino</a> </div>
			<div id="padd" class="shadow-lg text-center mh-100 col-sm-2  bg-dark  efecto text-white " style="width: 100px; height: 200px";> Bienvenido <?php echo $_SESSION['nombre_usuario']; ?></div>
			<div id="fondo" class="shadow-lg text-center mh-100 col-sm-1  bg-dark  text-white azul_borde" style="width: 100px; height: 200px";><?php echo $_SESSION['cantidad'] . "€"; ?></div>
			<div id="padd" class="text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px"; ><a  href='configuracion.php'> Configuracion</a>  </div>
			<div id="padd" class="text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px";> 	<a  href='logout.php'>Cerrar Sesión </a> </div>
		</div>
		 
	
	
	
		<div class=" row ">
			<div class=" col-sm-12 mt-4 justify-content-center contenido ">
				<div class="row">
					<div class="col-4 justify-content-center padd text-center" id="div_p1">
                                            <h1>Jugador 1</h1>
                                            </br>
                                            <form id='form_apuestas' name='form_apuestas' method='post' > 
                                                <div id='jugador_1'>
                                                <img src='http://www.bmurdaneta.com/Rincon/Equipos2016-17/C.S/Interrogante.gif' alt='' width='360' height='450'>
                                                </div>
                                                </br>                                           
                                                <input type='text' name='eleccion' id='eleccion' value='eleccion'>
                                                <div id='mensaje_eleccion'></div>
                                                </br>
                                                <input type='text' name='apuesta' id='apuesta' value='apuesta'> 
                                                 <div id='mensaje_apuesta'></div>                                               
                                                </br> 
                                                <button type='button' id='apostar'>Apostar</button>
                                            </form>
                                        </div>
                                        <div class="col-4 justify-content-center padd text-center" id="div_resultado">
                                           <h1>Resultado</h1>                                                                                 
                                        </div> 
                                        <div class="col-4 justify-content-center padd text-center" id="div_p2">
                                            <h1>Jugador 2 (Maquina)</h1>
                                             </br>
                                                <div id='jugador_2'>                                             
                                                <img src='http://www.bmurdaneta.com/Rincon/Equipos2016-17/C.S/Interrogante.gif' alt='' width='360' height='450'>
                                               </div>
                                        </div>                                           
				<div>
			</div>
		</div>

<body>					
		
    
    
    
    
                <div class=" fixed-bottom pie pt-5  pb-5 px-5 row">
                    <div class=" fixed-bottom col-sm-12  text-center bg-secondary  text-white " style="height: 30px; ">
                        <p>Derechos Reservados para nombre Digital Multigames S.L 2020©  <a href="sitemap.html">Sitemap</a> </p>


                </div>
			
	</div>
			
			

		
		
		 




	
    <script src="assets-modal/js/jquery-1.11.1.min.js"></script>
    <script src="assets-modal/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets-modal/js/jquery.backstretch.min.js"></script>
    <script src="assets-modal/js/scripts.js"></script>
    <script src="assets/js/juego_1.js"></script>
    
</html>
<?php
} else {
    header('Location: privado.php');
}
?>


	





