
<?php
    function digitToWord($digit) {
        $words = [
            0 => 'Ноль',
            1 => 'Один',
            2 => 'Два',
            3 => 'Три',
            4 => 'Четыре',
            5 => 'Пять',
            6 => 'Шесть',
            7 => 'Семь',
            8 => 'Восемь',
            9 => 'Девять'
        ];
        
        return $words[$digit]; 
        
    }
        
    $inputDigit = $_POST["inputDigit"];
    echo 'Входные данные ' . $inputDigit . "<br>";
    if ($inputDigit >= 0 && $inputDigit <= 9) {
        echo 'Выходные данные '. digitToWord($inputDigit);
    }
    else {
        echo "Невереные входные данные";
    }

    
?>

