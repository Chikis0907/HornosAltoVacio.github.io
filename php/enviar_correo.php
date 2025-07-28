<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);
    $tipoConsulta = htmlspecialchars($_POST["tipoConsulta"]);

    $to = "proyecto@grupoindustrialancor.com"; // Cambia a tu correo real
    $subject = "Nuevo mensaje de contacto de Grupo Ancor";
    $body = "Nombre: $nombre\nCorreo: $email\nConsulta: $tipoConsulta\n\nMensaje:\n$mensaje";
    $headers = "From: contacto@grupoindustrialancor.com\r\n"; // Debe existir si usas hosting real

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Mensaje enviado correctamente.'); window.location.href='contactanos.html';</script>";
    } else {
        echo "<script>alert('Error al enviar.'); history.back();</script>";
    }
} else {
    http_response_code(403);
    echo "Acceso denegado.";
}
?>
