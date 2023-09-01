<?php
/*
  V4.52 10 Aug 2004  (c) 2000-2004 John Lim (jlim@natsoft.com.my). All rights reserved.
  Released under both BSD license and Lesser GPL library license.
  Whenever there is any discrepancy between the two licenses,
  the BSD license will take precedence.
  Set tabs to 4 for best viewing.

  This class provides recordset pagination with
  First/Prev/Next/Last links.

  Feel free to modify this class for your own use as
  it is very basic. To learn how to use it, see the
  example in adodb/tests/testpaging.php.

  "Pablo Costa" <pablo@cbsp.com.br> implemented Render_PageLinks().

  Please note, this class is entirely unsupported,
  and no free support requests except for bug reports
  will be entertained by the author.

 */

class ADODB_Pager {

    var $id;  // unique id for pager (defaults to 'adodb')
    var $db;  // ADODB connection object
    var $sql;  // sql used
    var $rs; // recordset generated
    var $curr_page; // current page number before Render() called, calculated in constructor
    var $rows;  // number of rows per page
    var $linksPerPage = 20; // number of links per page in navigation bar
    var $showPageLinks;
    var $gridAttributes = 'width="100%"  border="5"  cellpadding="0" cellspacing="5" class="borde_tab"';
    // Localize text strings here
//    var $first = '<code>|&lt;</code>';
    var $first = '<span aria-hidden="true">|&lt;</span>';
//    var $prev = '<code> &lt;&lt; </code>';
    var $prev = '<span aria-hidden="true"> &lt;&lt; </span>';
//    var $next = '<code> >> </code>';
    var $next = '<span aria-hidden="true"> >> </span>';
//    var $last = '<code>>|</code>';
    var $last = '<span aria-hidden="true"> >| </span>';
    var $moreLinks = '...';
    var $startLinks = '...';
    var $gridHeader = false;
    var $htmlSpecialChars = true;
    var $page = 'P&aacute;gina';
    var $linkSelectedColor = 'green';
    var $cache = 0;  #secs to cache with CachePageExecute()
    var $toRefVar;
    // Variables Orfeo
    var $toRefLink;
    var $ordenActual;
    var $orderTipo;
    var $rutaRaiz;
    var $url_raiz;
    var $checkAll;
    var $checkTitulo;
    var $descCarpetasGen; // Trae las Carpetas Generales del Usuario
    var $descCarpetasPer; // Trae las Carpetas Personales del Usuario
    

    //----------------------------------------------
    // constructor
    //
	// $db	adodb connection object
    // $sql	sql statement
    // $id	optional id to identify which pager, 
    //		if you have multiple on 1 page. 
    //		$id should be only be [a-z0-9]*

    //
	function ADODB_Pager(&$db, $sql, $id = 'adodb', $showPageLinks = false, $ordenActual, $orderTipo = "asc", $url_raiz = ".") {


        $this->db = $db;
        $this->ordenActual = $ordenActual;
        $this->orderTipo = $orderTipo;
        global $HTTP_SERVER_VARS, $PHP_SELF, $HTTP_SESSION_VARS, $HTTP_GET_VARS;

        $curr_page = $id . '_curr_page';
        if (empty($PHP_SELF))
            $PHP_SELF = $HTTP_SERVER_VARS['PHP_SELF'];

        $this->sql = $sql;
        $this->id = $id;
        $this->db = $db;

        $this->rutaRaiz = $db->rutaRaiz;
        $this->url_raiz = $url_raiz;
        $this->showPageLinks = $showPageLinks;
        //$this->rutaRaiz = $HTTP_GET_VARS['ruta_raiz'];

        $next_page = $id . '_next_page';
        //by skina, sin HTTP_GET_VARS	
        if (isset($_GET[$next_page])) {
            $_SESSION[$curr_page] = $_GET[$next_page];
        }
        if (empty($_SESSION[$curr_page]))
            $_SESSION[$curr_page] = 1;## at first page

        $this->curr_page = $_SESSION[$curr_page];
       
    }
    
//---------------------------
    // Display link to first page
    function Render_First($anchor = true) {

        global $PHP_SELF;
        if ($anchor) {
            ?>
            <li><a id="first" href="<?php echo $this->toRefLinks, '&', $this->id; ?>_next_page=1"><?php echo $this->first; ?></a></li> &nbsp; 
            <?php
        } else {
            print "<li class=\"disabled\">$this->first &nbsp;</li>";
        }
    }

