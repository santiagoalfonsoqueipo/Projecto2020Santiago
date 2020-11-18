// crea una constante que para abreviar codigo
const form = document.getElementById('registerform');

// un listener de focus en los imput del formulario
form.addEventListener('focus', (event) => {
    event.target.style.background = 'orange';
    event.target.style.color = 'black';
}, true);

// un listener al salir del imput del formulario que ejecuta una funcion
form.addEventListener('blur', (event) => {
    validateForm();
}, true);

// funcion principal
function validateForm() {
    // guardo los valores de todos los imputs del formulario
    var usuario = document.forms["registerform"]["usuario_registro"].value;
    var contraseña = document.forms["registerform"]["contraseña_registro"].value;
    var nombre = document.forms["registerform"]["nombre"].value;
    var apellido = document.forms["registerform"]["apellido"].value;
    var email = document.forms["registerform"]["email"].value;
    var id_ref = document.forms["registerform"]["id_referido"].value;

    // constante para targetear los parrafos de alerta
    var usuario_tar = document.forms["registerform"]["usuario_registro"];
    var contraseña_tar = document.forms["registerform"]["contraseña_registro"];
    var nombre_tar = document.forms["registerform"]["nombre"];
    var apellido_tar = document.forms["registerform"]["apellido"];
    var email_tar = document.forms["registerform"]["email"];
    var id_ref_tar = document.forms["registerform"]["id_referido"];

    //condicionales de usuario
    if (usuario.length < 7) {
        corregir_mal(usuario_tar,'alerta_usuario');
    }
    if (usuario.length > 7) {
        corregir_bien(usuario_tar,'alerta_usuario');
    }
    
        //condicionales de contraseña
    if (contraseña.length < 7) {
        corregir_mal(contraseña_tar,'alerta_contraseña');
    }
    if (contraseña.length > 7) {
        corregir_bien(contraseña_tar,'alerta_contraseña');
    }
  
        //condicionales de nombre
    if (nombre.length < 7) {
        corregir_mal(nombre_tar,'alerta_nombre');
    }
    if (nombre.length > 7) {
        corregir_bien(nombre_tar,'alerta_nombre');
    }
  
          //condicionales de apellido
    if (apellido.length < 7) {
        corregir_mal(apellido_tar,'alerta_apellido');
    }
    if (apellido.length > 7) {
        corregir_bien(apellido_tar,'alerta_apellido');
    }
  
          //condicionales de email
    if (email.length < 7) {
        corregir_mal(email_tar,'alerta_email');
    }
    if (email.length > 7) {
        corregir_bien(email_tar,'alerta_email');
    }
  
          //condicionales de id_ref
    if (id_ref.length < 7) {
        corregir_mal(id_ref_tar,'alerta_id_referido');
    }
    if (id_ref.length > 7) {
        corregir_bien(id_ref_tar,'alerta_id_referido');
    }
  
  
    
    
    function corregir_bien(abv,alerta) {
        abv.style.background = 'green';
        abv.style.color = 'black';
        document.getElementById(alerta).innerHTML = "";
        $('#btnSubmit').attr("disabled", false);
        return false;
    }

    function corregir_mal(abv,alerta) {
        abv.style.background = 'red';
        abv.style.color = 'black';
        document.getElementById(alerta).innerHTML = "Minimo 7 caracteres";
        $("#btnSubmit").attr("disabled", true);
        return false;
    }


}



