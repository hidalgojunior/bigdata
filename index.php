<?php
    session_start();
    (file_exists('admin/conexao.php') ? require_once 'admin/conexao.php' : '');
    if (isset($_POST['acao'])){
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];
        $senhac = md5($senha);
        $sql = "Select * from users where usuario = '".$login."' and senha = '".$senhac."'";
        $resultado = mysqli_query($con,$sql);
        $linhas = mysqli_num_rows($resultado);
        if ($linhas == 1){
            $resp = mysqli_fetch_assoc($resultado);
            $_SESSION['nivel'] = $resp['nivel'];
            header('Location: admin/index.php');
        }
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Gerenciamento de alunos - FATEC Pompéia</title>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center display-3">Gerenciamento de Alunos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4 offset-md-4"><h2 class="text-center">Acesso Restrito</h2></div>
    </div>
   <div class="row">
        <div class="col-sm-12 col-md-4 offset-md-4">
            <form action="" method="post" class="form-control bg-opacity-25 bg-primary ">
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="usuario">Usuario</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="usuario" required id="usuario" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="senha">Senha</label>
                    </div>
                    <div class="col-9">
                        <input type="password" required name="senha" id="senha" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 offset-6">
                        <button type="submit" name="acao" class="btn btn-outline-primary form-control" >Acessar o Sistema</button>
                    </div>
                </div>
                </div>

            </form>
        </div>
    </div>

</div>


<script src="js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>
