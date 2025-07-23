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
    <title>Contact</title>
    <link rel="stylesheet" href="contactStyle.css">
</head>
<body>
<header>
        <div class="logo">
            <h1>TrashTreasure Indonesia</h1>
        </div>
        <!-- Menu Hamburger Icon -->
        <div class="menu-toggle" id="menu-toggle">
            &#9776; <!-- Icon hamburger -->
        </div>
        <nav>
            <ul id="menu">
                <li><a href="index.php" class="menu-link">Home</a></li>
                <li><a href="about.php" class="menu-link">About</a></li>
                <li><a href="contact.php" class="menu-link active">Contact</a></li>
                <?php if ($is_logged_in): ?>
                    <!-- Jika user login, tampilkan Profile dan Logout -->
                    <li><a href="profile.php" class="menu-link">Profile</a></li>
                    <li><a href="logout.php" class="menu-link">Logout</a></li>
                <?php else: ?>
                    <!-- Jika user belum login, tampilkan Login dan Register -->
                    <li><a href="login.php" class="menu-link">Login</a></li>
                    <li><a href="register.php" class="menu-link">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section class="contact-section register-section">
        <div class="container">
            <h2>Hubungi Kami</h2>
            <p>Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, jangan ragu untuk menghubungi kami melalui form di bawah ini.</p>
            <form action="submit_form.php" method="POST">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Pesan:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn">Kirim</button>
            </form>

            <div class="confirmation">
                <h3>Ikuti Kami di Media Sosial</h3>
                <ul>
                    <li><a href="https://www.facebook.com/TrashTreasure" target="_blank">Facebook</a></li>
                    <li><a href="https://www.twitter.com/TrashTreasure" target="_blank">Twitter</a></li>
                    <li><a href="https://www.instagram.com/TrashTreasure" target="_blank">Instagram</a></li>
                    <li><a href="https://www.linkedin.com/company/TrashTreasure" target="_blank">LinkedIn</a></li>
                </ul>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 TrashTreasure. All rights reserved.</p>
    </footer>

    <script>
        // Dropdown Menu Toggle
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('menu');
            menu.classList.toggle('show');
        });

        // Aktifkan link yang dipilih
        document.querySelectorAll('.menu-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.menu-link').forEach(item => {
                    item.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    </script>
    
</body>
</html>
