<?php
class recuperaTarefa
{
    protected $pdo;

    public function __construct()
    {
        header('Content-Type: text/html; charset=utf-8');
        $this->pdo = new PDO("mysql:dbname=db_intranet;host=localhost", "root", "");

    }
    public function recuperaU()
    {
        if(!empty($_GET['idusuario'])) {
            $id_usuarioEditar = addslashes($_GET['idusuario']);

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
    public function recuperaT()
    {
        if(!empty($_GET['idtarefas'])) {

            //$idEditar = addslashes($_GET['idtarefas']);
            $idEditar = addslashes($_GET['idtarefas']);
            $_SESSION['idtarefas'] = addslashes($_GET['idtarefas']);
//
//
//            echo $idEditar;
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
        $sql = ("SELECT DISTINCT
                    tb_tarefa.id,tb_tarefa.nome AS n_tarefa, tb_tarefa.prazo, tb_tarefa.id_cliente,
                    tb_status.nomestatus as s_nome, tb_status.id AS s_id,
                                    tb_usuarios.nome AS responsavel, tb_usuarios.id AS id_usuario,
                                    tb_cliente.nome_cliente, tb_cliente.imagem_url, tb_tarefa.destaque
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
    }

    public function atualizar($id,$nome,$id_cliente,$id_usuario,$prazo,$status,$destaque)
    {
        //1 passo verificar se já existe email cadastrado
        //2 passo adicionar
        //if ($this->existeEmail($email) == false) {  //executando o primeiro passo; se entrar no if o usuário não existe
        $sql = "UPDATE tb_tarefa SET nome=:nome, id_cliente=:id_cliente, id_usuario=:id_usuario, prazo=:prazo, `status`=:status, destaque=:destaque
                WHERE id = :id AND ativo='1'";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':id_cliente', $id_cliente);
        $sql->bindValue(':id_usuario', $id_usuario);
        $sql->bindValue(':prazo', $prazo);
        $sql->bindValue(':status', $status);
        //$sql->bindValue(':datacadastro', $datacadastro);
        $sql->bindValue(':destaque', $destaque);
        $sql->execute();
    }
}

