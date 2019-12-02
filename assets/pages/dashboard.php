
<?php
session_start();

if(empty($_SESSION['intranetrai'])){
header("Location: ../../index.php");
}


?>

<?php include('../../includes/header.php') ?>

<?php include('../../classes/tarefa.class.php');
$tarefa = new Tarefa();
?>
<?php include('../../classes/vencedores.class.php');
$vencedores = new Vendedores();
?>
<?php include('../../classes/destaque.class.php');
$projetosdestaque = new Destaque();
?>
<?php include('../../classes/aniversariante.class.php');
$aniverdodia = new Aniversario();
?>
    <div class="section section-header">
        <div class="container-geral w-clearfix">
            <h1>OR Dashboard</h1>
            <div class="date"><?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                echo strftime('%A, %d de %B de %Y', strtotime('today'));?></div>
        </div>
    </div>
    <div class="section section-jobs-home">
        <div class="container-geral w-clearfix">
            <div class="container container-68 w-hidden-tiny">
                <div class="header-box w-clearfix">
                    <h2>Tarefas da Equipe</h2>
                    <div data-delay="0" class="drop-order w-dropdown">
                        <div class="drop-order-toggle w-hidden-small w-hidden-tiny w-dropdown-toggle">
                            <div class="w-icon-dropdown-toggle"></div>
                            <div>Ordernar por</div>
                        </div>
                        <nav class="drop-list-order w-dropdown-list">
                            <a href="#" class="w-dropdown-link">Link 1</a>
                            <a href="#" class="w-dropdown-link">Link 2</a>
                            <a href="#" class="w-dropdown-link">Link 3</a>
                        </nav>
                    </div>
                </div>
                <ul class="ul-tarefas w-list-unstyled">
                    <li class="li-tarefas">
                        <div class="row-tarefas row-1 w-row">
                            <div class="col-tarefa w-col w-col-4 w-col-small-small-stack">
                                <h3>tarefa</h3>
                            </div>
                            <div class="col-tarefa w-col w-col-2 w-col-small-small-stack">
                                <h3>cliente</h3>
                            </div>
                            <div class="col-tarefa w-col w-col-2 w-col-small-small-stack">
                                <h3>responsável</h3>
                            </div>
                            <div class="col-tarefa w-col w-col-2 w-col-small-small-stack">
                                <h3>prazo</h3>
                            </div>
                            <div class="col-tarefa w-col w-col-2 w-col-small-small-stack">
                                <h3>status</h3>
                            </div>
                        </div>
                    </li>

                    <?php

                    $valor = 0;

                    //$class ="li-tarefa escura w-hidden-small w-hidden-tiny";


                    $lista = $tarefa->getAll();

                    foreach($lista as $item):


                        if($valor %2 != 0){
                            $class ="li-tarefas";
                        }else{
                            $class="li-tarefas escura w-hidden-small w-hidden-tiny";


                    }
                        ?>

<!--                        Cor do status-->
                        <?php
                        $corStatus = utf8_encode($item['s_nome']);
                        if($corStatus == 'Concluído'){
                            $corStatus = "status concluido w-col w-col-2";

                        }elseif ($corStatus == 'Em aprovação'){
                            $corStatus = "status aprovacao w-col w-col-2";

                        }elseif ($corStatus == 'Em fila'){
                            $corStatus = "status w-col w-col-2";

                        }elseif ($corStatus == 'Em andamento') {
                            $corStatus = "status andamento col-tarefa w-col w-col-2";
                            {

                            }
                        }

