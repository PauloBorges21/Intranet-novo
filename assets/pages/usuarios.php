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

<?php require('../../classes/paginacao.class.php');
$paginador = new Paginacao();?>


<div class="section section-header">
    <div class="container-geral w-clearfix">
        <h1>OR Funcionários</h1>
        <div class="date"><?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            echo strftime('%A, %d de %B de %Y', strtotime('today'));?></div>
    </div>
</div>
<div class="section section-jobs-home">
    <div class="container-geral w-clearfix">

        <div class="container container-tarefa w-hidden-tiny ">
            <div class="header-box w-clearfix">
                <h2>Lista de colaboradores</h2>
                <div data-delay="0" class="drop-order w-dropdown">
                    <div class="drop-order-toggle w-hidden-small w-hidden-tiny w-dropdown-toggle">
                        <div class="w-icon-dropdown-toggle"></div>
                        <div>Ordernar por</div>
                    </div>
                    <nav class="drop-list-order w-dropdown-list"><a href="#" class="w-dropdown-link">Link 1</a><a href="#" class="w-dropdown-link">Link 2</a><a href="#" class="w-dropdown-link">Link 3</a></nav>
                </div>
            </div>
            <ul class="ul-tarefas w-list-unstyled">
                <li class="li-tarefas">
                    <div class="row-tarefas row-1 w-row">
                        <div class="col-tarefa w-col w-col-5 w-col-small-small-stack">
                            <h3>Nome</h3>
                        </div>
                        <div class="col-tarefa w-col w-col-4 w-col-small-small-stack">
                            <h3>Email</h3>
                        </div>
                        <div class="col-tarefa w-col w-col-3 w-col-small-small-stack">
                            <h3>Cargo</h3>
                        </div>
                        <div class="col-tarefa w-col w-col-2 w-col-small-small-stack">
                            <h3>Data nascimento</h3>
                        </div>
                        <div class="col-tarefa w-col w-col-2 w-col-small-small-stack">
                            <h3>Foto</h3>
                        </div>
                        <div class="col-tarefa w-col w-col-1 w-col-small-small-stack">
                            <h3>Editar</h3>
                        </div>
                    </div>
                </li>

                <?php

                $valor = 0;

                //$class ="li-tarefa escura w-hidden-small w-hidden-tiny";


                $lista = $tarefa->getUsuario2();

                foreach($lista as $item):


                    if($valor %2 != 0){
                        $class ="li-tarefas";
                    }else{
                        $class="li-tarefas escura w-hidden-small w-hidden-tiny";
                    }
                    ?>

                    <?php
//                    $corStatus = utf8_encode($item['s_nome']);
//                    if($corStatus == 'Concluído'){
//                        $corStatus = "status concluido w-col w-col-2";
//
//                    }elseif ($corStatus == 'Em aprovação'){
//                        $corStatus = "status aprovacao w-col w-col-2";
//
//                    }elseif ($corStatus == 'Em fila'){
//                        $corStatus = "status w-col w-col-2";
//
//                    }elseif ($corStatus == 'Em andamento') {
//                        $corStatus = "status andamento col-tarefa w-col w-col-2";
//                        {
//
//                        }
//                    }

                    ?>

                    <li class="<?php echo $class;?>">

                        <!--                        --><?php
                        //                       if($valor > 5 ){
                        //                            break;
                        //                        }
                        ////
                        ////                        ?>
                        <div class="row-tarefas w-row">

                            <?php
                            $separa = explode(' ',$item['nome']);
                            ?>
                            <div class="col-tarefa w-col w-col-4"><a href="#" class="a-tarefas"><?php echo utf8_encode($item['nome']);?></a></div>
                            <div class="col-tarefa w-col w-col-3"><a href="#" class="a-tarefas"><?php echo utf8_encode($item['email']);?></a></div>
                            <div class="col-tarefa w-col w-col-2"><a href="#" class="a-tarefas"><?php
                                    echo utf8_encode($item['nome_cargo']);

                                                                                                    ?></a></div>
                            <div class="col-tarefa w-col w-col-2">
                                <?php $minha_data = $item['data_nascimento'];?>
                                <div><?php echo date('d/m/Y', strtotime($minha_data ));?></div>
                            </div>

                            <div class="col-tarefa w-col w-col-2">
                                <div class="box-foto-niver"><img src="../images/users/<?php

                                        $lista_U = $tarefa->getUsuario2();
                                        foreach($lista_U as $item_U):
                                            if($item_U['id'] == $item['id'])
                                            {echo $item['foto'];}
                                        endforeach;                                     ?>" alt="" class="foto-niver">
                                </div>
                            </div>

                            <div>
                                <?php
                                $idEditar = filter_input(INPUT_GET, 'idtarefas');
                                $idEditar = "idusuario=".$item['id'];
                                ?>

                                <a href="../pages/usuario_atualizar.php?<?php echo $idEditar?>">
                                    <img src="../images/icons/icon-adm-bottom.png" style="width: 22px" height="22px">
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php $valor ++;?>
                <?php endforeach; ?>

            </ul>
            <ul class="pagination">
                <li>
                    <?php $montar = $paginador->getOrdenar()?>
                </li>
            </ul>
        </div>







        <?php include('../../includes/footer.php') ?>
