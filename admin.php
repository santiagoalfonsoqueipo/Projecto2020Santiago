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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
   google.charts.load("current", { packages: ["corechart"] });
</script>
  
    </head>
    <body>
        <!-- Menu lateral --> 
        <div id="mySidenav" class="sidenav">
           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
           <a href="info.html">info</a>
           <a href="configuracion.php">configuracion</a>
           <a href="logout.php">salir</a>
         </div>




        <!-- efectos menu lateral --> 
        <script>

            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
                document.body.style.backgroundColor = "#343a40";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0px";
                ;
                document.getElementById("main").style.marginLeft = "0";
                document.body.style.backgroundColor = "#343a40";
            }


        </script>



        <!-- Menu frontal --> 
            <div class="container-fluid" id="main">
                <div style="height: 60px;"  class=" row">
                    <div onclick="openNav()" id="padd" class="shadow-lg  text-center align-bottom  mh-100 col-sm-2  bg-dark text-white azul_borde" style="width: 100px; height: 100px";> Menu </div>
                    <div id="padd" class="shadow-lg   mh-100 col-sm-5  bg-dark text-white efecto" style="width: 100px; height: 200px"; > <a href='privado.php'">Santiago's casino</a> </div>
                    <div id="padd" class="shadow-lg text-center mh-100 col-sm-2  bg-dark  efecto text-white " style="width: 100px; height: 200px";> Bienvenido <?php echo $_SESSION['nombre_usuario']; ?></div>
                    <div id="padd" class="shadow-lg text-center mh-100 col-sm-1  bg-dark  text-white azul_borde" style="width: 100px; height: 200px";><?php echo $_SESSION['cantidad'] . "€"; ?></div>
                    <div id="padd" class="text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px"; ><a  href='configuracion.php'> Configuracion</a>  </div>
                    <div id="padd" class="text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px";> 	<a  href='logout.php'>Cerrar Sesión</a> </div>
                </div>


                <!-- Div del paralax principal --> 
                <div id="parallax-image">
                    <div class="row darken-60  h-100">
                        <div class="col-md-12 align-self-center">					
                            <h1 class="text-center text-white ">Panel de admin > </h1>
                        </div>
                    </div>
                </div>




    <!-- Inicio de blocke contenido juegos --> 
    <div style="height: 650px;"  class=" row">
        <div class=" col-sm-12   bg-dark text-white " style="height: 1250px";><h1  id="padd" class=" text-center text-white " >Usuarios</h1> 
            <div class=" pt-5   row justify-center" >
                1   

                <div class="col-12 col-md-8  center text-white " style="height: 300px; ">
                    <form id='formulario_usuarios' name='formulario_usuarios' method='post' >
                        <table  class="table table-dark">
                            <thead>
                                <tr>
                                    <th class="text-success" scope="col">id_usuario</th>
                                    <th class="text-success" scope="col">usuario</th>
                                    <th class="text-success" scope="col">contraseña</th>
                                    <th class="text-success" scope="col">nombre_usuario</th>
                                    <th class="text-success" scope="col">apellido</th>
                                    <th class="text-success" scope="col">email</th>
                                    <th class="text-success" scope="col">id_referido</th>
                                    <th class="text-success" scope="col">fondos</th>
                                </tr>
                            </thead>

                            <tbody>

                                <!-- PHP incrustado que saca la info a la tabla --> 
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "web_casino";
                                $user = $_SESSION['id_usuario'];
                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                $sql = "SELECT * FROM `usuarios` WHERE id_usuario ='$user' ";
                                $result = $conn->query($sql);

                                $contador = 1;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        echo "<tr>";
                                        echo "<th scope='row'> <input name='id_usuario'  name='id_usuario' id='id_usuario'  value='$row[id_usuario]'> </th>";
                                        echo "<td> <input  type='text' name='usuario' id='usuario' value='$row[usuario]'> </td>";
                                        echo "<td> <input type='text' name='contraseña' id='contraseña' value='$row[contraseña]'> </td>";
                                        echo "<td> <input type='text' name='nombre_usuario' id='nombre_usuario' value='$row[nombre_usuario]'> </td>";
                                        echo "<td> <input type='text' name='apellido' id='apellido' value='$row[apellido]'> </td>";
                                        echo "<td> <input type='text' name='email' id='email' value='$row[email]'> </td>";
                                        echo "<td> <input type='text' name='id_referido' id='id_referido' value='$row[id_referido]'> </td>";
                                    }
                                    # Utilizar datos de la primera consulta para guardar los fondos de esa persona        

                                    $sql2 = "SELECT cantidad FROM fondos WHERE id_usuario='$user' ";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while ($row = $result2->fetch_assoc()) {
                                            echo "<td contenteditable='true'>" . $row['cantidad'] . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                }
                                ?>

                            </tbody>

                        </table>
                        <button type="button" id="alterar">alterar</button>
                        <button type="button" id="borrar"">borrar</button>
                        <button type="button" id="agregar"">agregar</button>                              
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

                </div>



               2
                <div class=" col-sm-12   bg-dark text-white " style="height: 1250px";><h1  id="padd" class=" text-center text-white " >Referidos</h1> 
                    <div class=" pt-5   row justify-center" >


                        <div class="col-12 col-md-8  center text-white " style="height: 300px; ">
                            <form id='formulario_referidos' name='formulario_referidos' method='post' >
                                <table  class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-success" scope="col">id_referido</th>
                                            <th class="text-success" scope="col">id_referidor</th>
                                            <th class="text-success" scope="col"></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <!-- PHP incrustado que saca la info a la tabla --> 
                                        <?php
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "web_casino";
                                        $user = $_SESSION['id_usuario'];
                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        $sql = "SELECT * FROM `referidos` LIMIT 1 ";
                                        $result = $conn->query($sql);

                                        $contador = 1;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                echo "<tr>";
                                                echo "<th scope='row'><input  type='text' name='id_referido_$contador' id='id_referido_$contador' value='$row[id_referido]' disabled> </th>";
                                                echo "<td> <input  type='text' name='id_referidor_$contador' id='id_referidor_$contador' value='$row[id_referidor]'> </td>";
                                                echo "<td> ";
                                                echo " <button type='button' id='alterar_$contador'>alterar</button> <button type='button' id='borrar_$contador'>borrar</button>";
                                                echo "</td>";
                                                echo "</tr>";
                                                $contador++;
                                            }
                                        }
                                        echo "<tr>";
                                        echo "<th scope='row'> <input name='id_referidoi'  name='id_referidoi' id='id_referido'  value=''> </th>";
                                        echo "<td> <input  type='text' name='id_referidori' id='id_referidori' value=''> </td>";
                                        echo "<td> ";
                                        echo " <button type='button' id='agregar'>agregar</button> ";
                                        echo "</td>";
                                        echo "</tr>";
                                        ?>

                                    </tbody>

                                </table>

                            </form>
                            </br>                       
                    <select name="usuarios-list" id="referidos-list">
                        <option value="id_referido">id_referido</option>
                        <option value="id_referidor">id_referidor</option>                                     
                    </select>                           

                    <input type='text' id="referidos-buscador"> 


                        </div>
 
                3
                <div class=" col-sm-12   bg-dark text-white " style="height: 1250px";><h1  id="padd" class=" text-center text-white " >Juegos</h1> 
                    <div class=" pt-5   row justify-center" >


                        <div class="col-12 col-md-8  center text-white " style="height: 300px; ">
                            <form id='formulario_referidos' name='formulario_referidos' method='post' >
                                <table  class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-success" scope="col">id_juego</th>
                                            <th class="text-success" scope="col">nombre_juego</th>
                                            <th class="text-success" scope="col"></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <!-- PHP incrustado que saca la info a la tabla --> 
                                        <?php
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "web_casino";
                                        $user = $_SESSION['id_usuario'];
                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        $sql = "SELECT * FROM `juegos` LIMIT 1 ";
                                        $result = $conn->query($sql);

                                        $contador = 1;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                echo "<tr>";
                                                echo "<th scope='row'><input  type='text' name='id_juego_$contador' id='id_juego_$contador' value='$row[id_juego]' disabled> </th>";
                                                echo "<td> <input  type='text' name='nombre_juego_$contador' id='nombre_juego_$contador' value='$row[nombre_juego]'> </td>";
                                                echo "<td> ";
                                                echo " <button type='button' id='alterar_juegos_$contador'>alterar</button> <button type='button' id='borrar_juegos_$contador'>borrar</button>";
                                                echo "</td>";
                                                echo "</tr>";
                                                $contador++;
                                            }
                                        }
                                        echo "<tr>";
                                        echo "<th scope='row'> <input name='id_juegoi'  name='id_referidoi' id='id_referido'  value=''> </th>";
                                        echo "<td> <input  type='text' name='nombre_juegoi' id='id_referidori' value=''> </td>";
                                        echo "<td> ";
                                        echo " <button type='button' id='agregar'>agregar</button> ";
                                        echo "</td>";
                                        echo "</tr>";
                                        ?>

                                    </tbody>

                                </table>

                            </form>
                            </br>                       
                        </div>                        

                4
                <div class=" col-sm-12   bg-dark text-white " style="height: 1250px";><h1  id="padd" class=" text-center text-white " >Fondos</h1> 
                    <div class=" pt-5   row justify-center" >


                        <div class="col-12 col-md-8  center text-white " style="height: 300px; ">
                            <form id='formulario_referidos' name='formulario_referidos' method='post' >
                                <table  class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-success" scope="col">id_fondo</th>
                                            <th class="text-success" scope="col">id_usuario</th>
                                            <th class="text-success" scope="col">cantidad</th>
                                            <th class="text-success" scope="col"></th>                                           
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <!-- PHP incrustado que saca la info a la tabla --> 
                                        <?php
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "web_casino";
                                        $user = $_SESSION['id_usuario'];
                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        $sql = "SELECT * FROM `fondos` LIMIT 1 ";
                                        $result = $conn->query($sql);

                                        $contador = 1;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                echo "<tr>";
                                                echo "<th scope='row'><input  type='text' name='id_fondo_$contador' id='id_fondo_$contador' value='$row[id_fondo]' disabled> </th>";
                                                echo "<td> <input  type='text' name='id_usuario_$contador' id='id_usuario_$contador' value='$row[id_usuario]'> </td>";
                                                echo "<td> <input  type='text' name='cantidad_$contador' id='cantidad_$contador' value='$row[cantidad]'> </td>";                                                
                                                echo "<td> ";
                                                echo " <button type='button' id='alterar_fondos_$contador'>alterar</button> <button type='button' id='borrar_fondos_$contador'>borrar</button>";
                                                echo "</td>";
                                                echo "</tr>";
                                                $contador++;
                                            }
                                        }
                                        echo "<tr>";
                                        echo "<th scope='row'> <input  name='id_fondoi' id='id_fondooi'  value=''> </th>";
                                        echo "<td> <input  type='text' name='id_usuarioi' id='id_usuarioi' value=''> </td>";
                                        echo "<td> <input  type='text' name='cantidadi' id='cantidadi' value=''> </td>";                                       
                                        echo "<td> ";
                                        echo " <button type='button' id='agregar'>agregar</button> ";
                                        echo "</td>";
                                        echo "</tr>";
                                        ?>

                                    </tbody>

                                </table>

                            </form>
                            </br>                       
                        </div>                         
                        
                5
                <div class=" col-sm-12   bg-dark text-white " style="height: 1250px";><h1  id="padd" class=" text-center text-white " >depositos</h1> 
                    <div class=" pt-5   row justify-center" >


                        <div class="col-12 col-md-8  center text-white " style="height: 300px; ">
                            <form id='formulario_referidos' name='formulario_referidos' method='post' >
                                <table  class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-success" scope="col">id_deposito</th>
                                            <th class="text-success" scope="col">id_fondo</th>
                                            <th class="text-success" scope="col">fecha_deposito</th>
                                            <th class="text-success" scope="col">cantidad</th>                                            
                                            <th class="text-success" scope="col"></th>                                           
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <!-- PHP incrustado que saca la info a la tabla --> 
                                        <?php
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "web_casino";
                                        $user = $_SESSION['id_usuario'];
                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        $sql = "SELECT * FROM `depositos` LIMIT 1 ";
                                        $result = $conn->query($sql);

                                        $contador = 1;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                echo "<tr>";
                                                echo "<th scope='row'><input  type='text' name='id_deposito_$contador' id='id_deposito_$contador' value='$row[id_deposito]' disabled> </th>";
                                                echo "<td> <input  type='text' name='id_fondo_$contador' id='id_fondo_$contador' value='$row[id_fondo]'> </td>";
                                                echo "<td> <input  type='text' name='fecha_deposito_$contador' id='fecha_deposito_$contador' value='$row[fecha_deposito]'> </td>";
                                                echo "<td> <input  type='text' name='cantidad_$contador' id='cantidad_$contador' value='$row[cantidad]'> </td>";                                                 
                                                echo "<td> ";
                                                echo " <button type='button' id='alterar_depositos_$contador'>alterar</button> <button type='button' id='borrar_depositos_$contador'>borrar</button>";
                                                echo "</td>";
                                                echo "</tr>";
                                                $contador++;
                                            }
                                        }
                                        echo "<tr>";
                                        echo "<th scope='row'> <input  name='id_depositoi' id='id_depositoi'  value=''> </th>";
                                        echo "<td> <input  type='text' name='id_fondoi' id='id_fondoi' value=''> </td>";
                                        echo "<td> <input  type='text' name='fecha_depositoi' id='fecha_depositoi' value=''> </td>";
                                        echo "<td> <input  type='text' name='cantidadi' id='cantidadi' value=''> </td>";                                           
                                        echo "<td> ";
                                        echo " <button type='button' id='agregar'>agregar</button> ";
                                        echo "</td>";
                                        echo "</tr>";
                                        ?>

                                    </tbody>

                                </table>

                            </form>
                            </br>                       
                        </div>  

                6
                <div class=" col-sm-12   bg-dark text-white " style="height: 1250px";><h1  id="padd" class=" text-center text-white " >apuestas</h1> 
                    <div class=" pt-5   row justify-center" >


                        <div class="col-12 col-md-8  center text-white " style="height: 300px; ">
                            <form id='formulario_referidos' name='formulario_referidos' method='post' >
                                <table  class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-success" scope="col">id_fondo</th>
                                            <th class="text-success" scope="col">id_usuario</th>
                                            <th class="text-success" scope="col">cantidad</th>
                                            <th class="text-success" scope="col"></th>                                           
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <!-- PHP incrustado que saca la info a la tabla --> 
                                        <?php
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "web_casino";
                                        $user = $_SESSION['id_usuario'];
                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        $sql = "SELECT * FROM `fondos` LIMIT 1 ";
                                        $result = $conn->query($sql);

                                        $contador = 1;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                echo "<tr>";
                                                echo "<th scope='row'><input  type='text' name='id_fondo_$contador' id='id_fondo_$contador' value='$row[id_fondo]' disabled> </th>";
                                                echo "<td> <input  type='text' name='id_usuario_$contador' id='id_usuario_$contador' value='$row[id_usuario]'> </td>";
                                                echo "<td> <input  type='text' name='cantidad_$contador' id='cantidad_$contador' value='$row[cantidad]'> </td>";                                                
                                                echo "<td> ";
                                                echo " <button type='button' id='alterar_fondos_$contador'>alterar</button> <button type='button' id='borrar_fondos_$contador'>borrar</button>";
                                                echo "</td>";
                                                echo "</tr>";
                                                $contador++;
                                            }
                                        }
                                        echo "<tr>";
                                        echo "<th scope='row'> <input  name='id_fondoi' id='id_fondooi'  value=''> </th>";
                                        echo "<td> <input  type='text' name='id_usuarioi' id='id_usuarioi' value=''> </td>";
                                        echo "<td> <input  type='text' name='cantidadi' id='cantidadi' value=''> </td>";                                       
                                        echo "<td> ";
                                        echo " <button type='button' id='agregar'>agregar</button> ";
                                        echo "</td>";
                                        echo "</tr>";
                                        ?>

                                    </tbody>

                                </table>

                            </form>
                            </br>                       
                        </div>  





                                    <!-- Footer--> 
                <div class=" fixed-bottom pie pt-5  pb-5 px-5 row">
                    <div class=" fixed-bottom col-sm-12  text-center bg-secondary  text-white " style="height: 30px; ">
                        Bandera idioma / Politica de privacidad, terminos de uso, provably fair </div>
                </div>

            </div>







        </div>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
    </body>
