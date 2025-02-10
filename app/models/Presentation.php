<?php
require_once 'BaseModel.php';
class Presentation extends BaseModel {
    public function create($subject_id, $student_id, $presentation_date) {
        $this->connect();
        $query = "INSERT INTO presentations (subject_id, user_id, presentation_date) VALUES (:subject_id, :student_id, :presentation_date)";
        
        $stmt = $this->Connextion->prepare($query);
        $stmt->bindParam(':subject_id', $subject_id);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':presentation_date', $presentation_date);
        
        return $stmt->execute();
    }
    public function getAllPresentations() {
        $this->connect();
        $query = "SELECT p.*, s.title , u.email
              FROM presentations p
              JOIN subjects s ON p.subject_id = s.id
              JOIN users u ON p.user_id = u.user_id"; 
        $stmt = $this->Connextion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }
}
?>
