<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 22/11/2018
 * Time: 10:13
 */
session_start();

if(empty($_SESSION['intranetrai'])){
    header('Location:index.php');

}

$id = $_SESSION['intranetrai'];

?>
<?php include('../../includes/header.php') ?>

<?php include('../../classes/paginacao.class.php');
$vencedores = new Paginacao();
?>

<div class="container container-vencedores">
    <div class="header-box-vencedores w-clearfix">
        <h2>Vencedores</h2>
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
<!--    <ul class="ul-projects w-list-unstyled">-->

        <div class="area-calendario">
            <?php
            $lista = $vencedores->getPagVencedores();
            foreach($lista as $item):
                ?>
            <div class="mes">
                <?php
                                       $data = ($item['mesAno']);
                                          $separa = explode('-',$data);
                                           $mes = $separa[1];
                                          $ano = $separa[0];

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



                <span class="mes-descricao"><?php echo "{$mes}/{$ano}"; ?></span>
                <div class="mes-foto">
                    <img src="../images/users/<?php echo($item['foto']);?>" alt="" class="img-logo">
                </div>
                <div class="cont-funcionario">
                    <span class="nome-func"><?php echo utf8_encode($item['nome']);?></span>
                    <span class="cargo-func"><strong>Cargo:</strong> <?php echo utf8_encode($item['nome_cargo']);?></span>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

<!--        <li class="li-projects-vencedores">-->
<!--            <div class="row-projects w-row">-->
<!--                <div class="col-logo w-col w-col-3 w-col-small-3">-->
<!--                    <img src="--><?php //echo($item['foto']);?><!--" alt="" class="img-logo">-->
<!--                </div>-->
<!--                <div class="col-infos w-clearfix w-col w-col-9 w-col-small-9">-->
<!--                    <h3>--><?php //echo utf8_encode($item['nome']);?><!--</h3>-->
<!--                </div>-->
<!--                    <div class="field-label">Cargo: --><?php //echo utf8_encode($item['nome_cargo']);?>
<!--                    </div>-->
<!---->
<!---->
<!--                    <div class="box-status w-clearfix">-->
<!--<!--                        <div class="field-label"> Status:</div>-->
<!--<!--                        <div class="fiel-name"> Em andamento</div>-->
<!--<!--                        <div class="divisor-status">*</div>-->
<!--                        --><?php
//                           $data = ($item['mesAno']);
//                           $separa = explode('-',$data);
//                           $mes = $separa[1];
//                           $ano = $separa[0];
//                        ?>
<!---->
<!--                        <div class="field-label-vencedor"> Mês:--><?php //echo "{$mes}/{$ano}" ?><!--</div>-->
<!--<!--                        <div class="fiel-name-vencedor"> 10/2018</div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!---->
<!---->
<!--    </li>-->

<!--</ul>-->
    <ul class="pagination">
        <li>
            <?php $montar = $vencedores->ordenarVencedores()?>
        </li>
    </ul>
</div>

<!--        <li class="li-projects">-->
<!--            <div class="row-projects w-row">-->
<!--                <div class="col-logo w-col w-col-3 w-col-medium-3 w-col-small-3"><img src="../images/clientes/logo-rai.jpg" alt="" class="img-logo"></div>-->
<!--                <div class="col-infos w-clearfix w-col w-col-9 w-col-medium-9 w-col-small-9">-->
<!--                    <h3>Plataforma ROM/MOT</h3>-->
<!--                    <div class="field-label">Cliente: </div>-->
<!--                    <div class="fiel-name">Grupo Rai</div>-->
<!--                    <div class="box-status w-clearfix">-->
<!--                        <div class="field-label">Status:</div>-->
<!--                        <div class="fiel-name">Em andamento</div>-->
<!--                        <div class="divisor-status">*</div>-->
<!--                        <div class="field-label">Entrega:</div>-->
<!--                        <div class="fiel-name">19/09/2018</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </li>-->
<!--        <li class="li-projects">-->
<!--            <div class="row-projects w-row">-->
<!--                <div class="col-logo w-col w-col-3 w-col-small-3"><img src="../images/clientes/logo-latam.jpg" alt="" class="img-logo"></div>-->
<!--                <div class="col-infos w-clearfix w-col w-col-9 w-col-small-9">-->
<!--                    <h3>Sistema Latam Airlines</h3>-->
<!--                    <div class="field-label">Cliente: </div>-->
<!--                    <div class="fiel-name">LATAM</div>-->
<!--                    <div class="box-status w-clearfix">-->
<!--                        <div class="field-label">Status:</div>-->
<!--                        <div class="fiel-name">Em andamento</div>-->
<!--                        <div class="divisor-status">*</div>-->
<!--                        <div class="field-label">Entrega:</div>-->
<!--                        <div class="fiel-name">19/09/2018</div>-->



<?php include('../../includes/footer.php') ?>
