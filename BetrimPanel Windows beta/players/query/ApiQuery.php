<?php

use xPaw\MinecraftQuery;
use xPaw\MinecraftQueryException;

define('MQ_SERVER_ADDR', $host);
define('MQ_SERVER_PORT', $port);
define('MQ_TIMEOUT', 1);

require_once '../src/MinecraftQuery.php';
require_once '../src/MinecraftQueryException.php';

$Timer = MicroTime(true);

$Query = new MinecraftQuery();

try {
    $Query->Connect(MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT);
} catch(MinecraftQueryException $e) {
    $Exception = $e;
}

$Timer = Number_Format(MicroTime(true) - $Timer, 4, '.', '');

?>
