 <?php
 session_start();



	$usuario = $_POST['usuario_registro'];
	$constraseña = $_POST['contraseña_registro'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
 	$email = $_POST['email'];
	$id_referido = $_POST['id_referido'];
        
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



        $sql = "INSERT INTO usuarios (usuario, contraseña, nombre_usuario, apellido, email, id_referido) VALUES ('$usuario', '$constraseña', '$nombre', '$apellido', '$email', '$id_referido')";	
    
	$result = $conn->query($sql);

	if ($result) {
	   echo json_encode(array('success' => 1));
		  
    } else {
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
  


?> 