?>

                    <li class="<?php echo $class;?>">

                        <?php
                        if($valor > 4 ){
                            break;
                        }

                        ?>
                        <div class="row-tarefas w-row">


                            <div class="col-tarefa w-col w-col-4"><a href="#" class="a-tarefas"><?php echo utf8_encode($item['nome']);?></a></div>
                            <div class="col-tarefa w-col w-col-2"><a href="#" class="a-tarefas"><?php echo utf8_encode($item['nome_cliente']);?></a></div>
                            <?php
                            $separa = explode(' ',$item['responsavel']);
                            ?>
                            <div class="col-tarefa w-col w-col-2"><a href="#" class="a-tarefas"><?php echo utf8_encode($separa[0]);?></a></div>
                            <div class="col-tarefa w-col w-col-2">
                                <?php $minha_data = $item['prazo'];?>
                                <div><?php echo date('d/m/Y', strtotime($minha_data ));?></div>
                            </div>
                            <div class="<?php echo $corStatus ; ?>">
                                <div><?php echo utf8_encode($item['s_nome'])?></div>
                            </div>
                        </div>



                    </li>
                <?php $valor ++;?>
                <?php endforeach; ?>
                    </li>
                </ul><a href="tarefa.php" class="btn violet w-button">mais tarefas</a>
            </div>


            <div class="container container-33">
                <div class="header-box w-clearfix">

                    <h2>Grandes Projetos</h2>
                    <div data-delay="0" class="drop-order w-dropdown">
                        <div class="drop-order-toggle w-dropdown-toggle">
                            <div class="w-icon-dropdown-toggle"></div>
                            <div>Ordernar por</div>
                        </div>
                        <nav class="drop-list-order w-dropdown-list">
                            <a href="#" class="w-dropdown-link">Link 1</a>
                            <a href="#" class="w-dropdown-link">Link 2</a>
                            <a href="#" class="w-dropdown-link">Link 3</a>
                        </nav>
                    </div>
                </div>
                <ul class="ul-projects w-list-unstyled">
                    <?php
                    $lista = $projetosdestaque ->getDestaqueHome();
                    foreach($lista as $item):
                        ?>

                    <li class="li-projects">

                        <div class="row-projects w-row">
                            <div class="col-logo w-col w-col-3 w-col-small-3">
                                <img src="../images/clientes/<?php echo ($item['imagem_url']);?>" alt="" class="img-logo"></div>
                            <div class="col-infos w-clearfix w-col w-col-9 w-col-small-9">
                                <h3><?php echo utf8_encode($item['nome']);?></h3>
                                <div class="field-label">Cliente: </div>
                                <div class="fiel-name"><?php echo utf8_encode($item['nome_cliente']);?></div>
                                    <div class="box-status w-clearfix">
                                        <div class="field-label">Status:</div>
                                        <div class="fiel-name"><?php echo utf8_encode($item['nomestatus']);?></div>
                                        <div class="divisor-status">*</div>
                                        <div class="field-label">Entrega:</div>
                                    <?php
                                    $minha_data=($item['prazo']);?>
                                    <div class="fiel-name"><?php echo date('d/m/Y', strtotime($minha_data ));?></div>

                                </div>

                            </div>

                        </div>

                        <?php endforeach; ?>
                    </li>
                    <a href="#" class="btn violet w-button">outros projetos</a>
                                </div>

                            </div>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </div>

    <div class="section section-clientes">
        <div class="container-geral">
            <div class="container">
                <div class="header-box">
                    <h2>Clientes</h2>
                </div>

                <div data-animation="slide" data-duration="500" data-infinite="1" class="slider w-slider">
                    <div class="arrow-slider w-slider-arrow-left">
                        <div class="w-icon-slider-left"></div>
                    </div>
                    <div class="mask-slider w-slider-mask">

                        <?php
                        $lista = $projetosdestaque->destaqueCarrocel();
                        foreach($lista as $item):
                        ?>
                        <div class="slide-clientes w-slide">


                            <div class="box-img-slide-clientes">

                                <img src="../images/logoclientes/<?php echo ($item['imagem']);?>" alt="" class="logo-slide"></div>
                        </div>
                        <?php endforeach;?>

                        </div>



                    <div class="arrow-slider w-slider-arrow-right">
                        <div class="w-icon-slider-right"></div>
                    </div>
                </div>
                    <div class="w-hidden-main w-hidden-medium w-hidden-small w-hidden-tiny w-slider-nav w-round"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-jobs-home">
        <div class="container-geral w-clearfix">
            <div class="container container-68">
                <div class="header-box w-clearfix">
                    <h2>Novas Ideias</h2>
                    <div data-delay="0" class="drop-order w-dropdown">
                        <div class="drop-order-toggle w-dropdown-toggle">
                            <div class="w-icon-dropdown-toggle"></div>
                            <div>Ordernar por</div>
                        </div>
                        <nav class="drop-list-order w-dropdown-list">
                            <a href="#" class="w-dropdown-link">Link 1</a>
                            <a href="#" class="w-dropdown-link">Link 2</a>
                            <a href="#" class="w-dropdown-link">Link 3</a>
                        </nav>
                    </div>
                </div>
                <div class="row-titu-ideias w-row">
                    <div class="w-col w-col-10 w-col-small-10">
                        <h3 class="h3-ideas w-hidden-tiny">Título</h3>
                    </div>
                    <div class="w-col w-col-2 w-col-small-2">
                        <h3 class="h3-ideas w-hidden-tiny">Respostas</h3>
                    </div>
                </div>
                <ul class="ul-ideias w-list-unstyled">
                    <li class="li-ideias">
                        <a href="#" class="a-ideias w-inline-block">
                            <div class="row-ideas w-row">
                                <div class="w-col w-col-10 w-col-small-small-stack">
                                    <h4 class="h4-titu-idea">[Vaquinha] Nova cafeteira</h4>
                                    <div>por Ruan, 18/06/2018</div>
                                </div>
                                <div class="w-col w-col-2 w-col-small-small-stack">
                                    <div>7 comentários</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="li-ideias">
                        <a href="#" class="a-ideias w-inline-block">
                            <div class="row-ideas w-row">
                                <div class="w-col w-col-10 w-col-small-small-stack">
                                    <h4 class="h4-titu-idea">Novos Monitores</h4>
                                    <div>por Thiago, 18/06/2018</div>
                                </div>
                                <div class="w-col w-col-2 w-col-small-small-stack">
                                    <div>7 comentários</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="li-ideias">
                        <a href="#" class="a-ideias w-inline-block">
                            <div class="row-ideas w-row">
                                <div class="w-col w-col-10 w-col-small-small-stack">
                                    <h4 class="h4-titu-idea">Lorem Ipsum</h4>
                                    <div>por Victor, 18/06/2018</div>
                                </div>
                                <div class="w-col w-col-2 w-col-small-small-stack">
                                    <div>7 comentários</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="li-ideias">
                        <a href="#" class="a-ideias w-inline-block">
                            <div class="row-ideas w-row">
                                <div class="w-col w-col-10 w-col-small-small-stack">
                                    <h4 class="h4-titu-idea">Lorem Ipsum</h4>
                                    <div>por Victor, 18/06/2018</div>
                                </div>
                                <div class="w-col w-col-2 w-col-small-small-stack">
                                    <div>7 comentários</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="li-ideias">
                        <a href="#" class="a-ideias w-inline-block">
                            <div class="row-ideas w-row">
                                <div class="w-col w-col-10 w-col-small-small-stack">
                                    <h4 class="h4-titu-idea">Lorem Ipsum</h4>
                                    <div>por Victor, 18/06/2018</div>
                                </div>
                                <div class="w-col w-col-2 w-col-small-small-stack">
                                    <div>7 comentários</div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="box-btns w-clearfix">
                    <a href="#" class="btn violet left w-button">mais ideias</a>
                    <a href="#" class="btn verde w-button">nova ideia</a>
                </div>
            </div>
            <?php
            $lista = $vencedores->getVencedorHome();
            foreach($lista as $item):
            ?>

            <div class="container container-33">
                <div class="header-box w-clearfix">
                    <h2 class="h2-funcionario">Funcionário do Mês</h2>
                    <div data-delay="0" class="drop-order funcionario w-dropdown">
                        <div class="drop-order-toggle funcionario w-dropdown-toggle">
                            <div class="w-icon-dropdown-toggle"></div>
                            <?php

                           $data = ($item['mes']);
                           $separa = explode('-',$data);
                           $mes = $separa[1];
                           if($mes == '01') {
                               $mes = "Janeiro";

                           }elseif($mes == '02'){
                               $mes ="Fevereiro";

                           }elseif($mes == '03') {
                               $mes = "Março";

                           }elseif($mes == '04') {
                               $mes = "Abril";

                           }elseif($mes == '05') {
                               $mes = "Maio";

                           }elseif($mes == '06') {
                               $mes = "Junho";

                           }elseif($mes == '07') {
                               $mes = "Julho";

                           }elseif($mes == '08') {
                               $mes = "Agosto";

                           }elseif($mes == '09') {
                               $mes = "Setembro";

                           }elseif($mes == '10') {
                               $mes = "Outubro";

                           }elseif($mes == '11') {
                               $mes = "Novembro";

                           }elseif($mes == '12') {
                               $mes = "Dezembro";
                           }
                            ?>


                            <div><?php echo $mes; ?></div>
                        </div>
                        <nav class="drop-list-order w-dropdown-list">
