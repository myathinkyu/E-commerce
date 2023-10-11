<?php

namespace app\classes;

use PHPMailer\PHPMailer\PHPMailer;

class mail
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->setUp();
    }

    public function setUp()
    {
        if(getenv("APP_ENV") === "Local") {
            $this->mail->SMTPDebug = 2;
        }

        $this->mail->isSMTP();
        $this->mail->Host = getenv("SMTP_HOST");
        $this->mail->SMTPAuth = true;
        $this->mail->Username = getenv("EMAIL_USERNAME");
        $this->mail->Password = getenv("EMAIL_PASSWORD");
        $this->mail->Port = getenv("SMTP_PORT");

        $this->mail->isHTML(true);
        $this->mail->SingleTo = true;

        $this->mail->From = getenv("ADMIN_EMAIL");
        $this->mail->FromName = "May Myanmar Lin";
    }

    public function send($data)
    {
        $this->mail->addAddress($data["to"],$data["to_name"]);
        $this->mail->Subject = $data["subject"];
        $this->mail->Body = make($data["filename"],$data);
        $this->mail->addEmbeddedImage('/projectlogo.png','project');

        return $this->mail->send();
    }
}