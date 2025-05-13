<?php
    $year = $_POST["year"];
    echo 'Входные данные ' . $year . "<br>";
    echo 'Выходные данные ';
    if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
        echo 'YES';
    } else {
        echo 'NO';
    }
?>