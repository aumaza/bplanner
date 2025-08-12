#!/bin/bash
clear
fecha=`date +%d-%m-%Y`
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
    git add *
    git commit -m "$commit [ $fecha ]"
    git push -u origin "$branch"
    sed -i "$ a\| ======================================================================================== |" "$CONFIG_COMMIT"
    sed -i "$ a\| USER=$nombre" "$CONFIG_BACKTRACK"
    sed -i "$ a\| DATE=$fecha" "$CONFIG_BACKTRACK"
    sed -i "$ a\| COMMIT=$COMMIT" "$CONFIG_BACKTRACK"
    sed -i "$ a\| ======================================================================================== |" "$CONFIG_COMMIT"
fi