<!--                            <a href="#" class="w-dropdown-link">Link 1</a>-->
<!--                            <a href="#" class="w-dropdown-link">Link 2</a>-->
<!--                            <a href="#" class="w-dropdown-link">Link 3</a>-->
                        </nav>
                    </div>
                </div>
                <div class="box-bg-funcionario">
                    <img src="../images/users/foto-ruan2.png" alt="" class="img-bg-funcionario"></div>
                <div class="img-funcionario">
                    <img src="../images/users/<?php echo($item['foto']);?>" alt=""></div>
                <img src="../images/icon/ico-ribbon.png" alt="" class="ico-ribbon">
                <div class="nome-funcionario-mes"><?php echo utf8_encode($item['nome']);?></div>
                <p class="desc-funcionario-mes"><?php echo utf8_encode($item['comentario']);?></p>
                <a href="vencedores.php" class="btn violet w-button">outros vencedores</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
    <div class="section">
        <div class="container-geral">
            <h2 class="h2-section">Calendários, datas e mais</h2>
        </div>
    </div>
    <div class="section">
        <div class="container-geral w-clearfix">
            <div class="container container-40">
                <div class="header-box w-clearfix">
<!--                    <h2>Calendário Geral</h2>-->
               <div data-animation="slide" data-duration="500" data-infinite="1" class="slider-meses w-slider">
                        <div class="mask-slider-meses w-slider-mask">
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Janeiro</div>-->
<!--                            </div>-->
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Fevereiro</div>-->
<!--                            </div>-->
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Março</div>-->
<!--                            </div>-->
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Abril</div>-->
<!--                            </div>-->
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Maio</div>-->
<!--                            </div>-->
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Junho</div>-->
<!--                            </div>-->
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Julho</div>-->
<!--                            </div>-->
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Agosto</div>-->
<!--                            </div>-->
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Setembro</div>-->
<!--                            </div>-->
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Outubro</div>-->
<!--                            </div>-->
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Novembro</div>-->
<!--                            </div>-->
<!--                            <div class="slide-mes w-slide">-->
<!--                                <div>Dezembro</div>-->
<!--                            </div>-->
                        </div>
                        <div class="arrow-slider-meses w-slider-arrow-left">
                            <div class="w-icon-slider-left"></div>
                        </div>
                        <div class="arrow-slider-meses w-slider-arrow-right">
                            <div class="w-icon-slider-right"></div>
                        </div>
                        <div class="w-hidden-main w-hidden-medium w-hidden-small w-hidden-tiny w-slider-nav w-round"></div>
                    </div>
                </div>

                <div class="container-calendario">
                    <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=400&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=q077cr5o7gll7nfu9imp7q3tq8%40group.calendar.google.com&amp;color=%23AB8B00&amp;ctz=America%2FSao_Paulo" style="border-width:0" width="400" height="400" frameborder="0" scrolling="no"></iframe>
