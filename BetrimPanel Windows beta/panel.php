<?php

session_start();
if(!$_SESSION['user']);

require('config.php');

if($_GET['start']){
  exec(getcwd() .'\script\host-start.bat');
  sleep(2);
  header("Location: /panel.php?key={$_SESSION['key']}");
}

if($_GET['stop']){
  exec(getcwd() . "\script\host-stop.bat");
  sleep(2);
  header("Location: /panel.php?key={$_SESSION['key']}");
}

if($_GET['restart']){
  exec(getcwd() . "\script\host-restart.bat");
  sleep(2);
  header("Location: /panel.php?key={$_SESSION['key']}");
}

if($_GET['uninstall']){
  exec(getcwd() .'\script\remove-srv.bat');
  sleep(2);
  header("Location: /panel.php?key={$_SESSION['key']}");
}

if($_GET['install']){
  exec(getcwd() .'\script\install-srv.bat');
  sleep(3);
  header("Location: /panel.php?key={$_SESSION['key']}");
}

if($_GET['exit']){
  header("Location: /vendor/logout.php");
}

if($_GET['key'] == null){
  header("Location: ?key=" . $_SESSION['key'] ."");
}

if($_GET['phpmyadmin']){
  header("Location: {$url_phpmyadmin}");
}

if($_POST['cmd'] || $_GET['start'] || $_GET['stop'] || $_GET['restart'] || $_GET['uninstall'] || $_GET['install'] || $_GET['key'] || $_GET['phpmyadmin']){

if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'){

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
<link rel='shortcut icon' href='https://cdn-icons-png.flaticon.com/512/2184/2184355.png' type='image/png'>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
<title>Извините, но данная панель управления не поддерживается данной операционной системой</title>
<p style='text-align:center'><br>Извините, но данная панель управления не поддерживается данной операционной системой</p>";}

}else{
  header("Location: /");
}

?>