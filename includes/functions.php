
<?php
function runtime_prettier($movieLengthInMinutes = 0)
{

    $hours = floor($movieLengthInMinutes / 60);
    $minutes = $movieLengthInMinutes % 60;
    return $hours . " " . (($hours == 1) ? 'hour ' : 'hours') . " " . $minutes . " " . (($minutes == 1) ? 'minute  ' : 'minutes');
};

function check_old_movie($yearAppearance)
{
    $year = date("Y") - $yearAppearance;
    if ($year <= 40) {
        return "False";
    } else {
        return  $year;
    }
};

function find_by_id($var, $movieId)
{
    return $var['id'] == $movieId;
}
function find_by_title($var,  $searchword)
{
    return strpos($var['title'], $searchword) !== false;
}



?>

