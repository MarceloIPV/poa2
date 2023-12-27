<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

// Obtener los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

// Crear una instancia de PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
  // Configurar el servidor SMTP y las credenciales
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'tu_correo@gmail.com';
  $mail->Password = 'tu_contraseña';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  // Configurar el remitente y el destinatario
  $mail->setFrom('tu_correo@gmail.com', 'Tu Nombre');
  $mail->addAddress($correo, $nombre);

  // Configurar el contenido del correo
  $mail->isHTML(true);
  $mail->Subject = 'Ejemplo de correo con PHPMailer';
  $mail->Body = $mensaje;

  // Enviar el correo
  $mail->send();

  // Enviar una respuesta al cliente
  $response = array('success' => true);
  echo json_encode($response);
} catch (Exception $e) {
  // Enviar una respuesta de error al cliente
  $response = array('success' => false);
  echo json_encode($response);
}
?>