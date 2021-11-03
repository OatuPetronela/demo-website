
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
        return false;
    } else {
        return '<span class="badge bg-warning text-dark ml-2 mt-3">' . 'Old movie: ' . $year. ' years' .  '</span>';
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

function conectDB($host='localhost', $username='php-user', $password='php-password',$dbname='php-proiect'){
    return mysqli_connect($host, $username, $password, $dbname );
}
$conect = conectDB();
?>
