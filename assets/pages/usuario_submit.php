<?php
session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: ../../index.php");
}
?>

<?php include('../../classes/usuario.class.php');
$usuario = new Usuario();


$id = $_SESSION['intranetrai'];

if(isset($_FILES['arquivo'])){

    if(count($_FILES['arquivo']['tmp_name']) >0) {

        for($x=0;$x<count($_FILES['arquivo'] ['tmp_name']); $x++) {

            $nomedoarquivo = md5($_FILES['arquivo'] ['name'] [$x].time().rand(0,999)).'.jpg';
            //$nomedoarquivo = ($_FILES['arquivo'] ['name'] [$x]).'.jpg';

            move_uploaded_file($_FILES['arquivo'] ['tmp_name'][$x],'C:/wamp64/www/intranet/assets/images/users/'.$nomedoarquivo);

            echo 'Arquivo enviado com sucesso!';
        }
    }
}


if(!empty($_POST['nome'])) {
    $nome = addslashes(utf8_decode($_POST['nome']));
    $email = addslashes($_POST['email']);
    $senha = addslashes(md5($_POST['senha']));
    $data_nascimento = addslashes($_POST['dataNascimento']);
    $id_cargo = addslashes($_POST['cargo']);
    //$foto = addslashes($_POST['arquivo']);
    $foto = $nomedoarquivo;
    //$permissao = addslashes($_POST['permissao']);

    $usuario->adicionarUsuario($nome, $email, $senha, $data_nascimento, $id_cargo, $foto);
    header("Location: dashboard.php");
}
