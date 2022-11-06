@echo off
cd %cd%\script\
taskkill /F /IM php.exe
start start.vbs
exit