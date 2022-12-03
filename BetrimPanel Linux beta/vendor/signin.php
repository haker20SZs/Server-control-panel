<?php
    session_start();

    include '../config.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    if($lang == "ru"){
       $text = 'Не верный логин или пароль';
    }elseif($lang == "en"){
       $text = 'Wrong login or password';
    }else{
        echo "
        <style>
            body{
                background: #111;
                color: #f4f4f4;
            }
        </style>
        <link rel='shortcut icon' href='./images/favicon.png' type='image/png'>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <title>Извините но данный скрипт поддерживает два языковых пакета</title>
        <p style='text-align:center'><br>Извините но данный скрипт поддерживает два языковых пакета<br>Установите языковой пакет RU/EN в файле config.php</p>";
    }

    if($password == $passwordpanel && $login == $loginpanel){
        $_SESSION['hash'] = password_hash(mt_rand(1,1000), PASSWORD_DEFAULT);
        header('Location: ../panel?hash=' . $_SESSION['hash'] . '');
    } else {
        $_SESSION['message'] = $text;
        header('Location: ../');
    }
?>