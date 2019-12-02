<?php
session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: ../../index.php");
}
?>
<?php //include('../../includes/header.php') ?>

<?php include('../../classes/tarefa.class.php');
$tarefa = new Tarefa();
?>

<?php include('../../classes/cliente.class.php');
$cliente = new Cliente();
?>
<?php //header("Content-Type: text/html; charset=ISO-8859-1",true);?>
<form method="POST" enctype="multipart/form-data" action="banner_submit.php">
    <div id="cadastro" name="cadastro">

        <p><label>Clientes: </label>
            <!--<input type="text" id="cliente" name="cliente" maxlength="100" placeholder="Max 100 caracteres" />-->
            <select name="nome"  class="form-control">
                <option value="" selected>Selecione</option>
                <?php
                $lista = $tarefa->getCliente();
                foreach ($lista as $item):
                ?>
                <?php
                //$separa = explode(' ',$item['nome_cliente']);
                ?>
                <option value="<?php echo utf8_encode($item['nome_cliente']); ?>"> <?php echo utf8_encode($item['nome_cliente']); ?>
                    <?php endforeach; ?>
                </option>
            </select>
        </p>

<!--        <p><label>Thumb (imagem do cliente): </label>-->
<!--            <input type="file" name="arquivo[]" /></p>-->

        <p><label>Logomarca (Banner do cliente): </label>
            <input type="file" name="arquivo2[]" multiple /></p>

        <!--        <p><label>Permissão (admin): </label>-->
        <!--            <input type="checkbox" id="permissao" name="permissao" /></p>-->

        <p><input type="submit" value="Enviar imagens" /></p>
    </div>
</form>