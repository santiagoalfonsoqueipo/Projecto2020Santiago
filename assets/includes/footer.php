<?php
  echo "
             <!-- Menu lateral --> 
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="info.html">info</a>
                <a href="configuracion.php">configuracion</a>
                <a href="logout.php">salir</a>
            </div>



            <!-- Menu frontal --> 
            <div class="container-fluid" id="main">
                <div style="height: 60px;"  class=" row">
                    <div onclick="openNav()" id="padd" class="shadow-lg  text-center align-bottom  mh-100 col-12 col-md-2  bg-dark text-white azul_borde" style="width: 100px; height: 100px";> Menu </div>
                    <div id="padd" class="d-none d-md-block shadow-lg   mh-100 col-12 col-md-5  bg-dark text-white efecto" style="width: 100px; height: 200px"; > <a onClick="window.location.reload()">Santiago"s casino</a> </div>
                    <div id="padd" class="shadow-lg text-center mh-100 col-12 col-md-2  bg-dark  efecto text-white " style="width: 100px; height: 200px";> Bienvenido <?php echo $_SESSION["nombre_usuario"]; ?></div>
                    <div id="padd" class="shadow-lg text-center mh-100 col-12 col-md-1  bg-dark  text-white azul_borde" style="width: 100px; height: 200px";><?php echo $_SESSION["cantidad"] . "€"; ?></div>
                    <div id="padd" class="text-center mh-100 col-12 col-md-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px"; ><a  href="configuracion.php"> Configuracion</a>  </div>
                    <div id="padd" class="text-center mh-100 col-12 col-md-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px";> 	<a  href="logout.php">Cerrar Sesión</a> </div>
                </div>";
?>
?>