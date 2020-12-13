 <?php
 session_start();
 
    $data = $_SESSION['id_usuario'];
  
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
   
  $in = "INSERT INTO likes (id_usuario,id_like) values ($data, $data)";
  $resultin = $conn->query($in);     

  $sql = "select * from likes";
  $resultsqlu = $conn->query($sql);
  $contador = 0;
  
   if ($resultsqlu) {
       
      while ($row = $resultsqlu->fetch_assoc()) {
       $contador++;
      }

     echo json_encode(array('handle' =>'1', 'likes' => $contador ));
     $conn->close();
	  	  
    }
 

 
    
?> 
