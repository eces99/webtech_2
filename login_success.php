<?php
session_start();

echo "Login erfolgreich";
header('Refresh: 1; URL = index.php');
