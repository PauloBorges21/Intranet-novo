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
<?php //header("Content-Type: text/html; charset=ISO-8859-1",true);?>

    <div class="section section-header">
        <div class="container-geral w-clearfix">
            <h1>OR Tarefas</h1>
            <div class="date">quarta-feira, 30 de janeiro de 2019</div>
        </div>
    </div>



<form method="POST" role="form" action="tarefa_submit.php">

    <div id="cadastro" name="cadastro">

        <div class="section section-jobs-home">
            <div class="container-geral w-clearfix">

                <div class="container container-tarefa w-hidden-tiny ">
                    <div class="header-box w-clearfix">
                        <h2>Atualizar</h2>
                        <div data-delay="0" class="drop-order w-dropdown">
                            <div class="drop-order-toggle w-hidden-small w-hidden-tiny w-dropdown-toggle">
                                <div class="w-icon-dropdown-toggle"></div>
                                <div>Ordernar por</div>

                                <div id="cadastro" name="cadastro">
                                    <p><label>Nome: </label>
                                        <input type="text" id="nome" name="nome" maxlength="100" placeholder="Max 100 caracteres" /></p>
                                    <p><label>Cliente: </label>
                                        <!--<input type="text" id="cliente" name="cliente" maxlength="100" placeholder="Max 100 caracteres" />-->
                                        <select name="cliente"  class="form-control">
                                            <option value="" selected>Selecione</option>
                                            <?php
                                            $lista = $tarefa->getCliente();
                                            foreach ($lista as $item):
                                            ?>
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
                                    </p>
                                    <p><label>Prazo: </label>
                                        <input type="date" id="prazo" name="prazo" /></p>
                                    <p>
                                        <label>Status: </label>
                                        <select name="status"  class="form-control">
                                            <option value="0" selected>Selecione</option>
                                            <?php
                                            $lista = $tarefa->getStatus();
                                            foreach ($lista as $item):
                                            ?>
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


                            </div>
                            <nav class="drop-list-order w-dropdown-list"><a href="#" class="w-dropdown-link">Link 1</a><a href="#" class="w-dropdown-link">Link 2</a><a href="#" class="w-dropdown-link">Link 3</a></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</form>






















<?php include('../../includes/footer.php'); ?>