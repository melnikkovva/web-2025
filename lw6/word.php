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

$inputDigit = readline();

if (is_numeric($input) && $input >= 0 && $input <= 9) {
    $word = digitToWord((int)$input);
    echo "Слово для цифры $input: $word\n";
} else {
    echo "Ошибка: введите корректную цифру от 0 до 9.\n";
}
?>
