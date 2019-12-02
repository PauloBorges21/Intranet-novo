<?php
session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: login.php");
}

$id = $_SESSION['intranetrai'];
?>

<?php include('../../includes/header.php') ?>

<?php require('../../classes/tarefa.class.php');
$tarefa = new Tarefa();?>

<?php require('../../classes/atualizar.class.php');
$atualizar = new recuperaTarefa();?>

<?php

//$idEditar->adicionarBanner($nome, $imagem);
//header("Location: dashboard.php");

?>
<?php
$lista = $atualizar->recuperaT(); //CONSUTA TAREFA
$lista_C = $tarefa->getCliente(); //CONSUTA CLIENTE
$lista_U = $tarefa->getUsuario(); //CONSULTA USUARIO
$lista_S = $tarefa->getStatus(); //CONSULTA STATUS
//$lista_P = $atualizar->recuperaT(); //CONSUTA TAREFA VALORES
?>

<div class="section section-header">
    <div class="container-geral w-clearfix">
        <h1>OR Tarefas</h1>
        <div class="date"><?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            echo strftime('%A, %d de %B de %Y', strtotime('today'));?></div>
    </div>
</div>

<div class="section section-jobs-home">
    <div class="container-geral w-clearfix">

        <div class="container container-tarefa w-hidden-tiny ">
            <div class="header-box w-clearfix">
                <h2>Atualizar</h2>
                <div data-delay="0" class="drop-order w-dropdown">
<!--                    <div class="drop-order-toggle w-hidden-small w-hidden-tiny w-dropdown-toggle">-->
<!--                        <div class="w-icon-dropdown-toggle"></div>-->
<!--                        <div>Ordernar por</div>-->
<!--                    </div>-->
<!--                    <nav class="drop-list-order w-dropdown-list"><a href="#" class="w-dropdown-link">Link 1</a><a href="#" class="w-dropdown-link">Link 2</a><a href="#" class="w-dropdown-link">Link 3</a></nav>-->
                </div>
            </div>

            <form method="POST" role="form" action="tarefa_atualizar_submit.php">

                <div id="cadastro" name="cadastro" style="padding: padding: 0px 0px 0px 0px; margin: 0px 0px 0px 482px;">
                    <p style="padding: 0px 0px 34px 0px;"><label style="float: right; margin: 0px 684px 0px 0px;font-size: 17px;">Nome</label>
                        <input type="text" value="<?php
                        //CONSUTA TAREFA recuperaT()
                        foreach($lista as $item):
                            echo utf8_encode($item['n_tarefa']);
                        endforeach;
                        ?>" id="nome" name="nome" maxlength="100" placeholder="Max 100 caracteres" style="float: left; margin: -21px 0px 0px 4px;width: 300px;" /></p>

                    <p style="padding: 0px 0px 34px 0px;"><label style="float: right; margin: 0px 684px 0px 0px;font-size: 17px;">Cliente</label>
                        <select name="cliente"  class="form-control" style="float: left; margin: -21px 0px 0px 4px;width: 300px;">
                            <?php
                            //CONSUTA CLIENTE getCliente()
                            foreach ($lista_C as $item_C):
                                ?>
                                <option value="<?php echo $item_C['id_cliente'];?>"
                                <?php
                                //CONSUTA TAREFA recuperaT()
                                foreach($lista as $item):
                                    if($item_C['id_cliente'] == $item['id_cliente'])
                                    {echo"selected>";}
                                    else{echo">";}
                                endforeach;
                                ?>
                                <?php echo utf8_encode($item_C['nome_cliente']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <p style="padding: 0px 0px 34px 0px;"><label style="float: right; margin: 0px 684px 0px 0px;font-size: 17px;">Responsável</label>
                        <select name="responsavel"  class="form-control" style="float: left; margin: -21px 0px 0px 4px;width: 300px;">
                            <?php
                            //CONSULTA USUARIO getUsuario()
                            foreach ($lista_U as $item_U):
                                ?>
                                <option value="<?php echo $item_U['id'];?>"
                                <?php
                                //CONSUTA TAREFA recuperaT()
                                foreach($lista as $item):
                                    if($item_U['id'] == $item['id_usuario'])
                                    {echo"selected>";}
                                    else{echo">";}
                                endforeach;?>
                                <?php echo utf8_encode($item_U['nome']);?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </p>
                    <p style="padding: 0px 0px 34px 0px;"><label style="float: right; margin: 0px 684px 0px 0px; font-size: 17px;">Prazo</label>
                        <?php
                        //CONSUTA TAREFA recuperaT()
                        foreach ($lista as $item):
                        ?>
                        <input type="date" id="prazo" name="prazo" value="<?php echo $item['prazo']?>" style="float: left; margin: -21px 0px 0px 4px;width: 300px;" /></p>
                    <?php endforeach; ?>
                    <p style="padding: 0px 0px 34px 0px;">
                        <label style="float: right; margin: 0px 684px 0px 0px;font-size: 17px;">Status</label>
                        <select name="status"  class="form-control" style="float: left; margin: -21px 0px 0px 4px;width: 300px;">
                            <?php
                            //CONSULTA STATUS getStatus()
                            foreach ($lista_S as $item_S):
                                ?>
                                <option value="<?php echo $item_S['id']; ?>"
                            <?php
                            //CONSUTA TAREFA recuperaT()
                            foreach($lista as $item):
                                    if($item_S['id'] == $item['s_id'])
                                    {echo"selected>";}
                                    else{
                                        echo">";
                                    }
                                endforeach;?>
                                <?php echo utf8_encode($item_S['nomestatus']); ?>
                            <?php endforeach; ?>
                            </option>
                        </select>
                    </p>
                    <p style="padding: 0px 0px 34px 0px;"><label style="float: right; margin: 0px 684px 0px 0px;font-size: 17px;">Destaque</label>
                        <select name="destaque"  class="form-control" style="float: left; margin: -21px 0px 0px 4px;width: 300px;">
                            <option value="0"<?php
                                                //CONSUTA TAREFA recuperaT()
                                                foreach($lista as $item):
                                                    if($item['destaque'] == 0){
                                                        echo"selected";
                                                    }
                                                endforeach;?>
                                            >Sem destaque</option>

                            <option value="1"<?php
                                                $lista = $atualizar->recuperaT();
                                                foreach($lista as $item):
                                                    if($item['destaque'] == 1){
                                                        echo"selected";
                                                    }
                                                endforeach;
                                                ?>
                                            >Com destaque</option>
                        </select></p>
                </div>

                <p><button type="submit" class="btn btn-success">Atualizar</button></p>
            </form>
        </div>
    </div>
</div>


<?php include('../../includes/footer.php'); ?>












