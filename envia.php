<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
     //variables form
     if (isset($_POST['enviar'])){

     $nombre = $_POST['nombre'];
     $email = $_POST['email'];
     $consulta = $_POST['consulta'];
     $mail->isSMTP();                                            //Send using SMTP
     $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
     $mail->SMTPAuth = true;                                   //Enable SMTP authentication
     $mail->Username = 'carolinaayelencalvino@gmail.com';                     //SMTP username
     $mail->Password = 'carolina2112';                               //SMTP password
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
     $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 

    //Recipients
    $mail->setFrom($email);
    $mail->addAddress('seguridadlanus@hotmail.com');     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Mensaje de web de Seguridad a tus Pies';
    $mail->Body    = 'Nombre: '.$nombre  .'<br>'. 'Email: '. $email . '<br>'. 'Mensaje: ' . $consulta;

    $mail->send();
    echo 'Mensaje enviado con exito';
    echo'<script type="text/javascript">
    window.location.href="https://seguridadatuspies.com.ar/confirma.html";</script>';
     }
} catch (Exception $e) {
    echo "Error al enviar su mensaje: {$mail->ErrorInfo}";
}



//seguridadlanus@hotmail.com



?>
