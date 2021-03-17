<?php
namespace YamiTec\MailShot;

class MailParams {
    public $from;
    public $to;
    public $subject;
    public $cco;
    public $message;

    public function setTo(String $value) : MailParams{
        $this->to = $value;
        return $this;
    }

    public function setFrom(String $value) : MailParams{
        $this->from = $value;
        return $this;
    }

    public function setSubject(String $value) : MailParams{
        $this->subject = $value;
        return $this;
    }

    public function setMessage(String $value) : MailParams{
        $this->message = $value;
        return $this;
    }
    public function setCco(String $value) : MailParams{
        $this->cco = $value;
        return $this;
    }
}

class MailShot {
    public static $data;
    public function __construct(MailParams $data){
        self::$data = $data;
    }
    
    public static function validaEmail($email) : bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    static function send() : array
    {
        try{
            //$cco = "ephyllus2@gmail.com";
            $headers = "From: ".self::$data->from."\r\n";
            $headers .= "Reply-To: ".self::$data->from."\r\n";
            if(self::$data->cco) 
                $headers .= "Bcc: " . self::$data->cco . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            if (!self::validaEmail(self::$data->to)) {
                return ['success'=> false, 'message' => "E-mail ".self::$data->to."Inválido"];
            }
            if(mail(self::$data->to,self::$data->subject, nl2br(self::$data->message), $headers)){
                return ['success'=> true, 'message' => 'E-mail enviado com sucesso'];
            }else{
                return ['success'=> false, 'message' => "problema ao enviar e-mail"];
            }
           
        }catch(\Exception $ex){
            return ['success'=> false, 'message' => $ex->getMessage()];
        }
        
    }
}