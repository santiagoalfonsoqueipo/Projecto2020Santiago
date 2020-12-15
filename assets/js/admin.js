// Funcion que busca y edita la tabla de usuarios administrador //

// almacena los datos selecionados de una Lista y un Input, realiza una busqueda y segun tamaño de la busqueda cambia
// contenidos de la tabla que ha sido insertada con response en ajax //
$(document).ready(function () {
    $('#usuario_buscador').keyup(function (e) {
        var e = document.getElementById("usuarios-list");
        var c = document.getElementById("usuario_buscador");
        var value = e.options[e.selectedIndex].value;
        var text = c.value;
        var datos = [value, text];
        var jsonString = JSON.stringify(datos);
        $.ajax({
            type: 'POST',
            url: 'buscador_usuario.php',
            data: {data: jsonString},
            success: function (response)
            {

                var jsonData = JSON.parse(response);


                for (i = 0; i < 4; ++i) {
                    document.getElementById("id_usuario" + i).value = jsonData[0][i];
                    document.getElementById("usuario" + i).value = jsonData[1][i];
                    document.getElementById("contraseña" + i).value = jsonData[2][i];
                    document.getElementById("nombre_usuario" + i).value = jsonData[3][i];
                    document.getElementById("apellido" + i).value = jsonData[4][i];
                    document.getElementById("email" + i).value = jsonData[5][i];
                    document.getElementById("id_referido" + i).value = jsonData[6][i];
                }

                for (i = 0; i < 4; ++i) {
                document.getElementById("id_usuario" + i).style.background = 'orange';
                document.getElementById("usuario" + i).style.background = 'orange';
                document.getElementById("contraseña" + i).style.background = 'orange';
                document.getElementById("nombre_usuario" + i).style.background = 'orange';
                document.getElementById("apellido" + i).style.background = 'orange';
                document.getElementById("email" + i).style.background = 'orange';
                document.getElementById("id_referido" + i).style.background = 'orange';
                }
            }
        });
    });


 // funcion que keyup que guarda los valores de una lista y input para hacer una consulta devuelve tamnaño de la consulta
 // y edita los campos de la tabla con la consulta
    $('#apuestas-buscador').keyup(function (e) {
        var e = document.getElementById("apuestas-list");
        var c = document.getElementById("apuestas-buscador");
        var value = e.options[e.selectedIndex].value;
        var text = c.value;
        var datos = [value, text];
        var jsonString = JSON.stringify(datos);
        $.ajax({
            type: 'POST',
            url: 'buscador_apuestas.php',
            data: {data: jsonString},
            success: function (response)
            {
               var jsonData = JSON.parse(response);


                for (i = 0; i <= jsonData[6][0]; ++i) {
                document.getElementById("id_apuesta" + i).value = jsonData[0][i];
                document.getElementById("id_juego" + i).value = jsonData[1][i];
                document.getElementById("id_fondo" + i).value = jsonData[2][i];
                document.getElementById("id_usuario" + i).value = jsonData[3][i];
                document.getElementById("fecha_apuesta" + i).value = jsonData[4][i];
                document.getElementById("cantidad" + i).value = jsonData[5][i];               
                }
                for (i = 0; i <= jsonData[6][0]; ++i) {
                document.getElementById("id_apuesta" + i).style.background = 'orange';;
                document.getElementById("id_juego" + i).style.background = 'orange';
                document.getElementById("id_fondo" + i).style.background = 'orange';
                document.getElementById("id_usuario" + i).style.background = 'orange';
                document.getElementById("fecha_apuesta" + i).style.background = 'orange';
                document.getElementById("cantidad" + i).style.background = 'orange';                        
                }
                document.getElementById("alerta_apuestas").innerHTML = "Apuestas encontradas, tabla actualizada" + jsonData;

            }
        });
    });



    $('#depositos-buscador').keyup(function (e) {
         var e = document.getElementById("depositos-list");
         var c = document.getElementById("depositos-buscador");
         var value = e.options[e.selectedIndex].value;
         var text = c.value;
         var datos = [value, text];
         var jsonString = JSON.stringify(datos);
         document.getElementById("alerta_depositos").innerHTML = "";
         $.ajax({
             type: 'POST',
             url: 'buscador_depositos.php',
             data: {data: jsonString},
             success: function (response)
             {
                var jsonData = JSON.parse(response);


                    for (i = 0; i <= jsonData[5][0]; ++i) {
                    document.getElementById("id_deposito" + i).value = jsonData[0][i];
                    document.getElementById("id_fondo" + i).value = jsonData[1][i];
                    document.getElementById("id_usuario" + i).value = jsonData[2][i];
                    document.getElementById("fecha_deposito" + i).value = jsonData[3][i];
                    document.getElementById("cantidad" + i).value = jsonData[4][i];
                    }
                    for (i = 0; i <= jsonData[5][0]; ++i) {
                    document.getElementById("id_deposito" + i).style.background = 'orange';
                    document.getElementById("id_fondo" + i).style.background = 'orange';
                    document.getElementById("id_usuario" + i).style.background = 'orange';
                    document.getElementById("fecha_deposito" + i).style.background = 'orange';
                    document.getElementById("cantidad" + i).style.background = 'orange';
                    }
                    document.getElementById("alerta_depositos").innerHTML = "Usuarios encontrados tablas actualizadas para mostrar: " + jsonData;

             }
         });
     });


     // funcion que utiliza un keyup para mandar un dato de un imput a un php que devuelve una tabla con contenidos que encuntre
    $('#referidos_buscador').keyup(function (e) {
         var e = document.getElementById("referidos_list");
         var c = document.getElementById("referidos_buscador");
         var value = e.options[e.selectedIndex].value;
         var text = c.value;
         var datos = [value, text];
         var jsonString = JSON.stringify(datos);
         document.getElementById("alerta_referidos").innerHTML = "";
         $.ajax({
             type: 'POST',
             url: 'buscador_referidos.php',
             data: {data: jsonString},
             success: function (response)
             {
                var jsonData = JSON.parse(response);


                 for (i = 0; i <= jsonData[2][0]; ++i) {
                 document.getElementById("id_referidor_" + i).value = jsonData[0][i];
                 document.getElementById("id_referido_" + i).value = jsonData[1][i];
                 }
                 for (i = 0; i <= jsonData[2][0]; ++i) {
                 document.getElementById("id_referidor_" + i).style.background = 'orange';
                 document.getElementById("id_referido_" + i).style.background = 'orange';
                 }
                 document.getElementById("alerta_referidos").innerHTML = "Usuarios encontrados tablas actualizadas para mostrar: " + jsonData;

             }
         });
     });
 
    
     $('#fondos-buscador').keyup(function (e) {
         var e = document.getElementById("fondos-list");
         var c = document.getElementById("fondos-buscador");
         var value = e.options[e.selectedIndex].value;
         var text = c.value;
         var datos = [value, text];
         var jsonString = JSON.stringify(datos);
         document.getElementById("alerta_fondos").innerHTML = "";
         $.ajax({
             type: 'POST',
             url: 'buscador_fondos.php',
             data: {data: jsonString},
             success: function (response)
             {
                var jsonData = JSON.parse(response);


                 for (i = 0; i <= jsonData[3][0]; ++i) {
                 document.getElementById("id_fondo" + i).value = jsonData[0][i];
                 document.getElementById("id_usuario" + i).value = jsonData[1][i];
                 document.getElementById("cantidad" + i).value = jsonData[1][i];                
                 }
                 for (i = 0; i <= jsonData[3][0]; ++i) {
                 document.getElementById("id_fondo" + i).style.background = 'orange';
                 document.getElementById("id_usuario" + i).style.background = 'orange';
                 document.getElementById("cantidad" + i).style.background = 'orange';                    
                 }
                 document.getElementById("alerta_fondos").innerHTML = "Fondos encontrados output " + jsonData;

             }
         });
     });




// ejecuta alter de usuario php 

    $('#alterar').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'alterar_usuario.php',
            data: $("#formulario_usuarios input").serialize(),
            success: function (response)
            {
                var jsonData = JSON.parse(response);

                if (jsonData.success == "1")
                {
                    document.getElementById("alerta_usuarios").innerHTML = "usuario ACTUALIZADO!!!!";
                    setTimeout(location.reload.bind(location), 1500);

                } else
                {
                    document.getElementById("alerta_usuarios").innerHTML = "no se ha podido actualizar el usuario!!!!";

                }
            }
        });
    });


