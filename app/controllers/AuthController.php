<?php
require_once __DIR__ . '/../models/User.php';
class AuthController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['username'];
            $password = $_POST['password'];
            $user = new User();
            $user = $user->login($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: /dashboard');
                exit;
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }

        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $user = new User();
            if ($user->register($email, $password, $role)) {
                    header('Location: /login');
                    exit;
                } else {
                    $error = "Erreur lors de l'enregistrement.";
                }
            
        }

        require_once __DIR__ . '/../views/auth/register.php';
    }

    public function resetPassword() {
    }
}
?>
