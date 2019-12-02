<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 07/11/2018
 * Time: 15:14
 */



class Tarefa
{
    protected $pdo;
    public function __construct()
    {

        $this->pdo = new PDO("mysql:dbname=db_intranet;host=localhost", "root", "");
    }


//    public function adicionarTarefa($nome,$cliente,$responsavel,$prazo,$status)
//    {
//        $sql = "INSERT INTO tb_tarefa(nome,cliente,responsavel,prazo,status) VALUES (:nome, :cliente, :responsavel, :prazo, :status)";
//        $sql = $this->pdo->prepare($sql);
//
//        $sql->bindValue(':nome', $nome);
//        $sql->bindValue(':cliente', $cliente);
//        $sql->bindValue(':responsavel', $responsavel);
//        $sql->bindValue(':prazo', $prazo);
//        $sql->bindValue(':status', $status);
//        $sql->execute();
//
//    }


public function getAll()
{
//    $sql = ("SELECT DISTINCT
//                tb_tarefa.nome, tb_tarefa.cliente, tb_tarefa.responsavel, tb_tarefa.prazo, tb_tarefa.status,
//                tb_status.id, tb_status.nomestatus as s_nome
//            FROM
//                tb_tarefa
//            inner JOIN tb_status ON tb_tarefa.status = tb_status.id
//            inner JOIN tb_cli jdfn vkjdnfkvjndfkjv
//
//            WHERE
//                tb_tarefa.ativo = 1 ORDER BY tb_tarefa.id DESC LIMIT 4;");
        $sql = ("SELECT DISTINCT
                tb_tarefa.id,tb_tarefa.nome, tb_tarefa.prazo,
                tb_status.nomestatus as \"s_nome\", tb_status.id AS \"s_id\",
								tb_usuarios.nome AS responsavel,
								tb_cliente.nome_cliente, tb_cliente.imagem_url
            FROM
                tb_tarefa
						INNER JOIN tb_cliente ON tb_tarefa.id_cliente = tb_cliente.id_cliente
            INNER JOIN tb_status ON tb_tarefa.status = tb_status.id	
						INNER JOIN tb_usuarios ON tb_tarefa.id_usuario = tb_usuarios.id
            WHERE
                tb_tarefa.ativo = 1 ORDER BY tb_tarefa.id DESC LIMIT 4;");

    $sql = $this->pdo->prepare($sql);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        return $sql->fetchAll();
    } else {
        return array();
    }
}

public function getEvento()
{
        $sql = ("SELECT * from tb_eventos WHERE data_evento IS NOT NULL AND ativo=1 ORDER BY data_evento DESC LIMIT 5");
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

      if($sql->rowCount() > 0 ){
          return $sql->fetchAll();
        return array();
      }else{
          print_r();
      }
}

    public function getReuniao()
    {
        $sql = ("SELECT * from tb_reuniao WHERE datareuniao IS NOT NULL AND ativo=1 ORDER BY datareuniao DESC LIMIT 5");
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            return $sql->fetchAll();
            return array();
        }else{
            print_r();
        }
    }



    public  function getUsuario()
    {
        $sql = ("SELECT * FROM tb_usuarios WHERE ativo = 1 ORDER BY nome");
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            return $sql->fetchAll();
            return array();
        }else{
            print_r();
        }
    }

    public  function getUsuario2()
    {
        $sql = ("SELECT tb_usuarios.id,tb_usuarios.nome,tb_usuarios.email,tb_usuarios.data_nascimento,tb_usuarios.id_cargo,tb_usuarios.foto,tb_usuarios.permissao,
                    tb_cargo.id AS id_cargo2,tb_cargo.nome_cargo
                    
                    FROM tb_usuarios
                    INNER JOIN tb_cargo ON tb_cargo.id = tb_usuarios.id_cargo
                    WHERE tb_usuarios.ativo = 1 
                    ORDER BY tb_usuarios.nome");
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            return $sql->fetchAll();
            return array();
        }else{
            print_r();
        }
    }

    public function adicionar($nome,$id_cliente,$id_usuario,$prazo,$status,$destaque)
    {
        //1 passo verificar se já existe email cadastrado
        //2 passo adicionar
        //if ($this->existeEmail($email) == false) {  //executando o primeiro passo; se entrar no if o usuário não existe
            $sql = "INSERT INTO tb_tarefa (nome, id_cliente, id_usuario, prazo, status, destaque) 
                    VALUES (:nome, :id_cliente, :id_usuario, :prazo, :status, :destaque)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':id_cliente', $id_cliente);
            $sql->bindValue(':id_usuario', $id_usuario);
            $sql->bindValue(':prazo', $prazo);
            $sql->bindValue(':status', $status);
            //$sql->bindValue(':datacadastro', $datacadastro);
            $sql->bindValue(':destaque', $destaque);
            $sql->execute();
    }

    public  function getCliente()
    {
        $sql = ("SELECT * FROM tb_cliente WHERE ativo = 1 ORDER BY nome_cliente");
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            return $sql->fetchAll();
            return array();
        }else{
            print_r();
        }
    }

    public  function getStatus()
    {
        $sql = ("SELECT * FROM tb_status WHERE ativo = 1 ORDER BY nomestatus");
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            return $sql->fetchAll();
            return array();
        }else{
            print_r();
        }
    }
}
