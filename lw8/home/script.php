<?php
    function connectDatabase(): PDO
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=blog';
        $user = '';
        $password = '';
        return new PDO($dsn, $user, $password);
    }
    function getPosts(): ?array
    {
        //подключились к базе данных, 
        $database = connectDatabase();
        // сделали запрос для получения постов в формате json, 
        $posts_json = $database->query("SELECT * FROM post");
        // обработали и получили массив постов
        $posts = $posts_json->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
    function getUsers(): ?array
    {
        return connectDatabase()->query("SELECT * FROM user")->fetchAll(PDO::FETCH_ASSOC);
    }
?>