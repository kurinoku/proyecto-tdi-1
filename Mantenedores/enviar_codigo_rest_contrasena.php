<?php
// Varios destinatarios
$para  = $email . ', '; // atención a la coma
// título
$título = 'Municipalidad de Concepción - Código para restablecer contraseña';
$codigo = rand(1000,9999);
// mensaje
$mensaje = '
<html>
<head>
    <title>Restablecer contraseña</title>
</head>
<body>
    <h1>Municipalidad de Concepción</h1>
    <div>
    <h4>Restablecer contraseña</h4>
    <h4>Este es su código: '.$codigo.'.</h4>
    <h4>Solamente es válido por 30 minutos.</h4>
    <p>
        <a href="http://localhost/xampp/TIS1/proyecto-tdi-1/Mantenedores/form_codigo_email.php?email='.$email.'&token='.$token.'"> 
            para restablecer su contraseña haga click aqui.
        </a>
    </p>
    <h4>Omitir este mensaje si usted no solicitó este código.</h4>
    </div>
</body>
</html>
';
// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Enviarlo

mail($para, $título, $mensaje, $cabeceras);
