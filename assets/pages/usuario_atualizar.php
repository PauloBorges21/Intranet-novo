<?php
session_start();

if(empty($_SESSION['intranetrai'])){
    header("Location: ../../index.php");
}
?>
<?php //include('../../includes/header.php') ?>

<?php require('../../classes/tarefa.class.php');
$tarefa = new Tarefa();?>

<?php require('../../classes/atualizar.class.php');
$atualizar = new recuperaTarefa();?>

<?php include('../../classes/usuario.class.php');
$usuario = new Usuario();
?>

<?php
$lista = $atualizar->recuperaU(); //PUXA USUARIO
$lista_C = $usuario->getCargo(); //CONSULTA CARGO
$lista_U = $atualizar->recuperaU(); //USUARIO VERIFICAÇÃO
?>
<?php //header("Content-Type: text/html; charset=ISO-8859-1",true);?>
<form method="POST" enctype="multipart/form-data" action="usuario_atualizar_submit.php">
    <div id="cadastro" name="cadastro">

        <p><label>Nome: </label>
            <input type="text" id="nome" name="nome" maxlength="100" placeholder="Max 100 caracteres" value="<?php
                //CONSUTA TAREFA recuperaU()
                foreach($lista as $item):
                    echo utf8_decode($item['nome']);
                endforeach;
                                                                                                                ?>"/></p>
        <p><label>Email: </label>
            <input type="email" id="email" name="email" maxlength="100" placeholder="Max 100 caracteres" value="<?php
                //CONSUTA TAREFA recuperaT()
                foreach($lista as $item):
                    echo utf8_decode($item['email']);
                endforeach;
                                                                                                                ?>"/></p>
        <p><label>Senha: </label>
            <input type="text" id="senha"  name="senha" maxlength="100" placeholder="Max 100 caracteres" value="<?php
                //CONSUTA TAREFA recuperaT()
                foreach($lista as $item):
                    echo $item['senha'];
                endforeach;
                                                                                                                ?>"/></p>
        <p><label>Data nascimento: </label>
            <input type="date" id="data" name="data" maxlength="100" placeholder="Max 100 caracteres" value="<?php
                //CONSUTA TAREFA recuperaT()
                foreach($lista as $item):
                    echo utf8_decode($item['data_nascimento']);
                endforeach;
                                                                                                                ?>"/></p>
        <p><label>Cargo: </label>
            <select name="cargo"  class="form-control">
                <?php
                //CONSULTA USUARIO getCargo()
                foreach ($lista_C as $item_C):
                ?>
                <option value="<?php echo $item_C['id'];?>"
                    <?php
                    //CONSULTA USUARIO recuperaU()
                    foreach($lista_U as $item_U):
                        if($item_U['id_cargo'] == $item_C['id'])
                        {echo"selected>";}
                        else{echo">";}
                    endforeach;?>
                    <?php echo utf8_encode($item_C['nome_cargo']);?>
                    </option>
                <?php endforeach;?>
            </select>
        </p>

        <p><label>Arquivo (foto): </label>
            <input type="file" name="arquivo[]" /></p>
        <!--        <p><label>Permissão (admin): </label>-->
        <!--            <input type="checkbox" id="permissao" name="permissao" /></p>-->
        <p>
        <div class="box-foto-niver"><img src="../images/users/<?php

            $lista_U = $tarefa->getUsuario2();
            foreach($lista_U as $item_U):
                if($item_U['id'] == $item['id'])
                {echo $item['foto'];}
            endforeach;                                     ?>" alt="" class="foto-niver" style="width: 100px" height="100px">
        </div>
        </p>
        <p><input type="submit" value="Atualizar" /></p>
    </div>
</form>

