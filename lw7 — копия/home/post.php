<?php
    require_once 'getTimeForPost.php';

    function makePost($post, $user) {
?>
    <div class="post">
        <div class="post__header">
            <img class="post__header__avatar" src="<?= $user['avatar'] ?>" alt="Аватар">
            <a class="post__header__name" href="../profile?id=<?= $user['id'] ?>">                
                <span><?= $user['name'] ?></span>
            </a>
        </div>
        
        <?php if (!empty($post['pictures'])): ?>
        <div class="post-images-slider">
            <div class="slider-container">
                <?php foreach ($post['pictures'] as $picture): ?>
                <div class="slider-item">
                    <img src="<?= $picture ?>" alt="Фото из поста">
                </div>
                <?php endforeach; ?>
            </div>
            
            <?php if (count($post['pictures']) > 1): ?>
            <div class="slider-controls">
                <button class="slider-prev">‹</button>
                <span class="slider-counter">1/<?= count($post['pictures']) ?></span>
                <button class="slider-next">›</button>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <div class="post__likes">
            <img class="post__likes__mark-like" src="../images/marks/like.svg" alt="Лайк">
            <span class="post__likes__number"><?= $post['likes'] ?></span>
        </div>
        <p class="post__description"><?= $post['content'] ?></p>
        <p class="post__time"><?= getFormatTime($post['posted_at']) ?></p>
    </div>
<?php
}
?>