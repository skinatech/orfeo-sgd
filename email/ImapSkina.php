<?php

class ImapSkina{

    /**
     * Servidor de correo email
     * imap.servidor.com / smtp.servidor.com
     */
    protected $servidor_mail;

    /**
     * Puerto de servidor email
     */
    protected $puerto_mail;

    /**
     * banderas asignadas para la conexión al servidor de correo
     */
    protected $flags;

   /**
     * Cadena de conexión
     */
    public  $connection;
    /**
     * Email de conexión
     */
    protected $email;
    /**
     * Password de conexón
     */
    protected $password;
    
    /**
     * Errores de conexión
     */
    protected $errors;

    /**
     * nombre del buzón donde se realizan las consultas de email
     *
     * @var [type]
     */
    protected $buzon;


    public $plain_msg;
    public $html_msg;
    //public $body_parts;
    public $charset;
    public $attachments;
    protected $imap;
    static $contador = 1;



    public function __construct($servidor_mail, $puerto_mail, $email, $password, $buzon, $flags = '/ssl'){
        //parametros de entrada
        $this->servidor_mail = $servidor_mail;
        $this->puerto_mail = $puerto_mail;
        $this->email = $email;
        $this->password = $password;
        $this->buzon = $buzon;
        $this->flags = $flags;
        //parametros auxiliares
        $this->connection = '{' . $servidor_mail . ':' . $puerto_mail . $flags . '}' . $buzon;
        
        $this->headers = [];
        $this->errors = [];
        $this->attachments = [];

        self::$contador += 1;
    }

    /**
     * Probar la conexión
     *
     * @return void
     */
    public function testConnection()
    {
        $imap = imap_open($this->connection, $this->email, $this->password);
        
        if(!$imap){
            $this->errors = imap_errors();
            return false;
        }

        $this->makeOrfeoFolder();
        imap_close($imap);
        return true;
    }

    /**
     * Undocumented function
     *
     * @param string $folder
     * @return int | array
     */
    public function countMessages($folder = 'INBOX')
    {
        $imap = imap_open($this->connection . $folder, $this->email, $this->password);

        if(!$imap){
            $this->errors = imap_errors();
            echo 'ocurrio un error contando los mensajes';
            var_dump($this->errors);
            return [];
        }

        $msgCount = imap_num_msg($imap);
        //imap_close($imap);
        
        return $msgCount;
    }

    public function getQuotaRoot($folder = 'INBOX')
    {
        $imap = imap_open($this->connection . $folder, $this->email, $this->password);

        if(!$imap){
            $this->errors = imap_errors();
            return [];
        }
        
        $quotaRoot = imap_get_quotaroot($imap, $folder);
        //imap_close($imap);
        
        return $quotaRoot;
    }


    /**
     * Guardar errores en la conexión
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Obtener los adjuntos de los correos
     *
     * @param [type] $imap
     * @param [type] $msg_number
     * @param integer $options
     * @return void
     */
    public function getAttachments($imap, $msg_number, $options = 0)
    {
        $mail_structure = imap_fetchstructure($imap, $msg_number, $options);
        $attachments = [];
        $count_parts = count($mail_structure->parts);

        if(isset($mail_structure->parts) && $count_parts){

            for ($i=0; $i < $count_parts; $i++) {
                $attachments[$i] = [
                    'id' => $i,
                    'is_attachment' => false,
                    'filename' => '',
                    'name' => '',
                    'encoding' => '',
                    'attachment' => ''
                ];

                if($mail_structure->parts[$i]->ifdparameters){
                    foreach ($mail_structure->parts[$i]->dparameters as $dparameter){
                        if(strtolower($dparameter->attribute) == 'filename'){
                            $attachments[$i]['is_attachment'] = true;
                            $attachments[$i]['filename'] = $dparameter->value;
                        }
                    }
                }

                if($mail_structure->parts[$i]->ifparameters){
                    foreach ($mail_structure->parts[$i]->parameters as $parameter){
                        if(strtolower($parameter->attribute) == 'name'){
                            $attachments[$i]['is_attachment'] = true;
                            $attachments[$i]['name'] = $parameter->value;
                        }
                    }
                }
                
                if($attachments[$i]['is_attachment']){
                    $attachments[$i]['attachment'] = imap_fetchbody($imap, $msg_number, $i+1, $options);
                    $attachments[$i]['encoding'] = $mail_structure->parts[$i]->encoding;
                }
            }
        }
        //var_dump($attachments);
        //$this->attachments = $attachments;
        return $attachments;
    }

