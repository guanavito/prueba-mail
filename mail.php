<?php
$para      = 'aricotorres@gmail.com';
$titulo    = 'El título';
$mensaje   = 'Hola';
$cabeceras = 'From: ediscolina18@gmail.com' . "\r\n" .
  'Reply-To: ediscolina18@gmail.com' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
