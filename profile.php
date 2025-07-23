<?php
session_start(); // Memulai session

// Cek apakah user sudah login
if (!isset($_SESSION["is_login"]) || !$_SESSION["is_login"]) {
    header("Location: login.php");
    exit(); // Hentikan eksekusi skrip setelah redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profileStyle.css">
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
                <li><a href="contact.php" class="menu-link">Contact</a></li>
                <li><a href="logout.php" class="menu-link">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="profile-container">
        <div class="profile-header">
            <img src="webImages/profilPicture.jpeg" alt="Profile Picture" class="profile-pic">
            
            <!-- Menampilkan username dari session -->
            <h1> Welcome <?= htmlspecialchars($_SESSION["username"]) ?></h1>
        </div>
        <div class="profile-details">
            <div class="detail-item">
                <strong>Email:</strong>
                <p>john.doe@example.com</p>
            </div>
            <div class="detail-item">
                <strong>Phone:</strong>
                <p>(123) 456-7890</p>
            </div>
            <div class="detail-item">
                <strong>Address:</strong>
                <p>123 Main Street, Anytown, USA</p>
            </div>
            <div class="detail-item">
                <strong>Balance:</strong>
                <p class="balance">Rp 1.500.000</p>
            </div>
        </div>
        <a href="transaction-history.html" class="btn-history">View Transaction History</a>
        <a href="editProfile.php" class="btn-edit">Edit Profile</a>
    </div>

    <footer>
        <p>&copy; 2024 Trash Treasure. All rights reserved.</p>
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
