<?php
session_start();
if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {

    if ($_SESSION['usuario'] == 'admin') {
        header('Location: admin.php');
        exit;
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
                            <h1 class="text-center text-white ">Perfil de <?php echo $_SESSION['nombre_usuario']; ?> </h1>
                        </div>
                    </div>
                </div>




                <!-- Inicio de blocke contenido juegos --> 
                <div style="height: 650px;"  class=" row">
                    <div class=" col-sm-12   bg-dark text-white " style="height: 650px";><h1  id="padd" class=" text-center text-white " >Sus datos</h1> 

                        <div class=" pt-5   row justify-center" id="contenedor_juegos">

                            <div class="col-12 col-md-8  center text-white " style="height: 600px; ">

                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">id_usuario</th>
                                            <th scope="col">usuario</th>
                                            <th class="text-success" scope="col">contraseña</th>
                                            <th scope="col">nombre_usuario</th>
                                            <th scope="col">apellido</th>
                                            <th class="text-success" scope="col">email</th>
                                            <th class="text-success" scope="col">id_referido</th>
                                            <th scope="col">fondos</th>
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
                                        
                                        $php_id = $_COOKIE["id_cookie"];
                                        $php_contra = $_COOKIE["contra_cokie"];
                                        $php_email = $_COOKIE["email_cookie"];
                                        $php_id_ref = $_COOKIE["id_referido_cookie"];
          
                                        $sqlu = "UPDATE usuarios SET contraseña = '$php_contra', email = '$php_email', id_referido = '$php_id_ref'  WHERE id_usuario='$php_id';";
                                        $resultsqlu = $conn->query($sqlu);
                                        
                                        $contador = 1;
                                        
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                echo "<tr>";
                                                echo "<th id='id_cookie' scope='row'>" . $row['id_usuario'] . "</th>";
                                                echo "<td>" . $row['usuario'] . "</td>";
                                                echo "<td id='contraseña_cookie' contenteditable='true' >" . $row['contraseña'] . "</td>";
                                                echo "<td>" . $row['nombre_usuario'] . "</td>";
                                                echo "<td>" . $row['apellido'] . "</td>";
                                                echo "<td id='email_cookie' contenteditable='true' >" . $row['email'] . "</td>";
                                                echo "<td id='id_referido_cookie' contenteditable='true'>" . $row['id_referido'] . "</td>";
                                            }
                                            # Utilizar datos de la primera consulta para guardar los fondos de esa persona        

                                            $sql2 = "SELECT cantidad FROM fondos WHERE id_usuario='$user' ";
                                            $result2 = $conn->query($sql2);
                                            if ($result2->num_rows > 0) {
                                                while ($row = $result2->fetch_assoc()) {
                                                    echo "<td>" . $row['cantidad'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <div class=" text-center text-white ">
                                    <button type="button" id="guardar" >Guardar datos</button>
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
                <div   class=" row">
                    <div class="pt-5  col-12  bg-dark text-white " style="width: 100px; height: 400px">


                        <div class=" pt-5 pb-5 px-5 justify-content-center row">
                            <div class="col-12 mt-sm-2 col-md-3   bg-dark bono text-center bono" style="height: 180px; ">
                                <p>Bono Subscripcion</p>
                                <p>Suscríbete y recibe 1000 créditos gratis para jugar.</p>
                            </div>
                            <div class="col-12 mt-sm-2 col-md-3 mx-5 bg-dark bono text-center  bono" style="height: 180px; ">
                                <p>Bono Deposito</p>
                                <p>Duplica tu deposito  durante tus 1000$ dolares</p>
                            </div>
                            <div class="col-12 mt-sm-2 col-md-3  bg-dark  bono text-center bono " style="height: 180px;">
                                <p>Bono Afiliado</p>
                                <p>Refiere a tus amigos al casino y obtener bonificaciones cuando juegan juegos.</p>
                            </div>









                        </div>

                        <!-- Footer--> 
                        <div class=" fixed-bottom pie pt-5  pb-5 px-5 row">
                            <div class=" fixed-bottom col-sm-12  text-center bg-secondary  text-white " style="height: 30px; ">
                                Bandera idioma / Politica de privacidad, terminos de uso, provably fair </div>
                        </div>

                    </div>


                </div>





            </div>



            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

       
        <script>
        function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }
        
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }

        document.getElementById('guardar').onclick = function() {
           primerak = document.getElementById('id_cookie').innerHTML;
           dato1 = document.getElementById('contraseña_cookie').innerHTML;
           dato2 = document.getElementById('email_cookie').innerHTML;
           dato3 = document.getElementById('id_referido_cookie').innerHTML;
           setCookie('id_cookie',primerak,1);
           setCookie('contra_cokie',dato1,1);
           setCookie('email_cookie',dato2,1);
           setCookie('id_referido_cookie',dato3,1);
           location.reload();
        }
         </script>
         
        </body>
    </html>






    <?php
} else {
    header('Location: index.php');
    exit;
}