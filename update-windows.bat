@ECHO OFF
CLS
REM ┌──────────────────────┐
REM │  Spyke Self-Updater  │
REM |   [ For Windows! ]   |
REM |  [ Simple Version ]  |
REM │ by Wolfgang de Groot │
REM └──────────────────────┘

REM	0. Do we have what we need installed?
SET /A FLAG = 0
WHERE git >nul 2>nul
IF %ERRORLEVEL% EQU 1 SET /A FLAG=FLAG+=1
WHERE composer >nul 2>nul
IF %ERRORLEVEL% EQU 1 SET /A FLAG=FLAG+=2

IF %FLAG% GTR 0 (
	ECHO [] Error %FLAG%!
	IF %FLAG% EQU 1 ECHO | SET /p=[] Git is not installed.
	IF %FLAG% EQU 2 ECHO | SET /p=[] Composer is not installed.
	IF %FLAG% LEQ 2 ECHO  Install it! If it *is* installed, ask for help!
	IF %FLAG% GEQ 3 ECHO [] Neither Git nor Composer are installed. Install them!
	PAUSE
	EXIT 127
)

REM	1. Update repository from GitHub
ECHO [] Pulling from GitHub...
CALL git pull

REM	2. Composer updates and deploys all dependencies/requirements
ECHO [] Deploying project...
CALL composer install

REM	3. Complete!
ECHO [] Spyke has been updated and deployed!
PAUSE