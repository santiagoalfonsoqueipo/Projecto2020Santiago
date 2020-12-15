 <?php
 session_start();
   

        $id_usuario = $_SESSION['id_usuario']; 
	$constraseña = filter_input(INPUT_POST, 'contraseña');
	$email = filter_input(INPUT_POST, 'email');
	$id_referido = filter_input(INPUT_POST, 'id_referido');


        
        include 'assets/includes/conex.php';
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

    #  altera los datos mandados desde el panel del usuario

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


