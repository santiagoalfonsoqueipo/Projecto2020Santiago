<?php

session_start();


$eleccion = filter_input(INPUT_POST, 'eleccion');
$apuesta = filter_input(INPUT_POST, 'apuesta');
$id_usuario = $_SESSION['id_usuario'];


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
    
    $testf = "select cantidad from fondos where id_fondo = '$id_usuario'";
    $resultf = $conn->query($testf);

    if ($resultf->num_rows > 0) {
        while ($row = $resultf->fetch_assoc()) {
            $fondoscheck = $row['cantidad'];
        }
    }
    

if ($eleccion == "papel" OR $eleccion == "tijera" OR $eleccion == "piedra" && $apuesta <= $fondoscheck ) {

    $jugador2 = rand(1, 3);
    if ($jugador2 === 1) {
        $jugador2_e = "tijera";
    }
    if ($jugador2 === 2) {
        $jugador2_e = "papel";
    }
    if ($jugador2 === 3) {
        $jugador2_e = "piedra";
    }




    
    

  
        if ($eleccion === "piedra") {
            if ($jugador2_e === "tijera") {
                $ganador = "jugador";
            } elseif ($jugador2_e === "papel") {
                $ganador = "casa";
            } elseif ($jugador2_e === "piedra") {
                $ganador = "empate";
            }
        } elseif ($eleccion === "papel") {
            if ($jugador2_e === "piedra") {
                $ganador = "jugador";
            } elseif ($jugador2_e === "tijera") {
                $ganador = "casa";
            } elseif ($jugador2_e === "papel") {
                $ganador = "empate";
            }
        } elseif ($eleccion === "tijera") {
            if ($jugador2_e === "piedra") {
                $ganador = "casa";
            } elseif ($jugador2_e === "papel") {
                $ganador = "jugador";
            } elseif ($jugador2_e === "tijera") {
                $ganador = "empate";
            }
        }
        



        if ($ganador == "casa") {
            $sqlu = "UPDATE fondos SET cantidad = cantidad -$apuesta WHERE id_usuario = $id_usuario";
            $conn->query($sqlu);
            $sqlu2 = "INSERT INTO apuestas (id_juego,id_fondo,id_usuario,fecha_apuesta,cantidad) VALUES ('1', '$id_usuario', '$id_usuario', CURDATE(), '-$apuesta')";
            $conn->query($sqlu2);
        } elseif ($ganador =="empate"){
            $sqlu2 = "INSERT INTO apuestas (id_juego,id_fondo,id_usuario,fecha_apuesta,cantidad) VALUES ('1', '$id_usuario', '$id_usuario', CURDATE(), '0')";
            $conn->query($sqlu2);  
        } elseif ($ganador =="jugador") {
            $sqlu = "UPDATE fondos SET cantidad = cantidad +$apuesta WHERE id_usuario = $id_usuario";
            $conn->query($sqlu);
            $sqlu2 = "INSERT INTO apuestas (id_juego,id_fondo,id_usuario,fecha_apuesta,cantidad) VALUES ('1', '$id_usuario', '$id_usuario', CURDATE(), '$apuesta')";
            $conn->query($sqlu2);        
        }

        $sqlu3 = "select cantidad from fondos where id_fondo = '$id_usuario'";
        $resultsqlu = $conn->query($sqlu3);

        if ($resultsqlu->num_rows > 0) {
            while ($row = $resultsqlu->fetch_assoc()) {

                $fondos = $row['cantidad'];
            }
        }
    
        echo json_encode(array('success' => 1, 'ganador' => $ganador, 'fondos' => $fondos, 'jugador1' => $eleccion, 'jugador2' => $jugador2_e)); 
    
    
    
    $conn->close();
    
} else {
    echo json_encode(array('success' => 0));
}

?> 
