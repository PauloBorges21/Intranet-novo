<?php
session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: ../../index.php");
}
?>

<?php include('../../classes/vencedores.class.php');
$vencedores = new Vendedores();
?>

<?php include('../../classes/tarefa.class.php');
$tarefa = new Tarefa();
?>

<?php //include('../../includes/header.php') ?>
<?php //header("Content-Type: text/html; charset=ISO-8859-1",true);?>

<form method="POST" role="form" action="vencedores_submit.php">
    <div id="cadastro" name="cadastro">

        <p><label>Funcionário vencedor: </label>
            <select name="funcionarioVencedor"  class="form-control">
                <option value="" selected>Selecione</option>
                <?php
                $lista = $tarefa->getUsuario();
                foreach ($lista as $item):
                ?>
                <?php
                //$separa = explode(' ',$item['nome']);
                ?>
                <option value="<?php echo $item['id']; ?>"> <?php echo utf8_encode($item['nome']); ?>
                    <?php endforeach; ?>
                </option>
            </select>

        <p><label>Cometário: </label>
            <input type="text" id="comentario" name="comentario" maxlength="100" placeholder="Max 100 caracteres" /></p>

        <p><label>Data: </label>
            <input type="date" id="dataVencedor" name="dataVencedor" maxlength="100" placeholder="Max 100 caracteres" /></p>

        <p><button type="submit" class="btn btn-success">Adicionar </button></p>
    </div>
</form>