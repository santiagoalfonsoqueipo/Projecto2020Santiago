<?php
session_start();

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="./assets/css/style.css">
 
  </head>
<body class="fondojuego" >
 
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="#">About</a>
	  <a href="#">Services</a>
	  <a href="#">Clients</a>
	  <a href="#">Contact</a>
	</div>


	

	 
	<script>
	
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
	

	</script>




	<div class="container-fluid" id="main">
	
		<div style="height: 60px;"  class=" row">
			<div onclick="openNav()" id="padd" class="shadow-lg  text-center align-bottom  mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 100px";> Menu </div>
			<div  onclick="openNavr()" id="padd" class="shadow-lg  text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px";> Chat </div>
			<div id="padd" class="shadow-lg   mh-100 col-sm-5  bg-dark text-white efecto" style="width: 100px; height: 200px"; > <a  href='privado.php'>Santiago's casino</a> </div>
			<div id="padd" class="shadow-lg text-center mh-100 col-sm-2  bg-dark  efecto text-white " style="width: 100px; height: 200px";> Bienvenido <?php echo $_SESSION['nombre']; ?></div>
			<div id="padd" class="shadow-lg text-center mh-100 col-sm-1  bg-dark  text-white azul_borde" style="width: 100px; height: 200px";><?php echo $_SESSION['fondos'] . " " .  $_SESSION['divisa']; ?></div>
			<div id="padd" class="text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px"; > Configuracion  </div>
			<div id="padd" class="text-center mh-100 col-sm-1  bg-dark text-white azul_borde" style="width: 100px; height: 200px";> 	<a  href='logout.php'>Cerrar Sesión </a> </div>
		</div>
		 
	
	
	
		<div class=" row">
			<div class=" col-sm-12 mt-3 justify-content-center " style="height: 840px; ">
				<div class="tablero center pt-5">
	

</head>
<body>
<!-- partial:index.partial.html -->
<div class="main">
  <button type="button" class="btn" id="spin"><span class="btn-label">Spin</span></button>
  <button type="button" class="btn btn-reset" id="reset"><span class="btn-label">New Game</span></button> 
  <div class="plate" id="plate">
    <ul class="inner">
      <li class="number"><label><input type="radio" name="pit" value="32" /><span class="pit">32</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="15" /><span class="pit">15</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="19" /><span class="pit">19</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="4" /><span class="pit">4</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="21" /><span class="pit">21</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="2" /><span class="pit">2</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="25" /><span class="pit">25</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="17" /><span class="pit">17</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="34" /><span class="pit">34</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="6" /><span class="pit">6</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="27" /><span class="pit">27</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="13" /><span class="pit">13</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="36" /><span class="pit">36</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="11" /><span class="pit">11</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="30" /><span class="pit">30</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="8" /><span class="pit">8</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="23" /><span class="pit">23</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="10" /><span class="pit">10</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="5" /><span class="pit">5</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="24" /><span class="pit">24</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="16" /><span class="pit">16</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="33" /><span class="pit">33</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="1" /><span class="pit">1</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="20" /><span class="pit">20</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="14" /><span class="pit">14</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="31" /><span class="pit">31</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="9" /><span class="pit">9</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="22" /><span class="pit">22</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="18" /><span class="pit">18</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="29" /><span class="pit">29</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="7" /><span class="pit">7</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="28" /><span class="pit">28</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="12" /><span class="pit">12</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="35" /><span class="pit">35</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="3" /><span class="pit">3</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="26" /><span class="pit">26</span></label></li>
      <li class="number"><label><input type="radio" name="pit" value="0" /><span class="pit">0</span></label></li>
    </ul>
    <div class="data">
      <div class="data-inner">
        <div class="mask"></div>
        <div class="result">
          <div class="result-number">00</div>
          <div class="result-color">red</div>        
        </div>
      </div>
    </div>
  </div>
  <div class="previous-results">
    <ol class="previous-list">
      <li class='visuallyhidden placeholder'>No results yet.</li>
    </ol>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js'></script><script  src="./script.js"></script>



	


				<div>
			</div>
		</div>

					
							
		<div class=" fixed-bottom pie pt-5  pb-5 px-5 row">
			<div class=" fixed-bottom col-sm-12  text-center bg-secondary  text-white " style="height: 30px; ">
				Bandera idioma / Politica de privacidad, terminos de uso, provably fair 
			</div>
		</div>
			
	</div>
			
			

		
		
		 



	<script>
	
	var $inner = $('.inner'),
     $spin = $('#spin'),
     $reset = $('#reset'),
     $data = $('.data'),
     $mask = $('.mask'),
     maskDefault = 'Place Your Bets',
     timer = 9000;

var red = [32,19,21,25,34,27,36,30,23,5,16,1,14,9,18,7,12,3];

$reset.hide();

$mask.text(maskDefault);

$spin.on('click',function(){
  
  // get a random number between 0 and 36 and apply it to the nth-child selector
 var  randomNumber = Math.floor(Math.random() * 36),
      color = null;
      $inner.attr('data-spinto', randomNumber).find('li:nth-child('+ randomNumber +') input').prop('checked','checked');
      // prevent repeated clicks on the spin button by hiding it
       $(this).hide();
      // disable the reset button until the ball has stopped spinning
       $reset.addClass('disabled').prop('disabled','disabled').show();
  
      $('.placeholder').remove();
  
  
  setTimeout(function() {
      $mask.text('No More Bets');
      }, timer/2);
  
  setTimeout(function() {
      $mask.text(maskDefault);
      }, timer+500);
  
 
  
  // remove the disabled attribute when the ball has stopped
  setTimeout(function() {
    $reset.removeClass('disabled').prop('disabled','');
    
    if($.inArray(randomNumber, red) !== -1){ color = 'red'} else { color = 'black'};
    if(randomNumber == 0){color = 'green'};
    
    $('.result-number').text(randomNumber);
    $('.result-color').text(color);
    $('.result').css({'background-color': ''+color+''});
    $data.addClass('reveal');
    $inner.addClass('rest');
    
    $thisResult = '<li class="previous-result color-'+ color +'"><span class="previous-number">'+ randomNumber +'</span><span class="previous-color">'+ color +'</span></li>';
     
    $('.previous-list').prepend($thisResult);
   
    
    }, timer);
  
});


$reset.on('click',function(){
  // remove the spinto data attr so the ball 'resets'
  $inner.attr('data-spinto','').removeClass('rest');
  $(this).hide();
  $spin.show();
  $data.removeClass('reveal');
});

// so you can swipe it too
var myElement = document.getElementById('plate');
var mc = new Hammer(myElement);
mc.on("swipe", function(ev) {
  if(!$reset.hasClass('disabled')){
    if($spin.is(':visible')){
      $spin.click();  
    } else {
      $reset.click();
    }
  }  
});
	</script>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>



	






</body>
</html>




