<?php
function sendEmail($mailTo, $subject, $body)
{
  require_once 'PHPMailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  $mail->Debugoutput = 'html';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPOptions = array(
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    )
  );
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "contactocivilsa@gmail.com";
  $mail->Password = "civilsa2020";
  $mail->setFrom('contactocivilsa@gmail.com', 'CONTACTO CIVILSA');
  foreach ($mailTo as $key => $value) {
    foreach ($value as $email => $name) {
      $mail->addAddress($email, $name);
    }
  }
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body    = $body;
  $mail->CharSet = 'UTF-8';
  if (!$mail->send()) {
    return false;
    echo "Error de mailer: " . $mail->ErrorInfo;
  } else {
    return true;
    echo "Mensaje enviado!";
  }
}

//Funcion con archivo adjunto se crea para no dañar los proyectos que tienen el sendmail general Mateo Castañeda
function sendEmailAttach($mailTo, $copy, $subject, $body, $archAdjuntos)
{
  require_once '/PHPMailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->SMTPDebug = 0;
  $mail->Debugoutput = 'html';
  $mail->Host = 'tls://smtp.gmail.com:587';
  $mail->Port = 587;
  $mail->SMTPOptions = array(
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    )
  );
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "contactocivilsa@gmail.com";
  $mail->Password = "civilsa2020";
  $mail->setFrom('contactocivilsa@gmail.com', 'CONTACTO CIVILSA');
  if ($copy != '') {
    foreach ($copy as $key => $value) {
      foreach ($value as $email => $name) {
        $mail->AddBCC($email, $name);
      }
    }
  }
  foreach ($mailTo as $key => $value) {
    foreach ($value as $email => $name) {
      $mail->addAddress($email, $name);
    }
  }
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body    = $body;
  $mail->CharSet = 'UTF-8';
  if (count($archAdjuntos) > 1) {
    foreach ($archAdjuntos as $archAdjunto) {
      $mail->AddAttachment($archAdjunto);
    }
  } else {
    $mail->AddAttachment($archAdjuntos);
  }
  // $mail->addAttachment($archAdjunto);
  if (!$mail->send()) {
    return false;
    echo "Error de mailer: " . $mail->ErrorInfo;
  } else {
    return true;
    echo "Mensaje enviado!";
  }
}
