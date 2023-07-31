<?php
// Çerezin adı
$cookieName = 'cookiesAccepted';

// Çerez daha önce kabul edilmiş mi diye kontrol ediyoruz
if (!isset($_COOKIE[$cookieName])) {
    // Eğer çerez kabul edilmemişse, popup gösteriyoruz
    echo '<script>
        function acceptCookies() {
            // Çerez kabul edildiğinde log_visit.php sayfasına yönlendirelim
            window.location.href = "log_visit.php";
        }

        if (confirm("Bu sitede çerezleri kabul ediyor musunuz?")) {
            // Kullanıcı evet derse çerezi oluşturup sayfayı yeniliyoruz
            document.cookie = "' . $cookieName . '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/;";
            acceptCookies(); // Yönlendirmeyi burada yapalım
        }
    </script>';
    exit; // Popup gösterildi, sayfayı sonlandıralım
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Sayfası</title>
</head>
<body>
    <h1>Hoş Geldiniz!</h1>
    <p>AtlasCo. Software</p>
</body>
</html>
