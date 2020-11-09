 <?php
 session_start();
   


	$id_usuario = filter_input(INPUT_POST, 'id_usuario');
	$usuario = filter_input(INPUT_POST, 'usuario');
	$constraseña = filter_input(INPUT_POST, 'contraseña');
	$nombre_usuario = filter_input(INPUT_POST, 'nombre_usuario');
	$apellido = filter_input(INPUT_POST, 'apellido');
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

 $sqlu = "UPDATE usuarios SET  usuario = '$usuario', contraseña = '$constraseña',   nombre_usuario = '$nombre_usuario', apellido = '$apellido', email = '$email',  id_referido = '$id_referido' WHERE id_usuario='$id_usuario';";
 $resultsqlu = $conn->query($sqlu);
 
   if($resultsqlu){
 	  echo json_encode(array('success' => 1));
    
  }
    else{
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
?> 
