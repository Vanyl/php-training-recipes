<?php

try {
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8', MYSQL_HOST, MYSQL_DB_NAME, MYSQL_PORT),
        MYSQL_USERNAME,
        MYSQL_PASSWORD,
    );
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage());
}