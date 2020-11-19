 <?php
 session_start();
 
        $fondos = $_SESSION['cantidad']; 
        $id_usuario = $_SESSION['id_usuario']; 
	$ingreso = filter_input(INPUT_POST, 'cantidad_ingresar');

        $total = $fondos + $ingreso;
        
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

    # comprobar datos de login

 $sqlu = "UPDATE fondos SET   cantidad = '$total' WHERE id_usuario='$id_usuario';";
 $resultsqlu = $conn->query($sqlu);
 
   if($resultsqlu){
        
        $sqlu2 = "INSERT INTO depositos (id_fondo, id_usuario, fecha_deposito, cantidad) VALUES ('$id_usuario', '$id_usuario', CURDATE(), '$ingreso')";
        $resultsqlu2 = $conn->query($sqlu2);
        
        //$sqlu2 = "UPDATE referidos SET   id_referido = '$id_usuario',   id_referidor = '$id_referido'  where id_referido ='$id_usuario';";
        //$resultsqlu2 = $conn->query($sqlu2);
 	  echo json_encode(array('success' => $total));
    
  }
    else{
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
?> 