</html>
        <script src="assets-modal/js/jquery-1.11.1.min.js"></script>
        <script src="assets-modal/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets-modal/js/jquery.backstretch.min.js"></script>
        <script src="assets-modal/js/scripts.js"></script>



<script type="text/javascript">
$(document).ready(function() {
    $('#usuario_buscador').keyup(function(e) {
        var e = document.getElementById("usuarios-list");
        var c = document.getElementById("usuario_buscador");
        var value = e.options[e.selectedIndex].value;
        var text = c.value;
        var datos = [value, text];
        var jsonString = JSON.stringify(datos);
        $.ajax({
            type: 'POST',
            url: 'buscador_usuario.php',
            data: {data : jsonString}, 
            success: function(response)
            {
                  var jsonData = JSON.parse(response);
                  document.getElementById("id_usuario").value = jsonData.id_usuario;
                  document.getElementById("usuario").value = jsonData.usuario;                   
                  document.getElementById("contraseña").value = jsonData.contraseña;             
                  document.getElementById("nombre_usuario").value = jsonData.nombre_usuario;
                  document.getElementById("apellido").value = jsonData.apellido;
                  document.getElementById("email").value = jsonData.email;
                  document.getElementById("id_referido").value = jsonData.id_referido;                 
           }
       });
     });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#referidos-buscador').keyup(function(e) {
        var e = document.getElementById("referidos-list");
        var c = document.getElementById("referidos-buscador");
        var value = e.options[e.selectedIndex].value;
        var text = c.value;
        var datos = [value, text];
        var jsonString = JSON.stringify(datos);
        $.ajax({
            type: 'POST',
            url: 'buscador_referidos.php',
            data: {data : jsonString}, 
            success: function(response)
            {
               var jsonData = JSON.parse(response);
               if (jsonData.handle == "1")
                {
                  document.getElementById("id_referidor_1").value = jsonData.id_referidor;
                  document.getElementById("id_referido_1").value = jsonData.id_referido;   
                } else {
                    alert(response);
                    
                }
                                
           }
       });
     });
});
</script>





