

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
                <a href="../home"><img src="../images/marks/go-home.svg" alt="Вернуться"></a>
            </div>
            <div class="side-bar__mark">
                <a href="../profile"><img src="../images/marks/my_account_active.svg" alt="Мой аккаунт"></a>
            </div>
            <div class="side-bar__mark">
                <img src="../images/marks/new-post.svg" alt="Новый пост"> 
            </div>
        </div>
        <div class="page-body">
        <?php
            require_once 'post.php';
            require_once 'script.php';
            
            $users = getUsers();
            $users = array_values($users);
            $posts = getPosts();
            $posts = array_values($posts);

            foreach ($posts as $post) {
                $user_data = $users[array_search($post["user_id"], array_column($users, "user_id"))];
                if (isset($_GET['user_id'])) {
                    $userId = 1;
                    if (is_numeric($_GET['user_id'])) {
                        $userId = $_GET['user_id'];
                    }
                    if ($user_data['user_id'] == $userId) {
                        renderPost($post, $user_data);
                    }
                } else {
                    renderPost($post, $user_data);
                }
            }
            ?>
        </div>
    </div>
</body>
</html>