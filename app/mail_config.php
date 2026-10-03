<?php
require_once __DIR__ . '/config/correo.php';

function enviarCorreoSistema(string $destinatario, string $asunto, string $html, string $textoPlano = ''): bool
{
    $autoload = dirname(__DIR__) . '/vendor/autoload.php';
    if (!file_exists($autoload)) {
        error_log('PHPMailer no está instalado. Ejecuta: composer install');
        return false;
    }

    require_once $autoload;

    if (!class_exists('PHPMailer\\PHPMailer\\PHPMailer')) {
        error_log('No se pudo cargar PHPMailer.');
        return false;
    }

    if (MAIL_USERNAME === 'TU_CORREO@gmail.com' || MAIL_PASSWORD === 'TU_CONTRASENA_DE_APLICACION') {
        error_log('Falta configurar app/config/correo.php');
        return false;
    }

    try {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = MAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = MAIL_PORT;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
        $mail->addAddress($destinatario);
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $html;
        $mail->AltBody = $textoPlano !== '' ? $textoPlano : strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $html));
        $mail->send();
        return true;
    } catch (Throwable $e) {
        error_log('Error SMTP: ' . $e->getMessage());
        return false;
    }
}

function plantillaCorreo(string $titulo, string $contenido): string
{
    return '<!doctype html><html><body style="margin:0;background:#f4f6f9;font-family:Arial,sans-serif;color:#343a40">'
        . '<div style="max-width:600px;margin:32px auto;background:#fff;border-radius:12px;overflow:hidden;border:1px solid #e9ecef">'
        . '<div style="background:#0d5aa7;color:#fff;padding:22px 28px"><h2 style="margin:0">Librería El Tintero</h2></div>'
        . '<div style="padding:28px"><h2 style="margin-top:0">' . htmlspecialchars($titulo) . '</h2>' . $contenido
        . '<p style="margin-top:28px;color:#6c757d;font-size:13px">Este es un mensaje automático del sistema.</p></div></div></body></html>';
}

function enviarCodigoRecuperacion(string $destinatario, string $codigo): bool
{
    $contenido = '<p>Recibimos una solicitud para restablecer tu contraseña.</p>'
        . '<p>Tu código de verificación es:</p>'
        . '<div style="font-size:30px;font-weight:bold;letter-spacing:8px;background:#f1f5f9;padding:18px;text-align:center;border-radius:8px">' . htmlspecialchars($codigo) . '</div>'
        . '<p>El código vence en <strong>10 minutos</strong>. Si no solicitaste el cambio, ignora este mensaje.</p>';
    return enviarCorreoSistema($destinatario, 'Código para restablecer tu contraseña', plantillaCorreo('Recuperación de contraseña', $contenido));
}

function enviarCredencialesTrabajador(string $destinatario, string $nombre, string $passwordTemporal): bool
{
    $contenido = '<p>Hola <strong>' . htmlspecialchars($nombre) . '</strong>,</p>'
        . '<p>Se creó tu acceso al Sistema de Librería.</p>'
        . '<div style="background:#f1f5f9;padding:18px;border-radius:8px">'
        . '<p style="margin:0 0 10px"><strong>Usuario:</strong> ' . htmlspecialchars($destinatario) . '</p>'
        . '<p style="margin:0"><strong>Contraseña temporal:</strong> ' . htmlspecialchars($passwordTemporal) . '</p></div>'
        . '<p>Al iniciar sesión deberás crear una nueva contraseña. Por seguridad, no compartas estas credenciales.</p>';
    return enviarCorreoSistema($destinatario, 'Credenciales de acceso - Sistema de Librería', plantillaCorreo('Bienvenido al sistema', $contenido));
}
