function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "#343a40";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0px";
    ;
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "#343a40";
}

  // ajax que conecta con alter.config por si el uusario quiere cambiar datos
$(document).ready(function () {
 $('#alterar').click(function (e) {

    $.ajax({
        type: 'POST',
        url: 'alterar_config.php',
        data: $("#formulario_config input").serialize(),
        success: function (response)
         {
             var jsonData = JSON.parse(response);

          
            if (jsonData.success == "1")
            {
           alert("datos cambiados");

           } else {
            alert("datos no cambiados");

            }
         }
        });
    });
});

  // muestra las jugadas del jugador
$(document).ready(function () {
    $('#Jugadas').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'jugadas_config.php',
            data: $("#formulario_config input").serialize(),
            success: function (response)
            {
                document.getElementById("migas_config").innerHTML = "Privado > Configuracion > Jugadas";
                document.getElementById("ajax-config").innerHTML = response;


            }
        });
    });
});


  // muestra depositos del jugador
$(document).ready(function () {
    $('#Depositos').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'depositos_config.php',
            data: $("#formulario_config input").serialize(),
            success: function (response)
            {
                document.getElementById("migas_config").innerHTML = "Privado > Configuracion > Depositos";
                document.getElementById("ajax-config").innerHTML = response;


            }
        });
    });
});


  // muestra referidos del jugador
$(document).ready(function () {
    $('#Referidos').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'referidos_config.php',
            data: $("#formulario_config input").serialize(),
            success: function (response)
            {
                document.getElementById("migas_config").innerHTML = "Privado > Configuracion > Referidos"; 
                document.getElementById("ajax-config").innerHTML = response;
               

            }
        });
    });
});

  // ejecuta los depositos
$(document).ready(function () {
    $('#Ingresar').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'ingreso_data.php',
            data: $("#formulario_config input").serialize(),
            success: function (response)
            {

                document.getElementById("ajax-config").innerHTML = response;
                document.getElementById("migas_config").innerHTML = "Privado > Configuracion > Ingresar";
                $(document).ready(function () {
                    $('#ingreso_fondo').click(function (e) {
                        
                        $.ajax({
                            type: 'POST',
                            url: 'ingresos_config.php',
                            data: $("#formulario_config input").serialize(),
                            success: function (response)
                            {
                                var jsonData = JSON.parse(response);
                                var fondos_actualizados = jsonData.success;
                                document.getElementById("fondo").innerHTML = fondos_actualizados +"€";
                                document.getElementById("ajax-config").innerHTML = "DEPOSITO REALIZADO - Redireccion en 2s";
                                setTimeout(location.reload.bind(location), 1500);
                            }
                        });
                    });
                });
            }
        });
    });
});
