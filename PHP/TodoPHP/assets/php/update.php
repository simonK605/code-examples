<?php
include "db.php";

$id = $_GET["id"];
$name = $_POST["name"];

$query = "UPDATE items SET name='$name' WHERE id='$id'";

$result = mysqli_query($mysqli, $query);

if(!$result){
    echo mysqli_error($mysqli);
}
else{
    header("Location: ../../index.php");
}