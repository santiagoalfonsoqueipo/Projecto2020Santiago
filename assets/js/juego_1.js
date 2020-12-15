	
	function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
	  document.getElementById("main").style.marginLeft = "250px";
	  document.body.style.backgroundColor = "#343a40";
	}

	function closeNav() {
	  	  document.getElementById("mySidenav").style.width = "0px";;
	  document.getElementById("main").style.marginLeft= "0";
	  	  document.body.style.backgroundColor = "#343a40";
	}
	



$(document).ready(function () {
        $('#apostar').click(function (e) {
          document.getElementById("mensaje_eleccion").innerHTML = "";
          document.getElementById("mensaje_apuesta").innerHTML = "";
            $.ajax({
                type: 'POST',
                url: 'apuesta_juego1.php',
                data: $("#form_apuestas input").serialize(),
                success: function (response)
                {
                    var jsonData = JSON.parse(response);   
                    if (jsonData.success == "1"){
                        
                     var fondos_actualizados = jsonData.fondos;
                     var ganador = jsonData.ganador;
                     document.getElementById("fondo").innerHTML = fondos_actualizados +"€";
                     document.getElementById("div_resultado").innerHTML = " <h1>Resultado</h1>  </br>"+ ganador;
                     
                     switch (jsonData.jugador1) {
                        case 'tijera':
                         document.getElementById("jugador_1").innerHTML = "<img src='./assets/img/tijeras.jpg' alt='' width='360' height='500'>";
                          break;
                        case 'piedra':
                         document.getElementById("jugador_1").innerHTML = "<img src='./assets/img/piedra.jpg' alt='' width='360' height='500'>";
                          break;
                        case 'papel':
                         document.getElementById("jugador_1").innerHTML = "<img src='./assets/img/papel.jpg' alt='' width='360' height='500'>";
                          break;
                     }
 
                      switch (jsonData.jugador2) {
                        case 'tijera':
                         document.getElementById("jugador_2").innerHTML = "<img src='./assets/img/tijeras.jpg' alt='' width='360' height='500'>";
                          break;
                        case 'piedra':
                         document.getElementById("jugador_2").innerHTML = "<img src='./assets/img/piedra.jpg' alt='' width='360' height='500'>";
                          break;
                        case 'papel':
                         document.getElementById("jugador_2").innerHTML = "<img src='./assets/img/papel.jpg' alt='' width='360' height='500'>";
                          break;
                     }
                   } else {
                      
                      document.getElementById("mensaje_eleccion").innerHTML = "elige piedra,papel o tijera";
                      document.getElementById("mensaje_apuesta").innerHTML = "numero mayor de 0 y menor que tus fondos";
                   }

                }
            });
        });
 });