    public function getBody($msg_number, $folder, $options = 0)
    {
        $inbox = imap_open($this->connection . $folder, $this->email, $this->password);

        if(!$inbox){
            $this->errors = imap_errors();
            return [];
        }

        $s = imap_fetchstructure($inbox, $msg_number);

        if (!$s->parts){
            //mensaje simple
            $this->getpart($inbox, $msg_number, $s, 0);
        }else{
            // Multipart message: cycle through each part
            foreach ($s->parts as $part_n => $p){
                $this->getpart($inbox, $msg_number, $p, $part_n + 1);
            }
        }
        //imap_close($inbox);
        return [
            'plain_message' => $this->plain_msg,
            'html_message' => $this->html_msg,
            //'parts' => $this->parts,
            'attachments' => $this->attachments
        ];
    }


    public function getpart($mbox, $mid, $p, $part_n)
    {
        $data = ($part_n) ? imap_fetchbody($mbox, $mid, $part_n) : imap_body($mbox, $mid);
 
        // Decode
        if ($p->encoding == 4){
            $data = quoted_printable_decode($data);
        }else if($p->encoding == 3){
            $data = base64_decode($data);
        }
 
        // Email Parameters
        $eparams = array();
        if ($p->parameters){
            foreach ($p->parameters as $x){
                $eparams[strtolower($x->attribute)] = $x->value;
            }
        }
        
        if ($p->dparameters){
            foreach ($p->dparameters as $x){
                $eparams[strtolower($x->attribute)] = $x->value;
            }
        }
        
        // Attachments
        if ($eparams['filename'] || $eparams['name']){
            $filename = ($eparams['filename']) ? $eparams['filename'] : $eparams['name'];
            $this->attachments[$filename] = $data;
        }
        
        // Text Messaage
        if ($p->type == 0 && $data){
            if (strtolower($p->subtype) == 'plain'){
                $this->plain_msg .= trim($data) ."\n\n";
            }else{
                $this->html_msg .= $data . '<br><br>';
            }
            $this->charset = $eparams['charset'];
        }
        else if ($p->type == 2 && $data){
            $this->plain_msg .= $data. "\n\n";
        }
        
        // Subparts Recursion
        if ($p->parts){
            foreach ($p->parts as $part_n2 => $p2){
            $this->getpart($mbox, $mid, $p2, $part_n . '.' . ($part_n2 + 1));
            }
        }
    }


    /**
     * Obtener los folders del buzón
     */
    public function getFolders()
    {
        $imap = imap_open( $this->connection, $this->email, $this->password);

        if(!$imap){
            $this->errors = imap_errors();
            die('Ocurrio un error al intentar conectar con IMAP al obtener los folders. Revise los parámetros de conexión. '. imap_last_error());
        }
        
        $buzones = imap_list($imap, $this->connection, '*');
        
        $trim_buzones = [];
        foreach($buzones as $buzon){
            $ba = explode($this->connection, $buzon);
            $trim_buzones[] = $ba[1];
        }
        $this->folders = $trim_buzones;
        //imap_close($imap);
        
        return $this->folders;
    }

    /**
     * Validar datos generales del buzón
     *
     * @param [type] $folder
     * @return void
     */
    public function imapCheck($folder = 'INBOX')
    {
        $imap = imap_open($this->connection . $folder, $this->email, $this->password);

        if(!$imap){
            $this->errors = imap_errors();
            die('Ocurrio un error al intentar conectar con IMAP al probar la conexión. Revise los parámetros de conexión. '. imap_last_error());
        }

        $imapCheck = imap_check($imap);

        //imap_close($imap);

        return $imapCheck;
    }
    
    /**
     * Obtener los datos de los headers y adjuntos de un grupo de correos
     * entre un rango minVal y maxVal
     *
     * @param string $folder
     * @param int $minVal
     * @param int $maxVal
     * @param boolean $gatAttachments
     * @return void
     */
    public function getHeadersEmailsInSequence($folder = 'INBOX', $minVal, $maxVal, $getAttachments = true){

        $imap = imap_open($this->connection . $folder , $this->email, $this->password);

        if(!$imap){
            $this->errors = imap_errors();
            die('Ocurrio un error al intentar conectar con IMAP al obtener los emails. Revise los parámetros de conexión. '. imap_last_error());
        }
        $headers = imap_fetch_overview($imap,"$minVal:$maxVal");

        //var_dump($headers);
        
        krsort($headers, SORT_NUMERIC);

        $attachments = [];
            
        foreach($headers as $header){
            if($getAttachments){
                $attachments[$header->msgno] = $this->getAttachments($imap, $header->msgno);
            }else{
                $attachments[$header->msgno] = $this->emailHasAttachment($imap, $header->msgno);
            }
        }
        
               
        //imap_close($imap);

        return [
            'headers' => $headers,
            'attachments' => $attachments ?? []
        ];
    }

