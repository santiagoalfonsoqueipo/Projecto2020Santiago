<?php
session_start();
if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {

    if ($_SESSION['usuario'] == 'admin') {
        header('Location: admin.php');
        exit;
    }
    
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
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

            <link rel="stylesheet" href="./assets/css/style.css">
            <link rel="stylesheet" href="./assets/css/config.css">


        </head>
        <body>
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
                    <div onclick="openNav()" id="padd" class="shadow-lg  text-center align-bottom  mh-100 col-sm-2  bg-dark text-white azul_borde" style="width: 100px; height: 100px";> Menu </div>               
                    <div id="padd" class="shadow-lg   mh-100 col-sm-5  bg-dark text-white efecto" style="width: 100px; height: 200px"; > <a href='privado.php'">Santiago's casino</a> </div>
                    <div id="padd" class="shadow-lg text-center mh-100 col-sm-2  bg-dark  efecto text-white " style="width: 100px; height: 200px";> Bienvenido <?php echo $_SESSION['nombre_usuario']; ?></div>
                    <div id="fondo" class="shadow-lg text-center mh-100 col-sm-1  bg-dark  text-white azul_borde" style="width: 100px; height: 200px";><?php echo $_SESSION['cantidad'] . "€"; ?></div>
                    <div id="padd" class="text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px"; ><a  href='configuracion.php'> Configuracion</a>  </div>
                    <div id="padd" class="text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px";> 	<a  href='logout.php'>Salir</a> </div>
                </div>


                <!-- Div del paralax principal --> 
                <div  class="d-none d-md-block" id="parallax-image">
                    <div class="row darken-60  h-100">
                        <div class="col-md-12 align-self-center">					
                            <h1 class="text-center text-white ">Perfil de <?php echo $_SESSION['nombre_usuario']; ?> </h1>
                        </div>
                    </div>
                </div>






                <!-- Inicio de blocke contenido juegos --> 
                <div style="height: 650px;"  class=" row">
                    <div class=" col-sm-12   bg-dark text-white " style="height: 400px";><h1  id="padd" class=" text-center text-white " >Panel de configuración</h1> 
                        <div id="migas_config">Privado > Configuracion > Datos
                        </div>  
                        <div class=" pt-5   row justify-center" id="contenedor_juegos">

                            <div class="col-12 col-md-12  text-white " style="height: 500px; "> 
                                <div class="row justify-center">
                                    <div class=" col-12 col-md-1 conta  contenido float">

                                        <div class="link text"id="Datos" onclick="window.location.reload();">Datos</div>
                                        <div class="link text" id="Jugadas">Jugadas</div>
                                        <div class="link text" id="Depositos">Depositos</div>
                                        <div class="link text" id="Referidos">Referidos</div>
                                        <div class="link text" id="Ingresar">Ingresar Fondos</div>
                                    </div>

                                    <div class=" col-md-9  conta   contenido" >
                                        <div class="col-12 float-left ajax-config" id="ajax-config">
                                            <?php
                                            $id = $_SESSION['id_usuario'];

                                             include 'assets/includes/conex.php';
                                            
                                            $sql = "SELECT * FROM `usuarios` where `id_usuario` = '$id'";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<form id='formulario_config' name='formulario_config' method='post' > ";
                                                    echo "<p>Su id es:" . $row['id_usuario'] . "</p>";
                                                    echo "<p>Su usuario es:" . $row['usuario'] . "</p>";
                                                    echo "<p>Su contraseña es: <input type='text' name='contraseña' id='contraseña' value='$row[contraseña]'></p>";
                                                    echo "<p>su nombre es:" . $row['nombre_usuario'] . "</p>";
                                                    echo "<p>su apellido es:" . $row['apellido'] . "</p>";
                                                    echo "<p>Su email es: <input type='text' name='email' id='email' value='$row[email]'></p>";
                                                    echo "<p>Su id_referido es: <input type='text' name='id_referido' id='id_referido' value='$row[id_referido]'></p>";
                                                    echo "<button type='button' id='alterar'>cambiar datos</button>";
                                                    echo "</form>";
                                                }
                                            }

                                            ?>                                                
                                        </div>   
                                    </div>
                                    <div class=" col-1 d-none d-xl-block  conta   contenido" >
                                        banner
                                    </div>  
                                </div>
                            </div>


                        </div>

                    </div>



                </div>



                <!-- Div de segundo paralax que divide con los bonos--> 
                <div class="d-none d-md-block" id="parallax-image2">
                    <div class="row darken-60 h-100 ">
                        <div class="col-md-12 align-self-center">
                            <h1 class="text-center text-white ">Bonos</h1>
                        </div>
                    </div>
                </div>


                <!-- Div de bonos --> 
                <div   class=" row ">
                    <div class="d-none d-md-block pt-5  col-12  bg-dark text-white " style="width: 100px; height: 400px">


                        <div class="  pt-5 pb-5 px-5 justify-content-center row">
                            <div class="   col-md-3   bg-dark bono text-center bono" style="height: 180px; ">
                                </br>
                                <p>Bono Subscripcion</p>
                                <p>Suscríbete y recibe 1000 créditos gratis para jugar.</p>
                            </div>
                            <div class="d-none d-md-block col-md-3 mx-5 bg-dark bono text-center  bono" style="height: 180px; ">
                                </br>
                                <p>Bono Deposito</p>
                                <p>Duplica tu deposito  durante tus 1000$ dolares</p>
                            </div>
                            <div class="d-none d-md-block col-md-3  bg-dark  bono text-center bono " style="height: 180px;">
                                </br>
                                <p>Bono Afiliado</p>
                                <p>Refiere a tus amigos al casino y obtener bonificaciones cuando juegan juegos.</p>
                            </div>









                        </div>

                        <!-- Footer--> 
                        <div class=" fixed-bottom pie pt-5  pb-5 px-5 row">
                            <div class=" fixed-bottom col-sm-12  text-center bg-secondary  text-white " style="height: 30px; ">
                                <p>Derechos Reservados para nombre Digital Multigames S.L 2020©  <a href="sitemap.html">Sitemap</a> </p>
                              
                              
                        </div>

                    </div>


                </div>





            </div>







        </body>
    </html>

    <script src="assets-modal/js/jquery-1.11.1.min.js"></script>
    <script src="assets-modal/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets-modal/js/jquery.backstretch.min.js"></script>
    <script src="assets-modal/js/scripts.js"></script>
    <script src="assets/js/configuracion.js"></script>





    <?php
} else {
    header('Location: index.php');
    exit;
}