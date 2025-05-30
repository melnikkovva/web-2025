<?php
require_once '../data/validation/validation.php';

$users = json_decode(file_get_contents("../data/users.json"), true);
$posts = json_decode(file_get_contents("../data/posts.json"), true);

foreach ($users as $user) {
    if (!validateUser($user)) {
        exit("Некорректные данные");
    }
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$user_data = null;
foreach ($users as $user) {
    if ((int)$user['id'] === $id) {
        $user_data = $user;
        break;
    }
}

if (!$user_data) {
    exit("Пользователь не найден");;
}

$user_posts = array_filter($posts, function($post) use ($id) {
    return (int)$post['user_id'] === $id;
});
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Профиль</title>
    <link rel="stylesheet" href="styles.css">
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
            <?php
                require_once 'profile.php';
                makeProfile($user_posts, $user_data);
            ?>  
        </div>
    </div>
</body>
</html>