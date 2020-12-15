 <?php
 session_start();
   


	$id_usuario = filter_input(INPUT_POST, 'id_usuario0');
	$usuario = filter_input(INPUT_POST, 'usuario0');
	$constraseña = filter_input(INPUT_POST, 'contraseña0');
	$nombre_usuario = filter_input(INPUT_POST, 'nombre_usuario0');
	$apellido = filter_input(INPUT_POST, 'apellido0');
	$email = filter_input(INPUT_POST, 'email0');
	$id_referido = filter_input(INPUT_POST, 'id_referido0');


        
        include 'assets/includes/conex.php';
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

    # agrega usuarios desde form registro

  $sql = "INSERT INTO usuarios (id_usuario, usuario, contraseña, nombre_usuario, apellido, email, id_referido) VALUES ('$id_usuario', '$usuario', '$constraseña', '$nombre_usuario', '$apellido', '$email', '$id_referido')";
  $resultsqlu = $conn->query($sql);
 
   if($resultsqlu){
 	  echo json_encode(array('success' => 1));
    
  }
    else{
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
?> 
