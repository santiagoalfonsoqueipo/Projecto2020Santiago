 <?php
 session_start();
   $data = json_decode(stripslashes($_POST['data']));

    	   
        include 'assets/includes/conex.php';
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

   //consulta  php que es ejecutada desde el input de buscador en panel administrador

   
   // utliza los datos pasandos de un select list y un imput para hacer una busqueda si hay varias coincidencias
   // lo guarda en arrays que devuelve para ser actualizado en la tabla de administrador
  $sql = "select * from usuarios where $data[0] = '$data[1]' ";
  $resultsqlu = $conn->query($sql);
  $contador = 0;
  
  $array_id_usuario = array();
  $array_usuario = array();
  $array_contraseña = array();
  $array_nombre_usuario = array();
  $array_apellido = array();
  $array_email = array();
  $array_id_referido = array();
  
   if ($resultsqlu) {
      while ($row = $resultsqlu->fetch_assoc()) {
       array_push($array_id_usuario, $row["id_usuario"]);
       array_push($array_usuario, $row["usuario"]); 
       array_push($array_contraseña, $row["contraseña"]); 
       array_push($array_nombre_usuario, $row["nombre_usuario"]); 
       array_push($array_apellido, $row["apellido"]); 
       array_push($array_email, $row["email"]); 
       array_push($array_id_referido, $row["id_referido"]); 
       $contador++;
      }

      echo json_encode(array($array_id_usuario,$array_usuario,$array_contraseña,$array_nombre_usuario, $array_apellido, $array_email, $array_id_referido,$contador));
		  
    } 
        $conn->close();
?> 
