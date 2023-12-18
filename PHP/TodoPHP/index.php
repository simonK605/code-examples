<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php
    include "./assets/php/db.php";
        $name = "";

        if(isset($_GET["id"])){
            $query = 'SELECT * FROM items WHERE id = ' . $_GET["id"];
            $result = mysqli_query($mysqli, $query);

            $row = mysqli_fetch_assoc($result);
            $id = $row["id"];
            $name = $row["name"];
        }
    ?>
    <div class="app">
        <div class="wrapper">
            <div class="todo">
                <h1 class="title">todo list</h1>
                <form class="todo__add"
                action="./assets/php/<?php if($_GET["id"]){echo "update.php?id=".$row['id'];}else{echo 'insert.php';} ?>"
                method="POST">
                    <input class="input__add" type="text" name="name" placeholder="add task" value="<?php echo $name ?>">
                    <button class="btn__add">+</button>
                </form>

                <div class="items">
                    <?php include "./assets/php/select.php";
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="item">
                            <h2 class="item__name <?php if($row["done"]==2){echo 'line__through';} ?>">
                                <a href="./assets/php/done.php?id=<?php echo $row["id"] ?>&done=<?php echo $row["done"] ?>">
                                    <?php echo $row["name"] ?>
                                </a>
                            </h2>
                            <div class="item__panel">
                                <a href="?id=<?php echo $row["id"] ?>">
                                    <button class="item__btn">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </a>
                                <a href="./assets/php/delete.php?id=<?php echo $row["id"] ?>">
                                    <button class="item__btn">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>