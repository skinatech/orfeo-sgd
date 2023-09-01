<?php
session_start();

$assoc = $_SESSION['assoc'];
define('ADODB_ASSOC_CASE', $assoc);

$ruta_raiz = "../..";
include_once "$ruta_raiz/include/db/ConnectionHandler.php";
//require_once("$ruta_raiz/class_control/CombinaError.php");

$dependencia = $_SESSION['dependencia'];
if (!isset($_SESSION['dependencia']))
    include "$ruta_raiz/rec_session.php";
(!$db) ? $conexion = new ConnectionHandler($ruta_raiz) : $conexion = $db;
//$conexion->conn->debug = true;
$conexion->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$codusuario = $_SESSION['codusuario'];
$usua_nomb = $_SESSION['usua_nomb'];

$tipoRad = $_POST['tipoRad'];
$archivoPlantilla_name = $_FILES['archivoPlantilla']['name'];
$archivoPlantilla_size = $_FILES['archivoPlantilla']['size'];
$archivoPlantilla = $_FILES['archivoPlantilla']['tmp_name'];

$archivoCsv_name = $_FILES['archivoCsv']['name'];
$archivoCsv_size = $_FILES['archivoCsv']['size'];
$archivoCsv = $_FILES['archivoCsv']['tmp_name'];
$usua_doc = $_SESSION['usua_doc'];
$codiTRD = $_GET['codiTRD'];

$hora = date("H") . "_" . date("i") . "_" . date("s");
// var que almacena el dia de la fecha
$ddate = date('d');
// var que almacena el mes de la fecha
$mdate = date('m');
// var que almacena el a�o de la fecha
$adate = date('Y');
// var que almacena  la fecha formateada
$fecha = $adate . "_" . $mdate . "_" . $ddate;


//Almacena la extesi�n del archivo entrante
$extension = trim(substr($archivoPlantilla_name, strpos($archivoPlantilla_name, ".") + 1, strlen($archivoPlantilla_name) - strpos($archivoPlantilla_name, ".")));
//var que almacena el nombre que tendr� la pantilla
$arcPlantilla = $usua_doc . "_" . $fecha . "_" . $hora . ".$extension";

//var que almacena el nombre que tendr� el CSV
$arcCsv = $usua_doc . "_" . $fecha . "_" . $hora . ".csv";
//var que almacena el path hacia el PDF final
$arcPDF = "$ruta_raiz/bodega/masiva/" . "tmp_" . $usua_doc . "_" . $fecha . "_" . $hora . ".pdf";
$phpsession = session_name() . "=" . session_id();
//var que almacena los par�metros de sesi�n
$params = $phpsession . "&krd=$krd&dependencia=$dependencia&codiTRD=$codiTRD&depe_codi_territorial=$depe_codi_territorial&usua_nomb=$usua_nomb&tipo=$tipo&"
        . "depe_nomb=$depe_nomb&usua_doc=$usua_doc&codusuario=$codusuario";

//Función que calcula el tiempo transcurrido
function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float) $usec + (float) $sec);
}

//Evita caractres especiales en la combinacion 
function caracteresEspeciales($campo) {
    $blacklist = array(':', '*', '#', '@', '(', ')'); //etc etc
    $campo = str_replace($blacklist, " ", $campo);
    return str_replace("&", "y", $campo);
}

function eliminar_tildes($cadena){

    //Codificamos la cadena en formato utf8 en caso de que nos de errores
    $cadena = utf8_encode($cadena);

    //Ahora reemplazamos las letras
    $cadena = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $cadena
    );

    $cadena = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $cadena );

    $cadena = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $cadena );

    $cadena = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $cadena );

    $cadena = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $cadena );

    $cadena = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C'),
        $cadena
    );

    return $cadena;
}
?>
<html>
    <head>
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <link href="<?= $ruta_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    <script>
        /** Confirma la generacion definitiva **/
        function enviar() {
            if (confirm('Confirma la generacion de un radicado por cada registro del archivo CSV?'))
                document.formDefinitivo.submit();
        }

        function regresar() {
            document.formDefinitivo.action = "menu_masiva.php?" + '<?= $params ?>';
            document.formDefinitivo.submit();
        }

        /** Env�a el formulario, a consultar divipola **/
        function divipola() {
            document.formDefinitivo.action = "consulta_depmuni.php?" + document.formDefinitivo.params.value;
            document.formDefinitivo.submit();
        }

        /** Cancela el proceso y devuelve el control a men� masiva **/
        function cancelar() {
            document.formDefinitivo.action = 'menu_masiva.php?' + document.formDefinitivo.params.value;
            document.formDefinitivo.submit();
        }

        function abrirArchivoaux(url) {
            nombreventana = 'Documento';
            window.open(url, nombreventana, 'status, width=900,height=500,screenX=100,screenY=75,left=50,top=75');
            return;
        }
    </script>
