<?php
require_once 'getTimeForPost.php';

function makePost($post, $user, $images) {
    $posted_at = getFormatTime($post['posted_at']);
    
    // Обработка аватара пользователя
    $user_avatar = !empty($user['avatar']) ? $user['avatar'] : '../images/default-avatar.png';
?>

<div class="post">
    <div class="post__header">
        <img class="post__header__avatar" src="<?php echo $user_avatar; ?>" alt="Аватар">
        <a class="post__header__name" href="../profile?id=<?php echo $user['id']; ?>">                
            <span><?php echo $user['name']; ?></span>
        </a>
        <img class="post__header__pen-button" src="../images/marks/edit.svg" alt="Изменить">
    </div>
        
    <?php if (!empty($images)): ?>
    <div class="post-image">
        <img class="post-image__image" src="<?php echo $images[0]['image_path']; ?>" alt="Фото из поста">
    </div>
    <?php endif; ?>
        
    <div class="post__likes">
        <img class="post__likes__mark-like" src="../images/marks/like.svg" alt="Лайк">
        <span class="post__likes__number"><?php echo $post['likes']; ?></span>
    </div>
    <p class="post__description"><?php echo $post['content']; ?></p>
    <p class="post__time"><?php echo $posted_at; ?></p>
</div>

<?php
}
?>