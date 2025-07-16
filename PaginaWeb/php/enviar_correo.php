<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST["mensaje"]);
    $tipoConsulta = htmlspecialchars($_POST["tipoConsulta"]);

    $destinatario = "proyecto@grupoindustrialancor.com";  // Puedes cambiar esto si deseas otro correo
    $asunto = "Nuevo mensaje desde el sitio web";

    $contenido = "
        Nombre: $nombre\n
        Email: $email\n
        Tipo de consulta: $tipoConsulta\n
        Mensaje:\n$mensaje
    ";

    $headers = "From: contacto@grupoindustrialancor.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid_request";
}
?>
