<div class="movie w-100">
    <?php require_once('includes/header.php'); ?>

    <?php
    $movieId = $_GET["movie_id"];
    if ($movieId != null) {
        $movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];

        $movie = array_filter($movies, function ($var) use ($movieId) {
            return find_by_id($var, $movieId);
        });
    ?>


        <?php if(count($movie) > 0){ ?>
        

        <?php
        $indexMovie = $movieId - 1;
        foreach ($movie as $mov) { ?>
            <h1 class="titileMovies"><?php echo $mov['title']; ?></h1>
            <div class="row mt-5 ml-4 mr-1 movie">
                <div class="col-sm-4 col-md-4 col-xl-4">
                    <img class=" card-img-top " src="<?php echo $mov['posterUrl']; ?>" alt="movie" style="width: 100%;">
                </div>
                <div class="col-sm-8 col-md-8 col-xl-8">
                    <h2><?php echo $mov['year']; ?></h2>
                    <p>
                        <?php echo $mov['plot']; ?>
                    </p>
                    <?php echo  '<b>'. 'Directed by : '. '</b>'. $mov['director']; ?>
                    <p><b>Actors :</b></p>
                    <ul>
                        <?php
                        $string = $mov['actors'];
                        $explode = explode(',', $string);
                        foreach ($explode  as $actor) {
                            echo '<li>' . $actor . '</li>';
                        }
                        ?>
                    </ul>
                    <p><b>Running time : </b><?php echo runtime_prettier($mov['runtime']) ?></p>
                    <?php
                    $value = $mov['genres'];
                    $implode = implode($value, ", ");
                    echo '<b>Genres :</b> '.  $implode
                    ?>
                </div>
            </div>
        <?php }; ?>

        <?php 
            } else {  ?>
               <?php require('includes/error.php');?>
                <?php }
        ?>
    <?php
    } else {  ?>
                <?php require('includes/error.php');?>
                <?php  }

    ?>








</div>
<?php require_once('includes/footer.php'); ?>