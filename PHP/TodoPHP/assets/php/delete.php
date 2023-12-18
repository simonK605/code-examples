<?php

include "db.php";


$id = $_GET["id"];

$query = "DELETE FROM items WHERE id='$id'";

$result = mysqli_query($mysqli, $query);

if(!$result){
    echo mysqli_error($mysqli);
}
else{
    header("Location: ../../index.php");
}