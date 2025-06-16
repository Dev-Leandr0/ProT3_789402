<!doctype html>
<html lang="es">

<head>
  <!-- Codificación de caracteres -->
  <meta charset="utf-8">

  <!-- Adaptación para dispositivos móviles -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Título dinámico de la página -->
  <title><?php echo ($titulo); ?></title>

  <!-- Favicon del sitio (ícono en la pestaña del navegador) -->
  <link rel="shortcut icon" href="<?= base_url('assets/img/icons/logo/logo-3.png') ?>" type="image/x-icon">

  <!-- === DEPENDENCIAS DE ESTILO === -->

  <!-- Tipografía Rajdhani desde Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;700&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS (versión local) -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

  <!-- Biblioteca de animaciones (animate.css desde CDN) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- Bootstrap Icons (desde CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Estilos personalizados del sitio -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
  <!-- Incluye estilos comunes utilizados en:
       - navbar_view.php
       - principal.php
       - monoplaza.php
       - contacto.php
       - footer.php
       - form_view.php
  -->

</head>

<body>