<!--                    <img src="images/calendario.jpg" srcset="images/calendario-p-500.jpeg 500w, images/calendario.jpg 610w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 77vw, (max-width: 991px) 80vw, 32vw" alt="" class="img-calendario">--></div>
                <div class="box-btns w-clearfix"><a href="#" class="btn violet left w-button">mais ideias</a><a href="#" class="btn verde w-button">nova ideia</a></div>
            </div>
            <div class="container container-33">
                <div class="header-box">
                    <h2>Atas de Reuniões</h2>
                </div>


                <ul class="ul-reunioes w-list-unstyled">
                    <?php
                    $lista = $tarefa->getReuniao();
                    foreach($lista as $item):
                        ?>

                    <li class="li-reunioes w-clearfix">
                        <a href="#" class="info-reuniao w-inline-block">
                            <h3 class="h3-reuniao"><?php echo utf8_encode($item['nome']);?></h3>
                            <?php
                            $minha_data = $item['datareuniao'];?>
                            <div class="data"><?php echo date('d/m/Y', strtotime($minha_data ));?></div>
                        </a>
                    </li>

                    <?php endforeach;?>

                </ul><a href="#" class="btn violet w-button">outras atas</a>
            </div>
            <div class="container container-33">
                <div class="header-box">
                    <h2>Aniversários</h2>
                </div>
                <ul class="ul-aniversariantes w-list-unstyled">
                    <?php
                    $lista = $aniverdodia->getAniversariododia();

                    foreach($lista as $item):

                        //$nomefuncionario = $item['nome'];
                        $nomefuncionario = explode(' ',$item['nome']);
                        $databanco = $item['data_nascimento'];

                        /*if(!empty($nomefuncionario)){
                            $classniver='aniversariante-dia';
                            $dataniver='Hoje!';

                        }else{
                            //tentar colocar uma função aqui do restante dos usuarios
                            $classniver='0';
                            $dataniver=$databanco;
                        }*/
                        $hoje = date('m-d');
                        $mesatual = date('m');
                        $niver = explode('-',$databanco);
                        $niver_final = $niver[1] . '-' . $niver[2];
                        $dataniver = $databanco;
                        $classniver ='aniversariante-dia';?>
                        <?php if($niver_final == $mesatual && date('d/m', strtotime($niver_final) >= date('d/m', strtotime($hoje)))&& date('d/m', strtotime($niver_final)) <= date('d/m', strtotime($hoje))){
                        ?>

                        <li class="li-aniversariantes <?php if ($niver_final == $hoje){ echo $classniver; } ;?> w-clearfix">

                        <!--                        --><?php //if($niver_final == $mesatual || date('d/m', strtotime($niver_final)) >= date('d/m', strtotime($hoje))){
//                            ?>
                        <div class="box-foto-niver"><img src="../images/users/<?php echo $item['foto'] ;?>" alt="" class="foto-niver"></div>
                        <div class="info-niver">
                        <h3 class="h3-niver"><?php echo $nomefuncionario[0]; ?></h3>
                        <div class="data">


                        <?php
                        echo date('d/m', strtotime($dataniver));?>
                        <?php
                        if($niver_final == $hoje)
                            echo 'Hoje!';
                    }else{
                        ?>
                        <li class="li-aniversariantes <?php if ($niver_final == $hoje){ echo $classniver; } ;?> w-clearfix">

                        <!--                        --><?php //if($niver_final == $mesatual || date('d/m', strtotime($niver_final)) >= date('d/m', strtotime($hoje))){
//                            ?>
                        <div class="box-foto-niver"><img src="../images/users/<?php echo $item['foto'] ;?>" alt="" class="foto-niver"></div>
                        <div class="info-niver">
                        <h3 class="h3-niver"><?php echo $nomefuncionario[0]; ?></h3>
                        <div class="data">


                        <?php
                        echo date('d/m', strtotime($dataniver));?>
                        <?php
                        if($niver_final == $hoje)
                            echo 'Hoje!';       ;
                    }
                        ?>


                        <!--                        --><?php
