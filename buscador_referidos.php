 <?php
 session_start();
   $data = json_decode(stripslashes($_POST['data']));

   
    	   
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

    

  $sql = "select * from referidos where $data[0] = '$data[1]' ";
  $resultsqlu = $conn->query($sql);
 
   if ($resultsqlu) {
       
      while ($row = $resultsqlu->fetch_assoc()) {
       $array = array($row["id_referidor"],$row["id_referido"]);   
      }

     echo json_encode(array('handle' => 1, 'id_referidor' => $array[0], 'id_referido' => $array[1] ));
     $conn->close();
	  	  
    }
 
    
?> 
