#!/bin/bash
clear
fecha=`date +%d-%m-%Y`
hora_actual=`date +%H-%M-%S`
CONFIG_BACKTRACK="backtrack/backtrack.bp"

echo "==============================================================="
echo "Cantidad de commits realizados y sus descripciones"
echo "==============================================================="
git shortlog
echo "==============================================================="
echo "Push modificaciones"
echo "Por favor ingrese el commit para este push"
echo "==============================================================="
read commit
clear
echo "==============================================================="
echo "Ramas existentes en el repositorio"
echo "==============================================================="
git branch -r
echo "==============================================================="
echo "Tipea a que rama desea enviar el commit"
echo "==============================================================="
read branch
clear
echo "==============================================================="
echo "Ingrese su nombre: "
echo "==============================================================="
read nombre

if [ -z "$commit" ]; then
    echo "Debe ingresar el commit..."
else
    sed -i "$ a\| ======================================================================================== |" "$CONFIG_BACKTRACK"
    sed -i "$ a\| USER=[ $nombre ]" "$CONFIG_BACKTRACK"
    sed -i "$ a\| DATE=[ $fecha ] - [ $hora_actual ]" "$CONFIG_BACKTRACK"
    sed -i "$ a\| COMMIT=[ $commit ]" "$CONFIG_BACKTRACK"
    sed -i "$ a\| ======================================================================================== |" "$CONFIG_BACKTRACK"
    git add *
    git commit -m "[ $commit ] [ $fecha ] - [ $hora_actual ]"
    git push -u origin "$branch"

fi
