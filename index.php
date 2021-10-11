
<?php require_once('includes/header.php');?>
        <div  class="welcome">
        <?php  
        date_default_timezone_set("Europe/Bucharest");
        $date = date('F d, Y H:i');

        $hour = date('H', time());
         if ($hour > 6 && $hour <= 11){
            echo "Good Morning!";
         }else if ($hour > 11 && $hour <= 16) {
            echo "Good Afternoon!";
         }else if ($hour >16 && $hour <= 23){
            echo "Good Evening!";
         }else{
            echo  "Good Night!";
         };
         ?>
            <h1>Welcome To Watch Movies!</h1>
       </div>
        <br>
        <a href="http://oatu-petronela.local/demo/movies.php" id="button" role="button">Get started</a>
        
        <?php require_once('includes/footer.php');?>