<script type="text/javascript">
$(document).ready(function() {
    $('#alterar').click(function(e) {
     		
        $.ajax({
            type: 'POST',
            url: 'alterar_usuario.php',
            data:$("#formulario_usuarios input").serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    alert("ok");
                   
                }
                else
                {
                    alert("No ha podido acceder al área privado porque sus credenciales de acceso no son válidas");
                    
                }
           }
       });
     });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#borrar').click(function(e) {
     		
        $.ajax({
            type: 'POST',
            url: 'borrar_usuario.php',
            data:$("#formulario_usuarios input").serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    alert("ok");
                    
                }
                else
                {
                    alert("No ha podido acceder al área privado porque sus credenciales de acceso no son válidas");
                    
                }
           }
       });
     });
});
</script>
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#agregar').click(function(e) {
     		
        $.ajax({
            type: 'POST',
            url: 'agregar_usuario.php',
            data:$("#formulario_usuarios input").serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    alert("ok");
                    
                }
                else
                {
                    alert("No ha podido acceder al área privado porque sus credenciales de acceso no son válidas");
                    
                }
           }
       });
     });
});
</script>


<script type="text/javascript">
$(document).ready(function() {	
    $('#alterar_1').click(function(e) {
    	 var id_referido = $('#id_referido_1').val();
         var id_referidor = $('#id_referidor_1').val();
        $.ajax({
            type: 'POST',
            url: 'editar_referidos.php',       
            data: {"id_referido":id_referido,"id_referidor":id_referidor},
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    alert("ok");
                    
                }
                else
                {
                    alert("No ha podido acceder al área privado porque sus credenciales de acceso no son válidas");
                    
                }
           }
       });
     });
});
</script>
<script type="text/javascript">
$(document).ready(function() {	
    $('#borrar_1').click(function(e) {
    	 var id_referido = $('#id_referido_1').val();
        $.ajax({
            type: 'POST',
            url: 'borrar_referidos.php',       
            data: {"id_referido":id_referido},
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    alert("ok");
                    
                }
                else
                {
                    alert("No ha podido acceder al área privado porque sus credenciales de acceso no son válidas");
                    
                }
           }
       });
     });
});
</script>

<?php
}
else{
    header('Location: index.php');
    exit;
}
