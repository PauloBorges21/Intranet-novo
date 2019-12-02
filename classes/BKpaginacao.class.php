<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 09/11/2018
 * Time: 13:57
 *
 */


 class Paginacao
 {
     private $pdo;

     public function __construct()
     {
         $this->pdo = new PDO("mysql:dbname=db_intranet;host=localhost", "root", "");
     }

     public function getPaginacao()
     {


         $maximo_por_pagina = 2;


         $sql = ("SELECT DISTINCT
                tb_tarefa.nome, tb_tarefa.cliente, tb_tarefa.responsavel, tb_tarefa.prazo, tb_tarefa.status,
                tb_status.id,
                tb_status.nomestatus as s_nome
            FROM
                tb_tarefa
            LEFT JOIN tb_status ON tb_tarefa.status = tb_status.id
            WHERE
                tb_tarefa.ativo = 1 ORDER BY tb_tarefa.id DESC LIMIT $maximo_por_pagina");
         $sql = $this->pdo->prepare($sql);
         $sql->execute();
         if ($sql->rowCount() > 0) {
             //echo '<script>alert("teste");</script>';
             return $sql->fetchAll();
         }
     }

     public function getOrdenar()
     {

         $pagina = filter_input(INPUT_GET, 'tarefas');        //página atual
         $pagina = (isset($pagina) ? (int)$pagina : 1);        //vamos verificar se existe GET_tarefas na url,Passamos Int para fazer a conta a baixo, caso contrario 1
         $maximo_por_pagina = 2;
         $inicio = (($maximo_por_pagina * $pagina) - $maximo_por_pagina);
         //2           1 =  2  -     2 = 0    o Resultado zerado é a primeira posição do array

         $sql = "SELECT COUNT(*) AS Total FROM tb_tarefa WHERE ativo =1";
         $sql = $this->pdo->prepare($sql);
         $sql->execute();
         $sql = $sql->fetch();
         $total_registros = $sql['Total'];
         $max_link = 2;
          $total_paginas = ceil($total_registros / $maximo_por_pagina); //


         if($total_registros > $maximo_por_pagina) {

             if($pagina != 1) {
                 echo '<a href="?tarefas=1">Primeira Página</a>';
             }

             for($i = $pagina - $max_link; $i <= $pagina - 1; $i++) {
                 //  1     -  2 = -1            1    -  1 = 0
                 if($i >= 1) {
                     echo '<a href="?tarefas='.$i.'">'.$i.'</a>';
                 }
             }

             echo '<span>'.$pagina.'</span>';

             for($i = $pagina + 1; $i <= $pagina + $max_link; $i++) {

                 if($i <= $total_paginas) {

                     echo '<a href="?tarefas='.$i.'">'.$i.'</a>';
                 }
             }
         }
     }

 }