</head>
<body>
    
        <form action="adjuntar_defint.php?<?= $params ?>" method="post" enctype="multipart/form-data" name="formDefinitivo">
        <input type=hidden name=pNodo value='<?= $pNodo ?>'>
        <input type=hidden name=codProceso value='<?= $codProceso ?>'>
        <input type=hidden name=tipoRad value='<?= $tipoRad ?>'>
        <?php
        $time_start = microtime_float();

        if ($archivoPlantilla_size >= 10000000 || $archivoCsv_size >= 10000000) {
            echo "el tama&nacute;o de los archivos no es correcto. <br><br><table><tr><td><li>se permiten archivos de 100 Kb m&aacute;ximo.</td></tr></table>";
        } else {
            $dirActual = getcwd();
            
            if (!move_uploaded_file($archivoPlantilla, "$ruta_raiz/bodega/masiva/" . $arcPlantilla)) {
                echo "error al copiar Plantilla: $archivoPlantilla en $ruta_raiz/bodega/masiva/" . $arcPlantilla;
            }

            elseif (!move_uploaded_file($archivoCsv, "$ruta_raiz/bodega/masiva/" . $arcCsv)) {
                echo "error al copiar CSV: $archivoCsv en $ruta_raiz/bodega/masiva/" . $arcCsv;
            }

            else {

                echo "<center><span class=etextomenu align=left><br>";
                echo '<div id="titulo" style="width: 60%;" align="center">Vista Previa de radicados masivos</div>';
                echo "<center>
                        <TABLE border=1 width 58% cellpadding='0' cellspacing='5' class='borde_tab'>
                            <TR ALIGN=LEFT>
                                <TD width=21% class='titulos2' >Dependencia :</td>
                                <td class='listado2'> " . $_SESSION['depe_nomb'] . "</TD>	
                            </tr>
                            <TR ALIGN=LEFT>
                                <TD class='titulos2' >Usuario responsable :</td>
                                <td class='listado2'>" . $_SESSION['usua_nomb'] . "</TD>
                            </tr>    
                            <TR ALIGN=LEFT>
                                <TD class='titulos2' >Fecha :</td>
                                <td class='listado2'>" . date("d-m-Y - h:mi:s") . "</TD>
                            </TR>
                        </TABLE>
                    </center>";
                require "$ruta_raiz/include/jhrtf/jhrtf.php";
                $ano = date("Y");
                //var que almacena nombre del archivo combinado
                //pone el nombre de los archivos de salida con la extensión adecuada (odt o .doc)
                if ($extension == 'doc') {
                    $archivoFinal = "./bodega/$ano/$dependencia/docs/$usua_doc" . "_$fecha" . "_$hora.doc";
                    $archivoTmp = "./bodega/masiva/$usua_doc" . "_$fecha" . "_$hora.doc";
                } 
                else if ($extension == 'docx') {
                    $archivoFinal = "./bodega/$ano/$dependencia/docs/$usua_doc" . "_$fecha" . "_$hora.docx";
                    $archivoTmp = "./bodega/masiva/$usua_doc" . "_$fecha" . "_$hora.docx";
                }
                else {
                    $archivoFinal = "./bodega/$ano/$dependencia/docs/$usua_doc" . "_$fecha" . "_$hora.odt";
                    $archivoTmp = "./bodega/masiva/$usua_doc" . "_$fecha" . "_$hora.odt";
                }

                $ruta_raiz = "../..";
                $definitivo = "no";

                $archInsumo = "" . $usua_doc . "_" . $fecha . "_" . $hora;

                $fp = fopen("$ruta_raiz/bodega/masiva/$archInsumo", 'w');
                if ($fp) {
                    fputs($fp, "plantilla=$arcPlantilla" . "\n");
                    fputs($fp, "csv=$arcCsv" . "\n");
                    fputs($fp, "archFinal=$archivoFinal" . "\n");
                    fputs($fp, "archTmp=$archivoTmp" . "\n");
                    fclose($fp);
                } else {
                    exit("No hay acceso para crear el archivo $archInsumo");
                }

                // Se crea el objeto de masiva
                $masiva = new jhrtf($archInsumo, $ruta_raiz, $arcPDF, $conexion);
                $masiva->cargar_csv();
                $masiva->validarArchs();
                if ($masiva->hayError()) {
                    $masiva->mostrarError();
                } else {
                    $masiva->setTipoDocto($tipo);
                    $_SESSION["masiva"] = $masiva;
                   
                    echo "<center><span class=info><br>Se ha realizado la combinaci&oacute;n de correspondencia como una prueba.<br> ";
                    $datosArreglo = $masiva->combinar_csv($dependencia, $codusuario, $usua_doc, $usua_nomb, $dependencia, $codiTRD, $tipoRad);

                    error_reporting(0);
                    include("$ruta_raiz/config.php");
                    $estadoTransaccion = -1;

                    //El archivo que ingresó es odt, luego se utiliza el nuevo combinador
                    if ($extension == 'odt') {

                        //Se incluye la clase que maneja la combinación masiva
                        include ( "$ruta_raiz/radsalida/masiva/OpenDocText.class.php" );
                        define('WORKDIR', '../../bodega/tmp/workDir/');
                        define('CACHE', WORKDIR . 'cacheODT/');

                        //Se abre archivo de insumo para lectura de los datos
                        $fp = fopen("$ruta_raiz/bodega/masiva/$archInsumo", 'r');
                        if ($fp) {
                            $contenidoCSV = file("$ruta_raiz/bodega/masiva/$archInsumo");
                            fclose($fp);
                        } else {
                            exit("No hay acceso para crear el archivo $archInsumo");
                        }

                        $accion = false;
                        $odt = new OpenDocText();
                        //Modod debug en false, para pruebas poner true y saldran mensajes de lo que está pasando con la combinacion
                        $odt->setDebugMode(false);

                        //Se carga el archivo odt Original
                        $odt->cargarOdt("$ruta_raiz/bodega/masiva/$arcPlantilla", $arcPlantilla);
                        $odt->setWorkDir(WORKDIR);
                        $accion = $odt->abrirOdt();
                        if (!$accion) {
                            die("<CENTER><table class=borde_tab><tr><td class=titulosError>Problemas en el servidor abriendo archivo ODT para combinaci&oacute;n.</td></tr></table>");
                        }

                        $odt->cargarContenido();

                        //Se recorre el archivo de insumo
                        foreach ($contenidoCSV as $line_num => $line) {

                            if ($line_num == 4) {
                                $cadaVariable = explode(';', $line);
                            } elseif ($line_num > 4) { //Desde la línea 5 hasta el final del archivo de insumo están los datos de reemplazo
                               
                                $cadaValor = explode(";", $line);
                                $cadaValor[1] = caracteresEspeciales($cadaValor[1]);
                                $cadaValor[2] = caracteresEspeciales($cadaValor[2]);
                                $cadaValor[7] = caracteresEspeciales($cadaValor[7]);
                                $cadaValor[8] = caracteresEspeciales($cadaValor[8]);
                                $cadaValor[9] = caracteresEspeciales($cadaValor[9]);
                                $setVariable = $odt->setVariable($cadaVariable, $cadaValor);

                                //echo '<pre>';
                                //print_r($setVariable['contenido']);
                                //echo '</pre>';
                            }
                            

                            if (connection_status() != 0) {
                                $objError = new CombinaError(NO_DEFINIDO);
                                echo ($objError->getMessage());
                                die;
                            }
                        }
                        $tipoUnitario = '0';

                        //Se guardan los cambios del archivo temporal para su descarga
                        $archivoTMP = $odt->salvarCambios($archivoTmp, null, $tipoUnitario);
                        $intBodega = strpos($archivoTMP, "/bodega");
                        if ($intBodega === false) {
                            $rutaTMP = $ruta_raiz . '/bodega';
                        } else {
                            $rutaTMP = $ruta_raiz;
                        }
                        echo ("<BR><span class='info'> Por favor guarde el archivo y verifique que los datos de combinacion  esten correctos <br>");
                        echo ("<a class='vinculos' href=javascript:abrirArchivoaux('$rutaTMP$archivoTMP')>Guardar Archivo </a></span> ");
                        echo ("<br><br>");
                        echo( "<br><input name='enviaDef' type='button'  class='botones' id='envia22'  onClick='enviar()' value='Generar Definitivo'>");
                        echo( "<input name='cancel' type='button'  class='botones' id='envia22'  onClick='cancelar()' value='Cancelar'>");
                    } 

                    else if ($extension == 'docx' || $extension == 'DOCX') {

                        //Se incluye la clase que maneja la combinación masiva
                        include ( "$ruta_raiz/radsalida/masiva/ooxml_masiva.class.php" );
                        define('WORKDIR', $ruta_raiz.'/bodega/tmp/workDir/');
                        define('CACHE', WORKDIR . 'cacheODT/');

                        //Se abre archivo de insumo para lectura de los datos
                        $fp = fopen("$ruta_raiz/bodega/masiva/$archInsumo", 'r');
                        if ($fp) {
                            $contenidoCSV = file("$ruta_raiz/bodega/masiva/$archInsumo");
                            fclose($fp);
                        } else {
                            exit("No hay acceso para crear el archivo $archInsumo");
                        }

                        $accion = false;
                        $docx = new Ooxml();
                        $docx->setDebugMode(false);
                        $docx->cargarOdt("$ruta_raiz/bodega/masiva/$arcPlantilla", $arcPlantilla);
                        $docx->setWorkDir(WORKDIR);
                        $accion = $docx->abrirOdt();

                        if (!$accion) {
                            die("<CENTER><table class=borde_tab><tr><td class=titulosError>Problemas en el servidor abriendo archivo ODT para combinaci&oacute;n.</td></tr></table>");
                        }

                        $docx->cargarContenido();

                        //Se recorre el archivo de insumo
                        foreach ($contenidoCSV as $line_num => $line) {

                            if ($line_num == 4) {
                                $cadaVariable = explode(';', $line);
                            } elseif ($line_num > 4) { //Desde la línea 5 hasta el final del archivo de insumo están los datos de reemplazo
                               
                                $cadaValor = explode(";", $line);
                                $cadaValor[1] = caracteresEspeciales($cadaValor[1]);
                                $cadaValor[2] = caracteresEspeciales($cadaValor[2]);
                                $cadaValor[7] = caracteresEspeciales($cadaValor[7]);
                                $cadaValor[8] = caracteresEspeciales($cadaValor[8]);
                                $cadaValor[9] = caracteresEspeciales($cadaValor[9]);
                                $setVariable = $docx->setVariable($cadaVariable, $cadaValor);

                                //echo '<pre>';
                                //print_r($setVariable['contenido']);
                                //echo '</pre>';
                            }
                            

                            if (connection_status() != 0) {
                                $objError = new CombinaError(NO_DEFINIDO);
                                echo ($objError->getMessage());
                                die;
                            }
                        }

                        $tipoUnitario = '0';

                        //Se guardan los cambios del archivo temporal para su descarga
                        $archivoTMP = $docx->salvarCambios($archivoTmp, null, $tipoUnitario);
                        $intBodega = strpos($archivoTMP, "/bodega");

                        if ($intBodega === false) {
                            $rutaTMP = $ruta_raiz . '/bodega';
                        } else {
                            $rutaTMP = $ruta_raiz;
                        }

                        echo ("<BR><span class='info'> Por favor guarde el archivo y verifique que los datos de combinacion  esten correctos <br>");
                        echo ("<a class='vinculos' href=javascript:abrirArchivoaux('$rutaTMP$archivoTMP')>Guardar Archivo </a></span> ");
                        echo ("<br>");
                        echo( "<br><input name='enviaDef' type='button'  class='botones' id='envia22'  onClick='enviar()' value='Generar Definitivo'>");
                        echo( "<input name='cancel' type='button'  class='botones' id='envia22'  onClick='cancelar()' value='Cancelar'>");
                    } 
                    
                    else {
                        
                        // Se utiliza el combinador por medio del servlet para los .doc
                        include ("http://$servProcDocs/docgen/servlet/WorkDistributor?accion=2&ambiente=$ambiente&archinsumo=$archInsumo&definitivo=si");
                        echo ("<br>$archInsumo");

                        if (!file_exists("$ruta_raiz/bodega/masiva/$archInsumo.ok")) {
                            $objError = new CombinaError(NO_DEFINIDO);
                            echo ($objError->getMessage());
                            die;
                        } else {
                            echo ("<span class='alarmas'> Por favor guarde el archivo y verifique que los datos de combinacion  esten correctos <br>");
                            echo ("<a class='vinculos' href=javascript:abrirArchivoaux('$dir_raiz/$archivoTmp')>Guardar Archivo </a></span> ");
                            echo( "<br><input name='enviaDef' type='button'  class='botones' id='envia22'  onClick='enviar()' value='Generar Definitivo'>");
                            echo( "<input name='cancel' type='button'  class='botones' id='envia22'  onClick='cancelar()' value='Cancelar'>");
                        }
                    }
                }
            }
            //Contabilizamos tiempo final
            $time_end = microtime_float();
            $time = $time_end - $time_start;
            echo "<br><b>Se demor&oacute;: $time segundos la Operaci&oacute;n total.</b>";
        }
        ?>
        <input name='archivo' type='hidden' value='<?= $archivoFinal ?>'>
        <input name='arcPDF' type='hidden'  value='<?= $arcPDF ?>'>
        <input name='tipoRad' type='hidden' value='<?= $tipoRad ?>'>
        <input name='pNodo' type='hidden' value='<?= $pNodo ?>'>
        <input name='params' type='hidden'  value="<?= $params ?>">
        <input name='archInsumo' type='hidden'  value="<?= $archInsumo ?>">
        <input name='extension' type='hidden'  value="<?= $extension ?>">
        <input name='arcPlantilla' type='hidden' value='<?= $arcPlantilla ?>'>

    </form>
</body>
</html>
