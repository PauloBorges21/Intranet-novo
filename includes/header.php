
<?php
require '../pages/config.php';

if(empty($_SESSION['intranetrai'])){

header("Location: ../../index.php");
}
?>

<?php include('../../classes/usuario.class.php');
$usuario = new Usuario();
?>


<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Tue Oct 23 2018 13:42:29 GMT+0000 (UTC)  -->
<html data-wf-page="5b98252a8dec3ffc2dd64998" data-wf-site="5b98252a8dec3f8019d64997">

<head>
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="content-type" content="text/html;charset=utf-8" />-->
    <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />

    <title>Intranet</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="../css/normalize.css" rel="stylesheet" type="text/css">
    <link href="../css/webflow.css" rel="stylesheet" type="text/css">
    <link href="../css/intranet-or.webflow.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic", "Roboto Condensed:300,300italic,regular,italic,700,700italic", "Roboto Mono:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic"]
            }
        });

    </script>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);

    </script>
    <?php
//no início:
mb_internal_encoding("UTF-8");
mb_http_output( "iso-8859-1" );
ob_start("mb_output_handler");
header("Content-Type: text/html; charset=ISO-8859-1",true);

?>

    <link href="../images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="../images/webclip.png" rel="apple-touch-icon">
</head>

<body>
<?php include('../../classes/home.class.php');
$infoHome = new InformacaoHome();
?>

    <div class="section section-top w-clearfix">
        <div data-delay="0" class="drop-top w-dropdown">
            <div class="drop-toggle-top w-dropdown-toggle">
                <div class="icon-drop w-icon-dropdown-toggle"></div>
                <div>Configurações</div>
            </div>

            <nav class="drop-list-top w-dropdown-list">
                <a href="#" class="drop-link-top w-dropdown-link">Link 1</a>
                <a href="#" class="drop-link-top w-dropdown-link">Link 1</a>
                <a href="sair.php" class="drop-link-top w-dropdown-link">Sair</a>
            </nav>
        </div>

        <div data-delay="0" class="drop-top w-dropdown">
            <div class="drop-toggle-top w-dropdown-toggle">
                <div class=""></div>
                <?php $lista = $infoHome->getFotos();?>

                <?php
                foreach($lista as $item){ ?>

                <div class="box-img-user-logged w-hidden-tiny">
                    <img src="../images/users/<?php echo $item['foto'];?>" alt="" class="img-user-logged">
                </div>
            </div>

            <nav class="drop-list-top w-dropdown-list">
                <?php
                $lista = $usuario->getConta(); //PUXA USUARIO
                foreach($lista as $item):
                    echo utf8_decode($item['nome']);
                    echo $item['email'];
                endforeach;
                ?>
            </nav>
        </div>

        <?php

?>



<!--        <div class="box-img-user-logged w-hidden-tiny">-->
<!---->
<!--            <img src="../images/users/--><?php //echo $item['foto']?><!--" alt="" class="img-user-logged">-->
<!--        </div>-->

<!--        <div class="box-ico-not">-->
<!--            <img src="../images/icon/ico-notification.png" alt="" class="ico-not">-->
<!--            <div class="num-not">-->
<!--                <div>999</div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<?php } ?>
<!--       --><?php //} ?>

