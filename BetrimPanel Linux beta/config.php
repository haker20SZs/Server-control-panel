<?php

 $lang = "ru"; #ru/en#

 $log_file = "server.log"; #server.log/server.txt#
 $server_path = "/home/srv"; #/home/srv# без / в конце

 $rconHost = "localhost";
 $rconPort = "Ваш порт от сервера";
 $rconPassword = "Ваш пароль ркон";
 
 $loginpanel = "admin";
 $passwordpanel = "root";

 /*Данные от VDS - SSH*/
 $ip = "localhost";//Айпи от VDS - SSH
 $password = "";//Пароль от VDS - SSH в base64
 $port = "22";
 $login = "root";
 /*Данные от VDS*/

 $phpmyadmin = true; #Нужен ли вам phpmyadmin - true || false -- если вы ведёте другой ответь phpmyadmin будет отключен
 $url_phpmyadmin = "Ссылка на phpmyadmin"; //Ссылка на phpmyadmin - пример :: http://{IP-Domain}/phpmyadmin/

?>