#!/bin/bash
# Script para actualizar los permisos del año creado, para que skinascan
# pueda cargar archivos en este
# By SkinaTech - Ivan Martinez
# Fecha: 20 de diciembre 2018


baseDir=$(readlink -f $0)
scriptDir="$(dirname "$baseDir")"
orfeoDir="$(dirname "$scriptDir")/bodega/"

#orfeoDir="/var/www/orfeo/bodega" 

sudo chown -R fnd_ftpprod:www-data $orfeoDir`date +%Y`
sudo chmod -R 775 $orfeoDir`date +%Y`

echo 'Fecha: '`date` >> $scriptDir"/bodegaDirectorios.log"
echo 'permisos actualizados año' `date +%Y` >> $scriptDir"/bodegaDirectorios.log"
echo 'Ruta: ' $orfeoDir`date +%Y` >>  $scriptDir"/bodegaDirectorios.log"
