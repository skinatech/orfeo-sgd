<?php
require 'dataModel.php';
require 'extractFiles.php';
require 'parseXML.php';

class facturacionElectronica
{
    private $dataModel;
    private $email;
    private $extractFiles;
    private $parseXML;
    private $urlZip;

    public function __construct($email, $urlZip = '../bodega/tmp/')
    {
      $this->dataModel = new DataModel();
      $this->email = new EmailInfo($email);
      $this->extractFiles = new ExtractFiles();
      $this->urlZip = $urlZip;
    }

    public function displayForm($data = null)
    {
        include_once 'formView.php';
    }

    public function getEmailData()
    {
        return $this->email;
    }

    public function getUBLInfo()
    {
        $this->parseXML = new ParseXML($this->email, $this->urlZip);
        $this->parseXML->extract();
    }

    public function setRadicado($infoRadicado)
    {
        //var_dump($infoRadicado);
        try {
            $result = $this->dataModel->searchRemitente($infoRadicado['nombre'], $infoRadicado['identificacion'], 'todos');
        } catch (\Throwable $th) {
            var_dump($th);
        }
        
        
        if(empty($result)){
            try {
                $insert = $this->dataModel->insertRemitente($infoRadicado);
            } catch (\Throwable $th) {
                
            }
            
        }

        if($insert){
            try {
                $result = $this->dataModel->searchRemitente($infoRadicado['nombre'], $infoRadicado['identificacion'], 'todos');
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }
        //$this->displayForm(['result' => $result]);
        return $result;
    }
}