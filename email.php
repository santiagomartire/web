<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'c2191146.ferozo.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'test@c2191146.ferozo.com';                     //SMTP username
    $mail->Password   = 'Camada@15810';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('test@c2191146.ferozo.com', 'Camada 15810'); // Hacer coincidir con el username. (preferentemente)
    $mail->addAddress('marianavazzotti@gmail.com', 'Agustina');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Alta Cliente de: '.$_POST['establishment'];
    $mail->Body    = 'Establecimiento: '.$_POST['establishment'].'<br>Nfantasia: '.$_POST['input_nombrefantasia'].'<br>Rsocial: '.$_POST['input_razonsocial'].'<br>Cuit: '.$_POST['input_cuit'].'<br>Direccion: '.$_POST['input_direccion'].'<br>Ciudad: '.$_POST['input_ciudad'].'<br>Provincia: '.$_POST['input_provinica'].'<br>Email: '.$_POST['input_email'].'<br>Celular: '.$_POST['input_celular'].'<br>Ncontacto: '.$_POST['input_nombrecontacto'].'<br>Cargo: '.$_POST['input_cargo'].
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("location: gracias.html");
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("location: error.html");
}

?>