//                        echo date('d/m', strtotime($dataniver));
//                        }else($niver_final != $hoje && $dataniver > date('m-d'))?>
                        <!--                                <div class="box-foto-niver"><img src="../images/users/--><?php //echo $item['foto'] ;?><!--" alt="" class="foto-niver"></div>-->
                        <!--                                <div class="info-niver">-->
                        <!--                                    <h3 class="h3-niver">--><?php //echo $nomefuncionario; ?><!--</h3>-->
                        <!--                                    <div class="data">-->


                        </div>

                        </div>

                        </li>
                    <?php endforeach;?>


                </ul><a href="#" class="btn violet w-button">próximos</a>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container-geral">
            <h2 class="h2-section">Integração OR</h2>
        </div>
    </div>
    <div class="section">
        <div class="container-geral w-clearfix">
            <div class="container container-40">
                <div class="header-box">
                    <h2>Eventos</h2>
                </div>



                <ul class="ul-eventos w-list-unstyled">
                    <?php
                    $lista = $tarefa ->getEvento();
                    foreach($lista as $item):
                        ?>
                    <li class="li-eventos w-clearfix">
                         <?php

                           $data = ($item['data_evento']);
                           $separa_data = explode('-',$data);
                           $dia = $separa_data[2];
                           if($item['tipoevento'] == '1') {
                               $classcss = "circle-data verde";

                           }elseif($item['tipoevento'] == '2'){
                               $classcss ="circle-data azul";

                           }elseif($item['tipoevento'] == '3'){
                               $classcss ="circle-data roxo";

                           }elseif($item['tipoevento'] == '4'){
                               $classcss ="circle-data rosa";
                          };?>
                        <div class="<?php echo $classcss; ?>">
                            <div><?php echo $dia ?></div>
                        </div>
                        <div class="info-evento">
                            <div class="nome-evento"><?php echo utf8_encode($item['titulo']);?><br></div>
                            <div class="detalhe-evento"><?php echo $item['horario'] ;?> * <?php echo utf8_encode($item['local']);?></div>
                        </div>
                    </li>
                    <?php endforeach; ?>

                </ul>
                <div class="box-btns w-clearfix"><a href="#" class="btn violet left w-button">calendário completo</a>
                    <a href="#" class="btn verde w-button">adicionar evento</a></div>
            </div>
            <div class="container container-33">
                <div class="header-box">
                    <h2>Galeria</h2>
                </div>
                <div class="container-galeria">
                    <div class="box-gallery w-clearfix">
                        <?php
                        $lista = $projetosdestaque ->carrosselGaleria();

                        $contador = 1;

                        foreach($lista as $item):
                        ?>
                            <?php
                            $myid = $item['id'];

                            ?>


                        <a href="#" class="lightbox-link-box w-inline-block w-lightbox">
                            <img src="../images/galeria/<?php echo($item['url']);?>"  class="img-galeria hover-shadow">

                            <div class="hover-galeria hover-shadow "onclick="openModal();currentSlide(<?php echo $contador;?>)" data-ix="hover-galeria">
                                <h4>Fotos da OR</h4>
                                <div>ver galeria +</div>
                            </div>
                        </a>

                        <?php //echo '<script>alert("'.$contador.'");</script>'; ?>
                            <?php $contador += 1; ?>
                            <?php endforeach; ?>
                            <!-- The Modal/Lightbox -->
                            <div id="myModal" class="modal">
                                <span class="close cursor" onclick="closeModal()">&times;</span>
                                <div class="modal-content">
                                    <div class="bloco-img">
                                    <?php
                                    $lista = $projetosdestaque->carrosselGaleriaModal();
                                    $total_img = $projetosdestaque->contaImagemCarrossel();
                                    $conta_novo = 1;

                                    foreach($lista as $item):
                                    ?>
                                    <?php
                                    $myid = $item['id'];?>
                                    <div id="<?php echo $myid;?>" class="mySlides">
                                        <div class="numbertext"><?php echo $conta_novo; ?> / <?php echo $total_img['quantidade']; ?></div>
                                        <img src="../images/galeria/<?php echo($item['url']);?>" onclick="currentSlide(<?php echo $myid;?>)">
                                    </div>
                                    <?php $conta_novo += 1; endforeach; ?>
                                    </div>
                                    <!-- Next/previous controls -->
                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                                    <!-- Caption text -->
<!--                                    <div class="caption-container">-->
<!--                                        <p id="caption"></p>-->
<!--                                    </div>-->

                                    <!-- Thumbnail image controls -->

                                </div>
                            </div>

                    </div>

                </div>
                    <a href="#" class="btn violet w-button">próximos</a>
            </div>
            <div class="container container-33">
                <div class="header-box">
                    <h2>Café no Bule</h2>
                </div>
                <div class="container-grafico-cafe"><img src="images/grafico-cafe.png" alt=""></div>
                <div class="box-total">
                    <div class="valor-arrecadado">RS 37,00</div>
                    <div>de R$ 60,00</div>
                </div>
                <p class="info-arrecadacao">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p><a href="#" class="btn violet w-button">próximos</a>
            </div>
        </div>
    </div>
    <?php include('../../includes/footer.php'); ?>
