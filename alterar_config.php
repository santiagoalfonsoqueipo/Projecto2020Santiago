 <?php
 session_start();
   

        $id_usuario = $_SESSION['id_usuario']; 
	$constraseña = filter_input(INPUT_POST, 'contraseña');
	$email = filter_input(INPUT_POST, 'email');
	$id_referido = filter_input(INPUT_POST, 'id_referido');


        
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

 $sqlu = "UPDATE usuarios SET   contraseña = '$constraseña',   email = '$email',  id_referido = '$id_referido' WHERE id_usuario='$id_usuario';";
 $resultsqlu = $conn->query($sqlu);
 
   if($resultsqlu){
        
        $sqlu2 = "UPDATE referidos SET   id_referido = '$id_usuario',   id_referidor = '$id_referido'  where id_referido ='$id_usuario';";
         $resultsqlu2 = $conn->query($sqlu2);
 	  echo json_encode(array('success' => 1));
    
  }
    else{
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
?> 