<!--        <img src="images/icon/ico-search.png" alt="" class="ico-search w-hidden-tiny" data-ix="show-search">-->
<!--        <form action="/search" class="search-box w-hidden-tiny w-clearfix w-form"><input type="search" class="search-input w-input" maxlength="256" name="query" placeholder="Pesquisar..." id="search" required=""><input type="submit" value="ok" class="search-submit w-button"></form>-->
    </div>

    <div data-collapse="all" data-animation="over-left" data-duration="400" class="nav-bar w-nav">
        <div class="container-nav w-container">
            <nav role="navigation" class="nav-menu w-nav-menu">
                <img src="../images/logo-or-nav.png" alt="" class="logo-nav">

                <a href="dashboard.php" class="nav-link w-inline-block">
                    <img src="../images/icon/ico-dash.png" alt="" class="img-nav">
                    <div>Dashboard</div>
                    <div class="num-nav">
                        <div>99</div>
                    </div>
                </a>

                <h2 class="h2-nav">or</h2>
                <a href="tarefa.php" class="nav-link w-inline-block">
                    <img src="../images/icon/taslk.png" alt="" class="img-nav">
                    <div>Tarefas</div>
                </a>

                <a href="#" class="nav-link w-inline-block">
                    <img src="../images/icon/icon-project.png" alt="" class="img-nav">
                    <div>Projetos</div>
                </a>

                <a href="#" class="nav-link w-inline-block">
                    <img src="../images/icon/icon-clients.png" alt="" class="img-nav">
                    <div>Clientes</div>
                </a>

                <a href="#" class="nav-link w-inline-block">
                    <img src="../images/icon/icon-idea.png" alt="" class="img-nav">
                    <div>Novas Ideias</div>
                </a>

                <a href="vencedores.php" class="nav-link w-inline-block">
                    <img src="../images/icon/icon-award.png" alt="" class="img-nav">
                    <div>Funcionário do Mês</div>
                </a>

                <h2 class="h2-nav">calendários</h2>
                <a href="#" class="nav-link w-inline-block">
                    <img src="../images/icon/icon-calendar.png" alt="" class="img-nav">
                    <div>Calendário Geral</div>
                </a>

                <a href="#" class="nav-link w-inline-block">
                    <img src="../images/icon/icon-ata.png" alt="" class="img-nav">
                    <div>Atas das Reuniões</div>
                </a>

                <a href="#" class="nav-link w-inline-block">
                    <img src="../images/icon/icon-niver.png" alt="" class="img-nav">
                    <div>Aniversários</div>
                </a>

                <h2 class="h2-nav">integração</h2>
                <a href="#" class="nav-link w-inline-block">
                    <img src="../images/icon/icon-hh.png" alt="" class="img-nav">
                    <div>Happy Hour</div>
                </a>

                <a href="#" class="nav-link w-inline-block">
                    <img src="../images/icon/icon-galery.png" alt="" class="img-nav">
                    <div>Galeria</div>
                </a>

                <a href="#" class="nav-link w-inline-block">
                    <img src="../images/icon/icon-coffee.png" alt="" class="img-nav">
                    <div>Café</div>
                </a>
            </nav>

            <div class="menu-bottom w-nav-button">
                <img src="../images/logo-small.png" alt="">
            </div>
            <a href="dashboard.php" class="link-menu-closed link-dash w-inline-block">
                <img src="../images/icon/ico-dash.png" alt="" class="img-ico-side-menu">
                <div class="num-not">
                    <div>999</div>
                </div>
            </a>

            <div class="divisor-nav">

            </div>
            <a href="tarefa.php" class="link-menu-closed w-inline-block">
                <img src="../images/icon/taslk.png" alt="" class="img-ico-side-menu">
            </a>

            <a href="#" class="link-menu-closed w-inline-block">
                <img src="../images/icon/icon-project.png" alt="" class="img-ico-side-menu">
            </a>

            <a href="#" class="link-menu-closed w-inline-block">
                <img src="../images/icon/icon-clients.png" alt="" class="img-ico-side-menu">
            </a>

            <a href="#" class="link-menu-closed w-inline-block">
                <img src="../images/icon/icon-idea.png" alt="" class="img-ico-side-menu">
            </a>

            <a href="vencedores.php" class="link-menu-closed w-inline-block">
                <img src="../images/icon/icon-award.png" alt="" class="img-ico-side-menu">
            </a>

            <div class="divisor-nav"></div>
            <a href="#" class="link-menu-closed w-inline-block">
                <img src="../images/icon/icon-calendar.png" alt="" class="img-ico-side-menu">
            </a>

            <a href="#" class="link-menu-closed w-inline-block">
                <img src="../images/icon/icon-ata.png" alt="" class="img-ico-side-menu">
            </a>

            <a href="#" class="link-menu-closed w-inline-block">
                <img src="../images/icon/icon-niver.png" alt="" class="img-ico-side-menu">
            </a>

            <div class="divisor-nav"></div>
            <a href="#" class="link-menu-closed w-inline-block">
                <img src="../images/icon/icon-hh.png" alt="" class="img-ico-side-menu">
            </a>

            <a href="#" class="link-menu-closed w-inline-block">
                <img src="../images/icon/icon-galery.png" alt="" class="img-ico-side-menu">
            </a>

            <a href="#" class="link-menu-closed w-inline-block">
                <img src="../images/icon/icon-coffee.png" alt="" class="img-ico-side-menu">
            </a>
        </div>
    </div>
