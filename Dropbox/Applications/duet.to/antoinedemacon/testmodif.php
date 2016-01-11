<!doctype html>
<html lang="en">
	<head>
		<title>facetracking</title>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
		<meta charset="utf-8">
		<style>
            
#youpi {
  width: 50px;
  height:50px;
  background:#F00;
}
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    </head>
    
    <body>
<p>Modifier la largeur de mon bloc</p>        
<input id="taille" type="range" min="0" max="100" value="50"/>
        </br>
<p>Modifier la hauteur de mon bloc</p>        
<input id="hauteur" type="range" min="0" max="100" value="50"/>
        </br>
<input type="button" id="post" value="Enregistrer mon thème"/>
        </br>
    
<?php 
include('youpi.php');
?>
        
<script>
            
$(document).ready(function(){

$("#taille").change(function(e){

$("#youpi").width($(this).val());

    var styleProps = $( "#youpi" ).css([
    "width", "height", "color", "background-color"
    ]);

    var test = [];

    $.each( styleProps, function( prop, value ) {
            test.push( prop + ": " + value + ";");
            console.log(test);
            });
    $( "#result" ).html( ' #youpi { ' + test + '}' );

})

    
    
//HAUTEUR
    

$("#hauteur").change(function(e){

$("#youpi").height($(this).val());

    var styleProps = $( "#youpi" ).css([
    "width", "height", "color", "background-color"
    ]);
    var test = [];

    $.each( styleProps, function( prop, value ) {
            test.push( prop + ": " + value + ";");
            console.log(test);
//            var array = test.split(',');
            
            });
    $( "#result" ).html( ' #youpi { ' + test + '}' );

})


// enregistrement du thème


$("#post").click(function(){
  $.post( "testmodif.php", { text: $('#result').html() })
});
    

});
    
</script>
        
<p id="result"></p>

<span id="write">
<?php
    if(isset($_POST['text']))
    {
        $css = $_POST['text'];
        file_put_contents('truc.css', $css);
    }
?>
</span>
        
    </body>
    
</html>