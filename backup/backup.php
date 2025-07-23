<?php
session_start(); // Memulai session

// Cek apakah user sudah login
$is_logged_in = isset($_SESSION["is_login"]) && $_SESSION["is_login"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrashTreasure-Ind</title>
    <link rel="stylesheet" href="aboutStyle.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>TrashTreasure Indonesia</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php" class="active">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if ($is_logged_in): ?>
                    <!-- Tampilkan menu Logout jika sudah login -->
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <!-- Tampilkan menu Login jika belum login -->
                    <li><a href="login.php" class="menu-link">Login</a></li>
                    <li><a href="register.php" class="menu-link">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section class="about-section register-section">
        <div class="container">
            <h2>Tentang Trash Treasure</h2>
            <p>Trash Treasure adalah platform inovatif yang bertujuan untuk mengubah sampah menjadi harta karun. Kami percaya bahwa dengan pemanfaatan sampah yang tepat, kita dapat menjaga lingkungan dan menciptakan masa depan yang lebih baik untuk generasi mendatang.</p>
            <p>Misi kami adalah untuk memberdayakan masyarakat dalam menjaga lingkungan melalui pengelolaan sampah yang efisien dan kreatif. Bersama-sama, kita bisa menciptakan perubahan positif dan berkelanjutan.</p>
            <p>Bergabunglah dengan kami dalam perjalanan ini dan jadilah bagian dari solusi untuk masalah sampah global.</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 TrashTreasure. All rights reserved.</p>
    </footer>
</body>
</html>
