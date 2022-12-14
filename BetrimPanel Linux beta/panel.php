<?php

session_start();
if(!$_SESSION['user']);

require('config.php');

if($_GET['restart']){
  $connection = ssh2_connect($ip, $port);
if(ssh2_auth_password($connection, $login, base64_decode($password))){
  ssh2_exec($connection, "kill -9 $(cat {$server_path}/server.lock)");
} else {
  die('Неудачная аутентификация...');
}
  sleep(8);
  header("Location: /panel.php?hash={$_SESSION['hash']}");
}

if($_GET['rmlog']){
  exec('sh script/log_remove.sh');
  header("Location: /panel.php?hash={$_SESSION['hash']}");
}

if($_GET['rmbackup']){
  exec('sh script/backup_remove.sh');
  sleep(2);
  header("Location: /panel.php?hash={$_SESSION['hash']}");
}

if($_GET['backup']){
  exec('sh script/backup_create.sh');
  sleep(2);
  header("Location: /panel.php?hash={$_SESSION['hash']}");
}

if($_GET['phpmyadmin']){
  header("Location: {$url_phpmyadmin}");
}

if($_POST['cmd'] || $_GET['restart'] || $_GET['backup'] || $_GET['rmbackup'] || $_GET['rmlog'] || $_GET['hash'] == $_SESSION['hash'] || $_GET['phpmyadmin']){

if(PHP_OS === 'Linux'){

if($lang == "ru"){
  include 'web/index_ru.html';
}elseif($lang == "en"){
  include 'web/index_en.html';
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
<p style='text-align:center'><br>Извините но данный скрипт поддерживает два языковых пакета<br>Установите языковой пакет RU/EN в файле config.php</p>";}

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
<title>Извините, но данная панель управления не поддерживается данной операционной системой</title>
<p style='text-align:center'><br>Извините, но данная панель управления не поддерживается данной операционной системой</p>";}

}else{
  header("Location: /");
}

?>