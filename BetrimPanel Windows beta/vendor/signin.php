<?php
    session_start();

    include '../config.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    if($password == $passwordpanel && $login == $loginpanel){
        $_SESSION['key'] = mt_rand(1,1000);
        header('Location: ../panel.php?key=' . $_SESSION['key'] . '');
    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../index.php');
    }
?>