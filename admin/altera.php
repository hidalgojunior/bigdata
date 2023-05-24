<?php
(file_exists('conexao.php') ? require_once 'conexao.php' : '');
session_start();

if(isset($_POST['acao'])){
    $id = $_SESSION['id'];
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $senhac = md5($senha);
    $select = "UPDATE users set nome = '".$nome."' , senha = '".$senhac."' ,  usuario = '".$usuario."' where id = {$id}";

    $altera = mysqli_query($con, $select);
    if($altera){
        $msg = "Dados Alterados com sucesso";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center align-self-center">
                <h1><?=$msg?>...<br/>Você será redirecionado em 2 segundos.</h1>
                <?php
                header( "refresh:2;url=listagem.php" );
                ?>
            </div>
        </div>
    </div>
<script src="../js/bootstrap.js"></script>
</body>
</html>
