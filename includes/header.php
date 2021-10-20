<!DOCTYPE html>
<html lang="en">

<head>
    <title>Oatu Petronela</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>

<body id="body_">
    <?php require_once('includes/functions.php'); ?>
    <!-- Navbar -->
    <?php
    $navbar = array(
        array(
            'url' => '/demo/index.php',
            'title' => 'Home',
        ),
        array(
            'url' => '/demo/movies.php',
            'title' => 'Movies',
        ),
        array(
            'url' => '/demo/contact.php',
            'title' => 'Contact',
        ),
    ) ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">OP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php foreach ($navbar as $navitem) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == $navitem['url']) {
                                                echo 'active';
                                            } ?>" href="<?php echo $navitem['url']; ?>"><?php echo $navitem['title']; ?> </a>
                    <?php }; ?>
            </ul>
            <?php require('includes/search-form.php'); ?>
        </div>
    </nav>
    <div class="container">