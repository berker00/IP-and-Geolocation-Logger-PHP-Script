<?php
include("connect.php"); // Veritabanı bağlantısı

// Veritabanından ziyaretçi bilgilerini çekiyoruz
$sql = "SELECT * FROM visit_logs";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>IP Adresi</th><th>Ziyaret Tarihi ve Saati</th><th>Ülke</th><th>Şehir</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['ip'] . "</td><td>" . $row['visit_time'] . "</td><td>" . $row['country'] . "</td><td>" . $row['city'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Kayıtlı ziyaretçi bulunmamaktadır.";
}

$connection->close(); // Veritabanı bağlantısını kapatıyoruz
?>