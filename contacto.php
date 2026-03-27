<?php
header("Content-Type: application/json");

// Honeypot
if (!empty($_POST['_gotcha'])) {
  echo json_encode(["success" => false]);
  exit;
}

// Recoger datos
$nombre  = trim($_POST['nombre'] ?? '');
$email   = trim($_POST['email'] ?? '');
$mensaje = trim($_POST['message'] ?? '');

// Validaciones servidor
if (
  strlen($nombre) < 2 ||
  !filter_var($email, FILTER_VALIDATE_EMAIL) ||
  strlen($mensaje) < 10
) {
  echo json_encode(["success" => false]);
  exit;
}

// Envío a Formspree
$formspreeUrl = "https://formspree.io/f/mjkaknan";

$data = [
  "email" => $email,
  "_replyto" => $email,
  "message" => "Nombre: $nombre\n\nMensaje:\n$mensaje"
];


$ch = curl_init($formspreeUrl);
curl_setopt_array($ch, [
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => http_build_query($data),
  CURLOPT_HTTPHEADER => ["Accept: application/json"],
  CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Respuesta a JS
if ($httpCode >= 200 && $httpCode < 300) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false]);
}