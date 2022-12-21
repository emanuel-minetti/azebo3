<?php

namespace controller;

class LoginController extends BaseController {

    public function loginAction(): void {
        $error = 'Login error';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reqData = json_decode(file_get_contents('php://input'), true);
        } else {
            $this->sendError(1, $error);
        }
        if (isset($reqData['username']) && isset($reqData['password'])) {
            $username = $reqData['username'];
            $password = $reqData['password'];
            if (strlen($username) >= 3 && strlen($username) <= 30 &&
                strlen($password) >= 8 && strlen($password) <= 30) {
                $data = $this->authenticate($username, $password);
                if ($data['success']) {
                    unset($data['success']);
                    $this->send($data);
                } else {
                    $this->sendError(1, $error);
                }
            } else {
                $this->sendError(1, $error);
            }
        } else {
            $this->sendError(1, $error);
        }
    }

    private function authenticate(string $username, string $password): array {
        $dbh = $this->getDBConnection();
        $stm = $dbh->prepare(<<<SQL
            SELECT * FROM user WHERE name = :username
        SQL
        );
        $stm->execute([
            'username' => $username,
        ]);
        $user = $stm->fetch();
        if ($user) {
            $pwHash = $user['pw_hash'];
            $verified = password_verify($password, $pwHash);
            $data = [
                'success' => $verified,
            ];
            if ($verified) {
                $data['userId'] = $user['id'];
                $data['fullName'] = $user['full_name'];
            }
            return $data;
        } else {
            return [
                "success" => false,
            ];
        }
    }

}
