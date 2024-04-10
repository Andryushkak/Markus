<?php 

require_once 'class/Database.php';
require_once 'class/Content.php';
require_once 'handler/google-login.php';

$content = Content::main();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">   

    <script type="text/javascript" src="/js/jQuery-v3.7.1.js"></script>
</head>
<body>
    
    
    <a href="<?= $url ?>" type="button" class="google-login"></a>

    

    <div class="img"></div>

    <?= $content[ 0 ]?>
    <?= $content[ 1 ]?>
 
    
    <script type="text/javascript" src="/js/form.js"></script>
</body>
</html>