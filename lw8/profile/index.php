<?php
require_once 'profile.php';
require_once '../script.php';

$connection = connectDatabase();
$users = getUsers($connection);
$users = array_values($users);
$posts = getPosts($connection);
$posts = array_values($posts);
$images = getImages($connection);
$images = array_values($images);

$filterByUserId = $_GET['id'] ?? null;

// Находим пользователя по ID
$user_data = null;
foreach ($users as $user) {
    if ($user['id'] == $filterByUserId) {
        $user_data = $user;
        break;
    }
}

if (!$user_data) {
    die("Пользователь не найден"); 
}

// Собираем посты пользователя
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