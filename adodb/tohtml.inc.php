<?php

/*
  V4.52 10 Aug 2004  (c) 2000-2004 John Lim (jlim@natsoft.com.my). All rights reserved.
  Re  library license.
  Whenever there is any discrepancy between the two licenses,
  the BSD license will take precedence.

  Some pretty-printing by Chris Oxenreider <oxenreid@state.net>
 */

// specific code for tohtml

GLOBAL $gSQLMaxRows, $gSQLBlockRows, $HTTP_GET_VARS;


$gSQLMaxRows = 1000; // max no of rows to download
$gSQLBlockRows = 20; // max no of rows per table block
$url_raiz = $_SESSION['url_raiz'];

$rutaRaiz = $_SESSION['dir_raiz'];
$assoc = $_SESSION['assoc'];
$imagenes = $_SESSION["imagenes"];

// RETURNS: number of rows displayed
function rs2html(&$db, &$rsTmp, $ztabhtml = false, $zheaderarray = false, $htmlspecialchars = true, $echo = true, $toRefVar, $orderTipo, $ordenActual, $rutaRaiz, $checkAll = false, $checkTitulo = false, $descCarpetasGen, $descCarpetasPer, $url_raiz = ".") {
    if (strtoupper(trim($orderTipo)) != "DESC") {
        $orderTipo = "asc";
    } else {
        $orderTipo = "desc";
    }
    $s = '';
    $rows = 0;
    $docnt = false;
    GLOBAL $gSQLMaxRows, $gSQLBlockRows, $HTTP_GET_VARS, $HTTP_SESSION_VARS;
    if (!$rsTmp) {
        printf(ADODB_BAD_RS, 'rs2html');
        return false;
    }
    if (!$ztabhtml)
        $ztabhtml = " WIDTH='98%'";
    //else $docnt = true;
    $typearr = array();
    $ncols = $rsTmp->FieldCount();
    $hdr = "<TABLE COLS=$ncols $ztabhtml><tr>\n\n";
    $img_no = $ordenActual;
    $iRad = 0;
    for ($i = 0; $i < $ncols; $i++) {
        $field = $rsTmp->FetchField($i);
        if ($zheaderarray)
            $fname = $zheaderarray[$i];
        else
            $fname = htmlspecialchars($field->name);
                
        $typearr[$i] = $rsTmp->MetaType($field->type, $field->max_length);
        //print " $field->name $field->type $typearr[$i] ";
        if (strlen($fname) == 0)
            $fname = '&nbsp;';
        if (isset($hor)) {
            $order = $i - $hor;
            $hor = 0;
        } else {
            $order = $i;
        }
        $order = $i;
        $encabezado = $toRefVar . $order;
                
        if ($fname == "HID_RADI_LEIDO") {
            $campoLeido = $i;
        }
        if ($fname == "IMG_Numero Radicado") {
            $iRad = $i;
        }
        $prefijo = substr($fname, 0, 4);
        switch (substr($fname, 0, 4)) {
            case 'CHU_':
                break;
            case 'CHR_':
                break;
            case 'CHK_':
                break;
            case 'IDT_';
                $fname = substr($fname, 4, 20);
                break;
            case 'IMG_';
                $fname = substr($fname, 4, 20);
                break;
            case 'DAT_':
                $fname = substr($fname, 4, 20);
                break;
            case 'HOR_':
                $hor = 1;
                break;
            case 'HID_':
                $hor = 1;
                break;
        }

        if ($prefijo != "HID_" AND $prefijo != "CHU_" AND $prefijo != "CHR_" AND $prefijo != "CHK_" AND $prefijo != "HOR_") {
            $hdr .= "<Th class=titulos3><a href='" . $_SERVER['PHP_SELF'] . "?$encabezado&orden_cambio=1' aria-label='Ordenar por $fname' title='Ordenar por $fname' alt='Ordenar por $fname'><span class=titulos3>";
            if ($img_no == $i) {
                //PARA PONER LA FLECHITA
                $hdr .= "<img src=$url_raiz/iconos/flecha$orderTipo.gif alt='Listado ordenado por esta columna' border=0>";
            }
            //correcciones de ortografia que no afectan los nombres de las columnas
            $fname = ($fname == 'Numero Radicado') ? "N&uacute;mero Radicado" : $fname;
            $fname = ($fname == 'Img_Numero Radicado') ? "N&uacute;mero Radicado" : $fname;
            $fname = ($fname == 'Numero Radicacion') ? "N&uacute;mero Radicaci&oacute;n" : $fname;
            $fname = ($fname == 'Dias Restantes') ? "D&iacute;as Restantes " : $fname;
            $fname = ($fname == 'Descripcion') ? "Descripci&oacute;n" : $fname;
            $fname = ($fname == 'Fecha Envio') ? "Fecha Env&iacute;o" : $fname;
            $fname = ($fname == 'FECHA ENVIO') ? "Fecha Env&iacute;o" : $fname;
            $fname = ($fname == 'Fecha Transaccion') ? "Fecha Transacci&oacute;n" : $fname;
            $fname = ($fname == 'Empresa de Envio') ? "Empresa de Env&iacute;o" : $fname;
            $fname = ($fname == 'Tipo Transaccion') ? "Tipo Transacci&oacute;n" : $fname;
            $fname = ($fname == 'Direccion') ? "Direcci&oacute;n" : $fname;
            $fname = ($fname == 'Observacion') ? "Observaci&oacute;n" : $fname;
            $fname = ($fname == 'Valor de envio') ? "Valor de Env&iacute;o" : $fname;
            $fname = ($fname == 'Pais') ? "Pa&iacute;s" : $fname;
            $fname = ($fname == 'Fecha Impresion') ? "Fecha Impresi&oacute;n" : $fname;
            $fname = ($fname == 'DESTINATARIO') ? "Destinatario" : $fname;
            $fname = ($fname == 'NOMBRE') ? "Nombre" : $fname;
            $fname = ($fname == 'USUARIO') ? "Usuario" : $fname;
            $fname = ($fname == 'DEPENDENCIA') ? "Dependencia" : $fname;
            $fname = ($fname == 'Fecha Devolucion') ? "Fecha Devoluci&oacute;n" : $fname;
            $fname = ($fname == 'Usuario Realiza Devolucion') ? "Usuario Realiza Devoluci&oacute;n" : $fname;
            $fname = ($fname == 'Tiempo de Espera (Dias)') ? "Tiempo de Espera (D&iacute;as)" : $fname;
            /***
            Skinatech
            Autor: Andrés Mosquera
            Fecha: 06-11-2018
            Información: Textos editados para funcionamiento general
            ***/
            $fname = ($fname == 'RADICADO_SALIDA') ? "Radicado de Salida" : $fname;
            $fname = ($fname == 'COPIA') ? "Copia" : $fname;
            $fname = ($fname == 'RADICADO_PADRE') ? "Radicado Padre" : $fname;
            $fname = ($fname == 'FECHA_RADICADO') ? "Fecha" : $fname;
            $fname = ($fname == 'DESCRIPCION') ? "Descripci&oacute;n" : $fname;
            $fname = ($fname == 'FECHA_IMPRESION') ? "Fecha Impresi&oacute;n" : $fname;
            $fname = ($fname == 'GENERADO_POR') ? "Generado Por" : $fname;
            $fname = ($fname == 'FECHA') ? "Fecha" : $fname;
            $fname = ($fname == 'ADMINISTRADOR') ? "Administrador" : $fname;
            $fname = ($fname == 'OBSERVACION') ? "Observaci&oacute;n" : $fname;
            /***
            Skinatech
            Autor: Andrés Mosquera
            Fecha: 06-11-2018
            Información: Fin Textos editados para el listado de envíos-normal
            ***/

            $hdr .= "$fname</span></a></Th>";
        } else {
            // by skina (es necesario corregir esto)
            $imagenes = $_SESSION["imagenes"];
            if (substr($fname, 0, 4) == "CHU_") {

                /***
                Skinatech
                Autor: Andrés Mosquera
                Fecha: 17-10-2018
                Información: Cabecera que no cargaba imagen
                ***/
                $hdr .= "
                    <td class='titulos3' width='1%'>
                        <center>
                            <img src='../imagenes/estadoDoc.gif' border='0' align='left' width='130' height='32' alt='Imagen con estados del documento, dividida en 4 partes con valores de izquierda a derecha anexado,radicado,impreso,enviado' />
                        </center>
                    </td>";
                /***
                Skinatech
                Autor: Andrés Mosquera
                Fecha: 17-10-2018
                Información: Fin Cabecera que no cargaba imagen
                ***/
            }
            if (substr($fname, 0, 4) == "CHR_") {
                $hdr .= "<TH class=titulos3 width=1%><center></TH>";
            }
            if (substr($fname, 0, 4) == "CHK_") {
                if ($checkAll == true)
                    $valueCheck = " checked ";
                else
                    $valueCheck = "";
                if ($checkTitulo == true) {
                    $fname = "<center><input type=checkbox class='chkrow' name=checkAll value=checkAll onClick='markAll();' $valueCheck title='Active esta casilla para seleccionar todos los adicados encontrados'></center>";
                } else {
                    $fname = " ";
                }
                if (!isset($fTitulo)) {
                    $fTitulo = "";
                    $hdr .= "<TH class=titulos3 width=1%>$fTitulo $fname</TH>";
                } else
                    $hdr .= "<TH class=titulos2 width=1%>$fTitulo $fname</TH>";
            }
        }
    }
    $hdr .= "\n</tr>";
    if ($echo)
        print $hdr . "\n\n";
    else
        $html = $hdr;
    // smart algorithm - handles ADODB_FETCH_MODE's correctly by probing...
    $numoffset = isset($rsTmp->fields[0]) || isset($rsTmp->fields[1]) || isset($rsTmp->fields[2]);
    $ii = 0;
    
    /* by Skinatech */
    /* Esta parte es la que controla los permisos de acceso a los radicados de los anexos y los tipos documentales */
    $consultaTipo = "select cod_tp_tpdcumento as COD_TP_TPDCUMENTO from rol_tipos_doc where cod_rol=" . $_SESSION['rol'];
    $resultTipo = $db->conn->query($consultaTipo);

    while (!$resultTipo->EOF) {
        $tiposdocumentales[] = isset($resultTipo->fields["COD_TP_TPDCUMENTO"]) ? $resultTipo->fields["COD_TP_TPDCUMENTO"] : $resultTipo->fields["cod_tp_tpdcumento"];
        $resultTipo->MoveNext();
    }

    /*echo '<pre>';
    print_r($resultTipo->fields);
    echo '</pre>';*/
    
    while (!$rsTmp->EOF) {
        if ($ii == 0) {
            $class_grid = "listado1";
            $ii = 1;
        } else {
            $class_grid = "listado2";
            $ii = 0;
        }
        $s .= "<TR class=$class_grid valign=top>\n";

        if (isset($rsTmp->fields["HID_RADI_LEIDO"]) or isset($rsTmp->fields["hid_radi_leido"])){
            $estadoRad =  $rsTmp->fields["HID_RADI_LEIDO"];
        }else{
            $estadoRad = $rsTmp->fields[11];
        }
        $radicado = $rsTmp->fields[$iRad];

        if (isset($radicado) && strlen($radicado) > 13)
            include("../tx/imgRadicado.php");
        
        if ($estadoRad == 1) {
            $radFileClass = "leidos";
        } else {
            $radFileClass = "no_leidos";            
        }  
        
        if (strlen(trim($estadoRad)) == 0)
            $radFileClass = "leidos";
        
        /* by Skinatech */
        /* Esta parte es la que controla los permisos de acceso a los radicados de los anexos y los tipos documentales */
        $nombreTipoDocumento = isset($rsTmp->fields["TIPO DOCUMENTO"]) ? $rsTmp->fields["TIPO DOCUMENTO"] : $rsTmp->fields["Tipo Documento"];
        $consultaTotalTipo = "select sgd_tpr_codigo as SGD_TPR_CODIGO from sgd_tpr_tpdcumento where sgd_tpr_descrip='" .$nombreTipoDocumento."'";
        $resultTotalTipo = $db->conn->query($consultaTotalTipo);
    
        $tdocper = $resultTotalTipo->fields["SGD_TPR_CODIGO"];
        $tdocperActa = $resultTotalTipo->fields["SGD_TPR_CODIGO"];

        // echo '<pre>';
        // print_r($rsTmp->fields);
        // echo '</pre>';
        
        for ($i = 0; $i < $ncols; $i++) {
            $special = "no";

            if ($i === 0)
                $v = ($numoffset) ? $rsTmp->fields[0] : reset($rsTmp->fields);
            else
                $v = ($numoffset) ? $rsTmp->fields[$i] : next($rsTmp->fields);
            $field = $rsTmp->FetchField($i);
            if (isset($rsTmp->fields[($i + 1)]))
                $vNext = $rsTmp->fields[($i + 1)];
            if (isset($rsTmp->fields[($i + 2)]))
                $vNext1 = $rsTmp->fields[($i + 2)];
            $fname = substr($field->name, 0, 4);
            $noCheckjDevolucion = "";

            //echo ' ************** '.$fname;
            
            switch ($fname) {
                case 'CHU_';
                    $chk_nomb = substr($field->name, 4, 20);
                    $chk_value = $v;
                    $valVNext = 0;
                    if ($vNext == 99)
                        $valVNext = 99;
                    if ($vNext == 0 OR $vNext == NULL) {
                        $valVNext = 97;
                    } else {
                        if ($vNext > 0)
                            $valVNext = 98;
                    }
                    $fecha_dev = $vNext1;
                    switch ($valVNext) {
                        case 99:
                            $v = "<img src='../$imagenes/docDevuelto_tiempo.gif'  border=0 alt='Fecha Devolucion :$fecha_dev' title='Fecha Devolucion :$fecha_dev'>";
                            break;
                        case 98:
                            $v = "<img src='../$imagenes/docDevuelto.gif'  border=0 alt='Fecha Devolucion :$fecha_dev' title='Fecha Devolucion :$fecha_dev'>";
                            break;
                        case 97:
                            $fecha_dev = $rsTmp->fields["HID_SGD_DEVE_FECH"];
                            if ($rsTmp->fields["HID_DEVE_CODIGO1"] == 99) {
                                $v = "<img src='../$imagenes/docDevuelto_tiempo.gif'  border=0 alt='Fecha Devolucion :$fecha_dev' title='Devolucion por Tiempo de Espera'>";
                                $noCheckjDevolucion = "enable";
                                break;
                            }
                            if ($rsTmp->fields["HID_DEVE_CODIGO"] >= 1 and $rsTmp->fields["HID_DEVE_CODIGO"] <= 98) {
                                $v = "<img src='../$imagenes/docDevuelto.gif'  border=0 alt='Fecha Devolucion :$fecha_dev' title='Fecha Devolucion :$fecha_dev'>";
                                $noCheckjDevolucion = "disable";
                                break;
                            }
                            switch ($v) {

                                case 2;
                                    $v = "<img src=../$imagenes/docRadicado.gif alt='Este documento se le ha asignado un radicado' border=0>";
                                    break;
                                case 3;
                                    $v = "<img src=../$imagenes/docImpreso.gif alt='Este documento se le ha asignado el estado de impreso' border=0>";
                                    break;
                                case 4;
                                    $v = "<img src=../$imagenes/docEnviado.gif alt='Este documento ha sido enviado a su destinanatrio' border=0>";

                                    break;
                            }
                            break;
                    }
                    $special = "si";
                    break;
                case 'CHR_';
                    $chk_value = $v; 
                    if ($vNext != 0 AND $vNext != NULL AND $vNext1 == 3)
                        $v = "<img src=../$imagenes/check_x.jpg alt='Debe Modificar el Documento para poder reenviarlo'  title='Debe Modificar el Documento para poder reenviarlo' >";
                    else
                        $v = "<input type=radio name='valRadio' value='$chk_value' class='ebuttons2' title='Boton para seleccionar radicado al cual se le va a asociar la imagen'>";
                    $special = "si";
                    break;
                case 'CHK_';
                    $chk_nomb = substr($field->name, 4, 20);
                    $chk_value = $v;

                    if ($checkAll == true)
                        $valueCheck = " checked ";
                    else
                        $valueCheck = "";

                    if ($noCheckjDevolucion == "disable")
                        $v = "<img src=../$imagenes/check_x.jpg alt='Debe Modificar el Documento para poder reenviarlo'  title='Debe Modificar el Documento para poder reenviarlo' >";
                    else
                        $v = "<input type=checkbox class='chkrow' name='checkValue[$chk_value]' title='Radicado $chk_value, Seleccione para realizar tarea' value='$chk_nomb' $valueCheck >";
                    $special = "si";
                    break;
                case ($fname == 'IMG_' or $fname == 'IDT_');
                    $i_path = $i + 1;
                    $fieldPATH = $rsTmp->FetchField($i_path);
                    $fnamePATH = strtoupper($fieldPATH->name);
                    $pathImagen = $rsTmp->fields[$fnamePATH];

                    if (!isset($pathImagen)) {
                        $pathImagen = $rsTmp->fields[1];
                    }

                    $radicadoModEnvio = $v.'-'.$rsTmp->fields["HID_SGD_RENV_CODIGO"].'-'.$rsTmp->fields["HID_SGD_RENV_CODIGO"];

                    if ($pathImagen) {
                        $permisos_sql = "SELECT radicado.codi_nivel AS nivel_radicado, usuario.codi_nivel AS nivel_usuario, radicado.radi_usua_actu, radicado.radi_depe_actu, radicado.sgd_spub_codigo AS permiso,  radicado.tdoc_codi FROM radicado INNER JOIN usuario ON (radicado.radi_usua_actu=usuario.usua_codi AND radicado.radi_depe_actu=usuario.depe_codi) WHERE radicado.radi_nume_radi = '$v'";
                        $resultados = $db->conn->Execute($permisos_sql);
                        $nivel_radicado = isset($resultados->fields['nivel_radicado']) ? $resultados->fields['nivel_radicado'] : $resultados->fields['NIVEL_RADICADO'];
                        $nivel_usuario = isset($resultados->fields['nivel_usuario']) ? $resultados->fields['nivel_usuario'] : $resultados->fields['NIVEL_USUARIO'];
                        $usuario_actual = isset($resultados->fields['radi_usua_actu']) ? $resultados->fields['radi_usua_actu'] : $resultados->fields['RADI_USUA_ACTU'];
                        $dependencia_actual = isset($resultados->fields['radi_depe_actu']) ? $resultados->fields['radi_depe_actu'] : $resultados->fields['RADI_DEPE_ACTU'];
                        $permission = isset($resultados->fields['permiso']) ? $resultados->fields['permiso'] : $resultados->fields['PERMISO'];
                        $tdocper = isset($resultados->fields['tdoc_codi']) ? $resultados->fields['tdoc_codi'] : $resultados->fields['TDOC_CODI'];
                        $verNumRadicado = $v;

                        if ((($_SESSION['codusuario'] != $usuario_actual) && ($_SESSION['depecodi'] != $dependencia_actual) && $permission == 1) || ($nivel_radicado > $nivel_usuario)
                        ) {
                            $v = "<a href='#' onclick=\"alert('No tiene permiso para acceder')\"><span class=$radFileClass'>$v</span></a>";
                        } else {
            
                            if (in_array($tdocper, $tiposdocumentales)) {
                                $v = "<a href=" . $url_raiz . "/verradicado.php?verrad=" . $verNumRadicado . "&" . $encabezado . "&menu_ver=6 title='Ver imagen principal' alt='Ver documento principal del radicado' aria-label='Ver documento principal del radicado' ><span class=$radFileClass>" . $v . "</span></a>";
                            } else {
                                $v = "<a href='#' onclick=\"alert('Usted no tiene acceso al tipo documental ".$nombreTipoDocumento.". Comun&iacute;quese con el administrador')\"><span class=$radFileClass'>$v</span></a>";
                            }
                        }
                    } else {
                        $v = "$v";
                    }
                    if ($fname == 'IDT_') {
                        $carpPer = $rsTmp->fields["HID_CARP_PER"];
                        $carpCodi = $rsTmp->fields["HID_CARP_CODI"];
                        $noHojas = $rsTmp->fields["HID_RADI_NUME_HOJA"];
                        #Modificado idrd
                        $info_resp = $rsTmp->fields["HID_INFO_RESP"];

                        /** Icono para los informados que necesitan respuesta
                         * * Modificado idrd abril 4 */
                        if ($info_resp and $info_resp == 'Responder')
                            $imginfo = "<img src='$rutaRaiz/images/resp.jpeg' width=18 height=18 alt='$textCarpeta' title='$textCarpeta'>";
                        else
                            $imginfo = "";

                        if ($carpPer == 0) {
                            $nombreCarpeta = $descCarpetasGen[$carpCodi];
                        } else {
                            $nombreCarpeta = "(Personal)" . $descCarpetasPer[$carpCodi] . "";
                        }
                        $textCarpeta = "Carpeta Actual: " . $nombreCarpeta . " -- Numero de Hojas :" . $noHojas;
                        if ($rsTmp->fields["HID_EANU_CODIGO"] == 2) {
                            $imgTp = "$url_raiz/iconos/anulacionRad.gif";
                            $textCarpeta = " ** RADICADO ANULADO ** " . $textCarpeta;
                        } else {
                            if ($rsTmp->fields["HID_RADI_TIPO_DERI"] == 0 AND $rsTmp->fields["HID_RADI_NUME_DERI"] != 0) {
                                $imgTp = "$url_raiz/iconos/anexos.gif";
                            } else {
                                //Icono en listado principal de radicacion
                                $imgTp = "$url_raiz/iconos/comentarios.gif";
                            }
 
                            include_once ("$rutaRaiz/include/tx/Expediente.php");
                            $expediente = new Expediente($db);
                            $rdTmp->fields['IDT_Numero Radicado'] = isset($rsTmp->fields["IDT_NUMERO RADICADO"]) ? $rsTmp->fields["IDT_NUMERO RADICADO"] : $rsTmp->fields["IDT_Numero Radicado"];

                            $numeroRadicadoEnlace = $rdTmp->fields['IDT_Numero Radicado'];

                            if ($numeroRadicadoEnlace != "") {
                                $arrEnExpediente = $expediente->expedientesRadicado($numeroRadicadoEnlace);
                            }
                            
                            // Modificado SGD 20-Septiembre-2007
                            if (is_array($arrEnExpediente)) {
                                if ($arrEnExpediente[0] !== 0) {
                                    $imgExpediente = "<img src='$url_raiz/iconos/folder_open.gif' width=18 height=18 alt='Incluido en un expediente' title='Incluido en un expediente'>";
                                } else {
                                    $imgExpediente = "";
                                }
                            }
                        }
                        $imgEstado = "<img src='$imgTp' width=18 height=18 alt='$textCarpeta' title='$textCarpeta'>";
                    } else {
                        $imgEstado = "";
                    }
                    /** �cono que indica si el radicado est� incluido en un expediente.
                     * Fecha de modificaci�n: 30-Junio-2006
                     * Modificador: Supersolidaria
                     */
                    if (isset($iRad) && $i == $iRad) {
                        if ($info_resp and $info_resp = "'Responder'")
                            $v = $imgEstado . "&nbsp;" . $imgExpediente . "&nbsp;" . $imginfo . $imgRad . $v;
                        else
                            $v = $imgEstado . "&nbsp;" . $imgExpediente . "&nbsp;" . $imgRad . $v;
                    }
                    break;
                case ($fname == 'DAT_' or $fname == 'IDT_');
                    $i_radicado = $i + 1;
                    $fieldDAT = $rsTmp->FetchField($i_radicado);
                    $fnameDAT = $fieldDAT->name;
                    // Modificado SGD 21-Septiembre-2007
                    //20170411 Los id de las columnas estan en mayusculas, no se ejecutaba correctamente
                    // uppercase en los formularios de comentarios, pero si en las listas de radicados

                    $verNumRadicado = trim($rsTmp->fields[strtoupper($fnameDAT)]);

                    if (in_array($tdocper, $tiposdocumentales)) {
                        $v = "<a href=" . $url_raiz . "/verradicado.php?verrad=" . $verNumRadicado . "&" . $encabezado . " title='Ver informacion del radicado' alt='Ver informacion del radicado' aria-label='Abrir Información del radicado' ><span class=$radFileClass>" . $v . "</span></a>";
                    } else {
                        $v = "<a href='#' onclick=\"alert('Usted no tiene acceso al tipo documental ".$nombreTipoDocumento.". Comun&iacute;quese con el administrador')\"><span class=$radFileClass'>$v</span></a>";
                    }
                    $special = "si";
                    break;
                case 'DAT_';
                    $i_radicado = $i + 1;
                    $fieldDAT = $rsTmp->FetchField($i_radicado);
                    $fnameDAT = $fieldDAT->name;
                    // Modificado SGD 21-Septiembre-2007
                    //20170411 Los id de las columnas estan en mayusculas, no se ejecutaba correctamente
                    // uppercase en los formularios de comentarios, pero si en las listas de radicados
                    $verNumRadicado = trim($rsTmp->fields[strtoupper($fnameDAT)]);
                    
                    if (in_array($tdocper, $tiposdocumentales)) {
                        $v = "<a href=" . $url_raiz . "/verradicado.php?verrad=" . $verNumRadicado . "&" . $encabezado . " title='Ver informacion del radicado' alt='Ver informacion del radicado' aria-label='Abrir Información del radicado' ><span class=$radFileClass>" . $v . "</span></a>";
                    } else {
                        $v = "<a href='#' onclick=\"alert('Usted no tiene acceso al tipo documental ".$nombreTipoDocumento.". Comun&iacute;quese con el administrador')\"><span class=$radFileClass'>$v</span></a>";
                    }
                    $special = "si";
                    break;
                case 'HID_';
                        if($rsTmp->fields['HID_PATH_ACTA'] != ''){
                            $pathActa = $rsTmp->fields['HID_PATH_ACTA'];
                            $v = "<a href='". $url_raiz ."/bodega$pathActa' title='Ver informacion del radicado' alt='Ver informacion del radicado' aria-label='Abrir Información del radicado' ><span class=$radFileClass>".$v."</span></a>";
                        }
                break;
                case 'No_A';
                        if($rsTmp->fields['HID_PATH_ACTA'] != ''){
                            $pathActa = $rsTmp->fields['HID_PATH_ACTA'];
                            $v = "<a href='". $url_raiz ."/bodega$pathActa' title='Ver informacion del radicado' alt='Ver informacion del radicado' aria-label='Abrir Información del radicado' ><span class=$radFileClass>".$v."</span></a>";
                        }
                break;
                case 'Dias';
                    /** Se verifica la fecha o los dias correspondientes faltantes para el tramite **/
                    $diasRestantes = isset($rsTmp->fields['DIAS RESTANTES']) ? $rsTmp->fields['DIAS RESTANTES'] : $rsTmp->fields['dias restantes'];
                    
                    // Si es menor a 0 días el radicado esta vencido
                    if($diasRestantes < 0){
                        $v = "<img src='$url_raiz/iconos/semaforo_rojo.png' width=20 height=20 alt='Radicados Vencidos' title='Radicados Vencidos'>";
                    }
                    // Si es mayor a 0 días y es menor a 2 días
                    elseif($diasRestantes >= 0 && $diasRestantes <= 2){
                        $v = "<img src='$url_raiz/iconos/semaforo_amarillo.png' width=20 height=20 alt='Radicados Pronto Vencer' title='Radicados Pronto Vencer'>";
                    }
                    // Si es mayor 3 días
                    else{
                        $v = "<img src='$url_raiz/iconos/semaforo_verde.png' width=20 height=20 alt='Radicados al Dia' title='Radicados al Dia'>";
                    }

                    if(isset($rsTmp->fields['Dias Restantes Agenda'])){
                        $dias = $rsTmp->fields['Dias Restantes Agenda'];
                    }
                    elseif(isset($rsTmp->fields['DIAS RESTANTES'])){
                        $dias = $rsTmp->fields['DIAS RESTANTES'];
                    }

                    $v = '<center><table style="font-size:inherit;"><tr><td>'.$v.'</td><td>'.$dias.'</td></tr></table></center>';
                break;
            }
            $type = $typearr[$i];
            switch ($type) {
                case 'D1':
                    if (!strpos($v, ':')) {
                        $s .= " <TD><span class=$radFileClass>" . $rsTmp->UserDate($v, "d-m-Y, H:i") . "&nbsp;</span></TD>\n";
                        break;
                    }
                case 'T1':
                    $s .= " <TD><span class=$radFileClass>" . $rsTmp->UserTimeStamp($v, "d-m-Y, H:I") . "&nbsp;</span></TD>\n";
                    break;
                case 'I':
                default:
                    //if ($htmlspecialchars and $special !="si") $v = htmlspecialchars(trim($v));
                    $v = stripcslashes(trim($v));
                    if (strlen($v) == 0)
                        $v = '&nbsp;';
                    if (substr($fname, 0, 4) != "HID_" AND substr($fname, 0, 4) != "HOR_") {
                        $s .= " <TD><span class=$radFileClass>" . str_replace("\n", '<br>', $v) . "</span></TD>\n";
                    }
            }
        } // for
        $s .= "</TR>\n\n";
        $rows += 1;
        if ($rows >= $gSQLMaxRows) {
            $rows = "<p>Truncated at $gSQLMaxRows</p>";
            break;
        } // switch

        $rsTmp->MoveNext();

        // additional EOF check to prevent a widow header
        if (!$rsTmp->EOF && $rows % $gSQLBlockRows == 0) {

            //if (connection_aborted()) break;// not needed as PHP aborts script, unlike ASP
            if ($echo)
                print $s . "</TABLE>\n\n";
            else
                $html .= $s . "</TABLE>\n\n";
            $s = $hdr;
        }
    } // while

    if ($echo)
        print $s . "</TABLE>\n\n";
    else
        $html .= $s . "</TABLE>\n\n";
    if ($docnt)
        if ($echo)
            print "<H2>" . $rows . " Rows</H2>";
    return ($echo) ? $rows : $html;
}

// pass in 2 dimensional array
function arr2html(&$arr, $ztabhtml = '', $zheaderarray = '') {
    if (!$ztabhtml)
        $ztabhtml = 'BORDER=1';
    $s = "<TABLE $ztabhtml class=t_bordeGris width=98%>"; //';print_r($arr);
    if ($zheaderarray) {
        $s .= '<TR class=tparr>';
        for ($i = 0; $i < sizeof($zheaderarray); $i++) {
            $s .= " <TH>{$zheaderarray[$i]}</TH>\n";
        }
        $s .= "\n</TR>";
    }
    for ($i = 0; $i < sizeof($arr); $i++) {
        $s .= '<TR class=tparr>';
        $a = &$arr[$i];
        if (is_array($a))
            for ($j = 0; $j < sizeof($a); $j++) {
                $val = $a[$j];
                if (empty($val))
                    $val = '&nbsp;';
                $s .= " <TD>$val</TD>\n";
            }
        else if ($a) {
            $s .= ' <TD>' . $a . "</TD>\n";
        } else
            $s .= " <TD>&nbsp;</TD>\n";
        $s .= "\n</TR>\n";
    }
    $s .= '</TABLE>';
    print $s;
}

?>
