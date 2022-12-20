<?php

namespace controller;

class FrontController {

    public function route(): void {
        $url = $_REQUEST['url'];
        switch ($url) {
            case 'login':
                $lc = new LoginController();
                $lc->loginAction();
                break;
            default:
                $ic = new IndexController();
                $ic->indexAction();
        }
    }
}