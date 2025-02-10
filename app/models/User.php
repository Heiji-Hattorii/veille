<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/BaseModel.php';

class User extends BaseModel {

    public function register($email, $password, $role) {
        $this->connect(); 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password, role,status) VALUES (:email, :password, :role,'en attente')";
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

    public function getUserByEmail($email) {
        $this->connect(); 

        $stmt = $this->Connextion->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function getUserById($user_id) {
        $this->connect(); 

        $stmt = $this->Connextion->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetch();
    }
    public function getAllUsers(){
        $this->connect(); 

        $stmt = $this->Connextion->prepare("SELECT * From users");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteUser($user_id) {
        $this->connect(); 

        $stmt = $this->Connextion->prepare("DELETE FROM users WHERE user_id = ?");
        return $stmt->execute([$user_id]);
    }

    public function updatestatus($user_id, $status) {
        $this->connect(); 

        $stmt = $this->Connextion->prepare("UPDATE users SET status = ? WHERE user_id = ?");
        return $stmt->execute([$status, $user_id]);
    }


    public function getStudents() {
        $this->connect();
        $query = "SELECT * FROM users WHERE role = 'Etudiant'"; 
        $stmt = $this->Connextion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}
?>

