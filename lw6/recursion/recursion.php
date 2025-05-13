<?php
    $digit = $_POST["digit"]; 
    echo 'Входные данные ' . $digit . "<br>";
    function factorial($digit) {
        if ($digit == 1) {
            return 1;
        }
        else {
            return $digit * factorial($digit - 1);
        }
    } 
    echo 'Выходные данные ' . factorial($digit);
?>  