<?php
    require_once '../data/validation/validation.php';

    $users_json = file_get_contents("../data/users.json", true);
    $users = json_decode($users_json, true);
    $posts_json = file_get_contents("../data/posts.json", true);
    $posts = json_decode($posts_json, true);

    $id = isset($_GET['id']) ? $_GET['id'] : "d7c47315-9eb4-41e8-b5f4-745c260fcd2d";

    $user_data = null;
    foreach ($users as $user) {
        if ((string)$user['id'] === (string)$id && validateUser($user)) {
            $user_data = $user;
        }
    }
    if (!$user_data) {
        exit("Error");
    }
    $id = $user_data['id'];
    $user_posts = array_filter($posts, function ($post) use ($id) {
        return $post['user_id'] == $id;
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