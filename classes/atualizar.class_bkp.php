

<?php

class recuperaTarefa
{
     protected $pdo;

    public function __construct()
    {
        header('Content-Type: text/html; charset=utf-8');
        $this->pdo = new PDO("mysql:dbname=db_intranet;host=localhost", "root", "");

    }

    public function recuperaT()
    {
        if(!empty($_GET['idtarefas'])) {

            //$idEditar = addslashes($_GET['idtarefas']);
            $idEditar = addslashes($_GET['idtarefas']);

            //echo $idEditar;
            $sql = ("SELECT DISTINCT
                    tb_tarefa.id,tb_tarefa.nome, tb_tarefa.prazo, tb_tarefa.id_cliente,
                    tb_status.nomestatus as \"s_nome\", tb_status.id AS \"s_id\",
                                    tb_usuarios.nome AS responsavel, tb_usuarios.id_usuario,
                                    tb_cliente.nome_cliente, tb_cliente.imagem_url
                FROM
                    tb_tarefa
                            INNER JOIN tb_cliente ON tb_tarefa.id_cliente = tb_cliente.id_cliente
                INNER JOIN tb_status ON tb_tarefa.status = tb_status.id	
                            INNER JOIN tb_usuarios ON tb_tarefa.id_usuario = tb_usuarios.id
                WHERE
                    tb_tarefa.id = $idEditar and tb_tarefa.ativo = 1 ;");

            $sql = $this->pdo->prepare($sql);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $sql->fetchAll();
            } else {
                return array();
            }
        }else{
            echo "Não tem nada";
        }
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

    }
}

