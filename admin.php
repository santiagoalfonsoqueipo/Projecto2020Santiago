<?php
session_start();
 if ($_SESSION['usuario'] == 'admin'){
 


        
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
        <link rel="stylesheet" href="./assets/css/admin.css">       
        <!-- js para menu CSS -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  
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
                    <div onclick="openNav()" id="padd" class="shadow-lg  text-center align-bottom  mh-100 col-12 col-sm-2  bg-dark text-white azul_borde" style="width: 100px; height: 100px";> Menu </div>               
                    <div id="padd" class="d-none d-md-block shadow-lg   mh-100 col-sm-5  bg-dark text-white efecto" style="width: 100px; height: 200px"; > <a href='privado.php'">Santiago's casino</a> </div>
                    <div id="padd" class="d-none d-md-block shadow-lg text-center mh-100 col-sm-2  bg-dark  efecto text-white " style="width: 100px; height: 200px";> Bienvenido <?php echo $_SESSION['nombre_usuario']; ?></div>
                    <div id="fondo" class="d-none d-md-block shadow-lg text-center mh-100 col-sm-1  bg-dark  text-white azul_borde" style="width: 100px; height: 200px";><?php echo $_SESSION['cantidad'] . "€"; ?></div>
                    <div id="padd" class="d-none d-md-block text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px"; ><a  href='configuracion.php'> Configuracion</a>  </div>
                    <div id="padd" class="d-none d-md-block text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px";> 	<a  href='logout.php'>Salir</a> </div>
                </div>
            </div>

                <!-- Div del paralax principal --> 
                <div id="parallax-image">
                    <div class="row darken-60  h-100">
                        <div class="col-md-12 align-self-center">					
                            <h1 class="text-center text-white ">Panel de admin > </h1>
                        </div>
                    </div>
                </div>


   
                <div style="height: 650px;"  class=" row">
                        <div class=" col-sm-12   bg-dark text-white " style="height: 400px";><h1  id="padd" class=" text-center text-white " >Panel de Administracion</h1> 
                            <div id="migas_config">Admin > Configuracion > Usuarios
                            </div>  
                            <div class=" pt-5   row justify-center" id="contenedor_juegos">

                                <div class="col-12 col-md-12  text-white " style="height: 1000px; "> 
                                    <div class="row justify-center">
                                        <div class=" col-12 col-md-1 conta  contenido float">

                                            <div class="link text"id="Usuarios" onclick="window.location.reload();">Usuarios</div>
                                            <div class="link text" id="Referidos">Referidos</div>
                                            <div class="link text" id="Apuestas">Apuestas</div>
                                            <div class="link text" id="Depositos">Depositos</div>
                                            <div class="link text" id="Fondos">Fondos</div>
                                            <div class="link text" id="Likes">Likes</div>
                                            <div class="link text" id="Juegos">Juegos</div>                                              
                                        </div>

                                        <div class=" col-md-10  conta   contenido" >
                                            <div class="col-12 float-left ajax-config" id="ajax-config">
                                                <form  id='formulario_usuarios'  name='formulario_usuarios' method='post' >
                                                <table  class="  table table-dark">
                                                <thead>
                                                <tr>
                                                <th class="text-success" scope="col">id_usuario</th>
                                                <th class="text-success" scope="col">usuario</th>
                                                <th class="text-success" scope="col">contraseña</th>
                                                <th class="text-success" scope="col">nombre_usuario</th>
                                                <th class="text-success" scope="col">apellido</th>
                                                <th class="text-success" scope="col">email</th>
                                                <th class="text-success" scope="col">id_referido</th>
                                                </tr>
                                                </thead>

                                                <tbody>

                                                <!-- PHP incrustado que saca la info a la tabla --> 
                                                <?php
                                                include 'assets/includes/conex.php';

                                                // Create connection
                                                $sql = "SELECT * FROM `usuarios`  ";
                                                $result = $conn->query($sql);

                                                $contador = 0;
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {

                                                        echo "<tr>";
                                                        echo "<td scope='row'> <input name='id_usuario$contador' id='id_usuario$contador'  value='$row[id_usuario]'> </td>";
                                                        echo "<td> <input  name='usuario$contador' id='usuario$contador' value='$row[usuario]'> </td>";
                                                        echo "<td> <input  name='contraseña$contador' id='contraseña$contador' value='$row[contraseña]'> </td>";
                                                        echo "<td> <input  name='nombre_usuario$contador' id='nombre_usuario$contador' value='$row[nombre_usuario]'> </td>";
                                                        echo "<td> <input  name='apellido$contador' id='apellido$contador' value='$row[apellido]'> </td>";
                                                        echo "<td> <input  name='email$contador' id='email$contador' value='$row[email]'> </td>";
                                                        echo "<td> <input  name='id_referido$contador' id='id_referido$contador' value='$row[id_referido]'> </td>";
                                                        echo "</tr>";

                                                        $contador++;
                                                    }
                                                }
                                                ?>

                                                </tbody>

                                                </table>
                                                <button type="button" id="alterar">alterar</button>
                                                <button type="button" id="borrar">borrar</button>
                                                <button type="button" id="agregar">agregar</button>                              
                                                </form>
                                                </br> 
                                                <select name="usuarios-list" id="usuarios-list">
                                                <option value="id_usuario">id_usuario</option>
                                                <option value="usuario">usuario</option>
                                                <option value="contraseña">contraseña</option>
                                                <option value="nombre_usuario">nombre_usuario</option>
                                                <option value="apellido">apellido</option>
                                                <option value="email">email</option> 
                                                <option value="id_referido">id_referido</option>                                      
                                                </select>                           

                                                <input type='text' id="usuario_buscador"> 
                                                <div id="alerta_usuarios">
                                                </div>                                          
                                            </div>   
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>



                </div>
                
                
                
<!-- Footer--> 
  <div class=" fixed-bottom pie  row">
    <div class=" fixed-bottom col-sm-12  text-center bg-secondary  text-white " style="height: 30px; ">
        <p>Derechos Reservados para nombre Digital Multigames S.L 2020©  <a href="sitemap.html">Sitemap</a> </p>
    </div>

</div>


        
   </body>
</html>

<script src="assets-modal/js/jquery-1.11.1.min.js"></script>
<script src="assets-modal/bootstrap/js/bootstrap.min.js"></script>
<script src="assets-modal/js/jquery.backstretch.min.js"></script>
<script src="assets-modal/js/scripts.js"></script>
<script src="assets/js/admin.js"></script>



<?php
}
else{
    header('Location: index.php');
    exit;
}
