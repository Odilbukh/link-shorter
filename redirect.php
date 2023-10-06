<?php
const APP_DIR = __DIR__;

require_once APP_DIR . '/database.php';

$config = require APP_DIR . '/config.php';
$db = dbConnect($config['db']);

$token = $_GET['token'];

$stmt = $db->prepare('SELECT original_url FROM links WHERE token = ? AND expires_at > NOW()');
$stmt->execute([$token]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    header("Location: " . $result['original_url']);
    exit();
} else {
    echo "Link not found or expired.";
}
