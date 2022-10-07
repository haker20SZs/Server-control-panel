<?php
    session_start();

    include '../config.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    if($password == $passwordpanel && $login == $loginpanel) {
        header('Location: ../panel.php');
    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../index.php');
    }
?>