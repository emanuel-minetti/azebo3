<?php
namespace controller;
use PDO;

class IndexController {
    private $user = 'azebo3';
    private $pw = 'cGd*b3x8kpkNLkqo';
    public function indexAction(): void {
        $url = $_REQUEST['url'];
        echo "Hallo von der API! Die URL war '$url'";

        $dbh = new PDO('mysql:host=localhost;dbname=azebo3', $this->user, $this->pw);
        $stm = $dbh->query('SELECT name FROM user WHERE id = 1');
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        $name = $res['name'];
        echo "<br/>Dein Name ist: '$name'";
    }
}