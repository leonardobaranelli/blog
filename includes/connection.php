<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');    
    $dotenv->load();

    $server = $_ENV['server'] ?? null;
    $username = $_ENV['username'] ?? null;
    $password = $_ENV['password'] ?? null;
    $database = $_ENV['database'] ?? null;    
    
    $db = mysqli_connect($server, $username, $password, $database);
    
    if (!isset($_SESSION)) {
        session_start();
    }        
?>