 <?php
 session_start();
   
      include 'assets/includes/conex.php';
      	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
      
        // loopea entre todos los datos posibles mandados desde los diferentes botones del panel administrador
       for ($i = 1; $i < 10; $i++) {
            $id_referido = $_POST['id_referido'];
            $id_referidor = $_POST['id_referidor'];
            $sqlu = "UPDATE  referidos SET id_referidor = $id_referidor where id_referido = $id_referido ";
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
