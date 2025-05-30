<?php
    function validateLength(string $value, int $min, int $max): bool {
        $length = strlen($value);
        return ($length >= $min && $length <= $max);
    }

    function validateTimestamp($timestamp): bool {
        return is_numeric($timestamp) && ($timestamp > 0) && ($timestamp <= time());
    }

    function validateUser(array $user): bool {
        $requiredFields = ['id', 'name', 'email', 'password', 'avatar', 'about_user'];
        foreach ($requiredFields as $field) {
            if (!isset($user[$field])) {
                return false;
            }
        }
        return is_numeric($user['id']) && validateLength($user['name'], 2, 50) && filter_var($user['email'], FILTER_VALIDATE_EMAIL);
    }

    function validatePost(array $post): bool {
        $requiredFields = ['id', 'user_id', 'content', 'likes', 'posted_at', 'pictures'];
        foreach ($requiredFields as $field) {
            if (!isset($post[$field])) {
                return false;
            }
        }
        return is_numeric($post['id']) 
                && is_numeric($post['user_id'])
                && validateLength($post['content'], 0, 1000)
                && is_numeric($post['likes'])
                && validateTimestamp($post['posted_at'])
                && is_array($post['pictures']);
    }
?>