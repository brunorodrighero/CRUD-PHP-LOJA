<?php
    session_start();

    require_once "db_connect.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? '';

        $sql = "DELETE FROM estoque WHERE id = ?";

        if ($stmt = mysqli_prepare($connect, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $id);

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
