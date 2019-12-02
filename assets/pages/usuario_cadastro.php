<?php
session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: ../../index.php");
}
?>
<?php //include('../../includes/header.php') ?>

<?php include('../../classes/usuario.class.php');
$usuario = new Usuario();
?>
<?php //header("Content-Type: text/html; charset=ISO-8859-1",true);?>
<form method="POST" enctype="multipart/form-data" action="usuario_submit.php">
    <div id="cadastro" name="cadastro">

        <p><label>Nome: </label>
            <input type="text" id="nome" name="nome" maxlength="100" placeholder="Max 100 caracteres" /></p>

        <p><label>Email: </label>
            <input type="text" id="email" name="email" maxlength="100" placeholder="Max 100 caracteres" /></p>

        <p><label>Senha: </label>
            <input type="text" id="senha" name="senha" maxlength="100" placeholder="Max 100 caracteres" /></p>

        <p><label>Data nascimento: </label>
            <input type="date" id="dataNascimento" name="dataNascimento" /></p>

        <p><label>Cargo: </label>
            <select name="cargo"  class="form-control">
                <option value="" selected>Selecione</option>
                <?php
                $lista = $usuario->getCargo();
                foreach ($lista as $item):
                ?>
                <?php
                //$separa = explode(' ',$item['nome']);
                ?>
                <option value="<?php echo $item['id']; ?>"> <?php echo utf8_encode($item['nome_cargo']); ?>
                    <?php endforeach; ?>
                </option>
            </select>
        </p>

        <p><label>Arquivo (foto): </label>
            <input type="file" name="arquivo[]" /></p>

<!--        <p><label>Permissão (admin): </label>-->
<!--            <input type="checkbox" id="permissao" name="permissao" /></p>-->

        <p><input type="submit" value="Cadastrar" /></p>
    </div>
</form>

