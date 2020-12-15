 <?php
 session_start();

    # Info de login - cambiar for include conection info

	$usuario = $_POST['usuario'];
	$constraseña = $_POST['contraseña'];

        include 'assets/includes/conex.php';
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

    # comprobar datos de login
	$sql = "SELECT id_usuario, usuario, contraseña, nombre_usuario, apellido, email, id_referido FROM usuarios WHERE usuario='$usuario' AND contraseña='$constraseña'";	
    
	$result = $conn->query($sql);
    # conectar la primera consulta y guardarlo en sesiones
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$_SESSION['id_usuario'] = $row['id_usuario'];
		$_SESSION['usuario'] = $row['usuario']; 
		$_SESSION['contraseña'] = $row['contraseña']; 
                $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
		$_SESSION['apellido'] = $row['apellido'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['id_referido'] = $row['id_referido'];	
                }
      # Utilizar datos de la primera consulta para guardar los fondos de esa persona        
                $id_select = $_SESSION['id_usuario'];
                $sql2 = "SELECT cantidad FROM fondos WHERE id_usuario='$id_select' ";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    while($row = $result2->fetch_assoc()) {
                        $_SESSION['cantidad'] = $row['cantidad'];
                        
                    }
                }
                
	  echo json_encode(array('success' => 1));
    } else {
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
  


?> 
