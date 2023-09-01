<?php
class ExtractFiles
{
    private $urlZipFile;
    private $urlUnzipFolder;
    
    public function __construct($urlZipFile, $urlUnzipFolder) {
        $this->urlZipFile = $urlZipFile;
        $this->urlUnzipFile = $urlUnzipFolder;
    }

    public function extract()
    {
        $fileInfo = pathinfo($this->urlZipFile);

        if($fileInfo['extension'] == 'zip'){
            $zip = new ZipARchive();
            if(true == $zip->open($fileRoute)){
                $dirExtract = $urlUnzipFolder . $fileInfo['filename'];
                $zip->extractTo($dirExtract);
                $zip->close();

                return $dirExtract;
            }
        }
        
    }

    public function countExtractedFiles($dirExtract)
    {
        $filesExtracted = scandir($dirExtract);
        $cantidadAnexos = count($filesExtracted)-2;
        return $cantidadAnexos;
    }

    public function getExtractedFiles($dirExtract)
    {
        $files = scandir($dirExtract);
        return $files;
    }

    public function getXMLFile($dirExtract)
    {
        foreach($filesExtracted as $key => $value){
            if(stristr($value, '.xml')){
                $fileXML = $value;
                break;
            }
        }
        return $fileXML;
    }

}