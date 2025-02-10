<?php

require_once __DIR__ . '/../models/Subject.php';

class SubjectController {

    public function suggestSubject() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $subject = new Subject();
            if ($subject->suggestSubject($_SESSION['user']['user_id'], $title, $description)) {
                header('Location: /student/suggest');
                exit;
            }
        }
        require_once __DIR__ . '/../views/subjects/suggest.php';
    }


    public function listSubjects()
    {
        $subject = new Subject();

        $subjects = $subject->getAllSubjects(); 

        require_once '../app/views/subjects/list.php';
    }

    public function manageSubjects() {
        $subject = new Subject();
        $subjects = $subject->getAllSubjects();
        require_once __DIR__ . '/../views/subjects/manage.php';
    }

    public function updateSubjectStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subject_id'], $_POST['status'])) {
            $subject_id = $_POST['subject_id'];
            $status = $_POST['status'];
            $subject = new Subject();
            if ($subject->updateSubjectStatus($subject_id, $status)) {
                header('Location: /admin/subjects');
                exit;
            }
        }
    }

    public function deleteSubject() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subject_id'])) {
            $subject_id = $_POST['subject_id'];
            $subject = new Subject();
            if ($subject->deleteSubject($subject_id)) {
                header('Location: /subjects/list');
                exit;
            }
        }
    }


    public function addSubject() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];

            $subject = new Subject();
            if ($subject->addSubject($_SESSION['user']['user_id'], $title, $description, 'Approuvé')) {
                header('Location: /subjects/list');
                exit;
            }
        }
    }

    public function getSubjects() {
        $subject = new Subject();
        $subjects = $subject->getAllSubjects();
        require_once __DIR__ . '/../views/subject/list.php';
    }

    public function updateSubject() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subject_id'], $_POST['title'], $_POST['description'])) {
            $subject_id = $_POST['subject_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];

            $subject = new Subject();
            if ($subject->updateSubject($subject_id, $title, $description)) {
                header('Location: /admin/subjects');
                exit;
            }
        }
    }

    
}
?>
