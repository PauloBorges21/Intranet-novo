<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 28/11/2018
 * Time: 18:47
 */

class Destaque
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=db_intranet;host=localhost", "root", "");
    }

    public function getDestaqueHome()
    {
//        $sql = ("SELECT DISTINCT
//        tb_tarefa.nome, tb_tarefa.cliente, tb_tarefa.prazo,  tb_tarefa.img_url, tb_status.nomestatus
//        From tb_tarefa
//        LEFT JOIN tb_status ON tb_tarefa.status = tb_status.id
//        WHERE
//        tb_tarefa.destaque = 1 AND tb_tarefa.ativo = 1 ORDER BY tb_tarefa.prazo DESC LIMIT 4;");
        $sql = ("SELECT DISTINCT
        tb_tarefa.nome, tb_tarefa.prazo, 
				tb_cliente.nome_cliente, tb_cliente.imagem_url,
				tb_status.nomestatus
        From tb_tarefa
				INNER JOIN tb_cliente ON tb_tarefa.id_cliente = tb_cliente.id_cliente
        INNER JOIN tb_status ON tb_tarefa.status = tb_status.id
        WHERE
        tb_tarefa.destaque = 1 AND tb_tarefa.ativo = 1 ORDER BY tb_tarefa.prazo DESC LIMIT 4;");

        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }

    }
//Logo Clientes
    public function destaqueCarrocel()
    {
        $sql = ("SELECT imagem FROM tb_imagemcliente WHERE ativo =1 ORDER BY tb_imagemcliente.id DESC");
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }

    }

    //Imagem DashBoard
    public function carrosselGaleria()
    {
        $sql = ("SELECT id, url FROM tb_img_galeria WHERE  ativo =1 ORDER BY tb_img_galeria.id DESC LIMIT 4");
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

//    Carrega Modal
    public function carrosselGaleriaModal()
    {
        $sql = ("SELECT id, url FROM tb_img_galeria WHERE  ativo =1 ORDER BY tb_img_galeria.id DESC");
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }



    public function contaImagemCarrossel()
    {
        $sql = ("SELECT COUNT(*)  AS quantidade FROM tb_img_galeria  WHERE  ativo = 1");
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return array();
        }
    }
}