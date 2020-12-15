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
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

            <link rel="stylesheet" href="./assets/css/style.css">

        </head>

            
        <body>
            
            <!-- Menu lateral --> 
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="configuracion.php">configuracion</a>
                <a href="logout.php">salir</a>
            </div>



            <!-- Menu frontal --> 
            <div class="container-fluid" id="main">
                <div style="height: 60px;"  class=" row">
                    <div onclick="openNav()" id="padd" class="shadow-lg  text-center align-bottom  mh-100 col-12 col-md-2  bg-dark text-white azul_borde" style="width: 100px; height: 100px";> Menu </div>
                    <div id="padd" class="d-none d-md-block shadow-lg   mh-100 col-12 col-md-5  bg-dark text-white efecto" style="width: 100px; height: 200px"; > <a onClick="window.location.reload()">Santiago's casino</a> </div>
                    <div id="padd" class="shadow-lg text-center mh-100 col-12 col-md-2  bg-dark  efecto text-white " style="width: 100px; height: 200px";> Bienvenido <?php echo $_SESSION['nombre_usuario']; ?></div>
                    <div id="padd" class="shadow-lg text-center mh-100 col-12 col-md-1  bg-dark  text-white azul_borde" style="width: 100px; height: 200px";><?php echo $_SESSION['cantidad'] . "€"; ?></div>
                    <div id="padd" class="text-center mh-100 col-12 col-md-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px"; ><a  href='configuracion.php'> Configuracion</a>  </div>
                    <div id="padd" class="text-center mh-100 col-12 col-md-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px";> 	<a  href='logout.php'>Cerrar Sesión</a> </div>
                </div>

                

                <!-- Div del paralax principal --> 
                <div class="d-none d-md-block" id="parallax-image">
                    <div class="row darken-60  h-100">
                        <div class="col-md-12 align-self-center">					
                            <h1 class="d-none d-md-block text-center text-white ">Santiago's Casino</h1>
                            <h1 class="d-none d-md-block text-center text-white ">Diversion asegurada</h1>
                        </div>
                    </div>
                </div>



                <!-- Inicio de blocke contenido juegos --> 
                <div style="height: 650px;"  class=" row">
                    <div class=" col-sm-12   bg-dark text-white " style="height: 650px";>
                            <h1  id="padd" class=" text-center text-white " >Disfrute de nuestros juegos</h1> 
                           
                        <div class="    row justify-center" id="contenedor_juegos">
                            <div style="height: 200px " class="col-md-12 col-xl-4 ">
                                <div class="row justify-center pl-3  ">
                                    
                                    <!-- Divs de juegos individual --> 		
                                    <div class="img-fluid col-md-12 text-center  "  id="fijar-img" style=" height: 150px; background-image: url('assets/img/banner-tijeras.jpg'); ">
                                        <div style="height: 150px; width: 700px; " class="col-md-12">
                                        </div>
                                    </div>

                                    <div style="height: 30px" class="col-md-12 bg-secondary text-center juego_texto " >
                                        Piedra & Papel & Tijera

                                    </div>

                                    <div style="height: 30px" class="col-md-12 text-center botton_jugar jugar " id="pruebaa">

                                        Jugar

                                    </div>
                                    
                                    <div style="height: 30px" class="col-md-6 border border-dark  text-center bg-primary " id="comentario">
                                      <div id="like" >Like</div> 
                                    </div>
                     
                                     <div style="height: 30px" class="col-md-6 border border-dark text-center bg-primary " id="comentario">
                                       <div id="dlike" >DisLike</div>   
                                    </div>                             
                                    
                                </div>
                            </div>



                            <div style="height: 200px; " class=" d-none d-xl-block  col-md-4  ">
                                <div class="row justify-center ">
                                    <div class="col-md-12  px-3 ">
                                        <div class="img-fluid col-md-12 text-center " id="fijar-img" style=" height: 150px; background-image: url('https://image.shutterstock.com/image-illustration/diamond-casino-craps-dices-3d-260nw-678689113.jpg'); ">
                                            <div style="height: 150px; width: 700px; " class="col-md-12">
                                            </div>
                                        </div>

                                        <div style="height: 30px" class="col-md-12 bg-secondary text-center juego_texto  " >
                                            ColorGame

                                        </div>

                                        <div style="height: 30px" class="col-md-12 text-center botton_jugar jugar " >
                                            Fecha lanzamiento 26/12/2020
                                        </div>

                                        <div style="height: 30px" class="col-md-12 border border-dark  text-center bg-danger " id="comentario">
                                          Juego Desactivado - NO DISPONIBLE
                                        </div>

                                    

                                    </div>
                                </div>
                            </div>


                            <div style="height: 200px; " class="d-none d-xl-block  col-md-4  ">
                                <div class="row justify-center pr-3">

                                    <div class="img-fluid col-md-12 text-center "  id="fijar-img" style=" height: 150px; background-image: url('https://image.freepik.com/vector-gratis/brillante-banner-poker-casino_91128-227.jpg'); ">
                                        <div style="height: 150px; width: 700px; " class="col-md-12">
                                        </div>
                                    </div>
                                    <div style="height: 30px" class="col-md-12 bg-secondary text-center juego_texto " >
                                       Ruleta europea
                                    </div>

                                    <div style="height: 30px" class="col-md-12 text-center botton_jugar jugar " >
                                        Fecha lanzamiento 26/12/2020
                                    </div>
                                    
                                    <div style="height: 30px" class="col-md-12 border border-dark  text-center bg-danger " id="comentario">
                                      Juego Desactivado - NO DISPONIBLE
                                    </div>
                                    

                                </div>
                            </div>

                        </div>

                        <div class=" pt-5   row justify-center "  id="contenedor_juegos2">
                            <div style="height: 200px " class="col-md-4 d-none d-xl-block ">
                                <div class="row justify-center pl-3">

                                    <div class="img-fluid col-md-12 text-center "  id="fijar-img" style=" height: 150px; background-image: url('https://us.123rf.com/450wm/welcomia/welcomia1701/welcomia170100029/69872788-copiar-espacio-casino-fondo-3d-representa-la-ilustraci%C3%B3n-dark-casino-gambling-theme-.jpg?ver=6'); ">
                                        <div style="height: 150px; width: 700px; " class="col-md-12">
                                        </div>
                                    </div>

                                    <div style="height: 30px" class="col-md-12 bg-secondary text-center juego_texto " >
                                       Stake

                                    </div>

                                    <div style="height: 30px" class="col-md-12 text-center botton_jugar jugar " >
                                        Fecha lanzamiento 26/12/2020
                                    </div>
                                    
                                    <div style="height: 30px" class="col-md-12 border border-dark  text-center bg-danger " id="comentario">
                                      Juego Desactivado - NO DISPONIBLE
                                    </div>
                                    
    
                                    
                                </div>
                            </div>



                            <div style="height: 200px; " class="col-md-4 d-none d-xl-block ">
                                <div class="row justify-center">
                                    <div class="col-md-12  px-3">
                                        <div class="img-fluid col-md-12 text-center " id="fijar-img" style=" height: 150px; background-image: url('https://image.freepik.com/vector-gratis/ilustracion-3d-fichas-casino-corona-premio-sobre-fondo-rayos-negros-decorado-cinta-confeti-dorado_1302-20397.jpg'); ">
                                            <div style="height: 150px; width: 700px; " class="col-md-12">
                                            </div>
                                        </div>

                                        <div style="height: 30px" class="col-md-12 bg-secondary text-center juego_texto  " >
                                            Crash

                                        </div>

                                        <div style="height: 30px" class="col-md-12 text-center botton_jugar jugar " >
                                            Fecha lanzamiento 26/12/2020
                                        </div>

                                        <div style="height: 30px" class="col-md-12 border border-dark  text-center bg-danger " id="comentario">
                                          Juego Desactivado - NO DISPONIBLE
                                        </div>
                                    
                                     
                                        
                                    </div>
                                </div>
                            </div>


                            <div style="height: 200px; " class="col-md-4 d-none d-xl-block  ">
                                <div class="row justify-center pr-3">

                                    <div class="img-fluid col-md-12 text-center "  id="fijar-img" style=" height: 150px; background-image: url('https://image.freepik.com/foto-gratis/fondo-creativo-ruleta-dados-juego-cartas-fichas-casino-sobre-fondo-oscuro_99433-24.jpg'); ">
                                        <div style="height: 150px; width: 700px; " class="col-md-12">
                                        </div>
                                    </div>

                                    <div style="height: 30px" class="col-md-12 bg-secondary text-center juego_texto " >
                                        Ruleta 

                                    </div>

                                    <div style="height: 30px" class="col-md-12 text-center botton_jugar jugar " >
                                        Fecha lanzamiento 26/12/2020
                                    </div>
                                    
                                    <div style="height: 30px" class="col-md-12 border border-dark  text-center bg-danger " id="comentario">
                                      Juego Desactivado - NO DISPONIBLE
                                    </div>
                                    
                                 

                                </div>
                            </div>

                        </div>			
                    </div>



                </div>



                <!-- Div de segundo paralax que divide con los bonos--> 
                <div id="parallax-image2">
                    <div class="row darken-60 h-100">
                        <div class="col-md-12 align-self-center">
                            <h1 class="text-center text-white ">Bonos</h1>
                        </div>
                    </div>
                </div>


                <!-- Div de bonos --> 
                <div style="height: 1200px;"  class=" row">
                    <div class="pt-5  col-12  bg-dark text-white " style="width: 100px; height: 1200px">


                        <div class=" pt-5 pb-5 px-5 justify-content-center row">
                            <div class="col-12 mt-sm-2 col-md-3   bg-dark bono text-center bono" style="height: 180px; ">
                                 </br>
                                <p>Bono Subscripcion</p>
                                <p>Suscríbete y recibe 1000 créditos gratis para jugar.</p>
                            </div>
                            <div class="col-12 mt-sm-2 col-md-3 mx-5 bg-dark bono text-center  bono" style="height: 180px; ">
                                 </br>
                                <p>Bono Deposito</p>
                                <p>Duplica tu deposito  durante tus 1000$ dolares</p>
                            </div>
                            <div class="col-12 mt-sm-2 col-md-3  bg-dark  bono text-center bono " style="height: 180px;">
                                 </br>
                                <p>Bono Afiliado</p>
                               
                                <p>Refiere a tus amigos al casino y obtener bonificaciones cuando juegan juegos.</p>
                            </div>


                        </div>
                        <h1 class="d-none d-md-block text-center pt-5 text-white ">Ultimas Jugadas</h1>
                        <div class="d-none d-md-block pt-5  pb-5 px-5 row">




                            <!-- Div de ultimas jugadas --> 	
                            <div class="col-12 col-md-8  center text-white " style="height: 600px; ">

                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fila</th>
                                            <th scope="col">id_apuesta</th>
                                            <th scope="col">id_fondo</th>
                                            <th scope="col">fecha_apuesta</th>
                                            <th scope="col">id_usuario</th>
                                            <th scope="col">balance</th>
                                            <th scope="col">modo_juego</th>		  
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <!-- PHP incrustado que saca la info a la tabla --> 
                                        <?php
                                        include 'assets/includes/conex.php';
                                        $sql = "SELECT * FROM `apuestas` ORDER BY `id_apuesta` DESC limit 12";
                                        $result = $conn->query($sql);

                                        $contador = 1;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                echo "<tr>";
                                                echo "<th scope='row'>" . $contador . "</th>";
                                                echo "<td>" . $row['id_apuesta'] . "</td>";
                                                echo "<td>" . $row['id_fondo'] . "</td>";
                                                echo "<td>" . $row['fecha_apuesta'] . "</td>";
                                                echo "<td>" . $row['id_usuario'] . "</td>";
                                                if ($row['cantidad'] > 0) {
                                                    echo "<td class='bg-success text-center'>" . $row['cantidad'] . "</td>";
                                                } else {
                                                    echo "<td class='bg-danger text-center'>" . $row['cantidad'] . "</td>";
                                                }

                                                echo "<td>" . $row['id_juego'] . "</td>";
                                                echo "</tr>";

                                                $contador++;
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>	
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

           

            <!--Boostrap y js personal -->
        <script src="assets-modal/js/jquery-1.11.1.min.js"></script>
        <script src="assets-modal/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets-modal/js/jquery.backstretch.min.js"></script>
        <script src="assets-modal/js/scripts.js"></script>
        <script src="assets/js/privado.js"></script>
        </body>
    </html>











    </body>
    </html>




    <?php
} else {
    header('Location: index.php');
    exit;
}