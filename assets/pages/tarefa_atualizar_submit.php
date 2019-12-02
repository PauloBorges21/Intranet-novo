<?php
session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: ../../index.php");
}
?>

<?php include('../../classes/atualizar.class.php');
$atualizar = new recuperaTarefa();


$id = $_SESSION['intranetrai'];

if(!empty($_POST['nome'])) {
    $id = $_SESSION['idtarefas'];
    $nome = addslashes($_POST['nome']);
    $id_cliente = addslashes($_POST['cliente']);
    $id_usuario = addslashes($_POST['responsavel']);
    $prazo = addslashes($_POST['prazo']);
    $status = addslashes($_POST['status']);
    $destaque = addslashes($_POST['destaque']);

    $atualizar->atualizar($id, $nome, $id_cliente, $id_usuario, $prazo, $status, $destaque);
    header("Location: tarefa.php");
}