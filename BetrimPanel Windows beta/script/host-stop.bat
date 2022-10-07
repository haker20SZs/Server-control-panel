@echo off
del %cd%\home\srv\server.log
taskkill /F /IM php.exe
taskkill /F /IM cmd.exe
exit