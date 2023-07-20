<?php

//conexao
require 'php_action/db_connect.php';

//header
require 'includes/header.php';

$dados = [];

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM estoque WHERE id = :id";
    
    $stmt = $connect->prepare($sql);
    $stmt->execute([':id' => $id]);
    
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <div class="row center">
            <div class="col s12">
                <h3 class="light white-text">Editar Carro</h3>
                <form action="./php_action/update.php" method="POST">
                    <input type="hidden" name="id" value="<?= $dados['id']; ?>">
                    <?php
                        $fields = ['marca', 'modelo', 'descricao', 'mod_fab', 'cor', 'placa', 'valor'];
                        foreach ($fields as $field) {
                    ?>
                    <div class="input-field col s12 m4">
                        <input type="text" name="<?= $field; ?>" id="<?= $field; ?>" value="<?= $dados[$field]; ?>">
                        <label for="<?= $field; ?>"><?= ucfirst($field); ?></label>
                    </div>
                    <?php } ?>
                    <button type="submit" name="btn-alterar" class="btn">Alterar</button>
                </form>
            </div>
        </div>
        <br><br>
    </div>
</div>

<?php
//footer
require 'includes/footer.php';
?>
