<?php
class SupplierInfo 
{
    private $xml;
    private $xmlArray;
    private $reader;

    public function __construct(String $xml = null) {
        $this->xml = $xml;
        $this->xmlArray = [];
    }

    public function getCdata()
    {
        $reader = new XMLReader();
        $reader->open($this->xml);
        $cdata = [];

        while($reader->read()){
            
            if($reader->nodeType == XMLReader::CDATA){
                $cdata[] = $reader->value;
            }
        }
        return $cdata;

    }

    public function readInfoCdata()
    {
        $reader = new XMLReader();
        $reader->xml($this->getCdata()[0]);
        
        $xmlArray = [];
        $strArray = '';
        $stack = [];

        while($reader->read()){
            
            if($reader->nodeType == XMLReader::ELEMENT){ 
                $strArray .= $reader->localName .'_';
                $stack[] = $reader->localName;
            }

            if($reader->nodeType == XMLReader:: SIGNIFICANT_WHITESPACE){
                //echo 'Espacio Significativo<br>';
            }

            if($reader->nodeType == XMLReader::TEXT){
               $xmlArray[$strArray] = $reader->value;
            }

            if($reader->nodeType == XMLReader::END_ELEMENT){
              $lastString = array_pop($stack);
              $strArray = str_replace($lastString.'_', '', $strArray);
            }
            if($reader->nodeType == XMLReader::CDATA){
                $xmlArray[$strArray] = $reader->value;
            }
        }
        //var_dump($xmlArray);
        $keys = array_keys($xmlArray);
        $supplier = [];

        foreach($keys as $key){

            $posNit = strpos($key, 'AccountingSupplierParty') && strpos($key, 'AddressPartyTaxScheme_CompanyID_');
            if($posNit && !$supplier['nit']){
                $supplier['nit'] = $xmlArray[$key];
            }

            $posRazonSocial = strpos($key, 'AccountingSupplierParty') && strpos($key, 'AddressPartyTaxScheme_RegistrationName_');
            if($posRazonSocial && !$supplier['razon_social']){
                $supplier['razon_social'] = $xmlArray[$key];
                
            }

            $posciudad = strpos($key, 'AccountingSupplierParty') && strpos($key, 'AddressPartyTaxScheme_RegistrationAddress_CityName_');
            if($posciudad  && !$supplier['ciudad']){
                $supplier['ciudad'] = $xmlArray[$key];
                
            }

            $posdireccion = strpos($key, 'AccountingSupplierParty') && strpos($key, 'AddressPartyTaxScheme_RegistrationAddress_AddressLine_Line_');
            if($posdireccion && !$supplier['direccion']){
               $supplier['direccion'] = $xmlArray[$key];
                
            }

            $poscontacto = strpos($key, 'AccountingSupplierParty') && strpos($key, 'AddressPartyAddressContact_Name_');
            if($poscontacto  && !$supplier['contacto']){
                $supplier['contacto'] = $xmlArray[$key];
            }

            $posemail = strpos($key, 'AccountingSupplierParty') && strpos($key, 'AddressPartyAddressContact_ElectronicMail_');
            if($posemail   && !$supplier['email']){
                $supplier['email'] = $xmlArray[$key];
            }
        }
        return $supplier;
    }


}