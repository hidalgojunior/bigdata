<?php
session_start();
session_destroy();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center align-self-center">
                <h1>Efetuando Logoff...<br/>Você será redirecionado em 5 segundos.</h1>
                <?php
                header( "refresh:5;url=index.php" );
                ?>
            </div>
        </div>
    </div>
<script src="js/bootstrap.js"></script>
</body>
</html>
