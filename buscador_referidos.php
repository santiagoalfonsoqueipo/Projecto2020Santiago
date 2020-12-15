 <?php
 session_start();
   $data = json_decode(stripslashes($_POST['data']));

   
    	include 'assets/includes/conex.php';
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
        
        
 
  // consutla que es ejecutada con los datos mandados en keypress desde administrador imput buscador referido
        
 // busca coincidencias y actualiza la tabla de referidos del panel administrador
        
  $sql = "select * from referidos where $data[0] = '$data[1]' ";
  $resultsqlu = $conn->query($sql);
  
  $contador = 0;
  $array_id_referidor = array();
  $array_id_referido = array();
  $array_tamaño = array();
 
    if ($resultsqlu) {
      while ($row = $resultsqlu->fetch_assoc()) {
       array_push($array_id_referidor, $row["id_referidor"]);
       array_push($array_id_referido, $row["id_referido"]); 
       $contador++;
      }

      $contador--;
      array_push($array_tamaño, $contador);
      
     echo json_encode(array($array_id_referidor,$array_id_referido,$array_tamaño));
    }
   $conn->close();
    
?> 
