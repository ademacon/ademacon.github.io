<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>   
</head>
<body>
    
<?php
function parcourir_header($dossier){
    foreach(glob($dossier.'/*') as $result){    
            echo $result;
    }
}

parcourir_header('public.justcloud.com/e9fnqoceto.96497694');
?>
    </body>
</html>