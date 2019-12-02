<?php
/**
 * Created by PhpStorm.
 * User: antonio.gonzalez
 * Date: 28/01/2019
 * Time: 11:49
 */

class Cliente
{
    protected $pdo;

    public function __construct()
    {
        header('Content-Type: text/html; charset=utf-8');
        $this->pdo = new PDO("mysql:dbname=db_intranet;host=localhost", "root", "");

    }

    public function adicionarCliente($nome_cliente, $imagem_url)
    {
        $sql = "INSERT INTO tb_cliente(nome_cliente, imagem_url) VALUES (:nome_cliente, :imagem_url)";
        $sql = $this->pdo->prepare($sql);

        $sql->bindValue(':nome_cliente', $nome_cliente);
        $sql->bindValue(':imagem_url', $imagem_url);
        $sql->execute();
    }

    public function adicionarBanner($nome, $imagem)
    {
        //$cadastrados = 0;
        $sql = "INSERT INTO tb_imagemcliente(nome, imagem) VALUES (:nome, :imagem)";
//        if (mysql_query($sql)) {
//            // Incrementa o contador
//            $cadastrados++;
//        }
        $sql = $this->pdo->prepare($sql);

        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':imagem', $imagem);
        $sql->execute();
    }
}