<?php
    $inputDate = $_POST["inputDate"];

    function parseDate($data) {
        $date = 0;
        $month = 0;
        $year = 0;

        $separators = ['-', '.', '/', ' '];

        $russianMonths = [
            'января' => 1, 
            'февраля' => 2, 
            'марта' => 3, 
            'апреля' => 4,
            'мая' => 5, 
            'июня' => 6, 
            'июля' => 7, 
            'августа' => 8,
            'сентября' => 9, 
            'октября' => 10, 
            'ноября' => 11, 
            'декабря' => 12
        ];

        $englishMonths = [
            'january' => 1, 
            'february' => 2, 
            'march' => 3, 
            'april' => 4,
            'may' => 5, 
            'june' => 6, 
            'july' => 7, 
            'august' => 8,
            'september' => 9, 
            'october' => 10, 
            'november' => 11, 
            'december' => 12
        ];
    }


    echo 'Входные данные ' . $inputDate . "<br>";
    echo 'Выходные данные ';
    if (($month == '03' && $day >= '21') || ($month == '04' && $day <= '19')) {
        echo "Овен";
    } elseif (($month == '04' && $day >= '20') || ($month == '05' && $day <= '20')) {
        echo "Телец";
    }
    elseif (($month == '05' && $day >= '21') || ($month == '06' && $day <= '21')) {
        echo "Близнецы";
    }
    elseif (($month == '06' && $day >= '22') || ($month == '07' && $day <= '22')) {
        echo "Рак";
    }
    elseif (($month == '07' && $day >= '23') || ($month == '08' && $day <= '22')) {
        echo "Лев";
    }
    elseif (($month == '08' && $day >= '23') || ($month == '09' && $day <= '22')) {
        echo "Дева";
    }
    elseif (($month == '09' && $day >= '23') || ($month == '10' && $day <= '23')) {
        echo "Весы";
    }
    elseif (($month == '10' && $day >= '24') || ($month == '11' && $day <= '22')) {
        echo "Скорпион";
    }
    elseif (($month == '11' && $day >= '23') || ($month == '12' && $day <= '21')) {
        echo "Стрелец";
    }
    elseif (($month == '12' && $day >= '22') || ($month == '01' && $day <= '20')) {
        echo "Козерог";
    }   
    elseif (($month == '01' && $day >= '21') || ($month == '02' && $day <= '18')) {
        echo "Водолей";
    }
    elseif (($month == '02' && $day >= '19') || ($month == '03' && $day <= '20')) {
        echo "Рыбы";
    } 
    else {
        echo "Неверные данные";
    }
?>
