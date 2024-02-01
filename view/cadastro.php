<?php
    session_start();
    if((!isset($_SESSION['login'])==true) and (!isset($_SESSION['$senha'])==true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('Location: /PersonPulse/home.php');
    }

    $logado =$_SESSION['login'];

    if(isset($_POST['submit'])) 
    {
        //print_r('Nome: '.$_POST['nome']);
        //('<br>');
        //print_r('Email: '.$_POST['email']);
        //print_r('<br>');
        //print_r('Telefone: '.$_POST['telefone']);
        //print_r('<br>');
        //print_r('Sexo: '.$_POST['Sexo']);
        //print_r('<br>');
        //print_r('Data de nascimento: '.$_POST['nascimento']);
        //print_r('<br>');
        //print_r('Rua: '.$_POST['rua']);
        //print_r('<br>');
        //print_r('Bairro: '.$_POST['bairro']);

        include_once('../model/UsuarioModel.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['Sexo'];
        $nascimento = $_POST['nascimento'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];

        $result = mysqli_query($conexao, "INSERT INTO cadastro(nome, email, telefone, sexo, rua, bairro) 
        VALUES ('$nome','$email', '$telefone', '$sexo', '$rua','$bairro')");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro-PP</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            background-image: linear-gradient(60deg, SteelBlue, MediumBlue);
        }
        .box{
            color: white;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%)  ;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 15px;
            border-radius: 15px;
            width: 30%;
        }
        .btn{
            color: white;
            position: absolute;
            top: 12%;
            left: 90%;
            transform: translate(-50%, -50%)  ;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 15px;
            border-radius: 15px;
            width: 17%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .InputBox{
            position: relative;
        }
        .InputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .InputUser:focus ~ .labelInput, .InputUser:valid ~.labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(60deg, SteelBlue, MediumBlue);
            width: 100%;
            color: white;
            padding: 15px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(60deg, Blue, DarkBlue);
        }
        #pesquisa{
            background-image: linear-gradient(60deg, LightGreen, ForestGreen);
            width: 48%;
            color: white;
            padding: 15px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #pesquisa:hover{
            background-image: linear-gradient(60deg, Green, DarkGreen);
        }
        #sair{
            background-image: linear-gradient(60deg, IndianRed, Crimson);
            width: 48%;
            color: white;
            padding: 15px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #sair:hover{
            background-image: linear-gradient(60deg, Red, DarkRed);
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="cadastro.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de cadastro</b></legend>
                <br>
                <div class="InputBox">
                    <input type="text" name="nome" id="nome" class="InputUser" required>
                    <label for="nome" class="labelInput" >Nome completo</label>
                </div>
                <br><br>
                <div class="InputBox">
                    <input type="email" name="email" id="email" class="InputUser" required>
                    <label for="email"class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="InputBox">
                    <input type="tel" name="telefone" id="telefone" class="InputUser" required>
                    <label for="telefone"class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="Sexo" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="Sexo" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="Sexo" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="nascimento"><b>Data de nascimento:</b></label>
                <input type="date" name="nascimento" id="nascimento" required>
                <br><br>
                <div class="InputBox">
                    <input type="text" name="rua" id="rua" class="InputUser" required>
                    <label for="rua"class="labelInput">Rua</label>
                </div>
                <br><br>
                <div class="InputBox">
                    <input type="text" name="bairro" id="bairro" class="InputUser" required>
                    <label for="bairro"class="labelInput">Bairro</label>
                </div>
                <br>
                <input type="submit" name="submit" id="submit">
                <br>
            </fieldset>
        </form>
    </div>
    <br>
    <div class="btn">
        <legend><b>Acesso</b></legend>
        <br>
        <input class="pesquisa" type="submit" name="pesquisa" id="pesquisa" value="Pesquisar">
        <input class="sair" type="submit" name="sair" id="sair" value="Sair">
    </div>
</body>
</html>