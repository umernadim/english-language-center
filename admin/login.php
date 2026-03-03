<?php
session_start();
include '../config.php';

$error = "";

if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND role='Admin'";
    $result = mysqli_query($connect, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_name'] = $row['full_name'];
            header('Location:admin-dashboard.php');
            exit;
        } else {
            $error = "Wrong email/password!";
        }
    } else {
        $error = "Wrong email/password!";
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Hope English Language Center</title>
    <meta name="robots" content="noindex, nofollow" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/admin.css" />
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Admin Login</h2>
            <p class="subtitle">Access your dashboard and manage content</p>

            <form method="post">
                <?php if ($error) echo "<p style='color:red; text-align:center'>$error</p>"; ?>
                <div class="input-field">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="admin@langsite.com" required />
                </div>

                <div class="input-field password-field">
                    <label>Password</label>
                    <div class="password-wrapper">
                        <input type="password" name="password" id="password" placeholder="Enter password" required />
                        <i class="ri-eye-off-line password-toggle" id="togglePassword"></i>
                    </div>
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePassword');

            toggleIcon.addEventListener('click', function() {
                // Toggle password visibility
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle icon
                this.classList.toggle('active');
                this.classList.toggle('ri-eye-off-line');
                this.classList.toggle('ri-eye-line');
            });
        });
    </script>
</body>

</html>