 <?php
 session_start();
   $data = json_decode(stripslashes($_POST['data']));

    	   
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "web_casino";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

    

  $sql = "select * from usuarios where $data[0] = '$data[1]' ";
  $resultsqlu = $conn->query($sql);
 
   if ($resultsqlu) {
      while ($row = $resultsqlu->fetch_assoc()) {
       $array = array($row["id_usuario"],$row["usuario"],$row["contraseña"],$row["nombre_usuario"],$row["apellido"],$row["email"],$row["id_referido"]);   
      }

      echo json_encode(array('id_usuario' => $array[0], 'usuario' => $array[1], 'contraseña' => $array[2], 'nombre_usuario' => $array[3], 'apellido' => $array[4], 'email' => $array[5], 'id_referido' => $array[6] ));
		  
    } 
        $conn->close();
?> 
