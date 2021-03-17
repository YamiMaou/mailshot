# YamiTec MailSHOT

# Instalação

para iniciar o projeto basta instalar apartir do composer  com o comando ```composer require yamitec/mail-shot```

# Exemplo 

Para enviar e-mail com o MAILSHOT basta instanciar a classe ```\YamiTec\Mailshot```.

o arquivo deve conter o seguinte conteúdo:

```
<?php
//Instância Objeto de configuração de envio de e-mail
    $mailParams = new \YamiTec\Mailshot\MailParams();
    $mailParams->setTo("[EMAIL DE DESTINAÁTIO]") // define o destinatário
        ->setFrom("[EMAIL DE REMETENTE]") // define o remetente
        ->setSubject("[ASSUNTO DO E-MAIL]") // define o Assunto
        ->setMessage("[MENSSAGEM Do E-MAIL]"); // define o corpo da menssagem (pode ser HTML)
    $mail = new \YamiTec\Mailshot\MailShot($mailParams); // instancia o motor de envio de e-mail 
    return $mail->send() \\ envia o e-mail e retorna o estado.

```
# Retornos

Sempre retornamos um array ou objeto com os nós success em boleano, e message com a descrição do estado
```
    (array) : 
        sucess: bool;
        message: string
```

# Agradecimento

Equipe www.yamitec.com