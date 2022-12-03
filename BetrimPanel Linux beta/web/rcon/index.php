<?php

session_start();
if(!$_SESSION['user']);
header('Content-type: application/json');
require 'rcon.php';
require(__DIR__. '/../../config.php');

$host = $rconHost;
$port = $rconPort;
$password = $rconPassword;
$timeout = 3;

$response = array();
$rcon = new Rcon($host, $port, $password, $timeout);

if(!isset($_POST["cmd"])){
  $response['status'] = 'error';
  $response['error'] = 'Empty command';
}else{
  if ($rcon->connect()){
    $rcon->send_command($_POST['cmd']);
    $response['status'] = 'success';
    $response['command'] = $_POST['cmd'];
  }else{
    $response['status'] = 'error';
    $response['error'] = 'RCON connection error';
  }
}

header("Location: /panel.php?hash=" . $_SESSION['hash'] . "");

?>
