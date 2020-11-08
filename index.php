<?php
session_start();
if(empty($_SESSION['usuario'])){
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

     
        
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="./assets/css/styles.css">
        <link rel="stylesheet" href="assets-modal/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets-modal/css/form-elements.css">
        

</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form id='loginform' method='post'>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" id="usuario"  name="usuario" class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input  type="password" id="contraseña" name="contraseña" class="form-control" placeholder="password">
					</div>
				
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a class="btn btn-link-1 launch-modal" href="#" data-modal-id="modal-register">Sign up</a>
       
				</div>
	
			</div>
		</div>
	</div>
</div>

           <!-- MODAL -->
        <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        				</button>
        				<h3 class="modal-title" id="modal-register-label">Sign up now</h3>
        				<p>Fill in the form below to get instant access:</p>
        			</div>
        			
        			<div class="modal-body">
        				
	                    <form id='registerform' role="form" action="" method="post" class="registration-form">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="usuario_registro">usuario</label>
	                        	<input type="text" name="usuario_registro" placeholder="usuario.." class="form-first-name form-control" id="usuario_registro">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="contraseña_registro">contraseña</label>
	                        	<input type="text" name="contraseña_registro" placeholder="contraseña..." class="form-last-name form-control" id="contraseña_registro">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="nombre">nombre</label>
	                        	<input type="text" name="nombre" placeholder="nombre..." class="form-email form-control" id="nombre">
	                        </div>
                                <div class="form-group">
	                        	<label class="sr-only" for="apellido">apellido</label>
	                        	<input type="text" name="apellido" placeholder="apellido..." class="form-email form-control" id="apellido">
	                        </div>
                                 <div class="form-group">
	                        	<label class="sr-only" for="email">email</label>
	                        	<input type="text" name="email" placeholder="email..." class="form-email form-control" id="email">
	                        </div>
                                  <div class="form-group">
	                        	<label class="sr-only" for="id_referido">id_referido</label>
	                        	<input type="text" name="id_referido" placeholder="id_referido..." class="form-email form-control" id="id_referido">
	                        </div>                                 
	   
	                        <button type="submit" class="btn">Sign me up!</button>
	                    </form>
	                    
        			</div>
        			
        		</div>
        	</div>
        </div>
        <script src="assets-modal/js/jquery-1.11.1.min.js"></script>
        <script src="assets-modal/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets-modal/js/jquery.backstretch.min.js"></script>
        <script src="assets-modal/js/scripts.js"></script>
    

<script type="text/javascript">
$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
		
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    location.href = "privado.php";
                    exit;
                }
                else
                {
                    alert("No ha podido acceder al área privado porque sus credenciales de acceso no son válidas");
                    exit;
                }
           }
       });
     });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#registerform').submit(function(e) {
        e.preventDefault();
		
        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    alert("registrado");
                    exit;
                }
                else
                {
                    alert("No ha podido acceder al área privado porque sus credenciales de acceso no son válidas");
                    exit;
                }
           }
       });
     });
});
</script>


</body>
</html>
<?php
}
else{
header('Location: privado.php');
}
?>
