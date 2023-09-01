<?php 

class EmailInfo
{
    private $header;
    private $body;
    private $attachments;


    public function __construct($emailInfo) {
        $this->header = $emailInfo['headerInfo'];
        $this->body = $emailInfo['body'];
        $this->attachments = $emailInfo['emailAttachments'];
    }

    public function geHeader()
    {
        return $this->header;
    }

    public function geBody()
    {
        return $this->body;
    }

    public function getAttachments()
    {
        return $this->getAttachments;
    }
}