<?php
require_once 'getTimeForPost.php';

/**
 * Создает HTML-разметку для поста со слайдером изображений
 * 
 * @param array $post Данные поста
 * @param array $user Данные пользователя
 * @param array $images Массив изображений поста
 */
function makePost(array $post, array $user, array $images): void
{
    $posted_at = getFormatTime($post['posted_at']);
    ?>
    <div class="post">
        <div class="post__header">
            <img class="post__header__avatar" src="<?php echo $user['avatar']; ?>" alt="Аватар пользователя <?php echo $user['name']; ?>">  
            <a class="post__header__name" href="../profile?id=<?php echo $user['id']; ?>">
                <span><?php echo $user['name']; ?></span>
            </a>
            
            <img class="post__header__pen-button" src="../images/marks/edit.svg" alt="Изменить пост">
        </div>

        <?php if (!empty($images)): ?>
            <div class="post-images-slider">
                <div class="slider-container">
                    <div class="slider-track">
                        <?php foreach ($images as $image): ?>
                            <div class="slider-item">
                                <img class="post-images-slider__image" src="<?php echo $image['image_path']; ?>" alt="Фото из поста <?php echo $user['name']; ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <?php if (count($images) > 1): ?>
                    <div class="slider-controls">
                        <button type="button" class="slider-prev" > ‹ </button>
                        <button type="button" class="slider-next" > › </button>
                        <span class="slider-counter"> 1/<?php echo count($images); ?> </span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="post__likes">
            <img class="post__likes__mark-like" src="../images/marks/like.svg" alt="Количество лайков">
            <span class="post__likes__number">
                <?php echo $post['likes']; ?>
            </span>
        </div>
        
        <p class="post__description">
            <?php echo $post['content']; ?>
        </p>
        
        <p class="post__time">
            <?php echo $posted_at; ?>
        </p>
    </div>
    <?php
}
?>