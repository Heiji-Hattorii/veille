<?php
require_once __DIR__ . '/BaseModel.php';

class User extends BaseModel {

    public function register($email, $password, $role) {
        $this->connect(); 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password, role) VALUES (:email, :password, :role)";
        $stmt = $this->Connextion->prepare($sql);
        $stmt->execute(['email' => $email, 'password' => $hashed_password, 'role' => $role]);
        return $stmt->rowCount() > 0;
    }

    public function login($email, $password) {
        $this->connect(); 
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->Connextion->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>

