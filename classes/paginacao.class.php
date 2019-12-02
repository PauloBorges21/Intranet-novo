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

         $pagina = filter_input(INPUT_GET, 'tarefas');        //página atual
         $pagina = (isset($pagina) ? (int)$pagina : 1);        //vamos verificar se existe GET_tarefas na url,Passamos Int para fazer a conta a baixo, caso contrario 1
         $maximo_por_pagina = 5;
         $lista = array();
         $inicio = (($maximo_por_pagina * $pagina) - $maximo_por_pagina);
             $sql = ("SELECT DISTINCT
                tb_tarefa.id,tb_tarefa.nome, tb_tarefa.prazo,
                tb_status.nomestatus as \"s_nome\",
								tb_usuarios.nome AS \"responsavel\",
								tb_cliente.nome_cliente, tb_cliente.imagem_url
            FROM
                tb_tarefa
						INNER JOIN tb_cliente ON tb_tarefa.id_cliente = tb_cliente.id_cliente
            INNER JOIN tb_status ON tb_tarefa.status = tb_status.id	
						INNER JOIN tb_usuarios ON tb_tarefa.id_usuario = tb_usuarios.id
            WHERE
                tb_tarefa.ativo = 1 ORDER BY tb_tarefa.id DESC LIMIT $inicio,$maximo_por_pagina");
         $sql = $this->pdo->prepare($sql);
         $sql->execute();
         if ($sql->rowCount() > 0) {
             $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

             return $lista;

         }
     }


     public function getOrdenar()
     {

         $pagina = filter_input(INPUT_GET, 'tarefas');        //página atual
         $pagina = (isset($pagina) ? (int)$pagina : 1);        //vamos verificar se existe GET_tarefas na url,Passamos Int para fazer a conta a baixo, caso contrario 1
         $maximo_por_pagina = 5;
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

             echo '<a class="active">'.$pagina.'</a>';

             for($i = $pagina + 1; $i <= $pagina + $max_link; $i++) {

                 if($i <= $total_paginas) {

                     echo '<a href="?tarefas='.$i.'">'.$i.'</a>';
                 }
             }
         }
     }

     public function getPagVencedores()
     {

         $pagina = filter_input(INPUT_GET, 'vencedores');        //página atual
         $pagina = (isset($pagina) ? (int)$pagina : 1);        //vamos verificar se existe GET_tarefas na url,Passamos Int para fazer a conta a baixo, caso contrario 1
         $maximo_por_pagina = 12;
         $lista = array();
         $inicio = (($maximo_por_pagina * $pagina) - $maximo_por_pagina);
         $sql = ("SELECT 
                tb_usuarios.id, tb_usuarios.nome, tb_cargo.nome_cargo,tb_usuarios.foto,tb_vencedores.mes as mesAno
            FROM
                tb_usuarios
            INNER JOIN tb_cargo ON tb_usuarios.id_cargo = tb_cargo.id
            INNER JOIN tb_vencedores
            WHERE
                tb_vencedores.id_usuario = tb_usuarios.id AND tb_usuarios.ativo = 1 ORDER BY tb_vencedores.mes DESC LIMIT $inicio,$maximo_por_pagina;");
         $sql = $this->pdo->prepare($sql);
         $sql->execute();
         if ($sql->rowCount() > 0) {
             $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

             return $lista;

         }
     }

     public function ordenarVencedores()
     {

         $pagina = filter_input(INPUT_GET, 'vencedores');        //página atual
         $pagina = (isset($pagina) ? (int)$pagina : 1);        //vamos verificar se existe GET_tarefas na url,Passamos Int para fazer a conta a baixo, caso contrario 1
         $maximo_por_pagina = 12;
         $inicio = (($maximo_por_pagina * $pagina) - $maximo_por_pagina);
         //2           1 =  2  -     2 = 0    o Resultado zerado é a primeira posição do array

         $sql = "SELECT COUNT(*) AS Total FROM tb_vencedores";
         $sql = $this->pdo->prepare($sql);
         $sql->execute();
         $sql = $sql->fetch();
         $total_registros = $sql['Total'];
         $max_link = 2;
         $total_paginas = ceil($total_registros / $maximo_por_pagina); //


         if($total_registros > $maximo_por_pagina) {

             if($pagina != 1) {
                 echo '<a href="?vencedores=1">Primeira Página</a>';
             }

             for($i = $pagina - $max_link; $i <= $pagina - 1; $i++) {
                 //  1     -  2 = -1            1    -  1 = 0
                 if($i >= 1) {
                     echo '<a href="?vencedores='.$i.'">'.$i.'</a>';
                 }
             }

             echo '<a class="active">'.$pagina.'</a>';

             for($i = $pagina + 1; $i <= $pagina + $max_link; $i++) {

                 if($i <= $total_paginas) {

                     echo '<a href="?vencedores='.$i.'">'.$i.'</a>';
                 }
             }
         }
     }

 }
