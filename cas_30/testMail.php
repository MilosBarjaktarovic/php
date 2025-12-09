<?php

require_once 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;

$mailer = new PHPMailer(true);

$mailer->isSMTP(); // Set mailer to use SMTP

$mailer->Host = $_ENV['MAILTRAP_HOST']; // Specify main and backup SMTP servers
$mailer->SMTPAuth = true; // Enable SMTP authentication

$mailer->Username = $_ENV['MAILTRAP_USERNAME'];

$mailer->Password = $_ENV['MAILTRAP_PASSWORD'];

$mailer->Port = $_ENV['MAILTRAP_PORT']; // TCP port to connect to

$mailer->setFrom('bmilos1983@gmail.com', "Milos");

$mailer->addAddress('test@inbox.mailtrap.io', 'Milos Test'); // Add a recipient

$mailer->isHtml(true); // Set email format to HTML

$mailer->Subject = 'Ovo je cetvrti test email';

$mailer->Body = '<h1> Hello World</h1><p> This is a Test Mail </p>';

$mailer->AltBody = 'Hello world\n This is a Test Mail';


$path = realpath('racuni/invoice.jpg');


$rezultat = $mailer->addAttachment($path, 'Milos-racuni.jpg'); // Optional name

if(!$rezultat){
    die("Ne mogu da dodam attachment");
}
 
$mailer->send();
