<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age = trim($_POST['age']);
    $bio = trim($_POST['bio']);
    $file = $_FILES['file'];

    // Server-side validation
    if (strlen($name) < 3 || strlen($bio) < 10 || $file['size'] > 2 * 1024 * 1024) {
        die('Validation failed');
    }

    if ($file['type'] !== 'text/plain') {
        die('Invalid file type');
    }

    // Read file content
    $fileContent = file_get_contents($file['tmp_name']);
    $fileLines = explode("\n", $fileContent);

    // Store data in session
    $_SESSION['data'] = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'bio' => $bio,
        'fileContent' => $fileLines,
        'userAgent' => $_SERVER['HTTP_USER_AGENT']
    ];

    header('Location: result.php');
    exit();
}
?>