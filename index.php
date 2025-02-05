<?php
    $cesta='posts/';
    date_default_timezone_set('Europe/Prague');

    if(isset($_POST['post'])){
        $nazev = $cesta.time().'.txt';
        file_put_contents($nazev,$_POST['post']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        div{
            border-radius:4px;
            background:#ddd;
            padding:20px;
            margin:5px;
        }
        p{
            color:red;
        }
    </style>
</head>
<body>
<form action="index.php" method="post">
    <textarea name="post">Sem zadej ...</textarea><br>
    <input type="submit" value="Přidej post">
</form>
<?php
    $filelist=scandir($cesta,SCANDIR_SORT_DESCENDING);
    //print_r($filelist);
    foreach($filelist as $post){
        if($post=='.' or $post=='..'){continue;}
        $post_content=file_get_contents($cesta.$post);
        $cas=date('d.n.Y h:i:s',filectime($cesta.$post));
        echo('<div>');
        echo('<p>'.$cas.'</p>');
        echo($post_content);
        echo('</div>');
    }
?>    
</body>
</html>