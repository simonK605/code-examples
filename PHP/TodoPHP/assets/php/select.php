<?php
include "db.php";

$query = "SELECT * FROM items";

$result = mysqli_query($mysqli, $query);

if(!$result){
    echo mysqli_error($mysqli);
}