// ejecuta borrar_usuario.php y da mensaje de alerta
    $('#borrar').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'borrar_usuario.php',
            data: $("#formulario_usuarios input").serialize(),
            success: function (response)
            {
                var jsonData = JSON.parse(response);


                if (jsonData.success == "1")
                {
                    document.getElementById("alerta_usuarios").innerHTML = "usuario BORRADO!!!!";
                    setTimeout(location.reload.bind(location), 1500);

                } else
                {
                    document.getElementById("alerta_usuarios").innerHTML = "usuario NO BORRADO!!!!";

                }
            }
        });
    });


   // ejecuta agregar_usuario php y da mensaje de alerta
    $('#agregar').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'agregar_usuario.php',
            data: $("#formulario_usuarios").serialize(),
            success: function (response)
            {
                var jsonData = JSON.parse(response);

                if (jsonData.success == "1")
                {
                    document.getElementById("alerta_usuarios").innerHTML = "usuario insertado!!!!";
                    setTimeout(location.reload.bind(location), 1500);

                } else
                {
                    document.getElementById("alerta_usuarios").innerHTML = "usuario NO insertado!!!! - NO ME DES DUPLICADOS";

                }
            }
        });
    });





// Realiza un for para hacer listener a todos los botones de la tabla
// esta funcion ejecuta borrar_referidos.php pasandole la ID referencial por ajax
for (let i = 0; i < 10; i++) {
     $('#borrar_'+i).click(function (e) {
        var id_referido = $('#id_referido_'+i).val();
        $.ajax({
            type: 'POST',
            url: 'borrar_referidos.php',
            data: {"id_referido": id_referido},
            success: function (response)
            {
                var jsonData = JSON.parse(response);


                if (jsonData.success == "1")
                {
                    document.getElementById("alerta_referidos").innerHTML = "Datos borrados";
                    setTimeout(location.reload.bind(location), 1500);

                } else
                {
                    document.getElementById("alerta_referidos").innerHTML = "me ha sido imposible borrar Datos";

                }
            }
        });
    });
}

