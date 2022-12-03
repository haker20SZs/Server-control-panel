<?php

require('../config.php');

if($_GET['key'] == null){
	header('Location: ../');
}elseif($_GET['key'] == $key){}else{
	header('Location: ../');
}

if($_GET['hash'] == null){
	header('Location: ../');
}

$ip = $rconHost;
$port = $rconPort;

$get = './'. $dir .'/';
$url = "http://" . $_SERVER['SERVER_NAME'] . "/players/query/json.php?host={$ip}&port={$port}";
$list = json_decode(file_get_contents($url))->players->list[0];

$maxonline = json_decode(file_get_contents($url))->players->max;

if(json_decode(file_get_contents($url))->players->online == null){
	$online = 0;
}else{
    $online = json_decode(file_get_contents($url))->players->online;
}

if(json_decode(file_get_contents($url))->players->max == null){
	$maxonline = 0;
}else{
	$maxonline = json_decode(file_get_contents($url))->players->max;
}

$dir = opendir($get);
$count = 0;
while($file = readdir($dir)){
    if($file == '.' || $file == '..'){
        continue;
    }
    $count++;
}

if($list == null){}else{
if(file_exists($get . $list . ".json")){}else{

	$name = htmlspecialchars($list);
	$name = trim($name);

	$info = [
		"nick" => $list,
		"time" => date('H:i:s'),
		"date" => date('d.m.Y'),
	];

	$json = json_encode($info);
	$file = fopen($get . $name . '.json', 'w');
	$write = fwrite($file, $json);

	fclose($file);

  }
}

?>

<script> document.oncontextmenu = cmenu; function cmenu() { return false; } </script>

<style>

body{
	position: fixed;
	left: 0; right: 0;
    top: 0; bottom: 0;
    background-image: url(../images/Mangrove_Biome.png);

}

</style>

<title>Игроки сервера :: <?php echo($namesrv); ?> 😃</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./assets/css/styles.css">
<link rel="shortcut icon" href="../images/favicon.png" type="image/png">
<div class="b-container-sm"><br>

<main class="projectpage-wrapper" style="margin: 25px;">
	<div class="project-players white--bg border-radius-big-sm" data-v-a62d9756="">
		<div class="project-players__head" data-v-a62d9756="">
		  
			<center>
					
			    <h1 data-v-a62d9756="" class="bold black--text project-players__title">Игроки сервера :: <?php echo($namesrv); ?> 😃</h1><br>

			</center>
            
            <center>

	        <p class="transparent-grey2--text" data-v-a62d9756="">Всего игроков играло на сервере:
	        	<span class="black--text" data-v-a62d9756=""><?php echo($count); ?></span>
	        </p> 

	        <p class="transparent-grey2--text" data-v-a62d9756="">Текущий онлайн на сервере:
	        	<span class="black--text" data-v-a62d9756=""><b><?php echo($online); ?> из <?php echo($maxonline); ?></b></span>
	        	<a class="transparent-grey2--text" data-v-a62d9756="">Игроков.</a>
	        </p>

	        <p class="transparent-grey2--text" data-v-a62d9756="">Проголосовать за сервер:

	        	<a href="<?php echo($golos); ?>" rel="nofollow" class="project-players__tab transparent-grey2--text" data-v-a62d9756=""><span class="black--text">Перейти по ссылке.</span></a>

	        </p>

	       </center><br>

	       <center>

	       	    <a href="/panel.php?hash=<?php echo($_GET['hash']); ?>" rel="nofollow" class="project-players__tab transparent-grey2--text" data-v-a62d9756="">Панель</a>
	       	    <a href="./?hash=<?php echo($_GET['hash']); ?>&key=<?php echo($_GET['key']); ?>" rel="nofollow" class="project-players__tab transparent-grey2--text project-players__tab--active" data-v-a62d9756="">Заходы</a>
	       	    <a href="./api/bans/?hash=<?php echo($_GET['hash']); ?>&key=<?php echo($_GET['key']); ?>" rel="nofollow" class="project-players__tab transparent-grey2--text" data-v-a62d9756="">Баны</a>
	       	    <a rel="nofollow" class="project-players__tab transparent-grey2--text" data-v-a62d9756="">Скора</a>

	        </center>

	    </div>
	    		<div class="project-players__table project-players__table--first-page" data-v-a62d9756="">
	    			<div class="project-players__table-head" data-v-a62d9756="">
	    				<div class="project-players__table-row" data-v-a62d9756="">
	  				    <div class="project-players__table-col project-players__table-col--number" data-v-a62d9756="">#</div> 
	  				    <div class="project-players__table-col project-players__table-col--user" data-v-a62d9756="">Ник-игрока</div> 
	  				    <div class="project-players__table-col project-players__table-col--online" data-v-a62d9756="">Дата</div> 
	  				    <div class="project-players__table-col project-players__table-col--time" data-v-a62d9756="">Время</div>
	  			</div>
	  		</div>

    <?php

		if($handle = opendir($get)){
			while(false !== ($file = readdir($handle))){
				if($file != "." && $file != ".."){
				  echo('

				  	<div class="project-players__table-body" data-v-a62d9756="">
					<div class="project-players__table-row" data-v-a62d9756="">

					<div class="project-players__table-col project-players__table-col--number" data-v-a62d9756="">
					<span class="number number--first">
						<div class="user-image" data-v-a62d9756="">
						   <img src="https://minotar.net/helm/' . pathinfo($file, PATHINFO_FILENAME) . '/32.png" data-v-a62d9756="">
						</div>
				    </span>
				    </div>

					<div class="user" data-v-a62d9756="">
		    			<span class="user-name" data-v-a62d9756="">' . pathinfo($file, PATHINFO_FILENAME) . '</span>
		    		</div>

		    		<div class="project-players__table-col project-players__table-col--user" data-v-a62d9756="">
		    		    <div class="project-players__table-col project-players__table-col--online" data-v-a62d9756="">
		    		        <span class="time" data-v-a62d9756="">' . json_decode(file_get_contents($get . $file), true)['date'] . '</span>
		    		    </div>
		    		</div>

		    		<div class="project-players__table-col project-players__table-col--time" data-v-a62d9756="">
		    			<span class="time" data-v-a62d9756="">' . json_decode(file_get_contents($get . $file), true)['time'] . '</span>
		    		</div>

		    	</div></div>');

			}
	    }
	}

?>

</div>
</div>
</div>
</div>
</div>

<div class="project-players__footer" data-v-a62d9756=""><div data-v-a62d9756=""></div>
<div class="project-players__count transparent-grey2--text" data-v-a62d9756=""></div>

</main>