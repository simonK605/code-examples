<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RGB to HEX</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="app">
        <h1 class="app__title">RGB to HEX converter</h1>
        <form class="form" action="index.php" method="POST">
            <div class="form__inp_cont">
                <label class="form__label form__label_red" for="red">RED</label>
                <input class="inp" type="number" name="red">
            </div>
            <div class="form__inp_cont">
                <label class="form__label form__label_green" for="green">GREEN</label>
                <input class="inp" type="number" name="green">
            </div>
            <div class="form__inp_cont">
                <label class="form__label form__label_blue" for="blue">BLUE</label>
                <input class="inp" type="number" name="blue">
            </div>
            <div class="form__submit">
                <button class="btn">convert</button>
            </div>
        </form>
        <div class="color__info">
            <h2 class="info"><?php require_once "./scripts/main.php" ?></h2>
            <div class='color__block'></div>
        </div>
    </div>

    <script src="scripts/main.js"></script>
</body>

</html>