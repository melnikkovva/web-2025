CREATE TABLE users (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `about_user` VARCHAR(400) DEFAULT NULL,
    `email` VARCHAR(254) NOT NULL UNIQUE,
    `password` VARCHAR(64) NOT NULL,
    `avatar` VARCHAR(200)
);

CREATE TABLE `posts` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `likes` INT DEFAULT 0,
    `content` MEDIUMTEXT,
    `posted_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `images` (
    `post_id` INT NOT NULL,
    `image_path` VARCHAR(512) NOT NULL,
    PRIMARY KEY (`post_id`, `image_path`)
);
