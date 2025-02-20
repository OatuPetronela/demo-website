<div class="movie w-100">
    <?php require_once('includes/header.php'); ?>
    <?php
        $movieId = @$_GET["movie_id"];
        if ($movieId != null) {
            $movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];
            $movie = array_filter($movies, function ($var) use ($movieId) {
                return find_by_id($var, $movieId);
        });
        if (count($movie) > 0) { ?> 
    <?php
        $indexMovie = $movieId - 1;
        foreach ($movie as $mov) { 
    ?>
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
        <div class="container">
    <?php 


        if(isset($_POST['submit_form'])){
            $name= $_POST['name'];
            $email= $_POST['email'];
            $message= $_POST['message'];
            $hide = 1;
        }
        $table_create = "CREATE TABLE IF NOT EXISTS reviews(
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          movie_id INT(10),
          name VARCHAR(30) NOT NULL,
          email VARCHAR(50) NOT NULL,
          message VARCHAR(255) NOT NULL
        )";
        mysqli_query($conect, $table_create) ;
        if(isset($_POST['submit_form'])){
           $name = $_POST['name'];
           $email = $_POST['email'];
           $message = $_POST['message'];
           $movie_id = $movieId;

           $verf_email = "SELECT * FROM reviews WHERE movie_id = '$movie_id'  AND email = '$email'";
           $verfEmailQuery = mysqli_query($conect, $verf_email);
           $totalReviews = mysqli_num_rows($verfEmailQuery);

           if($totalReviews == 0){
                $insert_table = "INSERT INTO reviews(movie_id, name, email, message)VALUES ('$movie_id', '$name','$email', '$message')";
                if(mysqli_query($conect , $insert_table)){
                    echo '<div class="alert alert-success mt-5" role="alert">
                    Mesajul a fost trimis cu succes!</div>';
                }else{
                    echo "Please try again" . mysqli_error($conect);
                }
           }else{
               echo '<div class="alert alert-danger mt-5" role="alert">
               Se pare că ai mai lăsat un revriew pentru acest film. Nu poți să lași mai multe review-uri pentru același film!</div>';
           }  
       }
    ?>
    <?php if(!isset($hide)){ ?>
        <form action="" method="POST" class="mt-5 ml-3"> 
            <h5 class="text-center">REVIEW  MOVIE<h5>
                <label for="name">Name*</label>      
                <input type="text" name="name" placeholder="Name" required>    
                <label for="email">Email*</label>    
                <input  type="email"  name="email" placeholder="Email" class="email" required>   <br> 
                <label for="message">Message</label>      
                <textarea  name="message" placeholder="Write something.." style="height:200px" required></textarea>    
                <input class="checkbox_gdpr" type="checkbox"  name="gdpr" required> <span><b>Sunt de acord cu procesarea datelor cu caracter personal. </b></span>
                <input type="submit" name='submit_form' value="Submit" class="btn_review">  
        </form>
    <?php  }?>
    <?php 
        $movie_id =$movieId;
        $query_fetch = mysqli_query($conect,"SELECT * FROM reviews WHERE  movie_id = '$movie_id'");
        $reviews = array();
        while($r = mysqli_fetch_array($query_fetch)){
            $reviews[] = $r;
        };?>
    <?php 
        if( $reviews != null && count( $reviews) > 0){ ?>
            <?php foreach( $reviews as $review) {
               ?>
                <div class="card mt-3" >
                    <div class="card-header">
                        <?php echo $review['name']?>
                    </div>
                    <div class="card-body">
                         <?php echo $review['message']?>
                    </div>
                </div>
            <?php } ?>
        <?php }else { ?>
            <div class="card"><div class="card-body text-center">Fi primul care scrie in review !</div></div>
        <?php } ?>
            </div>
        </div>
    </div>
<?php }; ?>
    <?php
        } else {  ?>
            <?php require('includes/error.php'); ?>
    <?php }?>
<?php
    } else {  ?>
        <?php require('includes/error.php'); ?>
    <?php  }
?>
<?php require_once('includes/footer.php'); ?>
</div>