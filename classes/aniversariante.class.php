<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 12/12/2018
 * Time: 10:52
 */
class Aniversario
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=db_intranet;host=localhost", "root", "");
    }

    function getAniversariododia()
    {

        //$sql = ("SELECT nome, data_nascimento,foto From tb_usuarios Where Date_Format(NOW(), '%m') = Date_Format(data_nascimento, '%m') AND ativo = 1 ORDER BY data_nascimento DESC;");
        $sql = ("SELECT * FROM tb_usuarios
                WHERE ativo = 1
                    AND MONTH(data_nascimento) >= MONTH(NOW())
                    AND DAY(data_nascimento) >= DAY(NOW())
                    OR MONTH(data_nascimento) >= MONTH(NOW())+1
                    OR MONTH(data_nascimento) >= MONTH(NOW())+2
                ORDER BY MONTH(data_nascimento), DAY(data_nascimento)
                LIMIT 5");

        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return false;
        }
    }
}