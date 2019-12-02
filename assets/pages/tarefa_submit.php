<?php
session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: ../../index.php");
}
?>

<?php include('../../classes/tarefa.class.php');
$tarefa = new Tarefa();


$id = $_SESSION['intranetrai'];

if(!empty($_POST['nome'])) {
    $nome = addslashes(utf8_decode($_POST['nome']));
    $id_cliente = addslashes($_POST['cliente']);
    $id_usuario = addslashes($_POST['responsavel']);
    $prazo = addslashes($_POST['prazo']);
    $status = addslashes($_POST['status']);
    $destaque = addslashes($_POST['destaque']);

    $tarefa->adicionar($nome, $id_cliente, $id_usuario, $prazo, $status, $destaque);
    header("Location: cadastro.php");
}