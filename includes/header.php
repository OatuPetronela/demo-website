
<?php require_once('includes/functions.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Oatu Petronela</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>

<body id="body_">
    <!-- Navbar -->
<?php 
$navbar = array(
    array(
    'name1'=> 'Home',
    'name2'=>'Movies', 
    'name3'=>'Contact',
    'link1'=>'/demo/index.php',
    'link2'=>'/demo/movies.php', 
    'link3'=>'/demo/contact.php',
        )
    );
    foreach($navbar as $navitem){ ?>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#">OP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a <?php if ($_SERVER['SCRIPT_NAME'] == "/demo/index.php") { ?> 
     class="nav-link active" 
    <?php   } else {  ?>
         class="nav-link" <?php } ?>href=" <?php echo $navitem['link1']?>"><i class="fas fa-home"></i><?php echo $navitem['name1']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-item">
                    <a <?php if ($_SERVER['SCRIPT_NAME'] == "/demo/movies.php") { ?> 
     class="nav-link active" 
    <?php   } else {  ?>
         class="nav-link"
    <?php } ?> href=" <?php echo $navitem['link2']?>"><i class="fas fa-film"></i><?php echo $navitem['name2']?></a>
                </li>
                <li class="nav-item">
                    <a  <?php if ($_SERVER['SCRIPT_NAME'] == "/demo/contact.php") { ?> 
     class="nav-link active" 
    <?php   } else {  ?>
         class="nav-link"
    <?php } ?> href=" <?php echo $navitem['link3']?>"><i class="fas fa-id-badge"></i><?php echo $navitem['name3']?></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
        <?php
    }
?>
    <div class="container">
        <!-- Movies -->
    <?php
            if($_SERVER['SCRIPT_NAME'] == "/demo/movies.php"){
            $movies = array(
                array(
                    'title' => 'Titanic',
                    'poster' => 'https://resizing.flixster.com/BxZIv5JMCG2E7_t9ZX3yeqL6WLY=/206x305/v2/https://flxt.tmsimg.com/NowShowing/10236/10236_aa.jpg',
                    'description' => 'Titanic is an epic, action-packed romance set against the ill-fated maiden voyage of the R.M.S. Titanic; the pride and joy of the White Star Line and, at the time',
                    'permalink' => 'http://petronelaoatu.local/demo/movie-1.php',
                    'id' => '1'
                ),
                array(
                    'title' => 'Avatar',
                    'poster' => 'https://resizing.flixster.com/kACYoBcDXPDb-kl4iTX4kQPUcaM=/206x305/v2/https://flxt.tmsimg.com/assets/p3542039_p_v8_am.jpg',
                    'description' => 'On the lush alien world of Pandora live the Na\'vi, beings who appear primitive but are highly evolved. Because the planet\'s environment',
                    'permalink' => 'http://petronelaoatu.local/demo/movie-2.php ',
                    'id' => '2'
                ),
                array(
                    'title' => 'Terminator 2: Judgment Day',
                    'poster' => 'https://resizing.flixster.com/rsteoIZDIsR_GNUZqaUe5UXD7OY=/206x305/v2/https://resizing.flixster.com/Dm0V83ItG7HunwWZyin2QeKUkEo=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzLzAwYTE0NjQzLTA3MGQtNDY2Yi1hZjczLTE0YTc0ZWVjMTU2ZS53ZWJw',
                    'description' => 'In this sequel set eleven years after \'The Terminator, \' young John Connor (Edward Furlong), the key to civilization\'s victory over a future robot uprising, is the target',
                    'permalink' => 'http://petronelaoatu.local/demo/movie-3.php',
                    'id' => '3'
                )
                );
            }
            ?>

