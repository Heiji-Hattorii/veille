<?php 
require_once __DIR__ . '/../models/User.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class HomeController {
    public function showHomePage() {
        require_once __DIR__ . '/../views/acceuil.php';
    }
}
?>
    