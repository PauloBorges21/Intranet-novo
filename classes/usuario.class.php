<?php
/**
 * Created by PhpStorm.
 * User: antonio.gonzalez
 * Date: 24/01/2019
 * Time: 11:45
 */

class Usuario
{
    protected $pdo;

    public function __construct()
    {
        header('Content-Type: text/html; charset=utf-8');
        $this->pdo = new PDO("mysql:dbname=db_intranet;host=localhost", "root", "");

    }

    public function adicionarUsuario($nome, $email, $senha, $data_nascimento, $id_cargo, $foto)
    {
        $sql = "INSERT INTO tb_usuarios(nome, email, senha, data_nascimento, id_cargo, foto) VALUES (:nome, :email, :senha, :data_nascimento, :id_cargo, :foto)";
        $sql = $this->pdo->prepare($sql);

        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':data_nascimento', $data_nascimento);
        $sql->bindValue(':id_cargo', $id_cargo);
        $sql->bindValue(':foto', $foto);
        //$sql->bindValue(':permissao', $permissao);
        $sql->execute();

    }

    public  function getCargo()
    {
        $sql = ("SELECT * FROM tb_cargo WHERE ativo = 1 ORDER BY nome_cargo");
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            return $sql->fetchAll();
            return array();
        }else{
            print_r();
        }
    }

    public function getConta()
    {
        if(!empty($_SESSION['intranetrai'])) {

            $id_usuarioEditar = $_SESSION['intranetrai'];

            $sql = ("SELECT tb_usuarios.id,tb_usuarios.nome,tb_usuarios.email,tb_usuarios.senha,tb_usuarios.data_nascimento,tb_usuarios.id_cargo,tb_cargo.nome_cargo,tb_usuarios.foto,tb_usuarios.permissao,
                    tb_cargo.id AS id_cargo2,tb_cargo.nome_cargo
                    
                    FROM tb_usuarios
                    INNER JOIN tb_cargo ON tb_cargo.id = tb_usuarios.id_cargo
                    WHERE tb_usuarios.id = $id_usuarioEditar and tb_usuarios.ativo = 1");
            $sql = $this->pdo->prepare($sql);
            $sql->execute();

            if($sql->rowCount() > 0 ){
                return $sql->fetchAll();
                return array();
            }else{
                print_r();
            }
        }else{
            echo "Não tem nada";
        }
    }
}