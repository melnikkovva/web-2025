<?php
function getFormatTime($timestamp) {
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
function makePost($post, $user)
{
?>
    <div class="post">
        <div class="post__header">
            <img class="post__header__avatar" src=<?php echo $user['avatar'] ?> alt="Аватар">
            <span class="post__header__name"><?php echo $user['name'] ?></span>
            <img class="post__header__pen-button" src="../images/marks/edit.svg" alt="Изменить">
        </div>
        <div class="post__photo">
            <img src=<?php echo $post['pictures'][0]?> alt="Фото из поста" width="475" height="475">
        </div>
        <div class="post__likes">
            <img class="post__likes__mark-like" src="../images/marks/like.svg" alt="Лайк">
            <span class="post__likes__number"><?php echo $post['likes'] ?></span>
        </div>
        <p class="post__description"><?php echo $post['content'] ?></p>
        <p class="post__time"><?php echo getFormatTime($post['posted_at']) ?></p>
    </div>
<?php
}
?>
