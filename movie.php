<div class="movie w-100">
    <?php require_once('includes/header.php'); ?>
    <?php
    $movieId = @$_GET["movie_id"];
    if ($movieId != null) {
        $movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];
        $movie = array_filter($movies, function ($var) use ($movieId) {
            return find_by_id($var, $movieId);
     });
    ?> 
    <?php
    if (count($movie) > 0) { ?> 
    <?php
    $indexMovie = $movieId - 1;
    foreach ($movie as $mov) { ?>
        <?php
            $file_movie_favorites = 'assets/movie-favorites.json' ;
            $all_movies_favorites = (array)json_decode(file_get_contents( 'assets/movie-favorites.json' ));
                   
            if(isset($_COOKIE['fav_movies'])){ 
                $fav_movies = (array)json_decode($_COOKIE['fav_movies']); 
            }else{
                $fav_movies = array(); 
            }
            if(isset($_POST['favorit'])){  
                if($_POST['favorit'] ==='1'){ 
                    if(!in_array($mov["id"],$fav_movies)){ 
                       $fav_movies[] = $mov["id"]; 
                       setcookie('fav_movies', json_encode($fav_movies), time()+60*60*24*365);
                    if(array_key_exists($mov["id"],$all_movies_favorites)){
                        $all_movies_favorites[$mov["id"]]++;
                    }else{
                        $all_movies_favorites[$mov["id"]] = 1;
                    }
                    file_put_contents( $file_movie_favorites, json_encode($all_movies_favorites) );
                }
                }elseif($_POST['favorit'] ==='0'){ 
                    if(($key=array_search($mov["id"],$fav_movies)) !==false){ 
                        unset($fav_movies[$key]);
                        setcookie('fav_movies', json_encode($fav_movies), time()+60*60*24*365);
                    if(array_key_exists($mov["id"],$all_movies_favorites) && $all_movies_favorites[$mov["id"]] > 0 ){
                        $all_movies_favorites[$mov["id"]]--;
                    }else{
                        $all_movies_favorites[$mov["id"]] = 1;
                        }
                    file_put_contents( $file_movie_favorites, json_encode($all_movies_favorites) );
                    }
                }
            }
    ?>
    <div class="row  ml-4 mr-1 movie">
        <div class="col-sm-8">
            <h1><?php echo $mov['title']; ?></h1>
        </div>
        <div class="col-md-4">
            <form action="" method="POST">
                <input type="hidden" name="favorit" value="<?php if(in_array($mov['id'],$fav_movies)){ echo '0';}else{ echo '1';}?>">
                <input type="submit" value="<?php if(in_array($mov['id'],$fav_movies)){ echo 'Sterge de la favorite';}else{ echo 'Adauga la favorite';}?>" class="btn mt-2 <?php if(in_array($mov['id'],$fav_movies)){ echo 'btn-danger';}else{ echo 'btn-primary';}?>">
                <?php (isset($all_movies_favorites[$mov["id"]])) ? $all_movies_favorites[$mov["id"]] : 0?>
            </form>
        </div>
        <div class="col-sm-4 col-md-4 col-xl-4">
            <img class=" card-img-top " src="<?php echo $mov['posterUrl']; ?>" alt="movie" style="width: 100%;">
        </div>
        <div class="col-sm-8 col-md-8 col-xl-8">
            <h2><?php echo $mov['year']; ?><?php echo check_old_movie($mov["year"]); ?></h2>
            <p><?php echo $mov['plot']; ?></p>
            <?php echo  '<b>' . 'Directed by : ' . '</b>' . $mov['director']; ?>
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
                    $implode = implode(", ", $value);
                    echo '<b>Genres :</b> ' .  $implode
                ?><br>
        </div>
    </div>
    <?php }; ?>

        <?php
        } else {  ?>
            <?php require('includes/error.php'); ?>
        <?php }
        ?>
    <?php
    } else {  ?>
        <?php require('includes/error.php'); ?>
    <?php  }
    ?>
<?php require_once('includes/footer.php'); ?>
</div>