<?php
$ruta_raiz = "../..";
session_start();
if (!$dependencia or ! $tpDepeRad or ! $codusuario)
    include "$ruta_raiz/rec_session.php";
include_once "$ruta_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$ruta_raiz");
//	$db->conn->debug = true;
error_reporting(0);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
if ($codigo) {
    $isql = "SELECT * FROM DEPENDENCIA WHERE DEPE_CODI = '" . $codigo . "'";
    $rs = $db->query($isql);
}
if ($departamento)
    $codigo_departamento = $departamento;
else
    $codigo_departamento = $rs->fields["dpto_codi"];
?>
<html>
    <head>
        <title>Documento sin t&iacute;tulo</title>
    </head>
    <script language="javascript">
        function cambio_departamento(parametro, item)
        {
            document.location.href = "admin_depe_perfiles.php?" + parametro + "&departamento=" + item.options[item.selectedIndex].value;
        }
        function validacion()
        {
            if ((document.forms[0].coddependencia.value == "") || (isNaN(document.forms[0].coddependencia.value)))
            {
                alert("No se ha diligenciado el C\xf3digo de la Dependencia, o a diligenciado un valor no n�merico. Por favor dig�telo.");
                document.forms[0].coddependencia.focus();
                return false;
            }

            if (document.forms[0].nombredependencia.value == "")
            {
                alert("No se ha diligenciado el Nombre de la Dependencia por favor dig\xEDtelo.");
                document.forms[0].nombredependencia.focus();
                return false;
            }

            if (document.forms[0].municipio.value == 1)
            {
                alert("No se ha diligenciado el Municipio. Por favor seleccionela.");
                document.forms[0].municipio.focus();
                return false;
            }
        }
    </script>
    <body>
        <table width="60%"  border="0">
            <tr>
                <td colspan="2"><div align="center"><strong>Administraci&oacute;n de Perfiles </strong></div></td>
            </tr>
            <?php
            if ($editar) {
                ?>
                <tr>
                    <td colspan="2"><div align="center"><strong>Edici&oacute;n de Dependencias</strong></div></td>
                </tr>
                <?php
            } else {
                ?>
                <tr>
                    <td colspan="2"><div align="center"><strong>Creaci&oacute;n de Dependencias</strong> </div></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="2"><strong>Datos Generales </strong></td>
            </tr>
            <form name="dependencia" action="admin_depe_aceptacion.php" method="post" onClick="validacion();">   
                <tr>
                    <td>Cod&iacute;go Dependencia </td>
                    <td><input type="text" name="coddependencia" value='
                               <? if ($editar==1) 
                               {
                               if ($rs->fields["depe_codi"])
                               {
                               echo $rs->fields["depe_codi"];
                               }
                               else
                               {
                               echo $codigo;}
                               }
                               else if ($editar == 0)
                               {
                               echo $codigo_dependencia;
                               }
                               else
                               echo "";		
                               ?>'>
                    </td>
                </tr>
                <tr>
                    <td>Nombre Dependencia</td>
                    <td><input type="text" name="nombredependencia" value='
                               <? if ($editar==1) 
                               {
                               if ($rs->fields["depe_nomb"])
                               {
                               echo $rs->fields["depe_nomb"];
                               }
                               else
                               {
                               echo $codigo;}
                               }
                               else if ($editar == 0)
                               {
                               echo $nombre_dependencia;
                               }
                               else
                               echo "";		
                               ?>'>
                    </td>
                </tr>
                <tr>
                    <td>Direcci&oacute;n</td>
                    <td><input type="text" name="direcciondependencia" value='
                               <? if ($editar==1) 
                               {
                               if ($rs->fields["dep_direccion"])
                               {
                               echo $rs->fields["dep_direccion"];
                               }
                               else
                               {
                               echo $codigo;}
                               }
                               else if ($editar == 0)
                               {
                               echo $direccion_dependencia;
                               }
                               else
                               echo "";		
                               ?>'>
                    </td>
                </tr>
                <tr>
                    <td>Estado</td>
                    <td><select name="estado">
                            <?php
                            $isql = "SELECT * FROM SGD_ADMIN_DEPENDENCIA_ESTADO ORDER BY DESCRIPCION_ESTADO ASC";
                            $rs1 = $db->query($isql);

                            while (!$rs1->EOF) {
                                if ($rs1->fields["codigo_estado"] == $rs->fields["SGD_ADMIN_DEPENDENCIA_ESTADO"]) {
                                    ?>
                                    <option value='<?= $rs1->fields["codigo_estado"] ?>' selected>
                                        <?= $rs1->fields["descripcion_estado"] ?>
                                    </option>
                                    <?php
                                } else {
                                    ?>
                                    <option value='<?= $rs1->fields["codigo_estado"] ?>'>
                                        <?= $rs1->fields["descripcion_estado"] ?>
                                    </option>
                                    <?php
                                }
                                $rs1->MoveNext();
                            }
                            ?>		
                        </select></td>
                </tr>  
                <tr>
                    <td>Departamento</td>
                    <?php
                    if ($codigo) {
                        ?>
                        <td><select name="departamento" onChange="cambio_departamento('codigo=<?= $codigo ?>&editar=1&codigo_dependencia=<?= $coddependencia ?>&nombre_dependencia=<?= $nombredependencia ?>&direccion_dependencia=<?= $direcciondependencia ?>', this.form.departamento)">;">
                                <?php
                            } else {
                                ?>	
                                <td><select name="departamento" onChange="cambio_departamento('editar=0&codigo_dependencia=' + document.forms[0].coddependencia.value + '&nombre_dependencia=' + document.forms[0].nombredependencia.value + '&direccion_dependencia=' + document.forms[0].direcciondependencia.value + '', this.form.departamento)">;">	
                                        <?php
                                    }
                                    $isql = "SELECT * FROM DEPARTAMENTO ORDER BY DPTO_NOMB ASC";
                                    $rs1 = $db->query($isql);

                                    while (!$rs1->EOF) {
                                        if ($rs1->fields["dpto_codi"] == $codigo_departamento) {
                                            ?>
                                            <option value='<?= $rs1->fields["dpto_codi"] ?>' selected>
                                                <?= $rs1->fields["DPTO_NOMB"] ?>
                                            </option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value='<?= $rs1->fields["dpto_codi"] ?>'>
                                                <?= $rs1->fields["DPTO_NOMB"] ?>
                                            </option>
                                            <?php
                                        }
                                        $rs1->MoveNext();
                                    }
                                    ?>		
                                </select>
                            </td>
                </tr>	
                <tr>
                    <td>Municipio</td>
                    <td><select name="municipio">
                            <?php
                            if (!$codigo_departamento)
                                $codigo_departamento = 91;
                            $isql = "SELECT * FROM MUNICIPIO WHERE DPTO_CODI = " . $codigo_departamento . " ORDER BY MUNI_NOMB ASC";
                            $rs1 = $db->query($isql);

                            while (!$rs1->EOF) {
                                if ($rs1->fields["muni_codi"] == $rs->fields["muni_codi"]) {
                                    ?>
                                    <option value='<?= $rs1->fields["muni_codi"] ?>' selected>
                                        <?= $rs1->fields["muni_nomb"] ?>
                                    </option>
                                    <?php
                                } else {
                                    ?>
                                    <option value='<?= $rs1->fields["muni_codi"] ?>'>
                                        <?= $rs1->fields["muni_nomb"] ?>
                                    </option>
                                    <?php
                                }
                                $rs1->MoveNext();
                            }
                            ?>		
                        </select></td>
                </tr>
                <tr>
                    <td>Direcci&oacute;n Padre </td>
                    <td><select name="dir_padre">
                            <option value="0" selected>Sin Padre</option>	
                            <?php
                            $isql = "SELECT * FROM DEPENDENCIA order by depe_nomb asc";
                            $rs1 = $db->query($isql);

                            while (!$rs1->EOF) {
                                if ($rs1->fields["depe_codi"] == $rs->fields["DEPE_CODI_PADRE"]) {
                                    ?>
                                    <option value='<?= $rs1->fields["depe_codi"] ?>' selected>
                                        <?= $rs1->fields["depe_nomb"] ?>
                                    </option>
                                    <?php
                                } else {
                                    ?>
                                    <option value='<?= $rs1->fields["depe_codi"] ?>'>
                                        <?= $rs1->fields["depe_nomb"] ?>
                                    </option>
                                    <?php
                                }
                                $rs1->MoveNext();
                            }
                            ?>	
                        </select></td>
                </tr>
                <tr>
                    <td>Territorial</td>
                    <td><select name="territorial">
                            <option value="0" selected>No seleccionado</option>	
                            <?php
                            $isql = "SELECT * FROM DEPENDENCIA order by depe_nomb asc";
                            $rs1 = $db->query($isql);

                            while (!$rs1->EOF) {
                                if ($rs1->fields["depe_codi"] == $rs->fields["depe_codi_territorial"]) {
                                    ?>
                                    <option value='<?= $rs1->fields["depe_codi"] ?>' selected>
                                        <?= $rs1->fields["depe_nomb"] ?>
                                    </option>
                                    <?php
                                } else {
                                    ?>
                                    <option value='<?= $rs1->fields["depe_codi"] ?>'>
                                        <?= $rs1->fields["depe_nomb"] ?>
                                    </option>
                                    <?php
                                }
                                $rs1->MoveNext();
                            }
                            ?>		
                        </select>
                    </td>
                </tr>
                <?php
                $isql = "SELECT * FROM SGD_TRAD_TIPORAD ORDER BY SGD_TRAD_CODIGO ASC";
                $rs1 = $db->query($isql);

                while (!$rs1->EOF) {
                    ?>
                    <tr>
                        <td><?= $rs1->fields["SGD_TRAD_DESCR"] . "(-" . $rs1->fields["SGD_TRAD_CODIGO"] . ")" ?></td>
                        <td><select name='<?= $rs1->fields["SGD_TRAD_DESCR"] ?>'>
                                <option value="0" selected>No seleccionado</option>
                                <?php
                                $isql = "SELECT * FROM DEPENDENCIA order by depe_nomb asc";
                                $rs2 = $db->query($isql);
                                $columna = $rs1->fields["dependencia_nombre_referencia"];
                                while (!$rs2->EOF) {
                                    if ($rs2->fields["depe_codi"] == $rs->fields[$columna]) {
                                        ?>
                                        <option value='<?= $rs2->fields["depe_codi"] ?>' selected>
                                            <?= $rs2->fields["depe_nomb"] ?>
                                        </option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value='<?= $rs2->fields["depe_codi"] ?>'>
                                            <?= $rs2->fields["depe_nomb"] ?>
                                        </option>
                                        <?php
                                    }
                                    $rs2->MoveNext();
                                }
                                ?>			
                            </select></td>
                    </tr>
                    <?php
                    $rs1->MoveNext();
                }
                ?>
                <tr>
                    <td colspan="2">
                        <input name="PHPSESSID" type="hidden" value='<?= session_id() ?>'> 		  
                        <input name="krd" type="hidden" value='<?= $krd ?>'> 		
                        <input name="editar" type="hidden" value='<?= $editar ?>'> 			
                        <input name="codigo" type="hidden" value='<?= $rs->fields["depe_codi"] ?>'> 				
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><div align="center">
                            <input type="submit" name="Submit" value="Grabar">
                        </div></td>
                </tr>
            </form>  
        </table>
    </body>
</html>
