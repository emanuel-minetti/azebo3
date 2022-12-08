<?php

namespace controller;
use PDO;

class IndexController {
    public function indexAction(): void {
        $url = $_REQUEST['url'];
        echo "Hallo von der API!";
        echo "<br/>Die URL war '$url'";

        $config = require __DIR__ . '/../../config/config.php';
        $dbConfig = $config['db'];
        $host = $dbConfig['host'];
        $dbName = $dbConfig['database'];
        $user = $dbConfig['user'];
        $pw = $dbConfig['pw'];
        $dbh = new PDO("mysql:host=$host;dbname=$dbName", $user, $pw);
        $stm = $dbh->query('SELECT name FROM user WHERE id = 1');
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        $name = $res['name'];
        echo "<br/>Dein Name ist: '$name'";
        die();
    }
}