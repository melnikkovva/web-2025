<?php
function makeProfile(array $posts, $user) {
?>

<div class="user-information">
    <img class="user-information__avatar" src=<?php echo $user['avatar'] ?> alt="Аватар">
    <p class="user-information__name"><?php echo $user['name'] ?></p>
    <p class="user-information__description"><?php echo $user['about_user'] ?></p>
    <div class="user-information__count-posts">
        <img class="user-information__count-posts__mark" src="../images/marks/Posts.svg" alt="Посты">
        <span class="user-information__count-posts__number"><?php echo count($posts) ?> постов </span>
    </div>
</div>
<div class="posts">
    <?php
        foreach ($posts as $post) {
            ?>
            <img class="post__picture" src=<?php echo $post['pictures'][0];?> alt="изображение">
            <?php
        }
    ?>
</div>

<?php
}
?>