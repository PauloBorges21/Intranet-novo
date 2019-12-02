<?php
/**
 * Created by PhpStorm.
 * User: antonio.gonzalez
 * Date: 28/01/2019
 * Time: 16:07
 */

session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: ../../index.php");
}
?>

<?php require('../../classes/tarefa.class.php');
$tarefa = new Tarefa();?>

<?php require('../../classes/atualizar.class.php');
$atualizar = new recuperaTarefa();?>

<?php

//$idEditar->adicionarBanner($nome, $imagem);
//header("Location: dashboard.php");

?>

<form method="POST" role="form" action="tarefa_submit.php">
    <div id="cadastro" name="cadastro">

        <p><label>Nome: </label>

            <input type="text" value="<?php $lista = $atualizar->recuperaT();
            foreach($lista as $item):
                echo $item['n_tarefa'];
            endforeach;?>" id="nome" name="nome" maxlength="100" placeholder="Max 100 caracteres" /></p>
        <?php ?>
        <p><label>Cliente: </label>
            <!--<input type="text" id="cliente" name="cliente" maxlength="100" placeholder="Max 100 caracteres" />-->

            <select name="cliente"  class="form-control">
                <option value="" >Selecione</option>
                <?php $lista = $tarefa->getCliente(); foreach ($lista as $item):?>
                <?php
                //$separa = explode(' ',$item['nome_cliente']);
                ?>

                <option value="<?php echo $item['id_cliente']; ?>"> <?php echo utf8_encode($item['nome_cliente']); ?>
                    <?php endforeach; ?>
                </option>
            </select>
        </p>
        <p><label>Responsável: </label>

            <select name="responsavel"  class="form-control">
                <?php //$lista = $atualizar->recuperaT();foreach ($lista as $item):?>
<!--                <option value="" selected>--><?php ////echo utf8_encode($item['responsavel']);?><!--</option>-->
                <?php //endforeach; ?>

                <?php $lista = $tarefa->getUsuario(); foreach ($lista as $item):?>
                <?php//$separa = explode(' ',$item['nome']);?>
                <option value="<?php echo $item['id']; ?>"
                    <?php $listaP = $atualizar->recuperaT(); foreach ($listaP as $itemP): if ($item['id'] == $itemP['id_usuario']){ echo "selected";} endforeach;?>
                > <?php echo utf8_encode($item['nome']); ?>

                <?php endforeach; ?>
                </option>

            </select>
        </p>
        <p><label>Prazo: </label>
            <?php $lista = $atualizar->recuperaT(); foreach ($lista as $item):?>
            <input type="date" id="prazo" name="prazo" value="<?php echo $item['prazo']?>" /></p>
        <?php endforeach; ?>
        <p>
            <label>Status: </label>
            <select name="status"  class="form-control">
                <option value="0" selected>Selecione</option>
                <?php $lista = $tarefa->getStatus(); foreach ($lista as $item):?>
                <option value="<?php echo $item['id']; ?>"> <?php echo utf8_encode($item['nomestatus']); ?>
                    <?php endforeach; ?>
                </option>
            </select>
        </p>
        <p><label>Destaque: </label>
            <select name="destaque"  class="form-control">
                <option value="0" selected>Sem destaque</option>
                <option value="1">Com destaque</option>
            </select></p>

        <p><button type="submit" class="btn btn-success">Adicionar </button></p>
    </div>
</form>






















<?php include('../../includes/footer.php'); ?>







