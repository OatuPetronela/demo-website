<?php require_once('includes/header.php'); ?>
<h1 class="text-white">Movies</h1>
<div class="row">
    <?php
    $i = 1;
    foreach (json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'] as $movie) { ?>
        <div class=" col-sm-12 col-md-4 col-xl-4" id="<?php echo $movie['id'] ?> ">
            <div class="card" id="cards">
                <img class="card-img-top" id="img_card" src="<?php echo $movie['posterUrl'] ?> " alt="Titanic ">
                <div class="card-body">
                    <h5 class="card-title "><?php echo $movie['title'] ?></h5>
                    <p><?php
                        $moviePlot = $movie['plot'];
                        echo require('includes/archive-movie.php');
                        ?></p>
                    <a href="movie.php?movie_id=<?php echo $movie['id']; ?>" class="btn btn-success ">Read more</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php require_once('includes/footer.php'); ?>