<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../models/Presentation.php';
require_once __DIR__ . '/../models/Subject.php';

class PresentationController {
    public function createPresentation() {
        if ($_SESSION['role'] === 'Enseignant') {
            $subjectModel = new Subject();
        $subjects = $subjectModel->getAllSubjects();
        
        $userModel = new User();
        $students = $userModel->getStudents();
        require_once '../app/views/presentations/dashboard.php';
           
        }
        else{
             header('Location: /dashboard');
            exit;
        }

        
    }



    public function listPresentations() {
        if ($_SESSION['role'] === 'Etudiant' || $_SESSION['role'] === 'Enseignant') {
            $presentationModel = new Presentation();
            $presentations = $presentationModel->getAllPresentations();  
        
            require_once '../app/views/presentations/list.php';
            
        }
        else{
            header('Location: /dashboard');
            exit;
        }
    
       
    }
    

    public function savePresentation() {
        if (isset($_POST['subject_id'], $_POST['student_id'], $_POST['presentation_date'])) {
            $subject_id = $_POST['subject_id'];
            $student_id = $_POST['student_id'];
            $presentation_date = $_POST['presentation_date'];

            $presentation = new Presentation();
            if ($presentation->create($subject_id, $student_id, $presentation_date)) {
                header('Location: /admin/presentations');
                exit;
            } else {
                echo "Erreur lors de la création de la présentation.";
            }
        }
    }


  
    
}
?>