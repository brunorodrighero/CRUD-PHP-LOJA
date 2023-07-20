<?php
//header
require 'includes/header.php';
?>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <div class="row center">
            <div class="col s12">
                <h3 class="light white-text">Adicionar Carro</h3>
                <form action="./php_action/create.php" method="POST">
                    <?php
                        $fields = ['marca', 'modelo', 'descricao', 'mod_fab', 'cor', 'placa', 'valor'];
                        foreach ($fields as $field) {
                    ?>
                    <div class="input-field col s12 m4">
                        <input type="text" name="<?= $field; ?>" id="<?= $field; ?>">
                        <label for="<?= $field; ?>"><?= ucfirst($field); ?></label>
                    </div>
                    <?php } ?>
                    <button type="submit" name="btn-adicionar" class="btn">Adicionar</button>
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
