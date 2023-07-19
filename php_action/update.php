<?php
    session_start();

    require_once "db_connect.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? '';
        $marca = $_POST['marca'] ?? '';
        $modelo = $_POST['modelo'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $mod_fab = $_POST['mod_fab'] ?? '';
        $cor = $_POST['cor'] ?? '';
        $placa = $_POST['placa'] ?? '';
        $valor = $_POST['valor'] ?? '';

        $sql = "UPDATE estoque SET marca = ?, modelo = ?, descricao = ?, mod_fab = ?, cor = ?, placa = ?, valor = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($connect, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssssi", $marca, $modelo, $descricao, $mod_fab, $cor, $placa, $valor, $id);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../consultar.php?sucesso", true, 303);
                exit;
            } else {
                header("Location: ../consultar.php?erro", true, 303);
                exit;
            }

            mysqli_stmt_close($stmt);
        } else {
            header("Location: ../consultar.php?erro", true, 303);
            exit;
        }
    }
?>
