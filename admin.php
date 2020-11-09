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
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
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
                <div onclick="openNav()" id="padd" class="shadow-lg  text-center align-bottom  mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 100px";> Menu </div>
                <div  onclick="openNavr()" id="padd" class="shadow-lg  text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px";> Chat </div>
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

                    <div class=" pt-5   row justify-center" id="contenedor_juegos">


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

                            </div>


     

                    
                    
                    
                    </div>
                         <div class=" text-center text-white" style="height: 400px; ">
                            <h1  id="padd" class=" text-center text-white "  >Ganancias Diarias</h1>
                            <div class="barchartContainer bg-secondary"></div>
                        </div>
                </div>
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

<script language="JavaScript">
   function drawChart() {
      var data = google.visualization.arrayToDataTable([
         ["Divisa", "Euros"],
         ["Dia 7", 500],
         ["Dia 8", 800],
         ["Dia 9", 1000],
         ["Dia 10", 1200],
         ["Dia 11", 1400]
      ]);
      var options = { title: "Ganancias Juegos)" };
      var chart = new google.visualization.BarChart(
         document.querySelector(".barchartContainer")
      );
      chart.draw(data, options);
   }
   google.charts.setOnLoadCallback(drawChart);
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
                    exit;
                }
                else
                {
                    alert("No ha podido acceder al área privado porque sus credenciales de acceso no son válidas");
                    exit;
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
                    exit;
                }
                else
                {
                    alert("No ha podido acceder al área privado porque sus credenciales de acceso no son válidas");
                    exit;
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
                    exit;
                }
                else
                {
                    alert("No ha podido acceder al área privado porque sus credenciales de acceso no son válidas");
                    exit;
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
