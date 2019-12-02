<?php
session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: ../../index.php");
}
?>

<?php include('../../classes/cliente.class.php');
$cliente = new Cliente();

$id = $_SESSION['intranetrai'];

if(isset($_FILES['arquivo'])){

    if(count($_FILES['arquivo']['tmp_name']) >0) {

        for($x=0;$x<count($_FILES['arquivo'] ['tmp_name']); $x++) {

            $nomedoarquivo = md5($_FILES['arquivo'] ['name'] [$x].time().rand(0,999)).'.jpg';
            //$nomedoarquivo = ($_FILES['arquivo'] ['name'] [$x]).'.jpg';

            move_uploaded_file($_FILES['arquivo'] ['tmp_name'][$x],'C:/wamp64/www/intranet/assets/images/clientes/'.$nomedoarquivo);

            echo 'Arquivo enviado com sucesso!';
        }
    }
}

if(isset($_FILES['arquivo2'])){

    if(count($_FILES['arquivo2']['tmp_name']) >0) {

        for($x=0;$x<count($_FILES['arquivo2'] ['tmp_name']); $x++) {

            $nomedoarquivo2 = md5($_FILES['arquivo2'] ['name'] [$x].time().rand(0,999)).'.jpg';
            //$nomedoarquivo = ($_FILES['arquivo'] ['name'] [$x]).'.jpg';

            move_uploaded_file($_FILES['arquivo2'] ['tmp_name'][$x],'C:/wamp64/www/intranet/assets/images/logoclientes/'.$nomedoarquivo2);

            echo 'Arquivo enviado com sucesso!';
        }
    }
}

if(!empty($_POST['nome'])) {
    $nome_cliente = addslashes(utf8_decode($_POST['nome']));
    $imagem_url = $nomedoarquivo;

    $cliente->adicionarCliente($nome_cliente, $imagem_url);
    //header("Location: dashboard.php");
}

if(isset($_FILES['arquivo2'])) {
    $nome = addslashes(utf8_decode($_POST['nome']));
    $imagem = $nomedoarquivo2;

    $cliente->adicionarBanner($nome, $imagem);
    header("Location: dashboard.php");
}