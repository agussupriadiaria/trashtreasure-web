<?php
    include "php/connectphp.php";
    session_start(); // Memulai session

    // Inisialisasi variabel pesan
    $error_message = "";

    if(isset($_SESSION["is_login"])){
        header(("Location: profile.php"));
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // $hash_password = hash ('sha256',$password);

        // Pastikan menggunakan placeholder untuk mencegah SQL Injection
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password); // 'ss' artinya dua parameter string
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc(); // Ambil data user dari hasil query
            $_SESSION["username"] = $data["username"]; // Simpan username ke dalam session
            $_SESSION["is_login"] = true; // Tandai bahwa user sudah login

            // Jika data ditemukan, arahkan ke halaman profil
            header("Location: profile.php");
            exit(); // Hentikan eksekusi skrip setelah redirect
        } else {
            // Jika data tidak ditemukan, simpan pesan kesalahan
            $error_message = "Data not found !";
        }

        // Tutup statement jika sudah tidak digunakan lagi
        $stmt->close();
        $db->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginStyle.css">
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
                <li><a href="login.php" class="menu-link active">Login</a></li>
                <li><a href="register.php" class="menu-link">Register</a></li>
            </ul>
        </nav>
    </header>

    <section class="login-section">
        <div class="login-container">
            <h2>Login</h2>
            <?php if ($error_message): ?>
                <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" required>
                        <span class="toggle-password" onclick="togglePassword()">👁️</span>
                    </div>
                </div>
                <button type="submit" class="btn" name="login">Login</button>
            </form>
            <p class="forgot-password"><a href="forgot-password.php">Forgot Password?</a></p>
            <p>Don't have an account? <a href="register.php">Sign up here</a></p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Trash Treasure. All rights reserved.</p>
    </footer>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var passwordIcon = document.querySelector('.toggle-password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                passwordIcon.textContent = '👁️';
            }
        }
    </script>

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