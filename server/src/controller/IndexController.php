<?php
namespace controller;
class IndexController {
    public function indexAction(): void {
        $url = $_REQUEST['url'];
        echo "Hallo von der API! Die URL war $url";
    }
}