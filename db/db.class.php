<?php

class DB
{
    public static function connect()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '1234';
        $base = 'api';

        try {
            $pdo = new PDO("mysql:host=$host;charset=utf8", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$base` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

            return new PDO("mysql:host=$host;dbname=$base;charset=utf8", $user, $pass);
        } catch (PDOException $e) {
            die('Erro na conexão: ' . $e->getMessage());
        }
    }
}
