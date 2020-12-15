 <?php
 session_start();
 
    $data = $_SESSION['id_usuario'];
  
    include 'assets/includes/conex.php';
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
  
        
  // inserta en likes una consulta que al ser unica, solo existe una vez por usuario que clike
  $in = "UPDATE likes set id_like = 2 where id_usuario = '$data'";
  $resultin = $conn->query($in);    
  
  // ve cuantos likes hay y los devuelve en array json para editar el innerhtml de div likes en index
  $sql = "select * from likes where id_like = '1'";
  $resultsqlu = $conn->query($sql);
  $contadorlikes = 0;
  
   if ($resultsqlu) {
       
      while ($row = $resultsqlu->fetch_assoc()) {
       $contadorlikes++;
      }
    }
   // ve cuantos dlikes hay y los devuelve en array json para editar el innerhtml de div likes en index   
  $sql2 = "select * from likes where id_like = '2'";
  $resultsqlu2 = $conn->query($sql2);
  $contadordlikes = 0;  
    
   if ($resultsqlu2) {
       
      while ($row = $resultsqlu2->fetch_assoc()) {
       $contadordlikes++;
      }  
    }
     echo json_encode(array('handle' =>'1', 'likes' => $contadorlikes,'dlikes' => $contadordlikes ));
     $conn->close();
	  	  
    
 

 
    
?> 
