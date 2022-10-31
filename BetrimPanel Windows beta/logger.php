<?php

session_start();
require('config.php');
if($_SESSION['user']);

?>

<title>Управление логами (Beta-Test)</title>
<link rel="shortcut icon" href="./images/favicon.png" type="image/png">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css"/>

<script type="text/javascript">

window.onload = function scroll(){
    document.getElementById('scroll').scrollTop = 9999;
}

function mode(){
    $.ajax({
        url: 'logger.php' + '?key=<?php echo $_SESSION['key']; ?>',
        success: function(data){
            $('#log').html(data);
            $("#scroll").scrollTop(90000);
        }
    });
};

setInterval(mode, 10000);

</script>

<div id="log">
<textarea id="scroll" style="overflow: hidden; height: 750px; resize: none; " disabled="" class="form-control console">

<?php

if(file_exists(getcwd(). "/home/srv/{$log_file}")){
    $get = array();
    $file = $_SERVER["DOCUMENT_ROOT"]."/home/srv/{$log_file}";
    $get = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if($_SESSION['key'] == null){
        echo "Произошла ошибка ключ пользователя не прошёл проверку, пожалуйста, перезайдите в аккаунт или же оборотитесь к создателю скрипта", "\n";
    }elseif($_GET['key'] == $_SESSION['key']){
        foreach($get as  $line_num => $line){
            echo $line, "\n";
        }
    }else{
        header("Location: /vendor/logout.php");
    }

}else{
    echo "Извините мы не можем отобразить логи поскольку у вас нет данных в файле {$log_file} или же ваш сервер не отвечает";
}

?>

</textarea>
</div>