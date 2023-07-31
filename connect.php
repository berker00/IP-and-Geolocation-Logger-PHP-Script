<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loc";

// Veritabanı bağlantısı
$connection = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($connection->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $connection->connect_error);
}