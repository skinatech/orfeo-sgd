<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<img src='https://static-unitag.com/images/help/QRCode/qrcode.png?mh=07b7c2a2'>";

die();
// echo 'entra';

/*include 'PDF2Text';

$a = new PDF2Text();
$a->setFilename('formato_prueba3.pdf');
$a->decodePDF();
$a->output();
echo $a->decodedtext.'<br>';
echo 'Total palabras: '.strlen($a->decodedtext).'<br>';
print_r($a);*/ 

$prueba = listFile('formato_comunicado_interno.odt');

print_r($prueba);

function listFile($path)
{
    global $config;
    $filetype = filetype($path);
    if ($filetype == 'text') {
        echo 'entra text <br>';
        $text = file_get_contents($config['files'] . $path);
    } else {
        echo 'entra else <br>';
        if ($filetype == 'opendocument.text') {
            echo 'entra libreria';
            require "ophir_pru.php";
            $OPHIR_CONF["header"] = 1;
            $OPHIR_CONF["quote"] = 1;
            $OPHIR_CONF["list"] = 1;
            $OPHIR_CONF["table"] = 1;
            $OPHIR_CONF["footnote"] = 1;
            $OPHIR_CONF["link"] = 1;
            $OPHIR_CONF["image"] = 1;
            $OPHIR_CONF["note"] = 1;
            $OPHIR_CONF["annotation"] = 1;
            $text = odt2html($config['files'] . $path);
        } else {
            $text = 'aaa <br>';
        }
    }
    return array('type' => 'file', 'filetype' => $filetype, 'mimetype' => mime_content_type($path), 'name' => basename($path), 'path' => $path, 'text' => $text);
}