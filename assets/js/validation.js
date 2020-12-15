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
    if (usuario.length < 10 && usuario.length >5) {
       corregir_bien(usuario_tar,'alerta_usuario');
    }else {
       corregir_mal(usuario_tar,'alerta_usuario');
    }
    
        //condicionales de contraseña
    if (contraseña.length < 9) {
        corregir_mal(contraseña_tar,'alerta_contraseña');
    }
    if (contraseña.length >= 10) {
        corregir_bien(contraseña_tar,'alerta_contraseña');
    }
  
        //condicionales de nombre
    var renm = /[a-z]/;     
    if (renm.test(nombre)) {
        corregir_bien(nombre_tar,'alerta_nombre');       
        
    } else  {
      corregir_mal(nombre_tar,'alerta_nombre');
    }
  
          //condicionales de apellido
    var reap = /[a-z]/;           
    if (reap.test(apellido)) {
       corregir_bien(apellido_tar,'alerta_apellido');
    }else {
        
         corregir_mal(apellido_tar,'alerta_apellido');
    }
  
          //condicionales de email
     var re =  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
     
    if (re.test(email)) {
        corregir_bien(email_tar,'alerta_email');
        
    } else{
        corregir_mal(email_tar,'alerta_email');
    }
  
    //condicionales de id_ref - tiene que ser numero y longitud 5+
 
    
    if ( id_ref.length > 5  ) {
        corregir_bien(id_ref_tar,'alerta_id_referido');
    } else {
        corregir_mal(id_ref_tar,'alerta_id_referido');
    }
  
  
    
  /* Funcion llamada por los condicionales de cada cambpo  */  
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
        switch (alerta) {
          case 'alerta_id_referido':
            document.getElementById(alerta).innerHTML = "tiene que ser un numero y mayor de 5";
            break;
          case 'alerta_email':
            document.getElementById(alerta).innerHTML = "Formato xx@xx";
            break;
          case 'alerta_apellido':
            document.getElementById(alerta).innerHTML = "Sin numeros mas de 5 letras";
            break;
          case 'alerta_nombre':
            document.getElementById(alerta).innerHTML = "Sin numeros mas de 5 letras";
            break;
          case 'alerta_usuario':
            document.getElementById(alerta).innerHTML = "Maximo 10 caracteres y minimo 5";
            break;
           case 'alerta_contraseña':
            document.getElementById(alerta).innerHTML = "Minimo 10 caracteres";           
            break;
        }
        $("#btnSubmit").attr("disabled", true);
        return false;
    }


}



