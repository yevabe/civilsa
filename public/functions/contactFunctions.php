<?php
require_once('conexion.php');
require('sendMail.php');

if (isset($_POST['enviarContacto']) ? $_POST['enviarContacto'] : '' == 1) {
    insertContact();
}

function valDuplicate()
{
    conectar($conn);
    $error = "<strong>Error:</strong> No fue posible validar si se esta insertando un contacto duplicado <br><strong>Help development or technical support : </strong>View function : valDuplicate()";
    $sql = "SELECT COUNT(id) id 
            FROM contact
            WHERE nombre = '" . utf8_decode($_POST['nombre']) . "' AND email = '" . utf8_decode($_POST['email']) . "' AND asunto = '" . utf8_decode($_POST['asunto']) . "' AND contenido = '" . utf8_decode($_POST['contenido']) . "'";
    executeQuery($conn, $sql, $error, $stmt);
    $row = mysqli_fetch_assoc($stmt);
    if ($row['id'] > 1) {
        return 2;
    }
    closeConnection($stmt, $conn);
}

function insertContact()
{
    conectar($conn);
    $duplicate = valDuplicate();
    if ($duplicate != 2) {
        $name = utf8_decode($_POST['nombre']);
        $email = utf8_decode($_POST['email']);
        $asunto = utf8_decode($_POST['asunto']);
        $contenido = utf8_decode($_POST['contenido']);
        $error = "<strong>Error:</strong> No fue posible insertar la información del contacto <br><strong>Help development or technical support : </strong>View function : insertContact()";
        $sql = "INSERT INTO contact (nombre,email,asunto,contenido)
                            VALUES('{$name}','{$email}','$asunto','{$contenido}')";
        executeQuery($conn, $sql, $error, $stmt);
        enviarEmail();
        enviarEmailProyect();
        echo json_encode('1');
    } else {
        echo json_encode('2');
    }
    die();
}


function enviarEmail()
{
    $body = '';
    $subject = ' 📮 ' . utf8_decode($_POST['nombre']) . ' • ' . utf8_decode(' Te haz contactado con CIVILSA');
    // Encabezado
    include('resources/headerCorreo.php');
    //Contenido
    $body2 .= '
    <table style="margin:0 auto; max-width:100%; width:600px" class="email-wrap">
    <tbody>
    <tr>
    <td>
    <table bgcolor="white" border="0" cellpadding="0" cellspacing="0" style="background:white; border-radius:8px; border:0; margin:10px auto; width:100%" class="content">
    <tbody>
    <tr>
    <td>&nbsp;
    <font color="#444444">
    </font>
    <table border="0" cellpadding="35" cellspacing="0">
    <tbody>
    <tr>
    <td align="center" style="color:#444444; font-size:18px; line-height:24px">
    <center>
    <p style="text-align: center; line-height: 28px; font-size: 26px;">
    <strong>
    <font color="#444444">
    👋 Hola, ' . utf8_decode($_POST['nombre']) . ' gracias por contactarte con nosotros
    </font>
    </strong>
    </p>
    <p style="text-align: justify; line-height: 28px; font-size: 20px;">
    <font color="#444444">
    En el trascurso de 12 a 24 horas hábiles uno de nuestros asesores se comunicará contigo por medio de los medios de contacto brindados.
    </font>
    </p>
    <p style="text-align: justify; line-height: 16px; font-size: 20px;">
    <font color="#444444">
    <strong>PD:</strong> Normalmente respondemos en el trascurso de 15 minutos ;) 
    </font>
    </p>
    <center>
    <table border="0" cellpadding="14" cellspacing="0" style="background:#7362DE; border-radius:6px; color:#ffffff; cursor:pointer; display:inline-block; font-size:20px; font-weight:bold; line-height:24px; margin:0px auto; text-align:center" class="button main">
    <tbody>
    <tr>
    </tr>
    </tbody>
    </table>
    </center>
    <center>
    ';
    //Footer
    include('resources/footerCorreo.php');
    $body = $body2;
    $email = $_POST['email'];
    $mailTo = array(array($email => utf8_decode($_POST['nombre'])));
    sendEmail($mailTo, $subject, $body);
}
function enviarEmailProyect()
{
    $body = '';
    $subject = ' 📮 ' . utf8_decode('Proyectos CIVILSA, el usuario ') . utf8_decode($_POST['nombre']) . ' • ' . utf8_decode(' se ha contactado con nosotros');
    // Encabezado
    include('resources/headerCorreo.php');
    //Contenido
    $body2 .= '
    <table style="margin:0 auto; max-width:100%; width:600px" class="email-wrap">
    <tbody>
    <tr>
    <td>
    <table bgcolor="white" border="0" cellpadding="0" cellspacing="0" style="background:white; border-radius:8px; border:0; margin:10px auto; width:100%" class="content">
    <tbody>
    <tr>
    <td>&nbsp;
    <font color="#444444">
    </font>
    <table border="0" cellpadding="35" cellspacing="0">
    <tbody>
    <tr>
    <td align="center" style="color:#444444; font-size:18px; line-height:24px">
    <center>
    <p style="text-align: center; line-height: 28px; font-size: 26px;">
    <strong>
    <font color="#444444">
    👋 Hola Proyectos CIVILSA, el usuario ' . utf8_decode($_POST['nombre']) . ' se ha contactado con nosotros
    </font>
    </strong>
    </p>
    <p style="text-align: justify; line-height: 28px; font-size: 20px;">
    <font color="#444444">
    La siguiente es la información diligenciada por el usuario:
    <ul style="list-style:none;">
        <li><strong>Nombre completo:</strong> ' . utf8_decode($_POST['nombre']) . '</li>
        <li><strong>Correo electrónico:</strong> ' . utf8_decode($_POST['email']) . '</li>
        <li><strong>Asunto:</strong> ' . utf8_decode($_POST['asunto']) . '</li>
        <li><strong>Contenido:</strong> ' . utf8_decode($_POST['contenido']) . '</li>
    </ul>
    </font>
    </p>
    <center>
    <table border="0" cellpadding="14" cellspacing="0" style="background:#7362DE; border-radius:6px; color:#ffffff; cursor:pointer; display:inline-block; font-size:20px; font-weight:bold; line-height:24px; margin:0px auto; text-align:center" class="button main">
    <tbody>
    <tr>
    </tr>
    </tbody>
    </table>
    </center>
    <center>
    ';
    //Footer
    include('resources/footerCorreo.php');
    $body = $body2;
    $email = "proyectos@civilsa.com.co";
    $mailTo = array(array($email => 'Proyectos CIVILSA'));
    sendEmail($mailTo, $subject, $body);
}
