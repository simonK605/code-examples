<?php
include "db.php";

$name = $_POST["name"];

if(!$name){
    header("Location: ../../index.php");
    exit();
}

$query = "INSERT INTO items (name, done) VALUES ('$name', '1')";

$result = mysqli_query($mysqli, $query);

if(!$result){
    echo mysqli_error($mysqli);
    echo "eerer";
}
else{
    header("Location: ../../index.php");
}