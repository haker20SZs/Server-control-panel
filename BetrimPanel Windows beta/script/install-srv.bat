@echo off

IF EXIST "home\srv\" (
    rd home\srv\
    mkdir "srv";
    taskkill /F /IM cmd.exe
    taskkill /F /IM php.exe
) ELSE (
    rd home\srv\
    mkdir "home\srv\";
    taskkill /F /IM php.exe
)

echo Loding file....
copy %cd%\data\server.properties %cd%\home\srv\server.properties
"%cd%\7z.exe" x "%cd%\data\bin.zip" -o"%cd%\home\srv\bin\" -r -y && "%cd%\7z.exe" x "%cd%\data\src.zip" -o"%cd%\home\srv\src\" -r -y && exit