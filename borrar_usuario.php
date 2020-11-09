 <?php
 session_start();
  
	$id_usuario = filter_input(INPUT_POST, 'id_usuario');
   
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