    //--------------------------
    // Display link to next page
    function render_next($anchor = true) {
        global $PHP_SELF;
        if ($anchor) {
            ?>
           <li><a id="next" href="<?php echo $this->toRefLinks . '&' . $this->id; ?>_next_page=<?php echo ($this->rs->AbsolutePage() + 1) ?>"><?php echo $this->next; ?></a></li> &nbsp; 
            <?php
        } else {
            print "<li class=\"disabled\">$this->next &nbsp;</li>";
        }
    }

    //------------------
    // Link to last page
    // 
    // for better performance with large recordsets, you can set
    // $this->db->conn->pageExecuteCountRows = false, which disables
    // last page counting.
    function render_last($anchor = true) {
        global $PHP_SELF;

        if (!$this->db->conn->pageExecuteCountRows)
            return;

        if ($anchor) {
            ?>
            <li><a id="last" href="<?php echo $this->toRefLinks . '&' . $this->id . '_next_page=' . $this->rs->LastPageNo() ?>"><?php echo $this->last; ?></a></li> &nbsp; 
            <?php
        } else {
            print "<li class=\"disabled\">$this->last &nbsp;<li>";
        }
    }

    //---------------------------------------------------
    // original code by "Pablo Costa" <pablo@cbsp.com.br> 
    function render_pagelinks() {
        global $PHP_SELF;
        $pages = $this->rs->LastPageNo();
        $linksperpage = $this->linksPerPage ? $this->linksPerPage : $pages;
        for ($i = 1; $i <= $pages; $i += $linksperpage) {
            if ($this->rs->AbsolutePage() >= $i) {
                $start = $i;
            }
        }
        $numbers = '';
        $end = $start + $linksperpage - 1;
        $link = "order_tipo=" . $this->orderTipo . "&" . $this->id . "_next_page";
        if ($end > $pages)
            $end = $pages;


        if ($this->startLinks && $start > 1) {
            $pos = $start - 1;
            $numbers .= "<li><a href='$this->toRefLinks&$link=$pos'>$this->startLinks</a></li>";
        }

        for ($i = $start; $i <= $end; $i++) {
            if ($this->rs->AbsolutePage() == $i)
                $numbers .= "<li><a><font color='$this->linkSelectedColor' size=2><b>$i</b></font></a></li>";
            else
                $numbers .= "<li><a href='" . $this->toRefLinks . "&$link=$i'>$i</a></li>";
        }
        if ($this->moreLinks && $end < $pages) {
            $numbers .= "<li><a href='$this->toRefLinks&$link=$i'>$this->moreLinks</a></li>";
        }
        print $numbers . ' &nbsp; ';
    }

    // Link to previous page
    function render_prev($anchor = true) {
        global $PHP_SELF;
        if ($anchor) {
            ?>
            <li><a id="prev" href="<?php echo $this->toRefLinks, '&', $this->id, '_next_page=', $this->rs->AbsolutePage() - 1 ?>"><?php echo $this->prev; ?></a></li> &nbsp; 
            <?php
        } else {
            print "<li class=\"disabled\">$this->prev &nbsp;</li>";
        }
    }

