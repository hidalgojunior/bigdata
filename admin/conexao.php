<?php

    $servidor = "localhost";      //dados do servidor
    $usuario = "root";    //informações suas
    $senha = "";              //informações suas
    $base = "fatec";       //informações suas

    $con = mysqli_connect($servidor, $usuario, $senha, $base);

    if (!$con){
        echo "Erro ao conectar o banco de dados.".mysqli_connect_error();
    }
?>