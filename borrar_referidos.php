 <?php
 session_start();
   
      include 'assets/includes/conex.php';
      	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
      
        // lopea entre todos los botones del formulario referidos para ver cual ha querido borrar
       for ($i = 1; $i < 10; $i++) {
           $id_referido = $_POST['id_referido'];
            $sqlu = "DELETE FROM referidos WHERE id_referido = $id_referido ";
            $resultsqlu = $conn->query($sqlu);
       }
	

  
 
   if($resultsqlu){
       
 	  echo json_encode(array('success' => 1));
    
  }
    else{
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
?> 
