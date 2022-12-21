<?php

namespace controller;

use PDO;

class BaseController {
    private PDO $dataBaseHandler;

    protected function getDBConnection(): PDO {
        if (!isset($this->dataBaseHandler)) {
            $config = require __DIR__ . '/../../config/config.php';
            $dbConfig = $config['db'];
            $host = $dbConfig['host'];
            $dbName = $dbConfig['database'];
            $user = $dbConfig['user'];
            $pw = $dbConfig['pw'];
            $this->dataBaseHandler = new PDO("mysql:host=$host;dbname=$dbName", $user, $pw);
        }
        return $this->dataBaseHandler;
    }

    protected function sendError($code = 1, $msg = '', $httpCode = 200): void {
        $data = [
            'error' => $code,
        ];
        if ($msg !== '') {
            $data['message'] = $msg;
        }
        if ($httpCode !== 200) {
            http_response_code($httpCode);
        }
        $this->send($data);
    }

    protected function send(array $data): void {
        if (!(isset($data['error']) && $data['error'] !== 0)) {
            $data['error'] = 0;
        }
        header('Content-type: application/json');
        echo json_encode($data);
    }
}