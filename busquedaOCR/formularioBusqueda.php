<?php
/**
 * Vista busquedas OCR
 * @autor Skinatech 
 * @fecha 2017/03
 */
session_start();

if (empty($_SESSION)) {
    return null;
}
$ruta_raiz = "..";
include_once "$ruta_raiz/config.php";

//A la fecha los consecutivos de orfeo son de 7 digitos
$longitud_consecutivo = 7;
$longitud_fecha_rad = 0;
switch ($estructuraRad) {
    case "ymd": $longitud_fecha_rad = 8;
        break;
    case "ym": $longitud_fecha_rad = 6;
        break;
    case "y": $longitud_fecha_rad = 4;
        break;
}

//include_once "$ruta_raiz/include/db/ConnectionHandler.php";
//$db = new ConnectionHandler("$ruta_raiz");
//$sql = "select DEPE_CODI, DEPE_NOMB from DEPENDENCIA where depe_estado=1 order by 2";
//$db->conn->debug = true;
//$rsDep = $db->conn->Execute($sql);
//$rsDep->GetRows();
//echo "<pre>";
//  print_r($rsDep->GetRows());
//echo "</pre>";
?>
<html>
    <header>
        <script src="../estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../estilos/orfeo50/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="./css/estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../estilos/js/bootstrap.js" type="text/javascript"></script>
        <script src="js/remove-accents/index.js" type="text/javascript"></script>
    </header>

    <body>
        <nav class="navbar navbar-default" role="navigation">

            <div class="navbar-header">
                <a class="navbar-brand" style="color: #FFF;" href="#"><b>B&uacute;squeda OCR</b></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-coldoglapse-1">
                <ul class="nav navbar-nav">
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>-->
                </ul>

                <div class="col-sm-6 col-md-3" style="float: right;">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <div class="input-group" style="margin: 4% 0%;">
                                <input type="text" class="form-control" placeholder="B&uacute;squeda por contenido" size="100" id="palabra" name="palabra">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" style="padding: 9px 12px;" id="btnBuscar">
                                        <i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>

        <table id="tablaOcr" class="display" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th></th>
                    <th>Fecha</th>
                    <th>Asunto</th>
                    <th>N&uacute;mero Radicado</th>
                    <th>Radicado Principal</th>
                    <th>Dependencia</th>
                </tr>
            </thead>
        </table>

        <script>
            var largoDep = <?= $longitud_codigo_dependencia ?>;
            var largofecha = <?= $longitud_fecha_rad ?>;
            var largoConsecutivo = <?= $longitud_consecutivo ?>;
            var largoRad = largofecha + largoDep + largoConsecutivo;
            function highlightWords(line) {
                var word = $('#palabra').val();
                var regex = new RegExp('(' + word + ')', 'gi');
                return line.replace(regex, "<b><span>$1</span></b>");
            }

            /* Formatting function for row details - modify as you need */
            function format(d) {
                // `d` is the original data object for the row
                var texto = highlightWords(d.data2.texto);
                return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                        '<tr>' +
                        '<td>Texto radicado:</td>' +
                        '<td>' + d.data2.num + '</td>' +
                        '</tr>' +
                        '<td colspan="2">' + texto + '</td>' +
                        '</tr>' +
                        '</table>';
            }

            function reload() {
                if ($('#palabra').val().length > 2) {
                    table.ajax.reload();
                } else {
                    alert("Debe ingresar minimo 3 caracteres");
                }
            }
            $(document).ready(function () {
                table = $('#tablaOcr').DataTable({
                    "language": {
                        "url": "./js/Spanish.json"
                    },
                    "ajax": {
                        "type": "POST",
                        "url": "./consultaOcr.php",
                        "data": function (d) {
                            d.word = $('#palabra').val();
                        },
                        error: function (XMLHttpRequest) {
                            alert(XMLHttpRequest.responseText);
                        }

                    },
                    "columns": [
                        {
                            "className": 'details-control',
                            "orderable": false,
                            "defaultContent": ''
                        },
                        {data: 'data2',
                            render: function (data2, type) {
                                var dateSplit = data2.fechaRad.preg_split(' ');
                                return type === "display" || type === "filter" ?
                                        dateSplit[0] : data2.fechaRad;
                            }
                        },
                        {data: 'data2',
                            render: function (data2) {
                                return highlightWords(data2.asunto);
                            }
                        },
                        {data: 'data2',
                            render: function (data2) {
                                var numeroRad = data2.num.substring(0, largoRad);
                                var anexCodi = data2.num.substring(largoRad + 1);
                                //La estructura en bodega usa el año
                                var fecha = data2.fechaRad.substring(0, 4);
                                if (data2.tipoDoc === "2") {
                                    return "<a href='../bodega/" + fecha + "/" + data2.depeRadi + "/docs/" + numeroRad + "_A" + anexCodi + ".pdf' target='_blank'>" + data2.num + '</a>';
                                } else if (data2.tipoDoc === "1") {
                                    return "<a href='../bodega/" + fecha + "/" + data2.depeRadi + "/" + data2.pNum + ".pdf'target='_blank' >" + data2.num + '</a>';
                                }
                            }
                        },
                        {data: 'data2',
                            render: function (data2) {
                                if (data2.tipoDoc === "1") {
                                    return "<a href='../verradicado.php?verrad=" + data2.padreRad + "&menu_ver_tmp=3' target='_blank' >" + data2.padreRad + '</a>';
                                } else if (data2.tipoDoc === "2") {
                                    return "<a href='../verradicado.php?verrad=" + data2.padreRad + "&menu_ver_tmp=2' target='_blank' >" + data2.padreRad + '</a>';
                                }
                            }
                        },
                        {data: 'data2',
                            render: function (data2) {
                                return data2.depeRadi;
                            }
                        },
                        {data: 'data2',
                            visible: false,
                            render: function (data2) {
                                return data2.texto;
                            }
                        }
                    ],
                    "order": [[1, 'asc']]
                });
                $('#btnBuscar').on('click', function () {
                    reload();
                });
                $('#palabra').on("keyup", function (e) {
                    if (e.keyCode === 13) {
                        reload();
                    }
                });
                //Detecta el evento de busqueda           
                //$('#tablaOcr').on( 'search.dt', function () {  } ).DataTable();

                // Evento de apertura y cierre de detalles
                $('#tablaOcr tbody').on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    if (row.child.isShown()) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    } else {
                        // Open this row
                        row.child(format(row.data())).show();
                        tr.addClass('shown');
                    }
                });
            });

//            $.fn.dataTable.ext.errMode = 'none';
//            $('#tablaOcr').on('error.dt', function (e, settings, techNote, message) {
//                alert('Se ha encontrado un error al ingresar al m\xF3dulo de b\xFAsqueda OCR: ' + message );
//            }).DataTable();
        </script>
    </body>
</html>
