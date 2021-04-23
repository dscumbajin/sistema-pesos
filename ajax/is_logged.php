<?php	
	session_start();
	if (!isset($_SESSION['user_login_status2']) AND $_SESSION['user_login_status2'] != 1) {
        header("location: ../login.php");
		exit;
    }