<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2008 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * Sample page.
-->
<?
$ruta_raiz = "../..";
$sBasePath = $ruta_raiz."/include/fckeditor/";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>FCKeditor - Sample</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<link href="<?=$ruta_raiz?>/include/fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="<?=$ruta_raiz?>/fckeditor/fckeditor.js"></script>
</head>
<body>
	<h1>
       FCKeditor - JavaScript - Sample 14 </h1>
	<hr />
	<form action="sampleposteddata.asp" method="post" target="_blank"><script type="text/javascript">
<!--
// Automatically calculates the editor base path based on the _samples directory.
// This is usefull only for these samples. A real application should use something like this:
oFCKeditor.BasePath = '<?=$sBasePath?>' ;	// '/fckeditor/' is the default value.
var sBasePath = '<?=$sBasePath?>' ;

var oFCKeditor = new FCKeditor( 'FCKeditor1' ) ;
oFCKeditor.BasePath	= '<?=$sBasePath?>' ;

// Instruct the editor to load our configurations from a custom file, leaving the
// original configuration file untouched.
oFCKeditor.Config['CustomConfigurationsPath'] = sBasePath + '_samples/html/sample14.config.js' ;

oFCKeditor.Height = 300 ;
oFCKeditor.Value = '<p>This is some <span class="Bold">sample text<\/span>. You are using <a href="http://www.fckeditor.net/">FCKeditor<\/a>.<\/p>' ;
oFCKeditor.Create() ;
//-->
		</script>
		<br />
		<input type="submit" value="Submit" />
	</form>
</body>
</html>
