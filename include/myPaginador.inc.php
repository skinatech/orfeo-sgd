<?php

/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
 *
 * Descripcion Larga
 *
 * @category
 * @package      SGD Orfeo
 * @subpackage   Main
 * @author       Community
 * @author       Skina Technologies SAS (http://www.skinatech.com)
 * @license      GNU/GPL <http://www.gnu.org/licenses/gpl-2.0.html>
 * @link         http://www.orfeolibre.org
 * @version      SVN: $Id$
 * @since
 */
/* ---------------------------------------------------------+
  |                     INCLUDES                             |
  +--------------------------------------------------------- */


/* ---------------------------------------------------------+
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


$dir_raiz = (isset($dir_raiz)) ? ((substr($dir_raiz, -1) == ".") ? $dir_raiz . "/" : $dir_raiz) : "../";
/**
 * paginador ispirado en la version de adodb,flexibilizando la forma de pintar la grilla
 * y la muestra de los titulos dependiendo de una funcion definida por el usuario, o en caso 
 * de no definir una funcion personalizada tomatra la idea de adodb  
 * flexibilizando la 
 */
require_once($dir_raiz . "/include/db/ConnectionHandler.php");

class myPaginador {

    var $url;
    var $consulta;
    var $tamPagina = 20;
    var $paginaActual;
    var $total;
    var $inicializado = false;
    var $imgOrdASC;
    var $imOrdDESC;
    var $ultimaPagina;
    var $totalPaginas;
    var $modoPintarCeldas = true;
    var $variablesEstado;
    var $piePag = false;
    var $propiedadesTabla = array("width" => "95%", "border" => "1", "cellpadding" => "0",
        "cellspacing" => "5", "class" => "borde_tab", "align" => "center");
    var $funcionPintaFilas;
    var $db;  // ADODB connection object
    var $rs; // recordset generated
    var $showPageLinks = true;
    // Localize text strings here
    var $first = '<code>|&lt;</code>';
    var $prev = '<code>&lt;&lt;</code>';
    var $next = '<code>>></code>';
    var $last = '<code>>|</code>';
    var $moreLinks = '...';
    var $startLinks = '...';
    var $htmlSpecialChars = true;
    var $page = 'Pagina';
    var $linkSelectedColor = 'green';
    var $cache = 0;  #secs to cache with CachePageExecute()
    var $id;
    var $toRefvar;
    var $linksPagina = 10;
    var $toRefLinks;
    // variables Orfeo
    var $toRefLink;
    var $ordenPor;
    var $tipoOrden;
    var $rutaRaiz;

    function myPaginador(&$db, $sql, $ordenadoPor, $tipodOrden = "ASC", $tamPagina = 15, $id = "adodb", $showPageLinks = true) {

        global $_GET, $_GET, $_SERVER;
        $this->db = $db;
        $this->url = (!empty($_GET)) ? $_SERVER['PHP_SELF'] . "?" : $_SERVER['PHP_SELF'];
        $this->consulta = $sql;
        $this->id = $id;
        $this->db = $db;
        $this->tamPagina = (($tamPagina >= -1) && (is_integer($tamPagina))) ? $tamPagina : 20;
        $this->rutaRaiz = $db->rutaRaiz;
        $this->showPageLinks = $showPageLinks;

        $total = $this->id . "_total";
        $next_page = $id . '_next_page';
        $tipoOrden = $id . "_tipo_orden";
        $ordenarPor = $id . "_orden_por";

        $this->ordenarPor = $ordenadoPor == "" ? ((isset($_GET[$ordenarPor]) && ($_GET[$ordenarPor]) != "") ? $_GET[$ordenarPor] : 1) : $ordenadoPor;
        $this->tipoOrden = $tipodOrden == "" || (isset($_GET[$tipoOrden]) && ($_GET[$tipoOrden]) != "") ? $_GET[$tipoOrden] : $tipodOrden;
        $this->total = isset($_SESSION[$total]) ? $_SESSION[$total] : (isset($_GET[$total])) ? $_GET[$total] : false;
        $this->paginaActual = (isset($_GET[$next_page])) ? $_GET[$next_page] : ((isset($_GET[$next_page])) ? $_GET[$next_page] : 0);
        $this->inicializado = ($this->total === false) ? false : true;
        $this->variablesEstado = array($next_page, $total, $tipoOrden, $ordenarPor);
        $this->db->conn->SetFetchMode(0);
        $this->inicializar();
        $this->varGET();
    }

    function calculaTotal() {
        if (!$this->inicializado) {
            $consultaNueva = explode('ORDER BY 1', $this->consulta);
//            $consulta = "SELECT COUNT(*) as TOTAL FROM (" . $this->consulta . ")";
            
            $consulta = "SELECT COUNT(*) as TOTAL FROM (" . $consultaNueva[0]. ")";
            $this->db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
            // Modificado SGD 11-12-2019
            if ( $this->db->driver != 'oci8'){
                $consulta .= " AS SUB";
            }

            $rs = &$this->db->conn->Execute($consulta);
            $this->total = $rs->fields['TOTAL'];
        }
        $this->totalPaginas = ceil($this->total / $this->tamPagina);
        $this->ultimaPagina = ceil($this->total / $this->tamPagina) - 1;
    }

    function inicializar() {
        if ($this->ordenarPor) {

            $odenamiento = (strtoupper($this->tipoOrden) == "DESC") ? " DESC " : " ASC ";

            $pos = 0;
            $pos = strpos($this->consulta, "SELECT ");
            $pos_select = strpos($this->consulta, "select ");
            $pos = ($pos_select !== false && ($pos_select > $pos)) ? $pos_select : $pos;

            $posWHERE = strpos($this->consulta, "WHERE ", $posSELECT);
            $pos_where = strpos($this->consulta, "where ", $pos_select);
            $pos = ($posWHERE !== false && ($posWHERE > $pos)) ? $posWHERE : (($pos_where !== false && ($pos_where > $pos)) ? $pos_where : $pos);

            $posGROUP = strrpos($this->consulta, "GROUP BY ", $pos);
            $pos_gruop = strrpos($this->consulta, "group by ", $pos);

            $pos = ($posGROUP !== false && ($posGROUP > $pos)) ? $posGROUP : (($pos_gruop !== false && ($pos_gruop > $pos)) ? $pos_gruop : $pos);

            $posHAVING = strrpos($this->consulta, "HAVING ", $pos);
            $pos_having = strrpos($this->consulta, "having ", $pos);

            $pos = ($posHAVING !== false && ($posHAVING > $pos)) ? $posHAVING : (($pos_having !== false && ($pos_having > $pos)) ? $pos_having : $pos);

            $posOrder = strrpos($this->consulta, "ORDER BY ", $pos);
            $pos_order = strrpos($this->consulta, "order by ", $pos);

            $pos = ($posOrder !== false && ($posOrder > $pos)) ? $posOrder : (($pos_where !== false && ($pos_order > $pos)) ? $pos_order : $pos);

            if ($this->consulta[0] != "(" && $this->consulta[strlen($this->consulta) - 1] == ")") {
                $this->consulta .= " ORDER BY " . $this->ordenarPor . " " . $ordenamineto;
            } elseif (($pos === $posOrder || $pos === $pos_order)) {
                $this->consulta = substr($this->consulta, 0, $pos + 9) . $this->ordenarPor . " " . $ordenamineto . "," . substr($this->consulta, $pos + 9);
            } else {
                $this->consulta = $this->consulta . " ORDER BY " . $this->ordenarPor . $ordenamineto;
            }
            //$this->consulta="SELECT * FROM (".$this->consulta.") order by ".$this->ordenarPor.$odenamiento;
        }
    }

    function definirImagen() {
        $salida = (strtoupper($this->tipoOrden) == "ASC") ? $this->imgOrdASC : $this->imOrdDESC;
        return $salida;
    }

    function setImagenASC($pathASC) {
        $this->imgOrdASC = $pathASC;
    }

    function setImagenDESC($pathDESC) {
        $this->imOrdDESC = $pathDESC;
    }

    function setLinkSelectedColor($linkSelectedColor) {
        $this->linkSelectedColor = $linkSelectedColor;
    }

    function getTotal() {
        return $this->total;
    }

    function getPaginaActual() {
        return $this->paginaActual;
    }

    function getId() {
        return $this->id;
    }

    function setpropiedadesTabla($propiedadesTabla) {
        if ($propiedadesTabla && is_array($propiedadesTabla))
            $this->propiedadesTabla = $propiedadesTabla;
    }

    function setFuncionFilas($funcion) {
        $this->funcionPintaFilas = $funcion;
    }

    function modoPintado($pintarCelda) {
        $this->modoPintarCeldas = $pintarCelda;
    }

    function setToRefLinks($toRefLinks) {
        $this->toRefLinks = $toRefLinks;
    }

    function varPOST() {
        $salida = "";
        foreach ($_GET as $clave => $valor) {
            if ($this->variablesEstado != null) {
                if (!in_array($clave, $this->variablesEstado))
                    $salida .= " \t\t\t<input type=\"hidden\" name=\"$clave\" value=\"$valor\" /> \n";
            }else {
                $salida .= " \t\t\t<input type=\"hidden\" name=\"$clave\" value=\"$valor\" /> \n";
            }
        }
        return $salida;
    }

    function varGET() {
        foreach ($_GET as $clave => $valor) {
            if (!in_array($clave, $this->variablesEstado))
                $this->url .= "{$clave}=" . urlencode($valor) . "&";
        }
    }

    function setPie($pie) {
        $this->piePag = $pie;
    }

    //--------------------------
    // Display link to next page
    function Render_Next($anchor = true) {
        $salida = "";
        if ($anchor) {
            $salida .= "<a href=\"#\" aria-label=\"Cambiar a Pagina anterior Numero " . ($this->paginaActual + 1) . " \" onclick=\"mandarFormaPaginador('{$this->id}formaPaginador','{$this->id}_next_page'," . ($this->paginaActual + 1) . ");\">{$this->next}</a> &nbsp;";
        } else {
            $salida = "$this->next &nbsp; ";
        }
        return $salida;
    }

    function Render_Prev($anchor = true) {
        $salida = "";
        if ($anchor) {
            $salida = "<a href=\"#\" aria-label=\"Cambiar a Pagina anterior Numero " . ($this->paginaActual - 1) . " \" onclick=\"mandarFormaPaginador('{$this->id}formaPaginador','{$this->id}_next_page'," . ($this->paginaActual - 1) . ");\">{$this->prev}</a> &nbsp;";
        } else {
            $salida = "$this->prev &nbsp; ";
        }
        return $salida;
    }

    function Render_First($anchor = true) {
        if ($anchor) {
            $salida = "<a href=\"#\" aria-label=\"Ir a al primera Pagina\" onclick=\"mandarFormaPaginador('{$this->id}formaPaginador','{$this->id}_next_page',0);\">{$this->first}</a> &nbsp;";
        } else {
            $salida = "$this->first &nbsp; ";
        }
        return $salida;
    }

    /**
      // Link to last page
      //
      // for better performance with large recordsets, you can set
      // $this->db->conn->pageExecuteCountRows = false, which disables
      // last page counting.
     */
    function Render_Last($anchor = true) {
        $saliada = "";
        if (($this->totalPaginas > 1) && $anchor) {
            $salida = "<a href=\"#\" aria-label=\"Ir a la ultima pagina \" onclick=\"mandarFormaPaginador('{$this->id}formaPaginador','{$this->id}_next_page',$this->ultimaPagina);\">{$this->last}</a> &nbsp; ";
        } else {
            $salida = "$this->last &nbsp; ";
        }
        return $salida;
    }

    //---------------------------------------------------
    // original code by "Pablo Costa" <pablo@cbsp.com.br> 
    function Render_PageLinks() {

        $linksPagina = $this->linksPagina ? $this->linksPagina : 10;
        $pages = ceil(($this->paginaActual / $this->linksPagina) + 0.1);
        $numbers = '';
        $end = $pages * $linksPagina;
        $start = $end - $linksPagina + 1;
        if ($this->startLinks && $start > 1) {
            $pos = $start - 1;
            $numbers .= "<a href=\"#\" onclick=\"mandarFormaPaginador('{$this->id}formaPaginador','{$this->id}_next_page',{$pos});\">$this->startLinks</a>";
        }

        for ($i = $start; $i <= $end && $i < ($this->totalPaginas) + 1; $i++) {
            if (($this->paginaActual) == ($i - 1))
                $numbers .= "<font color=\"{$this->linkSelectedColor}\" size=2><b>{$i}</b></font>  ";
            else
                $numbers .= "<a href=\"#\" onclick=\"mandarFormaPaginador('{$this->id}formaPaginador','{$this->id}_next_page'," . ($i - 1) . ");\">{$i}</a> ";
        }
        if ($this->moreLinks && $end < $this->totalPaginas) {
            $numbers .= "<a href=\"#\" onclick=\"mandarFormaPaginador('{$this->id}formaPaginador','{$this->id}_next_page'," . ($i - 1) . ");\">{$this->moreLinks}</a>  ";
        }
        return $numbers . ' &nbsp; ';
    }

    // Link to previous page
    //-------------------------------------------------------
    // Navigation bar
    //
	// we use output buffering to keep the code easy to read.
    function RenderNav() {
        $s = "";
        if ($this->paginaActual == 0) {
            $s .= $this->Render_First(false);
            $s .= $this->Render_Prev(false);
        } else {
            $s .= $this->Render_First();
            $s .= $this->Render_Prev();
        }
        if ($this->showPageLinks) {
            $s .= $this->Render_PageLinks();
        }
        if ($this->paginaActual == $this->ultimaPagina) {
            $s .= $this->Render_Next(false);
            $s .= $this->Render_Last(false);
        } else {
            $s .= $this->Render_Next();
            $s .= $this->Render_Last();
        }
        return $s;
    }

    //-------------------
    // This is the footer
    function RenderPageCount() {
        if ($this->total > 0)
            if ($this->paginaActual > $this->ultimaPagina)
                $this->paginaActual = 0;
        $salida = "<font size=1 class=\"tpar\"> items {$this->total}  pag " . ($this->paginaActual + 1) . "/{$this->totalPaginas}</font>";
        return $salida;
    }

    //--------------------------------------------------------
    // Simply rendering of grid. You should override this for
    // better control over the format of the grid
    //
    // We use output buffering to keep code clean and readable.
    function generarPagina($columnasTitulo, $claseTitulo = "titulos3", $noHayResultados = 'No se Encontraron Resultados en el reporte estadistico solicitado') {
        $resultadosEncontrados = true;
        echo "<a name='anclaPaginador'></a> \n 
		<form action=\"{$this->url}\" method=\"GET\" name=\"{$this->id}formaPaginador\" id=\"{$this->id}formaPaginador\" >
		\n
		<table ";
        foreach ($this->propiedadesTabla as $clave => $valor) {
            echo" " . $clave . "=\"" . $valor . "\" ";
        }
        echo " >";
        $claseTitulo = ($claseTitulo) ? "class=\"$claseTitulo\"" : "";
        echo "\t \n <tr {$claseTitulo}> \n ";
        foreach ($columnasTitulo as $clave => $col) {
            echo "\t  <th>  \n ";
            $posalm = strpos($col, "#");
            if (!$posalm) {
                if (strlen($col) > 1)
                    echo "\t" . substr($col, 1) . " \n";
                else
                    echo "\t{$col} \n";
            }else {
                $ord = substr($col, 0, $posalm);
                $imag = ($this->ordenarPor == $ord) ? "<img name=\"imagenOrden\" src=\"" . $this->definirImagen() . "\" />" : "";
                echo "<a href=\"#\" onclick=\"cambiarOrden('{$this->id}formaPaginador','{$this->id}_orden_por','{$this->id}_tipo_orden','{$ord}');\" >" . substr($col, $posalm + 1) . "</a>$imag  \n";
            }
            echo "</th> \n";
        }
        echo "\t </tr> \n";

        // error_log('***** antes '.$this->consulta);
        if ($this->tamPagina == -1) {
            $registroInicio = 0;
//            error_log('***** linea 392 ');
            $resultado = &$this->db->conn->Execute($this->consulta);
            
        } else {
            $registroInicio = $this->tamPagina * $this->paginaActual;
            $resultado = &$this->db->conn->SelectLimit($this->consulta, $this->tamPagina, $registroInicio);
//            error_log('***** linea 396 '.$this->consulta.' *** '.$this->tamPagina.' *** '.$registroInicio);
        }
        $i = $registroInicio;
        $numCols = count($columnasTitulo);
        
//        error_log('***** '.$this->consulta);
        //if($this->funcionPintaFilas!="")
        while (!$resultado->EOF) {
            $i++;
            if ($this->modoPintarCeldas) {
                $claseTr = ($i % 2) == 0 ? "class=\"listado2\"" : "class=\"listado1\"";
                echo "\t <tr {$claseTr}> \n \t \t ";
                for ($n = 0; $n < $numCols; $n++) {
                    $celda = call_user_func($this->funcionPintaFilas, $resultado->fields, $i, $n);
                    if ($celda !== false) {
                        echo "\t \t<td > $celda\t \t \n \t \t</td> \n";
                    }
                }
                echo " \t </tr> \n";
            } else {

                echo call_user_func($this->funcionPintaFilas, $resultado->fields, $i);
            }
            $resultado->MoveNext();
        }
        if ($i === $registroInicio) {
            echo "\t <tr> \n \t \t <td colspan=\"{$numCols}\" class=\"alarmas\"  align=\"center\"> \n \t \t {$noHayResultados} \n </td> \n \t </tr>	";
        } else {
            $this->calculaTotal();
//            echo '************ '.$this->calculaTotal();
            if ($this->piePag)
                echo "\t <tr {$claseTitulo} > \n \t \t " . $this->piePag . " \n \t \t</tr>";
            echo "\t <tr> \n \t \t <td class='titulos3' colspan=\"{$numCols}\" align=\"center\"> \n \t \t" . $this->RenderNav() . "</td>
		 </tr>
		 \t<tr><td colspan=\"$numCols\" align=\"center\">\t \t " . $this->RenderPageCount() . " \n </td> \n \t </tr>	";
            echo "</table> \n 
		<table>
		 <tr>
		 <td>
		  	<input type='hidden' name=\"{$this->id}_next_page\"   id=\"{$this->id}_next_page\"value=\"$this->paginaActual\" />
		  	<input type='hidden' name=\"{$this->id}_tipo_orden\"  id=\"{$this->id}_tipo_orden\" value=\"$this->tipoOrden\" />
		  	<input type='hidden' name=\"{$this->id}_orden_por\"   id=\"{$this->id}_orden_por\" value=\"$this->ordenarPor\" />
		  	<input type='hidden' name=\"{$this->id}_total\" value=\"$this->total\" />
		 	\n " . $this->VarPost() . "
		  </td>
		 </tr>
		</table>
		</form> \n";
        }
        echo $this->piePaginador();
        return "";
    }

    function piePaginador() {
        $salida = "<script language='javascript' type='text/javascript'>
				 function mandarFormaPaginador(formulario,pagEnvio,pagina){
		    		paginas=document.getElementById(pagEnvio);
					form=document.getElementById(formulario);
					paginas.value=pagina                                       
					form.submit();
				}
				function cambiarOrden(formulario,ordenPor,tipoOrden,columna){
					orden=document.getElementById(ordenPor);
					tipo=document.getElementById(tipoOrden);
					form=document.getElementById(formulario);
					if(orden.value==columna){
						tipo.value=(tipo.value.toUpperCase()==\"ASC\" || tipo.value==\"\")?\"DESC\":\"ASC\";
					}
					else{
					    tipo.value=\"ASC\";	
					    orden.value=columna;
					}
					
					form.submit();
				}	
				</script> \n";
        return $salida;
    }

}

?>
