<?php

namespace controller;
use PDO;

class IndexController {
    public function indexAction(): void {
        $url = $_REQUEST['url'];
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
        $data = [
            'text' => 'Hallo von der API!',
            'url' => $url,
            'name' => $name,
        ];
        header('Content-type: application/json');
        echo json_encode($data);
    }
}