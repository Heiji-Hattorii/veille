<?php

require_once 'BaseModel.php';

class Subject extends BaseModel {

    public function suggestSubject($user_id, $title, $description) {
        $this->connect();
        $stmt = $this->Connextion->prepare("INSERT INTO subjects (user_id, title, description, status) VALUES (?, ?, ?, 'En attente')");
        return $stmt->execute([$user_id, $title, $description]);
    }

    public function getSubjectsByUser($user_id) {
        $this->connect();
        $stmt = $this->Connextion->prepare("SELECT * FROM subjects WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    public function getAllSubjects() {
        $this->connect();
        $stmt = $this->Connextion->prepare("SELECT * FROM subjects");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addSubject($user_id, $title, $description, $status) {
        $this->connect();
        $stmt = $this->Connextion->prepare("INSERT INTO subjects (user_id, title, description, status) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$user_id, $title, $description, $status]);
    }


    public function updateSubject($subject_id, $title, $description) {
        $this->connect();
        $stmt = $this->Connextion->prepare("UPDATE subjects SET title = ?, description = ? WHERE id = ?");
        return $stmt->execute([$title, $description, $subject_id]);
    }

    public function updateSubjectStatus($subject_id, $status) {
        $this->connect();
        $stmt = $this->Connextion->prepare("UPDATE subjects SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $subject_id]);
    }

    public function deleteSubject($subject_id) {
        $this->connect();
        $stmt = $this->Connextion->prepare("DELETE FROM subjects WHERE id = ?");
        return $stmt->execute([$subject_id]);
    }






    
}
?>
