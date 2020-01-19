<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Finally, destroy the session.
session_destroy();
empty($_SESSION);
header('location:index.php');
?>