<?php


require_once 'Crud.php';
require_once 'Config.php';

$conn = new Crud('localhost', 'root', '', 'instituicao', 'utf-8');

if (!isset($_SESSION)) {
    session_start();
}


$dados = [];

$select = $conn->selectLeft('aluno','pessoa','cpf_pessoa','cpf', $dados);


if(isset($_POST) and !empty($_POST)){
    $dados = $_POST;

    $insert = $conn->insert('presenca',$dados);


}


?>


<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport"content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Lista de Presença</title>

</head>
<body>

    <div id="login">
        <form class="card">
            <div class="card-header">

                <h2>Lista de Presença</h2>
            </div>



                <?php
                while($dados = $select->fetch_object()){
                    echo "<div class='ListaPre'>
                <input value='$dados->ra' type='hidden' name='ra'>
                <p>$dados->nome</p>
                <input type='radio' id='presenca'
                       name='chamada$dados->ra' value='true'>
                <label for='presenca'>Presente</label>

                <input type='radio' id='falta'
                       name='chamada$dados->ra' value='false'>
                <label for='falta'>Faltou</label>
                </div>";
                }
                ?>
            <div class="card-footer">

                <input type="submit" value="Enviar" class="submit">

            </div>


        </form>
    </div>
</body>