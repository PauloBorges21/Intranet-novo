<?php
session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: ../../index.php");
}
?>
<?php //include('../../includes/header.php') ?>

<?php include('../../classes/cliente.class.php');
$cliente = new Cliente();
?>
<?php //header("Content-Type: text/html; charset=ISO-8859-1",true);?>
<form method="POST" enctype="multipart/form-data" action="cliente_submit.php">
    <div id="cadastro" name="cadastro">

        <p><label>Nome: </label>
            <input type="text" id="nome" name="nome" maxlength="100" placeholder="Max 100 caracteres" /></p>

        <p><label>Thumb (imagem do cliente): </label>
            <input type="file" name="arquivo[]" /></p>

        <p><label>Logomarca (imagem do cliente): </label>
            <input type="file" name="arquivo2[]" multiple /></p>

        <!--        <p><label>Permissão (admin): </label>-->
        <!--            <input type="checkbox" id="permissao" name="permissao" /></p>-->

        <p><input type="submit" value="Cadastrar" /></p>
    </div>
</form>