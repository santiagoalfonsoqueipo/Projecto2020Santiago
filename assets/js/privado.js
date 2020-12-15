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



/* listener para el click de jugar  */
document.getElementById("pruebaa").addEventListener("click", estado3, false);

/* Ajax encargado de sistema likes  */
$(document).ready(function() {
    $('#like').click(function(e) {
        var e = document.getElementById("like");
        var c = document.getElementById("dlike");
        $.ajax({
            type: 'POST',
            url: 'likes.php',
            data: {data : 'jsonString'}, 
            success: function(response)
            {
               var jsonData = JSON.parse(response);
               if (jsonData.handle == "1")
                {
                  e.innerHTML = "Likes:  " + jsonData.likes;
                  c.innerHTML = "Dislikes:  " + jsonData.dlikes;
                }
           }
       });
     });
});


/* Ajax encargado de sistema dlikes  */
$(document).ready(function() {
    $('#dlike').click(function(e) {
        var e = document.getElementById("like");
        var c = document.getElementById("dlike");
        $.ajax({
            type: 'POST',
            url: 'dlikes.php',
            data: {data : 'jsonString'}, 
            success: function(response)
            {
               var jsonData = JSON.parse(response);
               if (jsonData.handle == "1")
                {
                  e.innerHTML = "Likes:  " + jsonData.likes;
                  c.innerHTML = "Dislikes:  " + jsonData.dlikes;
                }
           }
       });
     });
});