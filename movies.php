<?php require_once('includes/header.php');?>
        <h1 class="text-white">Movies</h1>
        <div class="row">
            <?php 
            
            $movies = array(
                array(
                    'title' => 'Titanic',
                    'poster' => 'https://resizing.flixster.com/BxZIv5JMCG2E7_t9ZX3yeqL6WLY=/206x305/v2/https://flxt.tmsimg.com/NowShowing/10236/10236_aa.jpg',
                    'description' => 'Titanic is an epic, action-packed romance set against the ill-fated maiden voyage of the R.M.S. Titanic; the pride and joy of the White Star Line and, at the time',
                    'permalink' => 'http://petronelaoatu.local/demo/movie-1.php'
                ),
                array(
                    'title' => 'Avatar',
                    'poster' => 'https://resizing.flixster.com/kACYoBcDXPDb-kl4iTX4kQPUcaM=/206x305/v2/https://flxt.tmsimg.com/assets/p3542039_p_v8_am.jpg',
                    'description' => 'On the lush alien world of Pandora live the Na\'vi, beings who appear primitive but are highly evolved. Because the planet\'s environment',
                    'permalink' => 'http://petronelaoatu.local/demo/movie-2.php '
                ),
                array(
                    'title' => 'Terminator 2: Judgment Day',
                    'poster' => 'https://resizing.flixster.com/rsteoIZDIsR_GNUZqaUe5UXD7OY=/206x305/v2/https://resizing.flixster.com/Dm0V83ItG7HunwWZyin2QeKUkEo=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzLzAwYTE0NjQzLTA3MGQtNDY2Yi1hZjczLTE0YTc0ZWVjMTU2ZS53ZWJw',
                    'description' => 'In this sequel set eleven years after \'The Terminator, \' young John Connor (Edward Furlong), the key to civilization\'s victory over a future robot uprising, is the target',
                    'permalink' => 'http://petronelaoatu.local/demo/movie-3.php'
                )
                );
                $i = 1;
                foreach($movies as $movie){ ?>
                    <div class=" col-sm-12 col-md-4 col-xl-4" id="<?php echo $i++; ?>">
                    <div class="card">
                        <img class=" card-img-top " src="<?php echo $movie['poster'] ?> " alt="Titanic ">
                        <div class="card-body ">
                            <h5 class="card-title "><?php echo $movie['title'] ?></h5>
                            <p><?php echo $movie['description'] . '...' ?></p>
                           <a href=" <?php echo $movie['permalink'] ?>" class="btn btn-success ">Read more</a>
                        </div>
                    </div>
                </div>
                    <?php
                }
            ?>
        </div>
        <?php require_once('includes/footer.php');?>