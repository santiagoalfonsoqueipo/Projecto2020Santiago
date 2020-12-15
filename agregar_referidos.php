 <?php
 session_start();
   
        include 'assets/includes/conex.php';
        
	$id_referido = filter_input(INPUT_POST, 'id_referido');
        $id_referidor = filter_input(INPUT_POST, 'id_referidor');
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

    # comprobar datos de login
 // consulta que borra referidos desde panel administrador con esta consulta
 $sqlu = "INSERT INTO referidos (id_referido,id_referidor) VALUES ($id_referido,$id_referidor)";
 $resultsqlu = $conn->query($sqlu);
 
   if($resultsqlu){
       
 	  echo json_encode(array('success' => 1));
    
  }
    else{
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
?> 
