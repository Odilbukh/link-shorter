<?php
const APP_DIR = __DIR__;

require_once APP_DIR . '/database.php';

$config = require APP_DIR . '/config.php';
$db = dbConnect($config['db']);

$originalUrl = $_POST['url'];

$token = substr(md5(uniqid(mt_rand(), true)), 0, 8);
$expiresAt = date('Y-m-d H:i:s', strtotime('+5 minutes'));

$stmt = $db->prepare('INSERT INTO links (original_url, token, expires_at) VALUES (?, ?, ?)');
$stmt->execute([$originalUrl, $token, $expiresAt]);

echo $_SERVER['HTTP_HOST'] . '/' . $token;
