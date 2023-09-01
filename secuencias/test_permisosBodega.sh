#!/bin/bash
# Script  para verificar  la creacion de rutas 
# By SkinaTech - Ivan Martinez
# Fecha: 20 de diciembre 2018


baseDir=$(readlink -f $0)
scriptDir="$(dirname "$baseDir")"
orfeoDir="$(dirname "$scriptDir")/bodega/"

#orfeoDir="/var/www/orfeo/bodega" 

#sudo chown -R ftporfeo:www-data $orfeoDir`date +%Y`
#sudo chmod -R 775 $orfeoDir`date +%Y`

echo 'Base Directorio script' $baseDir >> $scriptDir"/test_bodegaDirectorios.log"
echo 'Script Directorio' $scriptDir >> $scriptDir"/test_bodegaDirectorios.log"
echo 'Orfeo Directorio' $orfeoDir >> $scriptDir"/test_bodegaDirectorios.log"

echo 'Fecha: '`date` >> $scriptDir"/test_bodegaDirectorios.log"
echo 'permisos actualizados año' `date +%Y` >> $scriptDir"/test_bodegaDirectorios.log"
echo 'Ruta: ' $orfeoDir`date +%Y` >> $scriptDir"/test_bodegaDirectorios.log"
