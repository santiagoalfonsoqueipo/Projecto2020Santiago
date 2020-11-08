 <?php
 session_start();



	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];

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



	$sql = "SELECT id_usuario, usuario, contrasena, nombre, apellidos, email, fondos, divisa  FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";	
    
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$_SESSION['id_usuario'] = $row['id_usuario'];
		$_SESSION['usuario'] = $row['usuario']; 
		$_SESSION['contrasena'] = $row['contrasena']; 
	    $_SESSION['nombre'] = $row['nombre'];
		$_SESSION['apellidos'] = $row['apellidos'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['fondos'] = $row['fondos'];
		$_SESSION['divisa'] = $row['divisa'];

		
		}
	  echo json_encode(array('success' => 1));
    } else {
	    echo json_encode(array('success' => 0));
	}
        $conn->close();
   
  


?> 
