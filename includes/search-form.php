<?php
$searchresult = "";
if (isset($_GET["search"])) {
        $searchresult  = $_GET["search"];
}
?>
<form action="/demo/search-results.php?search=" method="get" class="form-inline my-2 my-lg-0">
        <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" value="<?php echo $searchresult ?>">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>