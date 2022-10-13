<?php

require('config.php');

if($lang == "ru"){
  include 'web/login_ru.html';
}elseif($lang == "en"){
  include 'web/login_en.html';
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

?>