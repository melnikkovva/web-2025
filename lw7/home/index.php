<?php
    $users_json = file_get_contents("../data/users.json", true);
    $users = json_decode($users_json, true);
    $posts_json = file_get_contents("../data/posts.json", true);
    $posts = json_decode($posts_json, true);
?>

<!-- image-home - side-bar__home
menu-of-home - side-bar
image-my-account - side-bar__my-account
image-of-new-post - side-bar__new-post
lenta - page-body  -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Главная</title>
    <link rel="stylesheet" href="style.css">
    <link href="../font.css" rel="stylesheet">
</head>
<body>
    <div class="content">
        <div class="side-bar">
            <div class="side-bar__mark"> 
                <img src="../images/marks/go-home-active.svg" alt="Вернуться">
            </div>
            <div class="side-bar__mark">
                <img src="../images/marks/my_account.svg" alt="Мой аккаунт">
            </div>
            <div class="side-bar__mark">
                <img src="../images/marks/new-post.svg" alt="Новый пост"> 
            </div>
        </div>
        <div class="page-body">
            <?php
                require_once 'post.php';
                foreach ($posts as $post) {
                    $user_id = array_search($post["user_id"], array_column($users, "id"));
                    $user= $users[$user_id];
                    makePost($post, $user);
                }
            ?>
        </div>
    </div>
</body>
</html>