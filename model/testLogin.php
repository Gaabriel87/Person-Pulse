<?php
    session_start();
    if(isset($_POST["submit"]) && !empty($_POST['login']) && !empty($_POST['senha'])){
        //acessa
        include_once('../model/UsuarioModel.php');
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        //print_r('Login: '.$login);
        //print_r('<br>');
        //print_r('Senha: '.$senha);

        $sql ="SELECT * FROM users WHERE user='$login' and senha='$senha'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('Location: /PersonPulse/home.php');
        }else{
            $_SESSION['login']= $login;
            $_SESSION['senha']= $senha;
            header('Location: /PersonPulse/view/cadastro.php');
        }

    }else{
        header('Location: /PersonPulse/home.php');
    }

?>