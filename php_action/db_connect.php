<?php
$servername = "localhost";
$username="root";
$password="";
$db_name="loja_carros";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):{
    echo "Erro de conexão: " . mysqli_connect_error();
}
endif;
?>