    /**
     * Obtener la información de un correo determinado
     * utilizado cuando se ve un solo correo al hacer clic en el listado de asunto
     *
     * @param int $messageId el numero del correo en el folder
     * @param string $folder el nombre de la carpeta actual
     * @param integer $options
     * @return void
     */
    public function getEmailInfo($messageId, $folder = 'INBOX')
    {
        $imap = imap_open($this->connection . $folder, $this->email, $this->password);
       
        if(!$imap){
            $this->errors = imap_errors();
            die('Ocurrio un error al intentar conectar con IMAP al obtener los emails. Revise los parámetros de conexión. '. imap_last_error());
        }
        $structure = imap_fetchstructure($imap, $messageId);
        //var_dump($structure);
        $body = imap_body($imap, $messageId);
        //var_dump($body);

        $headerInfo = imap_headerinfo($imap, $messageId);

        $emailBody2 = imap_fetchbody($imap, $messageId, '2' );
        
        $emailBody1 = imap_fetchbody($imap, $messageId, '1.1' );
        
        if(strlen($emailBody1) != 0 && strlen($emailBody2) != 0){
            $emailBody = imap_fetchbody($imap, $messageId, '1.2' );
        }elseif(strlen($emailBody2) != 0){
            $emailBody = $emailBody2;
        }elseif(strlen($emailBody1) != 0){
            $emailBody = $emailBody1;
        }else{
            $emailBody = imap_fetchbody($imap, $messageId, '1' );
        }
       

        $emailBody = quoted_printable_decode($emailBody);
        
        $emailStructure = imap_fetchstructure($imap, $messageId);

        $emailAttachments = $this->getAttachments($imap, $messageId);

        //var_dump($emailAttachments);
        
        //imap_close($imap);

        return [
            'headerInfo' => $headerInfo,
            'emailBody' => $emailBody,
            'emailAttachments' => $emailAttachments
        ];

    }

    public function emailHasAttachment($imap, $messageId){
        $structure = imap_fetchstructure($imap, $messageId);
        //var_dump($structure->parts[0]->subtype);
        
        if(isset($structure->parts[0]->parts) && strtoupper($structure->parts[0]->subtype) == 'ALTERNATIVE'){
            return true;
        }
        return false;
    }


/**
     * Crear folder
     */
    public function makeOrfeoFolder()
    {
        $imap = imap_open($this->connection, $this->email, $this->password);
        $orfeoFolder = imap_utf7_encode('orfeosgd');
        $listScan = imap_listscan($imap, $this->connection, 'orfeosgd', '');
        
        if(!$listScan){
            try{
                $stringfolder = $this->connection . $orfeoFolder;
                $creado =  @imap_createmailbox($imap, imap_utf7_encode("$stringfolder"));

                if(!$creado){
                    
                    // echo 'Ocurrio un problema al intentar crear la carpeta orfeosgd';
                }
                
            }catch(\Exception $e){
                var_dump($e);
            }
            
            
        }else{
            // echo 'No se creo la carpeta. La carpeta orfeosgd ya existe.';
        }
        
        
    }
    
    /**
     * Find orfeosgd folder
     */
    public function findOrfeoFolder()
    {
        $imap = imap_open($this->connection, $this->email, $this->password);
        $orfeoFolder = imap_utf7_encode('orfeosgd');
        $listScan = imap_listscan($imap, $this->connection, $orfeoFolder, '');
        return $listScan;
    }

    public function moveEmailToOrfeosgd($folder, $messageId)
    {
        $imap = imap_open($this->connection . $this->folder, $this->email, $this->password);
        $orfeoFolder = imap_utf7_encode('orfeosgd');
        imap_mail_move($imap, $messageId, $orfeoFolder);
        imap_expunge($imap); 
    }


    ///////////// funcionalidad auxiliar /////////////////////


    /**
     * probar si el recurso de conexión está funcionando
     * Caso contrario genera el listado de errores
     *
     * @param resource $resource
     * @return void
     */
    protected function testImapResource($resource)
    {
        $errors = [];

        if(!$resource){
            $errors = imap_errors();
        }

        return $errors;
    }
    
   

}
