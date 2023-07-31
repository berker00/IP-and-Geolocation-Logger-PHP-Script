<?php
include("connect.php"); // Veritabanı bağlantısı

$ip = $_SERVER['REMOTE_ADDR']; // Ziyaretçinin gerçek IP adresini alıyoruz
$timestamp = date("Y-m-d H:i:s"); // Ziyaret tarihini ve saati alıyoruz

// IP adresini kullanarak lokasyon bilgisini çekiyoruz (ipinfo.io servisi kullanarak)
$location = file_get_contents("https://ipinfo.io/$ip/json");
$data = json_decode($location, true);

$country = $data['country'] ?? 'Unknown';
$city = $data['city'] ?? 'Unknown';

// Ziyaretçi bilgilerini veritabanına ekliyoruz
$sql = "INSERT INTO visit_logs (ip, visit_time, country, city) VALUES ('$ip', '$timestamp', '$country', '$city')";
if ($connection->query($sql) === TRUE) {
    // Ziyaretçi bilgileri başarıyla kaydedildi
    // Şimdi ana sayfaya yönlendirme yapalım
    header("Location: index.php");
    exit; // İşlemi sonlandırıyoruz, bu noktada herhangi bir çıktı gönderilmemeli
} else {
    echo "Hata oluştu: " . $connection->error;
}

$connection->close(); // Veritabanı bağlantısını kapatıyoruz
?>