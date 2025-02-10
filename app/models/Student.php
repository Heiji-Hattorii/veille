<?php require_once 'BaseModel.php';

class Student extends BaseModel {
    public function suggestSubject($user_id, $title, $description) {
        if (empty($title) || empty($description)) {
            return false;
        }
        $this->connect();
        $sql = "INSERT INTO subjects (user_id, title, description, status) VALUES (:user_id, :title, :description, 'en attente')";
        $stmt = $this->Connextion->prepare($sql);
        return $stmt->execute(['user_id' => $user_id, 'title' => $title, 'description' => $description]);
    }

    public function getStudentDashboard($user_id) {
        $this->connect();
        $sql = "SELECT * FROM subjects WHERE user_id = :user_id";
        $stmt = $this->Connextion->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteSubject($subject_id) {
        $this->connect();
        $sql = "DELETE FROM subjects WHERE id = :id";
        $stmt = $this->Connextion->prepare($sql);
        return $stmt->execute(['id' => $subject_id]);
    }

    public function updateSubject($subject_id, $title, $description) {
        $this->connect();
        $sql = "UPDATE subjects SET title = :title, description = :description WHERE id = :id";
        $stmt = $this->Connextion->prepare($sql);
        return $stmt->execute(['title' => $title, 'description' => $description, 'id' => $subject_id]);
    }

}
?>