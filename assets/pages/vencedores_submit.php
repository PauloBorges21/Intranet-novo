<?php
session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: ../../index.php");
}
?>

<?php include('../../classes/vencedores.class.php');
$vencedores = new Vendedores();


$id = $_SESSION['intranetrai'];

if(!empty($_POST['funcionarioVencedor'])) {
    $id_usuario = addslashes($_POST['funcionarioVencedor']);
    $comentario = addslashes(utf8_decode($_POST['comentario']));
    $mes = addslashes($_POST['dataVencedor']);

    $vencedores->adicionar($id_usuario, $comentario, $mes);
    header("Location: dashboard.php");
}