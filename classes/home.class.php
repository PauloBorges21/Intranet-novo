<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 03/12/2018
 * Time: 10:20
 */

class InformacaoHome
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=db_intranet;host=localhost", "root", "");
    }

    public function getFotos()
    {

        $sql = "SELECT id,nome,email,foto FROM tb_usuarios WHERE ativo = 1 AND tb_usuarios.id = " . $_SESSION['intranetrai'];
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