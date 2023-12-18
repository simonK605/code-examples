<?php

include "db.php";

$id = $_GET["id"];
$done = $_GET["done"];

if($done == 1){
    $done = "2";
}
else if($done == 2){
    $done = "1";
}

$query = "UPDATE items SET done='$done' WHERE id='$id'";


$result = mysqli_query($mysqli, $query);

if(!$result){
    echo mysqli_error($mysqli);
}
else{
    header("Location: ../../index.php");
}