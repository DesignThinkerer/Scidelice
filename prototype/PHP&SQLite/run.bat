:: Purpose:   Lance le serveur de développement PHP et l'ouvre dans le navigateur par défaut
:: Version:   0.0.0
:: Author:    Théophile Desmedt
:: Usage:     Cliquez pour lancer le serveur

@ECHO OFF

:: Recherche d'un port disponible
ECHO Recherche d'un port disponible...

set startPort=80

:SEARCHPORT
:: Utilisez 'netstat' pour vérifier si le port est en écoute
netstat -o -n -a | find "LISTENING" | find ":%startPort% " > NUL

IF "%ERRORLEVEL%" equ "0" (
  set /a startPort += 1
  GOTO :SEARCHPORT
) ELSE (
  set freePort=%startPort%
  GOTO :FOUNDPORT
)

:FOUNDPORT
:: Lance le serveur PHP en arrière-plan en utilisant le port trouvé
start /B php -S localhost:%freePort%

:: Ouvre le navigateur par défaut avec l'URL du serveur
START http://localhost:%freePort%
