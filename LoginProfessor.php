<?php

    require_once 'Crud.php';
    require_once 'Config.php';

    $conn = new Crud('localhost', 'root', '', 'instituicao', 'utf-8');

    if(!isset($_SESSION)){
        session_start();
    }   

    if(isset($_POST) and !empty($_POST)){
        $dados = $_POST;

        $select = $conn->select('pessoa',$dados);


        if($select->num_rows > 0){
            $_SESSION['login'] = 'ok';
            $_SESSION['nome'] = "nome";
            header('location:Curso.php');

            
        }else{
            echo "Dados Invalidos";
        }        
    }   
 
?>





<!DOCTYPE html>

<html lang="pt-br">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport"content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css">

        <title>Login Professor</title>

    </head>

    <body>

        <div id="login">

            <form class="card" action="LoginProfessor.php" method="post">
                <div class="card-header">

                    <h2>Login Professor</h2>

                </div>

                <div class="card-content">

                    <div class="card-content-area">

                        <label for="cpf" >CPF</label>

                        <input type="text" id="cpf" name="cpf" autocomplete="off">

                    </div>

                    <div class="card-content-area">

                        <label for="senha">SENHA</label>

                        <input type="password" id="senha" name="senha" autocomplete="off">

                    </div>



                </div>
                <div class="card-footer">

                    <input type="submit" value="LOGIN" class="submit">

                </div>
            </form>

        </div>

    </body>

</html>