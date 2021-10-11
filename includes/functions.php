
<?php
function runtime_prettier($movieLengthInMinutes){
    $hours = floor($movieLengthInMinutes / 60);
    $minutes = $movieLengthInMinutes % 60;
    echo $hours . " hours " . $minutes . " minutes" ;
}

function check_old_movie( $yearAppearance){
    $year = date("Y") - $yearAppearance;
    if ($year<= 40){
        return "False";
    }else{
        return  $year;
    }
};

?>

