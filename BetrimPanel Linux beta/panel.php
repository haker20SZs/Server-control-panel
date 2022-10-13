<?php

session_start();
if(!$_SESSION['user']);

if($_GET['rmlog']){
  exec('sh script/log_remove.sh');
  header("Location: /panel.php?key={$_SESSION['key']}");
}

if($_GET['rmbackup']){
  exec('sh script/backup_remove.sh');
  sleep(2);
  header("Location: /panel.php?key={$_SESSION['key']}");
}

if($_GET['backup']){
  exec('sh script/backup_create.sh');
  sleep(2);
  header("Location: /panel.php?key={$_SESSION['key']}");
}

if($_GET['exit']){
  header("Location: /vendor/logout.php");
}

if($_POST['cmd'] || $_GET['backup'] || $_GET['rmbackup'] || $_GET['rmlog'] || $_GET['key'] == $_SESSION['key']){

if(PHP_OS === 'Linux'){

include 'web/index.html';

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