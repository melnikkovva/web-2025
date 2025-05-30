<?php
require_once '../data/validation/validation.php';
require_once 'profile.php';
require_once '../script.php';

// Подключение к базе данных
$connection = connectDatabase();

// Получаем данные из БД
$users = getUsers($connection);
$posts = getPosts($connection);
$images = getImages($connection);

// Обработка параметра id
$filterByUserId = $_GET['id'] ?? null;

// Проверяем существование пользователя
$user_data = null;
foreach ($users as $user) {
    if ($user['id'] == $filterByUserId && validateUser($user)) {
        $user_data = $user;
        break;
    }
}

// Если пользователь не найден - берем первого или показываем ошибку
if (!$user_data) {
    if (!empty($users)) {
        $user_data = $users[0];
    } else {
        die("Нет пользователей в базе данных");
    }
}

// Фильтруем посты пользователя и добавляем изображения
$user_posts = [];
foreach ($posts as $post) {
    if ($post['user_id'] == $user_data['id']) {
        $post_images = [];
        foreach ($images as $image) {
            if ($image['post_id'] == $post['id']) {
                $post_images[] = $image['image_path'];
            }
        }
        $post['images'] = $post_images;
        $user_posts[] = $post;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Профиль</title>
    <link rel="stylesheet" href="style.css">
    <link href="../font.css" rel="stylesheet">
</head>
<body>
    <div class="page">
        <div class="side-bar">
            <div class="side-bar__mark">
                <a href="../home"><img src="../images/marks/go-home.svg" alt="Вернуться"></a>
            </div>
            <div class="side-bar__mark">
                <a href="../profile"><img src="../images/marks/my_account_active.svg" alt="Мой аккаунт"></a>
            </div>
            <div class="side-bar__mark">
                <img src="../images/marks/new-post.svg" alt="Новый пост"> 
            </div>
        </div>
        <div class="profile">
            <?php makeProfile($user_data, $user_posts); ?>  
        </div>
    </div>
</body>
</html>