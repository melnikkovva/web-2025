<?php
require_once 'getTimeForPost.php';

function makePost($post, $user) {
?>
    <div class="post">
        <div class="post__header">
            <img class="post__header__avatar" src="<?php echo ($user['avatar']); ?>" alt="Аватар">
            <span class="post__header__name"><?php echo ($user['name']); ?></span>
            <img class="post__header__pen-button" src="../images/marks/edit.svg" alt="Изменить">
        </div>
        <div class="post__photo">
            <img src="<?php echo ($post['pictures'][0]); ?>" alt="Фото из поста" width="475" height="475">
        </div>
        <div class="post__likes">
            <img class="post__likes__mark-like" src="../images/marks/like.svg" alt="Лайк">
            <span class="post__likes__number"><?php echo ($post['likes']); ?></span>
        </div>
        <p class="post__description"><?php echo ($post['content']); ?></p>
        <p class="post__time"><?php echo ($post['posted_at']); ?></p>
    </div>
<?php
}
?>