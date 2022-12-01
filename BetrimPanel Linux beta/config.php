<?php

 $lang = "ru"; #ru/en#

 $log_file = "server.log"; #server.log/server.txt#
 $server_path = "/home/srv"; #/home/srv# без / в конце
 $namesrv = "MilordPE"; //Названия сервера

 $rconHost = "localhost"; #IP сервера
 $rconPort = "19132"; #Порт сервера
 $rconPassword = "root"; #Пароль от RCON
 $dir = "log"; #Папка с для логов
 $golos = "https://mineserv.top/milord-pe?vote"; //Ссылка на голосование за сервер
 
 $loginpanel = "admin";
 $passwordpanel = "root";

 /*Данные от VDS - SSH*/
 $ip = "";//Айпи от VDS - SSH
 $password = "";//Пароль от VDS - SSH в base64
 $port = "22";
 $login = "root";
 /*Данные от VDS*/

 $phpmyadmin = false; #Нужен ли вам phpmyadmin - true || false -- если вы ведёте другой ответь phpmyadmin будет отключен
 $url_phpmyadmin = "Ссылка на phpmyadmin"; //Ссылка на phpmyadmin - пример :: http://{IP-Domain}/phpmyadmin/

?>