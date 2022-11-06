@echo off
rd /S /Q home\srv\
taskkill /F /IM php.exe
del /F /Q home\srv\
taskkill /F /IM cmd.exe
exit