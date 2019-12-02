<?php

class Ordenacao
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=db_intranet;host=localhost", "root", "");
    }

    public function ordenacaoNome()
    {

        $sql = "SELECT * FROM `tb_tarefa` WHERE ativo = 1 ORDER BY nome;";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {

            return $sql->fetchAll();
        } else {
            echo 'else: ';
            return array();
        }
    }

    public function ordenacaoCliente()
    {

        $sql = "SELECT * FROM `tb_tarefa` WHERE ativo = 1 ORDER BY cliente;";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {

            return $sql->fetchAll();
        } else {
            echo 'else: ';
            return array();
        }
    }

    public function ordenacaoResponsavel()
    {

        $sql = "SELECT * FROM `tb_tarefa` WHERE ativo = 1 ORDER BY responsavel;";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {

            return $sql->fetchAll();
        } else {
            echo 'else: ';
            return array();
        }
    }

    public function ordenacaoPrazo()
    {

        $sql = "SELECT * FROM `tb_tarefa` WHERE ativo = 1 ORDER BY prazo DESC;";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {

            return $sql->fetchAll();
        } else {
            echo 'else: ';
            return array();
        }
    }

    public function ordenacaoStatus()
    {

        $sql = "SELECT * FROM `tb_tarefa` WHERE ativo = 1 ORDER BY status;";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {

            return $sql->fetchAll();
        } else {
            echo 'else: ';
            return array();
        }
    }
}