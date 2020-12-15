 <?php
 session_start();
   

     //recoge los datos del formulario de panel usuario
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

    # altera los datos del usuario

 $sqlu = "UPDATE usuarios SET  usuario = '$usuario', contraseña = '$constraseña', nombre_usuario = '$nombre_usuario', apellido = '$apellido', email = '$email',  id_referido = '$id_referido' WHERE id_usuario='$id_usuario';";
 $resultsqlu = $conn->query($sqlu);
 
   if($resultsqlu){
       
 	  echo json_encode(array('success' => 1));
    
  }
    else{
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
?> 
