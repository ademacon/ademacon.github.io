<!DOCTYPE html>
<html>
<head>
<title>test menu</title>
    <link rel="stylesheet" type="text/css" href="modif.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style type="text/css" id="test">    
html {
    height:100%;   
}

body {
    height: 95%;  
    list-style: none;
    color: black;
    font-family: sans-serif;
    font-weight: 900;
    font-size: 18px;
}

img {
    width: <?php echo htmlspecialchars($_POST['width']); ?>%;
}
        
</style>
</head>
    
<!--Formulaire pour modifier le CSS    -->
    
<div class="modif">
<form action="theme.php" method="post">
    <h3>largeur image:</h3><input type="text" name="width" value="<?php echo htmlspecialchars($_POST['width']);?>">
    <input type="submit" value="ok">
</form>
</div>
    
<!--Afficage de l'index du site-->
    
<!--
<div class="site">
<object data="index.php"></object>
</div>
-->

<div class="site">
<?php 
//include('index.php');
?>
<object data="index.php"></object>
</div>
 
<!--Écriture du fichier css modifié   -->
    
<script>
$(document).ready(function(){
    $.post( "theme.php", { text: $('#test').html() })
        .done(function( data ) {
            $('#write')
        });
});
</script>

<span id="write">
<?php
    if(isset($_POST['text']))
    {
            file_put_contents('style.css', $_POST['text']);
    }
?>
</span>
    
</body>
</html> 