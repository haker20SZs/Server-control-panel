<?php

 $info = ("../../home/srv/server.properties");
 $pass = ["password" => $info['rcon.password']];
 $port = ["port" => $info['server-port']];

 $rconHost = "localhost";
 $rconPort = $port["port"];
 $rconPassword = $pass["password"];
 
 $loginpanel = "admin";
 $passwordpanel = "root";
 
?>