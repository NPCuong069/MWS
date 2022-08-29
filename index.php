<?php
require 'Model/Database.php';
session_start();
ob_start();
$db = new Database();

require('Controller/client/header.php');

if (isset($_GET['controller'])) {
    require 'route/web.php';
} else {
    header("Location:./?controller=home");
}

require 'View/client/layouts/footer.php';

$db->closeDatabase();