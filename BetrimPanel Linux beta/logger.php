<?php

session_start();
require('config.php');
if($_SESSION['user']);
unset($_SESSION['user']);

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
        url: 'logger.php' + '?hash=<?php echo $_SESSION['hash']; ?>',
        success: function(data){
            $('#log').html(data);
            $("#scroll").scrollTop(90000);
        }
    });
};

setInterval(mode, 90000);

</script>

<div id="log">
<textarea id="scroll" style="overflow: hidden; height: 750px; resize: none; " disabled="" class="form-control console">

<?php

if($_SESSION['hash'] == null){
	echo "Произошла ошибка ключ пользователя не прошёл проверку, пожалуйста, перезайдите в аккаунт или же оборотитесь к создателю скрипта", "\n";
}elseif($_GET['hash'] == $_SESSION['hash']){

	$connection = ssh2_connect($ip, $port);
	ssh2_auth_password($connection, $login, base64_decode($password));
	$logs = ssh2_exec($connection, "tail -n 500 " . $server_path . "/" . $log_file . " | iconv -t utf8");

	if(file_exists("{$server_path}/{$log_file}")){
		$result = $logs;
	}else{
		echo("Извините мы не можем отобразить логи поскольку у вас нет данных в файле {$log_file} или же ваш сервер не отвечает");
	}

	stream_set_blocking($result, true);
	$logs = ssh2_fetch_stream($result, SSH2_STREAM_STDIO);
	$log = stream_get_contents($logs);
    echo $log, "\n";
    
}else{
    header("Location: /vendor/logout.php");
}

?>

</textarea>
</div>