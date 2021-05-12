<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 2;  // Sacar esta línea para no mostrar salida debug
    $mail->isSMTP();
    $mail->Host = 'mail.reciclandoaceiteducamos.org.ar';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'noreply@reciclandoaceiteducamos.org.ar';                 // Usuario SMTP
    $mail->Password = 'LlgPgq@zK]s_';                           // Password SMTP
    $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
    $mail->Port = 465;                                    // Puerto SMTP

    #$mail->SMTPOptions = ['ssl'=> ['allow_self_signed' => true]];  // Descomentar si el servidor SMTP tiene un certificado autofirmado
    #$mail->SMTPSecure = false;				// Descomentar si se requiere desactivar cifrado (se suele usar en conjunto con la siguiente línea)
    #$mail->SMTPAutoTLS = false;			// Descomentar si se requiere desactivar completamente TLS (sin cifrado)
 
    $mail->setFrom('noreply@reciclandoaceiteducamos.org.ar');		// Mail del remitente
    $mail->addAddress('ambiente@fundacionreciduca.org.ar');     // Mail del destinatario
 
    $mail->isHTML(true);
    $mail->Subject = 'Alta Cliente de: '.$_POST['input_nombrefantasia'];  // Asunto del mensaje
    $mail->Body    = 'Nfantasia: '.$_POST['input_nombrefantasia'].'<br>Rsocial: '.$_POST['input_razonsocial'].'<br>Cuit: '.$_POST['input_cuit'].'<br>Direccion: '.$_POST['input_direccion'].'<br>Ciudad: '.$_POST['input_ciudad'].'<br>Provincia: '.$_POST['input_provinica'].'<br>Email: '.$_POST['input_email'].'<br>Celular: '.$_POST['input_celular'].'<br>Ncontacto: '.$_POST['input_nombrecontacto'].'<br>Cargo: '.$_POST['input_cargo'];    // Contenido del mensaje (acepta HTML)
 
    $mail->send();
    header("location: gracias.html");
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("location: error.html");
}

?>
