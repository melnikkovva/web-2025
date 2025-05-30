<?php 
    require_once 'post.php';
    require_once '../script.php';
    
    $connection = connectDatabase();
    $users = getUsers($connection);
    $users = array_values($users);
    $posts = getPosts($connection);
    $posts = array_values($posts);
    $images = getImages($connection);
    $images = array_values($images);

    $filterByUserId = $_GET['id'] ?? null;
    $isValidUser = $filterByUserId ? in_array($filterByUserId, array_column($users, 'id')) : false;   
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Главная</title>
    <link rel="stylesheet" href="styles.css">
    <link href="../font.css" rel="stylesheet">
</head>
<body>
    <div class="content">
        <div class="side-bar">
            <div class="side-bar__icon">
                <a href="../home"><img src="../images/marks/go-home.svg" alt="Вернуться"></a>
            </div>
            <div class="side-bar__icon">
                <a href="../profile"><img src="../images/marks/my_account_active.svg" alt="Мой аккаунт"></a>
            </div>
            <div class="side-bar__icon">
                <img src="../images/marks/new-post.svg" alt="Новый пост"> 
            </div>
        </div>
        <div class="page-body">
        <?php
            foreach ($posts as $post) {
                $user_data = $users[array_search($post["user_id"], array_column($users, "id"))];

                $post_images = array_filter($images, function($img) use ($post) {
                    return $img['post_id'] == $post['id'];
                });
                
                if (!$filterByUserId || !$isValidUser || $user_data['id'] == $filterByUserId) {
                    makePost($post, $user_data, $post_images);
                }
            }
        ?>
        </div>
    </div>
    <script src="js/sliders.js"></script>
</body>
</html>