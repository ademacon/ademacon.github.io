<?php include('header.php');?>

<?php
    
    
    
    function parcourir_racines($dossier){
        foreach(glob($dossier.'/'.htmlspecialchars($_POST['cat'])) as $result){    
            if(is_dir($result)){
                parcourir_enfants($result);
            }  
        }
    }

    function parcourir_enfants($dossier){
        foreach(glob($dossier.'/*') as $result){    
            if(is_dir($result)){
                parcourir_encore($result);
            }  
        }
    }

    function parcourir_encore($dossier){
        $article = "categories/".htmlspecialchars($_POST['cat']).'/';
        $titre = str_replace($article, "",$dossier);
    
        if(is_file($dossier.'.jpg')){
            ?>
            <form action="content.php" method="post">
                <button type="submit" name="article" value="<?php echo $titre; ?>">
                    <img src="<?php echo $dossier;?>.jpg"><?php echo $titre;?>
                </button>
            </form>
    <?php    
        }
        
        else {
            ?>
        <form action="content.php" method="post">
            <input type="submit" name="article" value="<?php echo $titre; ?>" >
        </form>
        <?php
        }
    }
           
function isEND($filename){
    $temp = explode('.',$filename);
    return $temp[count($temp)-1];
}

parcourir_racines('categories');
?>
    
</body>
</html>