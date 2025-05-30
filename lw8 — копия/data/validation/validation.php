<?php

function validateLength(string $value, int $min, int $max): bool {
    $length = mb_strlen($value, 'UTF-8');
    return ($length >= $min && $length <= $max);
}

function validateTimestamp($timestamp): bool {
    return is_numeric($timestamp) 
           && $timestamp > 0 
           && $timestamp <= time(); // Не может быть в будущем
}

function validateId($id): bool {
    return is_numeric($id) && $id > 0;
}

function validateArray($array): bool {
    return is_array($array) && !empty($array);
}

function validateUser(array $user): bool {
    // Обязательные поля
    $requiredFields = ['id', 'name', 'email', 'avatar', 'registered_at'];
    foreach ($requiredFields as $field) {
        if (!isset($user[$field])) {
            return false;
        }
    }

    // Проверка типов и форматов
    return validateId($user['id'])
           && validateLength($user['name'], 2, 50)
           && filter_var($user['email'], FILTER_VALIDATE_EMAIL)
           && validateTimestamp($user['registered_at']);
}

function validatePost(array $post): bool {
    // Обязательные поля
    $requiredFields = ['id', 'user_id', 'content', 'likes', 'posted_at'];
    foreach ($requiredFields as $field) {
        if (!isset($post[$field])) {
            return false;
        }
    }

    // Проверка типов и форматов
    return validateId($post['user_id'])
           && validateLength($post['content'], 1, 1000)
           && is_numeric($post['likes'])
           && validateTimestamp($post['posted_at']);
}