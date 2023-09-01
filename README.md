# Orfeo 6.1 - skinatech

### Versión 1.0
* Proyecto: Ultima versión de Orfeo 6.1, versión de php >7.3

```
### Instalación
1. Se debe clonar el proyecto git clone https://aruba.skinatech.com/jmgamez/orfeo-6.0.git
2. Se debe crear la carpeta bodega http://ip/instalacion/carpeta_bodega.php?anoCrear=XXXX
3. Se debe copiar el archivo config.php-dist a config.php
4. Se debe configurar los datos correspondientes al cliente
5. Se debe crear la base de datos 
```
### Estructura de directorios
A continuación se presenta la estructura de directorios.
```
├── orfeo-sgd/
│   ├── 0-AUTHOR
│   ├── 0-CHANGELOG
│   ├── 0-INSTALL
│   ├── 0-LICENSE
│   ├── 0-README
│   ├── 0-VERSION
│   ├── abre_en_frame.php
│   ├── Administracion/
│   │   ├── *
│   ├── adodb
│   │   ├── *
│   ├── ajax
│   │   ├── *
│   ├── alertas
│   │   ├── *
│   ├── alert.php
│   ├── anulacion
│   ├── aplintegra
│   ├── archivo
│   ├── asignarDireccion.php
│   ├── asignar_eje_tem_transacciones.php
│   ├── autenticaLDAP.php
│   ├── bodega
│   │   ├── *
│   ├── borrar_archivos.php
│   ├── buscaRutaArchivoPrincipal.php
│   ├── busqueda
│   │   ├── *
│   ├── busquedaOCR
│   │   ├── *
│   ├── cajaspdf.php
│   ├── cerrar_session.php
│   ├── certSHT
│   │   ├── *
│   ├── clasesComunes
│   │   ├── *
│   ├── class_control
│   │   ├── *
│   ├── columnas.php
│   ├── config.php-dist
│   ├── consultaFirmaqr
│   │   ├── *
│   ├── consultaRadicados
│   │   ├── *
│   ├── consultaSUI
│   │   ├── *
│   ├── consultaWeb
│   │   ├── *
│   ├── contraxx.php
│   ├── correspondencia.php
│   ├── crear_carpeta.php
│   ├── cuerpoAgenda.php
│   ├── cuerpoinf.php
│   ├── cuerpo.php
│   ├── cuerpoTx.php
│   ├── devolucion
│   │   ├── *
│   ├── digitalizador
│   │   ├── *
│   ├── documentacion
│   │   ├── *
│   ├── edicionWeb
│   │   ├── *
│   ├── eliminar_carpeta.php
│   ├── email
│   │   ├── *
│   ├── encabezado.php
│   ├── enviardatos.php
│   ├── envios
│   │   ├── *
│   ├── estadisticas
│   │   ├── *
│   ├── estilos
│   │   ├── *
│   ├── estilos50
│   │   ├── *
│   ├── estilos_totales.css
│   ├── expediente
│   │   ├── *
│   ├── firma
│   │   ├── *
│   ├── firmaqr
│   │   ├── *
│   ├── flujo
│   │   ├── *
│   ├── fondoAcumulado
│   │   ├── *
│   ├── formulario_sql.php
│   ├── formularioWeb
│   │   ├── *
│   ├── f_top.php
│   ├── genarchivo.php
│   ├── generar_alertas
│   │   ├── *
│   ├── generar_envio.php
│   ├── genplantilla.php
│   ├── iconos
│   │   ├── *
│   ├── imagenes -> imagenes1
│   ├── imagenes0
│   │   ├── *
│   ├── imagenes1
│   │   ├── *
│   ├── imagen_principal.php
│   ├── images
│   │   ├── *
│   ├── img
│   │   ├── *
│   ├── inBox_xajax.php
│   ├── include
│   │   ├── *
│   ├── index_frames.php
│   ├── index.php
│   ├── info.php
│   ├── ingresoAutomatico.php
│   ├── instalacion
│   │   ├── *
│   ├── js
│   │   ├── *
│   ├── lista_anexos.php
│   ├── lista_anexos_seleccionar_transaccion.php
│   ├── listado_guias.php
│   ├── listado_planillas.php
│   ├── listado_sql.php
│   ├── lista_general.php
│   ├── login.php
│   ├── loginWeb.php
│   ├── logoEntidad_negro_pdf.jpg
│   ├── logoEntidad_negro.png
│   ├── logoEntidad.png
│   ├── manejoinformacion.php
│   ├── menu
│   │   ├── *
│   ├── mod_datos.php
│   ├── mostrarDireccion.php
│   ├── notificacion
│   │   ├── *
│   ├── notificacion1
│   │   ├── *
│   ├── nuevo_archivo.php
│   ├── nuevo_paquete_exito.php
│   ├── nuevo_paquete.php
│   ├── nuevo_paquete_registro.php
│   ├── numerar_paquete_anexos.php
│   ├── paginaError.php
│   ├── pdfjs
│   │   ├── *
│   ├── pear
│   │   ├── *
│   ├── plantilla.php
│   ├── prestamo
│   ├── pruebaLDAP.php
│   ├── quixplorer
│   │   ├── *
│   ├── quixplorer.php
│   ├── radicacion
│   │   ├── *
│   ├── radicado_n.php
│   ├── radicar_paquete_anexos.php
│   ├── radicar_paquete_exitosa.php
│   ├── radsalida
│   │   ├── *
│   ├── README.md
│   ├── reasignacion_masiva
│   │   ├── *
│   ├── reasignar.php
│   ├── rec_session.php
│   ├── reportes
│   ├── searchsGeneral.php
│   ├── secuencias
│   │   ├── *
│   ├── seguridad
│   │   ├── *
│   ├── session_orfeo.php
│   ├── session_variables.php
│   ├── sinacceso.php
│   ├── solicitar
│   │   ├── *
│   ├── transDocumentales
│   │   ├── *
│   ├── trd
│   │   ├── *
│   ├── tx
│   ├── txOrfeo.php
│   ├── upload2.php
│   ├── uploadFiles
│   ├── upload.php
│   ├── usuarionuevo.php
│   ├── variables.php
│   ├── ver_datosgeo.php
│   ├── ver_datosrad.php
│   ├── ver_historico.php
│   ├── verradicado.php
│   ├── vinculacion
│   ├── webServices
│   ├── webServices2
```
