<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title><?php echo basename(dirname(__FILE__));  ?></title>
    <script src="js/jquery.js"></script>
    <style type="text/css">
        html {
            height: 100%;
        }
        
        body {
            min-height: 98%;
            margin: 0;
            padding: 5px;
            overflow-y: none;
        }
        
        .conteneur1 {
            position: absolute;
            width: 69%;
            height: 95%;
            margin: auto;
            border: 5px solid black;
            padding: 0;
            overflow: scroll;
            left:29%;
        }
        
        .page1 {
            width: 90%;
            padding: 5px; 
            margin:10px auto;
        }

        
        li {
            list-style:none;
            padding:0;
            margin-top:10px;
            margin-left:10px;
            display: inline-block;
            text-align: center;
        }
        
        li:first-child {
            margin-left:175px;
        }
        
        li:last-child {
            margin-bottom: 10px;   
        }
        
        input:hover {
            background: black;
            color:white;
        }
        
        input:active {
            background: black;   
        }
        
        input:visited {
            background: black;   
        }
        
        ul {
            margin:0;
            padding:0;
        }
        
        .test {
            position: absolute;
            width: 335px;
            height: 95%;
            margin: auto;
            border: 5px solid black;
            overflow: scroll;
            left:1%;
        }
        
        input {
            width:150px;
            height:200px;
            padding:0;
            border: 2px solid black;
            cursor:pointer;
            font-size: 100%;
        }
        
        h1 {
            font: bold 240% arial;
            margin:0;
        }
        
        #page {
            position: absolute;  
            top:5px;
            left:5px;
        }
        
        object {
            border: 5px solid black;
            height: 480px;
            margin-bottom: 30px;
            width: 100%;
        }
        
        #topo {
            font-size: 300%;
            position: fixed;
            right: 23px;
            bottom: 23px;
            background: white;
            border: 3px solid black
        }
        
        #topop {
            font-size: 300%;
            position: fixed;
            left: 23px;
            bottom: 23px;
            background: white;
            border: 3px solid black
        }
        
        a {
            text-decoration: none;   
        }
        
    
    </style>
</head>
    <body>
        
           <div class="conteneur1">
               <div id="top"></div>
            <div class="page1">
                
        <?php
        function parcourir_racine($dossier){
            echo "<ul>\n";
 foreach(glob($dossier.'/'.htmlspecialchars($_POST['num'])) as $result){    
                if(is_dir($result)){
                    parcourir_enfant($result);
                }  
            }
            echo "</ul>\n";
        }

        function parcourir_enfant($dossier){
            echo "<ul>\n";
            $sort = $dossier.'/*';
            ksort($sort, SORT_NATURAL | SORT_FLAG_CASE);
            foreach(glob($dossier.'/*') as $result){ 
                if(is_dir($result)){
                    
                }else{
                $article = "/interface/articles/".htmlspecialchars($_POST['num']).'/';
                $url = str_replace($article, "",$result);
                ?> <object data="<?php echo $url; ?>"></object><?php
                }     
            }
            echo "</ul>\n";
        }       

        function isHTML($filename){
            $temp = explode('.',$filename);
            return $temp[count($temp)-1];
        }
    parcourir_racine('articles');
?>
</div>
               <a href="#top" id="topo" >&#128285;</a>
        </div>
<div class="test">
    
<script>
$(document).ready(function(){    
    $('button[id="topop"]').click(function() {
        var top = $(".test");
        var input = $("input");
        console.log(input.css.height);
        top.scrollTop(top-100);
    });
});

    
</script>
    
    <h1 id="page">PAGE N°</h1>
<?php
        
        function parcourir_racines($dossier){
            echo "<ul>\n";
            foreach(glob($dossier.'/*') as $result){    
                if(is_dir($result)){
                    parcourir_enfants($result);
                }  
            }
        }

            function parcourir_enfants($dossier){
            echo "<li>\n";
            $article = "articles/";
            $npage = str_replace($article, "", $dossier);
            ?> <ul id="<?php echo $npage; ?>">
    
            <form action="index.php" method="post">
            <input type="submit" name="num" value="<?php echo $npage; ?>" >
            </form>
    
            <button id="topop" >-10 pages</button>
            </ul>
            <?php
            echo "</li>\n";
        }      
        parcourir_racines('articles');
        ?>
    </div>
    </body>
</html>