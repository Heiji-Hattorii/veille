<?php 

require_once __DIR__ . '/../models/Student.php';

class StudentController {
    public function dashboard() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'Etudiant') {
            header('Location: /login');
            exit;
        }
        $student = new Student();
        $suggestions = $student->getStudentDashboard($_SESSION['user']['user_id']);
        require_once __DIR__ . '/../views/students/dashboard.php';
    }

    public function suggestSubject() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'Etudiant') {
            header('Location: /login');
            exit;
        }
        $student = new Student();
        $suggestions = $student->getStudentDashboard($_SESSION['user']['user_id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            $title = isset($_POST['title']) ? trim($_POST['title']) : null;
            $description = isset($_POST['description']) ? trim($_POST['description']) : null;
        
            if (!empty($title) && !empty($description)) {
                $student = new Student();
                if ($student->suggestSubject($_SESSION['user']['user_id'], $title, $description)) {
                    header("Location: /student/suggest");
                    exit;
                } else {
                    $error = "Erreur lors de la soumission.";
                }
            } else {
                $error = "Veuillez remplir tous les champs.";
            }
        }
        

        require_once __DIR__ . '/../views/students/suggest.php';
    }

     
    public function updateSubject() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            $subject_id = $_POST['subject_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];

            $student = new Student();
            if ($student->updateSubject($subject_id, $title, $description)) {
                $success = "Sujet mis à jour avec succès!";
            } else {
                $error = "Erreur lors de la mise à jour.";
            }
            header("Location: /student/suggest");
            exit();
        }
    }

    public function deleteSubject() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
            $subject_id = $_POST['subject_id'];

            $student = new Student();
            if ($student->deleteSubject($subject_id)) {
                $success = "Sujet supprimé avec succès!";
            } else {
                $error = "Erreur lors de la suppression.";
            }
            header("Location: /student/suggest");
            exit();
        }
    }

    
}
?>