<?php
    function connectDatabase(): PDO
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=blog';
        $user = 'root';
        $password = '';
        return new PDO($dsn, $user, $password);
    }

    function getPosts(PDO $connection): array
    {
        $query = "SELECT * FROM posts";
        $stmt = $connection->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getImages(PDO $connection): array
    {
        $query = "SELECT * FROM images";
        $stmt = $connection->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getUsers(PDO $connection): array
    {
        $query = "SELECT * FROM users";
        $stmt = $connection->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>