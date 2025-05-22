CREATE TABLE users (
    `id` VARCHAR(36) NOT NULL UNIQUE,
    `name` VARCHAR(100) NOT NULL,
    `about_user` VARCHAR(400) DEFAULT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(100) NOT NULL,
    `avatar` VARCHAR(200),
    `city` VARCHAR(50),
    `registered_at` TIMESTAMP,
    PRIMARY KEY (`id`)
);

CREATE TABLE `post` (
    `id` VARCHAR(36) NOT NULL UNIQUE,
    `user_id` VARCHAR(36) NOT NULL,
    `likes` INT DEFAULT 0,
    `content` MEDIUMTEXT,
    `posted_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

CREATE TABLE `images` (
    `post_id` VARCHAR(36) NOT NULL,
    `image_path` VARCHAR(512) NOT NULL,
    PRIMARY KEY (`post_id`, `image_path`(255))
)
