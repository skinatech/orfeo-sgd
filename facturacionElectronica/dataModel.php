<?php 
require_once '../include/db/ConnectionHandler.php';


class DataModel
{
    protected $db;

    public function __construct() {
        try {
            $this->db = new ConnectionHandler('..');
            $this->db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
        } catch (\Throwable $th) {
            var_dump($th);
        }
       
    }

    public function getMunicipio($nombre){
        $nombre = strtoupper($nombre);
        $strposBog = strripos($nombre,'BOGOT');
        

        if($strposBog===false){
            die('no se encontro la ciudad o municipio.');
        }else{
            $nombre = 'BOGOTA';
        }

        $sql = "select * from municipio where muni_nomb like '%$nombre%'";
        $result = $this->db->conn->query($sql);
        
        return $result->fields;
    }
    /*
    public function getDepartamento($nombre){
        $sql = "select * from departamento where dpto_nomb like '%$nombre%'";
        $result = $this->db->conn->query($sql);
        return $result->fields;
    }

    public function getContinente($nombre){
        $sql = "select * from sgd_def_continentes where nombre_cont like '%$nombre%'";
        $result = $this->db->conn->query($sql);
        return $result->fields;
    }

    public function getPais($nombre){
        $sql = "select * from sgd_def_paises where nombre_pais like '%$nombre%'";
        $result = $this->db->conn->query($sql);
        return $result->fields;
    }
    */
    public function searchRemitente($name, $idNumber, $tipo = 'empresa')
    {
        $sqlArray = [
            "select * from sgd_oem_oempresas where sgd_oem_oempresa like '%$name%' or sgd_oem_nit like '%$idNumber%'",
            "select * from usuario where usua_nomb like '%$name%' or usua_doc like '%$idNumber%'",
            "select * from sgd_ciu_ciudadano where sgd_ciu_nombre like '%$name%' or sgd_ciu_cedula like '%$idNumber%'"
        ];

        $dataAnswer = [];

        switch ($tipo) {
            case 'empresa':
                $result = $this->db->conn->query($sqlArray[0]);
                $dataAnswer = $result->fields;
                break;
            case 'usuario':
                $result = $this->db->conn->query($sqlArray[l]);
                $dataAnswer = $result->fields;
                break;
            case 'ciudadano':
                $result = $this->db->conn->query($sql[2]);
                $dataAnswer = $result->fields;
                break;
            case 'all':
                //$sql = $sqlArray[0] . ' UNION ' . $sqlArray[1] . ' UNION ' . $sqlArray[1];
                foreach($sqlArray as $sql){
                    $result = $this->db->conn->query($sql);
                    $dataAnswer[] = $result->fields;
                }
                break;
            default:
                echo 'No está definido el tipo de remitente por el cual buscar';
                break;
        }

        return $dataAnswer;
        
    }

    public function insertRemitente($data, $tipo = 'empresa')
    {
        //var_dump('data: ', $data);die();
        $municipio = $this->getMunicipio($data['ciudad']);
        //var_dump($municipio);

        $sqlSequence = "SELECT NEXTVAL('sec_oem_oempresas')";
        $sgd_oem_codigo = $this->db->conn->execute($sqlSequence)->fields['NEXTVAL'];

        $sqlArray = [
            "insert into sgd_oem_oempresas 
            (SGD_OEM_CODIGO, TDID_CODI, SGD_OEM_OEMPRESA, SGD_OEM_REP_LEGAL, SGD_OEM_NIT, SGD_OEM_SIGLA, MUNI_CODI, DPTO_CODI, SGD_OEM_DIRECCION, SGD_OEM_TELEFONO, ID_CONT, ID_PAIS, EMAIL) 
            values 
            ('". $sgd_oem_codigo ."', '". 4 ."', '" . $data['razon_social']."', '" . $data['contacto']."', '" . $data['nit']."', '', " . $municipio['MUNI_CODI'].", " . $municipio['DPTO_CODI'].", '" . $data['direccion']."', '', " . $municipio['ID_CONT'].", " . $municipio['ID_PAIS'].",'" . $data['email']."')",

        ];

        switch ($tipo) {
            case 'empresa':
                //var_dump($sqlArray[0]);
                $result = $this->db->conn->query($sqlArray[0]);
                //var_dump($result);
                $dataAnswer = $result;
                break;
            case 'usuario':
                $result = $this->db->conn->query($sqlArray[l]);
                $dataAnswer = $result->fields;
                break;
            case 'ciudadano':
                $result = $this->db->conn->query($sql[2]);
                $dataAnswer = $result->fields;
                break;
            case 'all':
                //$sql = $sqlArray[0] . ' UNION ' . $sqlArray[1] . ' UNION ' . $sqlArray[1];
                foreach($sqlArray as $sql){
                    $result = $this->db->conn->query($sql);
                    $dataAnswer[] = $result->fields;
                }
                break;
            default:
                echo 'No está definido el tipo de remitente por el cual buscar';
                break;
        }
        return $dataAnswer;
    }
}