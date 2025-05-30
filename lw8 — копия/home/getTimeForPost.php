<?php
function getFormatTime($datetime) {
    // Если пришла числовая метка времени
    if (is_numeric($datetime)) {
        $timestamp = (int)$datetime;
    } 
    // Если пришла строка с датой
    else {
        $timestamp = strtotime($datetime);
        if ($timestamp === false) {
            return 'давно'; // или другое значение по умолчанию
        }
    }
    
    $now = time();
    $diff = $now - $timestamp;
    
    if ($diff < 60) {
        return 'только что';
    } elseif ($diff < 3600) {
        $mins = floor($diff / 60);
        return $mins . ' ' . getNounForm($mins, 'минуту', 'минуты', 'минут') . ' назад';
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        return $hours . ' ' . getNounForm($hours, 'час', 'часа', 'часов') . ' назад';
    } elseif ($diff < 604800) {
        $days = floor($diff / 86400);
        return $days . ' ' . getNounForm($days, 'день', 'дня', 'дней') . ' назад';
    } elseif ($diff < 2592000) {
        $weeks = floor($diff / 604800);
        return $weeks . ' ' . getNounForm($weeks, 'неделю', 'недели', 'недель') . ' назад';
    } elseif ($diff < 31536000) {
        $months = floor($diff / 2592000);
        return $months . ' ' . getNounForm($months, 'месяц', 'месяца', 'месяцев') . ' назад';
    } else {
        $years = floor($diff / 31536000);
        return $years . ' ' . getNounForm($years, 'год', 'года', 'лет') . ' назад';
    }
}

function getNounForm($number, $one, $two, $five) {
    $number = abs($number) % 100;
    if ($number > 10 && $number < 20) {
        return $five;
    }
    $number = $number % 10;
    if ($number > 1 && $number < 5) {
        return $two;
    }
    if ($number == 1) {
        return $one;
    }
    return $five;
}
?>