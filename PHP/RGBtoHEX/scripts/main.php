<?php
$red = htmlspecialchars($_POST["red"]);
$green = htmlspecialchars($_POST["green"]);
$blue = htmlspecialchars($_POST["blue"]);

if (!$red) $red = 0;
if (!$green) $green = 0;
if (!$blue) $blue = 0;

if ($red < 16 && $green < 16 && $blue < 16) trim(printf('#0%X0%X0%X', $red, $green, $blue));
elseif ($red < 16 && $green < 16) trim(printf("#0%X0%X%X", $red, $green, $blue));
elseif ($red < 16 && $blue < 16) trim(printf("#0%X%X0%X", $red, $green, $blue));
elseif ($green < 16 && $blue < 16) trim(printf("#%X0%X0%X", $red, $green, $blue));
elseif ($red < 16) trim(printf("#0%X%X%X", $red, $green, $blue));
elseif ($green < 16) trim(printf("#%X0%X%X", $red, $green, $blue));
elseif ($blue < 16) trim(printf("#%X%X0%X", $red, $green, $blue));
else trim(printf("#%X%X%X", $red, $green, $blue));