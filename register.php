 <?php
 session_start();


 # Guardamos datos del formulario en variables
	$usuario = filter_input(INPUT_POST, 'usuario_registro');
	$constraseña = filter_input(INPUT_POST, 'contraseña_registro');
	$nombre = filter_input(INPUT_POST, 'nombre');
	$apellido = filter_input(INPUT_POST, 'apellido');
 	$email = filter_input(INPUT_POST, 'email');
	$id_referido = filter_input(INPUT_POST, 'id_referido');
# datos de conexion cambiar por include      
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


# consulta insert de los datos
        $sql = "INSERT INTO usuarios (usuario, contraseña, nombre_usuario, apellido, email, id_referido) VALUES ('$usuario', '$constraseña', '$nombre', '$apellido', '$email', '$id_referido')";	
	$result = $conn->query($sql);

	if ($result) {
           $sq2 = "SELECT id_usuario  FROM usuarios WHERE usuario='$usuario'";
           $result2 = $conn->query($sq2);
           if ($result2->num_rows > 0) {
                    while($row = $result2->fetch_assoc()) {
                        $_SESSION['id_usuario_temporal'] = $row['id_usuario'];
                        
                    }
                }
           $usable = $_SESSION['id_usuario_temporal'];   
           $sq3 = "INSERT INTO fondos(id_usuario, id_fondo, cantidad) values('$usable','$usable', '0')";
           $result3 = $conn->query($sq3);   
           
	   echo json_encode(array('success' => 1));
		  
    } else {
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
  


?> 
