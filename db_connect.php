<!-- By. Septian.dwica (tiancode.me) -->

<?php
$host = 'localhost';
$dbname = 'student_db';
$uname = 'root';
$pwd = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $uname, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
