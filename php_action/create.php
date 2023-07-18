<?php
    session_start();

    require_once "db_connect.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $marca = $_POST['marca'] ?? '';
        $modelo = $_POST['modelo'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $mod_fab = $_POST['mod_fab'] ?? '';
        $cor = $_POST['cor'] ?? '';
        $placa = $_POST['placa'] ?? '';
        $valor = $_POST['valor'] ?? '';

        $sql = "INSERT INTO estoque (marca, modelo, descricao, mod_fab, cor, placa, valor) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($connect, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssss", $marca, $modelo, $descricao, $mod_fab, $cor, $placa, $valor);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../index.php?sucesso", true, 303);
                exit;
            } else {
                header("Location: ../index.php?erro", true, 303);
                exit;
            }

            mysqli_stmt_close($stmt);
        } else {
            header("Location: ../index.php?erro", true, 303);
            exit;
        }
    }
?>
