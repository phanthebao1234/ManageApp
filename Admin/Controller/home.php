<?php 
    $action = "home";
    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }
    
    switch($action) {

        default:
            include 'Admin/View/layout.php';
            break;
    }
?>