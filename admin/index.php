<?php
session_start();
$nivel = $_SESSION['nivel'];
echo $nivel;

(file_exists('conexao.php') ? require_once 'conexao.php' : '');
$sql = "select * from users";
$usuarios = mysqli_query($con, $sql);

$lin_usuarios = mysqli_num_rows($usuarios);
$lin_professores = $lin_usuarios;
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
                <h1 class="text-center mb-4"><strong>CONTROLE  DE TABELAS</strong></h1>
                <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="bg-primary text-light p-4">
                            Tabela de Clientes<br/>
                            <?=$lin_usuarios?> registro(s)
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="bg-warning text-light p-4">
                            Tabela de Professores<br/>
                            <?=$lin_professores?> registro(s)
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
