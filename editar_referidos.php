 <?php
 session_start();
   


	$id_referido = $_POST['id_referido'];
	$id_referidor = $_POST['id_referidor'];
   
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

 $sqlu = "UPDATE referidos SET id_referidor = $id_referidor where id_referido = $id_referido";
 $resultsqlu = $conn->query($sqlu);
 
   if($resultsqlu){
       
 	  echo json_encode(array('success' => 1));
    
  }
    else{
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
?> 
