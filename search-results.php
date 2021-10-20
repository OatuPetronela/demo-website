<?php require_once('includes/header.php'); ?>
<div class="card mt-4">
    <div class="card-body">
        <?php
        $searchword = ""; ?>
        <h1>Search results for : <?php echo $searchword ?></h1>
        <?php require('includes/search-form.php'); ?>
        <?php
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $searchword  = $_GET["search"];
        }
        if ($searchword == null) {
            echo "<h4 class='btn btn-warning mt-2'>Ati intrat in acesta pagina fara a cauta ceva!</h4><br>";
        } else if (strlen($searchword) < 3) {
            echo "<h4 class='btn btn-danger mt-2'> Intrarea este prea scurtă, trebuie sa introduceti minimum 3 caractere pentru a se putea efectua cautarea!</h4><br>";
        }
        $moviesResult = null;
        if (!empty($searchword) && strlen($searchword) > 3) {
            $movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];
            $moviesResult = array_filter($movies, function ($var) use ($searchword) {
                return find_by_title($var, $searchword);
            });
        }
        ?>
        <?php
        if (empty($moviesResult) || count($moviesResult) == 0) {
            echo "<p class='btn btn-danger mt-2'> 0 rezultate pentru acesta cautare</p> ";
        } else { ?>
            <ul>
            <?php
            foreach ($moviesResult as $movie) {
                echo '<li>' . $movie['title'] . '</li>';
            };
        }
            ?>
            </ul>
    </div>
</div>
<?php require_once('includes/footer.php'); ?>