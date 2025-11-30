<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Akshar Webtech | Homepage</title>
    <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/responsive.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/css/color-switcher-design.css'); ?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png'); ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('assets/images/favicon.png'); ?>" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>

<body class="hidden-bar-wrapper">
    <div class="page-wrapper">
        <div class="preloader">
            <div class="box"></div>
        </div>
        <?php $this->load->view("frontend/layout/menu.php"); ?>