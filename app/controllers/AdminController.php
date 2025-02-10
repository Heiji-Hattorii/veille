<?php

require_once __DIR__ . '/../models/User.php';

class AdminController {

    public function manageUsers() {
        $user = new User();
        $users = $user->getAllUsers();
        require_once __DIR__ . '/../views/admin/users.php';
    }

    public function deleteUser() {
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];
        $user = new User();
        if ($user->deleteUser($user_id)) {
            header('Location: /admin/users');
            exit;
        }
    }}

    public function updatestatus() {
        if (isset($_POST['user_id']) && isset($_POST['status'])) {
            $user_id = $_POST['user_id'];
            $status = $_POST['status'];
                    $user = new User();
        if ($user->updatestatus($user_id, $status)) {
            header('Location: /admin/users');
            exit;
        }
    }
}
}
?>
