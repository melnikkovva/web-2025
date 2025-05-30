<?php
    require_once '../data/validation/validation.php';

    $users = json_decode(file_get_contents("../data/users.json"), true);
    $posts = json_decode(file_get_contents("../data/posts.json"), true);

    foreach ($users as $user) {
        if (!validateUser($user)) {
            exit("Некорректные данные пользователя");
        }
    }

    foreach ($posts as $post) {
        if (!validatePost($post)) {
            exit("Некорректные данные поста");
        }
    }

    function findUserById($users, $id) {
        foreach ($users as $user) {
            if ((int)$user['id'] === (int)$id) {
                return $user;
            }
        }
        return null;
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Главная</title>
    <link rel="stylesheet" href="styles.css">
    <link href="../font.css" rel="stylesheet">
</head>
<body>
    <div class="main-page">
        <div class="side-bar">
            <div class="side-bar__icon">
                <a href="../home"><img src="../images/marks/go-home.svg" alt="Главная"></a>
            </div>
            <div class="side-bar__icon">
                <a href="../profile"><img src="../images/marks/my_account_active.svg" alt="Профиль"></a>
            </div>
            <div class="side-bar__icon">
                <img src="../images/marks/new-post.svg" alt="Новый пост">
            </div>
        </div>
        <div class="feed">
            <?php
            require_once 'post.php';
            foreach ($posts as $post) {
                $user = findUserById($users, $post['user_id']);
                if ($user) {
                    makePost($post, $user);
                }
            }
            ?>
        </div>
    </div>
    <script src="js/slider.js"></script>
</body>
</html>