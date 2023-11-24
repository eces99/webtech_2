<?php
session_start();
session_destroy();
 
echo "Logout erfolgreich";
header('Refresh: 1; URL = login_page.php?menu=upload');
?>
