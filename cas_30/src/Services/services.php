<?php

namespace PHP28\Services;

use PHPMailer\PHPMailer\PHPMailer;


class services
{
    private $mail;


    public function __construct()
    {
$mailer->isSMTP(); // Set mailer to use SMTP

$mailer->Host = $_ENV['MAILTRAP_HOST']; // Specify main and backup SMTP servers
$mailer->SMTPAuth = true; // Enable SMTP authentication

$mailer->Username = $_ENV['MAILTRAP_USERNAME'];

$mailer->Password = $_ENV['MAILTRAP_PASSWORD'];

$mailer->Port = $_ENV['MAILTRAP_PORT']; // TCP port to connect to

$this->mail = $mailer;

    }

    public function sendMail(string $subject, string $text, bool $isHtml=true):void
    {
     $this->mail->setFrom('bmilos1983@gmail.com', "Milos");

     $this->mail->addAddress('test@inbox.mailtrap.io', 'Milos Test'); // Add a recipient

     if($isHtml)
        {
          $this->mail->isHtml(true); // Set email format to HTML

        }

      
      $this->mail->Subject = $subject;

      $this->mail->Body = $text;

        
       $this->mail->send();
    }
}
