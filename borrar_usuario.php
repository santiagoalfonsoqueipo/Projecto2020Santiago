 <?php
 session_start();
  
	$id_usuario = filter_input(INPUT_POST, 'id_usuario0');
        include 'assets/includes/conex.php';
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

    
 //borra los usuarios desde panel administrador con esta consulta
 $sqlu = "DELETE FROM usuarios WHERE id_usuario='$id_usuario';";
 $resultsqlu = $conn->query($sqlu);
 
   if($resultsqlu){
 	  echo json_encode(array('success' => 1));
    
  }
    else{
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
?> 
