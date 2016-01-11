<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>
        <?php echo basename(dirname(__FILE__));  ?>
    </title>    
<script src="js/jquery.js"></script>
<link rel="stylesheet" href="style.css">
</head>
<body>
    
    <a href="index.php">index</a>
    
<?php
function parcourir_header($dossier){
    foreach(glob($dossier.'/*') as $result){    
        if(is_dir($result)){
            parcourir_cat($result);
        }  
    }
}

function parcourir_cat($dossier){
    $titre = titre($dossier);
    ?>
<form action="categorie.php" method="post">
    <input type="submit" name="cat" value="<?php echo $titre; ?>">
</form>
    <?php
}

function titre($filename){
    $temp = explode('/',$filename);
    return $temp[count($temp)-1];
}

function isTITRE($filename){
    $temp = explode('.',$filename);
    return $temp[count($temp)-1];
}

parcourir_header('categories');
?>