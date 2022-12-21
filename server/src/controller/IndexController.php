<?php

namespace controller;
use PDO;

class IndexController extends BaseController {
    public function indexAction(): void {
        $url = $_REQUEST['url'];
        $dbh = $this->getDBConnection();
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