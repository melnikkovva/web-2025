<?php

const DB_HOST = '127.0.0.0'
const DB_NAME = 'blog';
const DB_USER = 'root';
CONST DB_PASSWORD = '';

function connectionToDatabase(): PDO {
    $dsn = 'mysql:host=' .DB_HOST . ';dbname=' . DB_NAME;
    return new PD0($dsn , username )
}