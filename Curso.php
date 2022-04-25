<?php

require_once 'Crud.php';
require_once 'Config.php';

$conn = new Crud('localhost', 'root', '', 'instituicao', 'utf-8');

if(!isset($_SESSION)){
    session_start();
}


    $dados = [];

    $select = $conn->select('turma',$dados);


    if(isset($_POST) and !empty($_POST)) {
        $_SESSION['login'] = 'ok';
        $_SESSION['nome'] = "nome";
        header('location:ListaPre.php');

    }


?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport"content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css">

        <title>Turmas ADS</title>

    </head>

    <body>

    <div id="login">
    <form class="card" action="ListaPre.php">
        <div class="card-header">

            <h2>Selecione a Turma de ADS</h2>

        </div>  


    <select name="turma" required>
    <option value="">Selecione a turma disponivel</option>

        <?php
            while($dados = $select->fetch_object()){
               echo "<option value='$dados->curso'> $dados->curso  </option>";
            }
        ?>
    </select>

        <div class="card-footer">
            <input type="submit" value="Ok" class="submit">
        </div>



    </form>
    </div>
    </body>



</html>    