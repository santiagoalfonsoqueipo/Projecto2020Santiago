/* Ajax encargado de recoger los datos de Login y pasarlo por ajax al login.php para validar sesion  */
$(document).ready(function () {
    $('#loginform').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: $(this).serialize(),
            success: function (response)
            {
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                     window.location.href = "privado.php";
                } else
                {
                     document.getElementById("alerta_login").innerHTML =("No ha podido acceder al área privado porque sus credenciales de acceso no son válidas");
                    
                }
            }
        });
    });
});


/* Ajax encargado de mandar submit del formulario de registro a register.php y registrarlo  */
$(document).ready(function () {
    $('#registerform').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: $(this).serialize(),
            success: function (response)
            {
                var jsonData = JSON.parse(response);

                 if (jsonData.success == "1")
                {
                     document.getElementById("alerta_registro").innerHTML = "TE HAS REGISTRADO! Cierra esta ventana.";
                } else
                {
                     document.getElementById("alerta_registro").innerHTML =" ERRO DE REGISTRO";
                    
                }
            }
        });
    });
});
    