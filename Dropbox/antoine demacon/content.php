<?php 
include('header.php');
?>
    
<!--Affichage des articles-->
        
    
<?php
    function parcourir_racines($dossier){
        foreach(glob($dossier.'/*') as $result){    
            if(is_dir($result)){
                parcourir_enfants($result);
            }  
        }
    }


    function parcourir_enfants($dossier){
        foreach(glob($dossier.'/'.htmlspecialchars($_POST['article'])) as $result){    
            if(is_dir($result)){
                parcourir_encore($result);
            }  
        }
    }

    function parcourir_encore($dossier){
        echo "<h1>";
        echo titrage($dossier);
        echo "</h1>";
        foreach(glob($dossier.'/*') as $result){    
            if($result){
                parcourir_encores($result);
            }  
        }
    }

    function parcourir_encores($dossier){
        
        //texte
        
        if (isEND($dossier) == "txt") {
            $fp = fopen($dossier, "r");
            while(!feof($fp)) {
                $texte = fgets($fp);
                echo $texte;
            }
        fclose($dossier);
        }
        
        //images
        
          else if (isEND($dossier) == "jpg") {
            ?> <img src="<?php echo $dossier;?>"><?php   
        } else if (isEND($dossier) == "png") {
            ?> <img src="<?php echo $dossier;?>"><?php  
        } else if (isEND($dossier) == "gif") {
            ?> <img src="<?php echo $dossier;?>"><?php  
        }
    }
        
    
function isEND($filename){
    $temp = explode('.',$filename);
    return $temp[count($temp)-1];
}

function titrage($filename){
    $temp = explode('/',$filename);
    return $temp[count($temp)-1];
}

parcourir_racines('categories');
?>
    
</body>
</html>