for (let i = 0; i < 10; i++) {
     $('#alterar_'+i).click(function (e) {
        var id_referido = $('#id_referido_'+i).val();
        var id_referidor = $('#id_referidor_'+i).val();
        $.ajax({
            type: 'POST',
            url: 'alterar_referidos.php',
            data: {"id_referido": id_referido, "id_referidor": id_referidor},
            success: function (response)
            {
                var jsonData = JSON.parse(response);


                if (jsonData.success == "1")
                {
                    document.getElementById("alerta_referidos").innerHTML = "Datos alterados";
                    setTimeout(location.reload.bind(location), 1500);

                } else
                {
                    document.getElementById("alerta_referidos").innerHTML = "me ha sido imposible alterar datos";

                }
            }
        });
    });
}


   // ejecuta funcion  para agregar referidos y da mensaje de alerta 
    $('#agregar_1').click(function (e) {
        var id_referidoi = $('#id_referidoi').val();
        var id_referidori = $('#id_referidori').val();
        $.ajax({
            type: 'POST',
            url: 'agregar_referidos.php',
            data: {"id_referido": id_referidoi, "id_referidor": id_referidori},
            success: function (response)
            {
                var jsonData = JSON.parse(response);

                if (jsonData.success == "1")
                {
                    document.getElementById("alerta_referidos").innerHTML = "Datos insertados";
                    setTimeout(location.reload.bind(location), 1500);

                } else
                {
                    document.getElementById("alerta_referidos").innerHTML = "NO Me ha sido posible insertar los datos";

                }
            }
        });
    });



    // Listeners para cambiar contenidos de la tabla admin, las respuestas son tablas con consultas
    $('#Referidos').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'referidos_admin.php',
            data: $("#formulario_config input").serialize(),
            success: function (response)
            {
                document.getElementById("migas_config").innerHTML = "Admin > Configuracion > Referidos";
                document.getElementById("ajax-config").innerHTML = response;
                             
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.src = "assets/js/admin.js";
                    document.getElementsByTagName('head')[0].appendChild(s);
                    
                

            }
        });
    });
    
    $('#Apuestas').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'apuestas_admin.php',
            data: $("#formulario_config input").serialize(),
            success: function (response)
            {
                document.getElementById("migas_config").innerHTML = "Admin > Configuracion > Apuestas";
                document.getElementById("ajax-config").innerHTML = response;
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.src = "assets/js/admin.js";
                    document.getElementsByTagName('head')[0].appendChild(s);
            }
        });
    });
    
    $('#Depositos').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'depositos_admin.php',
            data: $("#formulario_config input").serialize(),
            success: function (response)
            {
                document.getElementById("migas_config").innerHTML = "Admin > Configuracion > Depositos";
                document.getElementById("ajax-config").innerHTML = response;
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.src = "assets/js/admin.js";
                    document.getElementsByTagName('head')[0].appendChild(s);

            }
        });
    });
    
    
    
    $('#Fondos').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'fondos_admin.php',
            data: $("#formulario_config input").serialize(),
            success: function (response)
            {
                document.getElementById("migas_config").innerHTML = "Admin > Configuracion > Fondos";
                document.getElementById("ajax-config").innerHTML = response;
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.src = "assets/js/admin.js";
                    document.getElementsByTagName('head')[0].appendChild(s);

            }
        });
    });


    $('#Likes').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'likes_admin.php',
            data: $("#formulario_config input").serialize(),
            success: function (response)
            {
                document.getElementById("migas_config").innerHTML = "Admin > Configuracion > Likes";
                document.getElementById("ajax-config").innerHTML = response;
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.src = "assets/js/admin.js";
                    document.getElementsByTagName('head')[0].appendChild(s);

            }
        });
    });
    
    $('#Juegos').click(function (e) {

        $.ajax({
            type: 'POST',
            url: 'juegos.admin.php',
            data: $("#formulario_config input").serialize(),
            success: function (response)
            {
                document.getElementById("migas_config").innerHTML = "Admin > Configuracion > Juegos";
                document.getElementById("ajax-config").innerHTML = response;
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.src = "assets/js/admin.js";
                    document.getElementsByTagName('head')[0].appendChild(s);

            }
        });
    });
    


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

});


/*js menu  */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "#343a40";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0px";
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "#343a40";
}

/* js cambio de contenido juego  */
function estado3() {

    document.getElementById("contenedor_juegos").innerHTML = "	<div style='height: 500px' class='col-md-12'>   <a href='./juego_1.php'>    <img src=\"./assets/img/modo-juego.jpg\" width=\"800px\" height=\"400px\" class=\"center\">   	</div> ";
    document.getElementById("contenedor_juegos2").innerHTML = "	";

}



