<?php
(file_exists('conexao.php') ? require_once 'conexao.php' : '');
session_start();
$nivel = $_SESSION['nivel'];
if(isset($_POST['acao'])){
  $nome = $_POST['nome'];
  $nivel = $_POST['nivel'];
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];
  $senhac=md5($senha);

  $sql = "insert into users(nome, senha, nivel, usuario) values ('".$nome."','".$senhac."','".$nivel."','".$usuario."')";
  $resultado = mysqli_query($con, $sql);
  if ($resultado > 0){
    $msg = "<p class='alert alert-success'>Dados inseridos com sucesso</p>";
  }
  else{
      $msg = "<p class='alert alert-danger'>Erro ao inserir os dados.</p>";
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
    <title>Área Restrita</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        nav{
            height: 100vh;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-3 bg-dark text-light p-4 d-flex flex-column flex-shrink-0">
            <nav class="bg-dark">
                <h4>Menu Principal</h4>
                <ul class="list-group">
                    <?php
                    if ($nivel == 1){

                        ?>
                        <li class="list-group-item"><a href="index.php" class="nav-link">Principal</a></li>
                        <li class="list-group-item" ><a href="usuarios.php" class="nav-link">Cadastro</a></li>
                        <li class="list-group-item"><a  href="listagem.php" class="nav-link">Listagem</a></li>

                        <?php
                    }else{
                        if($nivel == 2){

                            ?>
                            <li class="list-group-item"><a href="index.php" class="nav-link">Principal</a></li>
                            <li class="list-group-item"><a  href="listagem.php" class="nav-link">Listagem</a></li>
                            <?php
                        }else{
                            if($nivel == 3){
                                ?>
                                <li class="list-group-item"><a href="index.php" class="nav-link">Principal</a></li>
                                <?php
                            }


                        }
                    }

                    ?>

                    <li class="list-group-item"><a  href="../logout.php" class="nav-link">Sair</a></li>

                </ul>
            </nav>
        </div>
        <div class="col-sm-12 col-md-9">
            <?php
            if (isset($msg)){
                echo $msg;
            }

            ?>
            <h1 class="text-center mb-4"><strong>CADASTRO DE USUÁRIOS</strong></h1>
            <div class="container">
                <div class="row">
                    <div class="container bg-">
                        <div class="row">
                            <div class="col-12">
                                <form method="post" class="form-control">
                                    <div class="row mt-2">
                                        <div class="col-sm-12 col-md-2">
                                            <label for="nome">Nome Completo</label>
                                        </div>
                                        <div class="col-sm-12 col-md-10">
                                            <input type="text" class="form-control" name="nome" id="nome">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm-12 col-md-2">
                                            <label for="usuario">Login</label>
                                        </div>
                                        <div class="col-sm-12 col-md-10">
                                            <input type="text" class="form-control" name="usuario" id="usuario">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm-12 col-md-2">
                                            <label for="nivel">Nivel de Acesso</label>
                                        </div>
                                        <div class="col-sm-12 col-md-10">
                                            <select class="form-select" aria-label="Default select example" name="nivel">
                                                <option selected disabled>Escolha uma função</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Escritor</option>
                                                <option value="3">Leitor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm-12 col-md-2">
                                            <label for="senha">Senha</label>
                                        </div>
                                        <div class="col-sm-12 col-md-10">
                                            <input type="password" class="form-control" name="senha" id="senha">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm-6 col-md-6 offset-6 offset-md-6">
                                            <button type="submit" class="btn btn-outline-primary form-control" name="acao" id="acao">Cadastrar Usuário</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/bootstrap.js"></script>
</body>
</html>

