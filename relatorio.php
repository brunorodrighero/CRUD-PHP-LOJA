<?php

//conexao
include_once "php_action/db_connect.php";

//header
include_once "includes/header.php";
?>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <div class="row center">
            <div class="col s12">
                <h3 class="white-text">Relatório</h3>
                <form action="php_action/report.php" target="_blanck" method="post">
                <div class="col s6">
                <label for="marca" class="white-text">Selecione a Marca:</label>
                <select name="marcaselecionada">
                    <option>TODAS AS MARCAS</option>
                    <?php 
                    $sql="SELECT DISTINCT marca from estoque";
                    $resultado= mysqli_query($connect, $sql);
                    while($dados=mysqli_fetch_array($resultado)):
                    ?>
                    <option><?php echo $dados['marca']; ?> </option>
                    <?php endwhile; ?>
                </select>
                </div>
                <div class="col s6">
                <input type="submit" name="btn-relatorio" class="btn orange" value="Selecionar"/>
                </div>
                </form>
            </div>
        </div>
        <br><br>
    </div>
</div>

<?php
//footer
include_once "includes/footer.php";
?>