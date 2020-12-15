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
        
  $sql = "select * from depositos where $data[0] = '$data[1]' ";
  $resultsqlu = $conn->query($sql);
  
  $contador = 0;
  $array_id_deposito = array();
  $array_id_fondo = array();
  $array_id_usuario = array();
  $array_fecha_deposito = array();
  $array_cantidad = array();
  $array_tamaño = array();
 
    if ($resultsqlu) {
      while ($row = $resultsqlu->fetch_assoc()) {
       array_push($array_id_deposito, $row["id_deposito"]);
       array_push($array_id_fondo, $row["id_fondo"]);
       array_push($array_id_usuario, $row["id_usuario"]);
       array_push($array_fecha_deposito, $row["fecha_deposito"]);
       array_push($array_cantidad, $row["cantidad"]);       
       $contador++;
      }

      $contador--;
      array_push($array_tamaño, $contador);
      
     echo json_encode(array($array_id_deposito,$array_id_fondo,$array_id_usuario,$array_fecha_deposito,$array_cantidad,$array_tamaño));
    }
   $conn->close();
    
?> 
