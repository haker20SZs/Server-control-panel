@echo off
TITLE Server

cd ..
cd home\srv\

if exist bin\php\php.exe (
	set PHPRC=""
	set PHP_BINARY=bin\php\php.exe
) else (
	set PHP_BINARY=php
)

if exist *.phar (
	set POCKETMINE_FILE=*.phar
) else (
	if exist src\pocketmine\PocketMine.php (
		set POCKETMINE_FILE=src\pocketmine\PocketMine.php
	) else (
		echo Ядро установлено некорректно!
		pause
		exit 1
	)
)

%PHP_BINARY% %POCKETMINE_FILE% %* || pause
