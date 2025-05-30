<?php
function makeProfile($user, array $posts) {
    // Проверяем наличие аватара
    $avatar = !empty($user['avatar']) ? $user['avatar'] : '../images/default-avatar.png';
    $about = !empty($user['about_user']) ? $user['about_user'] : 'Пользователь не добавил информацию о себе';
?>

<div class="user-information">
    <img class="user-information__avatar" src="<?= $avatar ?>" alt="Аватар">
    <p class="user-information__name"><?= $user['name'] ?></p>
    <p class="user-information__description"><?= $about ?></p>
    <div class="user-information__count-posts">
        <img class="user-information__count-posts__mark" src="../images/marks/Posts.svg" alt="Посты">
        <span class="user-information__count-posts__number"><?= count($posts) ?> постов</span>
    </div>
</div>
<div class="posts">
    <?php foreach ($posts as $post): ?>
        <?php if (!empty($post['images'][0])): ?>
            <img class="post__picture" src="<?= $post['images'][0] ?>" alt="Изображение поста">
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<?php
}