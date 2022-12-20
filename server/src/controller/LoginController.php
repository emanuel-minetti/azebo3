<?php

namespace controller;

class LoginController {

    public function loginAction(): void {
        $response = [
            'error' => 1,
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reqData = json_decode(file_get_contents('php://input'), true);
        } else {
            $this->send($response);
        }
        if (isset($reqData['username'])  && isset($reqData['password'])) {
            $username = $reqData['username'];
            $password = $reqData['password'];
        } else {
            $this->send($response);
        }
        if (strlen($username) >= 3 && strlen($username) <= 30 &&
        strlen($password) >= 8 && strlen($password) <= 30) {
            $response = $this->authenticate($username, $password);
        }
        $this->send($response);
    }

    private function authenticate(string $username, string $password):array {
        $response = [
            "text" => "You are authenticated!",
        ];
        return $response;
    }

    /**
     * @param array $response
     * @return void
     */
    private function send(array $response): void {
        header('Content-type: application/json');
        echo json_encode($response);
    }
}