<?php

    $servidor = "localhost";      //dados do servidor
    $usuario = "521684";    //informações suas
    $senha = "123456";              //informações suas
    $base = "521684";       //informações suas

    $con = mysqli_connect($servidor, $usuario, $senha, $base);

    if (!$con){
        echo "Erro ao conectar o banco de dados.".mysqli_connect_error();
    }
?>