    //--------------------------------------------------------
    // Simply rendering of grid. You should override this for
    // better control over the format of the grid
    //
	// We use output buffering to keep code clean and readable.
    function RenderGrid() {
        global $gSQLBlockRows; // used by rs2html to indicate how many rows to display
        $rutaRaiz =$_SESSION['dir_raiz'];
        include_once(ADODB_DIR . '/tohtml.inc.php');
        ob_start();
        $gSQLBlockRows = $this->rows;
        //if(!$this->checkAll) $this->checkAll = false;
        //if(!$this->checkTitulo) $this->checkTitulo = true;
        $htmlContent = rs2html($this->db, $this->rs, $this->gridAttributes, $this->gridHeader, $this->htmlSpecialChars, true, $this->toRefVars, $this->orderTipo, $this->ordenActual, $this->rutaRaiz, $this->checkAll, $this->checkTitulo, $this->descCarpetasGen, $this->descCarpetasPer,$this->url_raiz);
        $xsql = serialize($this->sql);
        $_SESSION['xsql'] = $xsql;
        
       
        $dir_raiz = $this->url_raiz;
        /***
        Skinatech
        Autor: Andrés Mosquera
        Fecha: 07-11-2018
        Información: Exporte a .DOC comentado para que sea utilizado solo el .XLS
        ***/
        //echo "<a style='border:0px' href='$dir_raiz/adodb/adodb-doc.inc.php' target='_blank'><img data-toggle='tooltip' data-placement='top' title='Exportar contenido del listado en formato \".doc\"' src='$dir_raiz/adodb/compfile.png' width='40' heigth='40' border='0' alt='Exportar contenido del listado en formato word'></a>";
        echo "<a href='$dir_raiz/adodb/adodb-xls.inc.php' target='_blank'><img data-toggle='tooltip' data-placement='top' title='". utf8_decode("Exportar contenido del listado como hoja de cálculo") ."' src='$dir_raiz/adodb/spreadsheet.png' width='40' heigth='40' alt='Exportar contenido del listado en formato para excel' border='0'></a>";
        $s = ob_get_contents();
        ob_end_clean();
        return $s;
    }

    //-------------------------------------------------------
    // Navigation bar
    //
	// we use output buffering to keep the code easy to read.
    function RenderNav() {
        ob_start();
        echo "<nav aria-label=\"Page navigation\">
             <ul class=\"pagination pagination-sm\" style=\"margin: 2px;\" >";
        if (!$this->rs->AtFirstPage()) {
            $this->Render_First();
            $this->Render_Prev();
        } else {
            $this->Render_First(false);
            $this->Render_Prev(false);
        }
        if ($this->showPageLinks) {
            $this->Render_PageLinks();
        }
        if (!$this->rs->AtLastPage()) {
            $this->Render_Next();
            $this->Render_Last();
        } else {
            $this->Render_Next(false);
            $this->Render_Last(false);
        }
        
        echo "</ul>
        </nav>";
        
        $s = ob_get_contents();
        ob_end_clean();
        return $s;
    }

    //-------------------
    // This is the footer
    function RenderPageCount() {
        if (!$this->db->conn->pageExecuteCountRows)
            return '';
        $lastPage = $this->rs->LastPageNo();
        if ($lastPage == -1)
            $lastPage = 1; // check for empty rs.
        if ($this->curr_page > $lastPage)
            $this->curr_page = 1;
        return "<font size=1 class=tpar>$this->page " . $this->curr_page . "/" . $lastPage . "</font>";
    }

    //-----------------------------------
    // Call this class to draw everything.
    function Render($rows = 10, $toRefVar) {
        global $ADODB_COUNTRECS;
        $this->toRefVar = $toRefVar;
        $this->rows = $rows;
        $savec = $ADODB_COUNTRECS;
        if ($this->db->conn->pageExecuteCountRows)

            $ADODB_COUNTRECS = true;
        if ($this->cache)
            $rs = &$this->db->conn->CachePageExecute($this->cache, $this->sql, $rows, $this->curr_page);
        else
            $rs = &$this->db->conn->PageExecute($this->sql, $rows, $this->curr_page);
        $ADODB_COUNTRECS = $savec;
        $this->rs = &$rs;
        if (!$rs) {
            print "<h3>Fallo en una Consulta: $this->sql</h3>";
            return;
        }
        if (!$rs->EOF && (!$rs->AtFirstPage() || !$rs->AtLastPage()))
            $header = $this->RenderNav();
        else
            $header = "&nbsp;";
        $grid = $this->RenderGrid();
        $footer = $this->RenderPageCount();
        $rs->Close();
        $this->rs = false;
        $this->RenderLayout($header, $grid, $footer, " class=borde_tab");
    }

    //------------------------------------------------------
    // override this to control overall layout and formating

    function RenderLayout($header, $grid, $footer, $attributes = 'class=borde_tab') {

        echo "<table width=100% class=borde_tab border=0 >
			<tr class=tpar><td class=tpar>",
        $grid,
        "</td></tr>
				<tr><td class=titulos3 align=center>",
        $header,
        "</td></tr>
			<tr class=paginacion align=center><td>",
        $footer,
        "</td></tr>
			</table>";
    }

}
?>
