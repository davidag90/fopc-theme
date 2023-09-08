<?php
// URL a la que deseas redireccionar al visitante
$redireccionURL = "https://fopc.org.ar/";

// Redireccionar al visitante
header("Location: " . $redireccionURL);
exit; // Asegurarse de que el script se detenga después de la redirección
?>