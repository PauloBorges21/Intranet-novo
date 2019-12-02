<?php

class Vendedores
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=db_intranet;host=localhost", "root", "");
    }

//    public function getVencedor(){
//
//        $sql = ("SELECT DISTINCT
//                tb_usuarios.id, tb_usuarios.nome, tb_cargo.nome_cargo,tb_usuarios.foto,tb_vencedores.mes as mesAno
//            FROM
//                tb_usuarios
//            INNER JOIN tb_cargo ON tb_usuarios.id_cargo = tb_cargo.id
//            INNER JOIN tb_vencedores
//            WHERE
//                tb_vencedores.id = tb_usuarios.id AND tb_usuarios.ativo = 1 ORDER BY tb_usuarios.id DESC LIMIT 8;");
//        $sql = $this->pdo->prepare($sql);
//        $sql->execute();
//        if($sql->rowCount() > 0){
//            return $sql->fetchAll();
//        }else{
//            return array();
//        }
//
//    }

    public function getVencedorHome()
    {
        $sql = ("SELECT DISTINCT
            tb_usuarios.id, tb_usuarios.nome, tb_usuarios.foto, tb_vencedores.id_usuario, tb_vencedores.comentario, tb_vencedores.mes as mes
            From tb_usuarios
            LEFT JOIN tb_vencedores ON tb_usuarios.id = tb_vencedores.id_usuario
            WHERE
            tb_vencedores.id_usuario != 'NULL'  ORDER BY tb_vencedores.mes DESC LIMIT 1;");

        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetchALL();
        }else{
            return array();
        }
    }

    public function adicionar($id_usuario, $comentario, $mes)
    {
        //1 passo verificar se já existe email cadastrado
        //2 passo adicionar
        //if ($this->existeEmail($email) == false) {  //executando o primeiro passo; se entrar no if o usuário não existe
        $sql = "INSERT INTO tb_vencedores (id_usuario, comentario, mes) 
                    VALUES (:id_usuario, :comentario, :mes)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_usuario', $id_usuario);
        $sql->bindValue(':comentario', $comentario);
        $sql->bindValue(':mes', $mes);
        $sql->execute();
    }

}
