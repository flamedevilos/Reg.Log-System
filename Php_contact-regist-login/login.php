<?php
    session_start();
    $title = 'Login';
    $page = 'login';
    $logo = '<link rel="icon" href="img/login_icon.png" type="image/x-icon">';
    include "layouts/header.php";

    $nameemail = $passwordlogin = "";
    $nameemailError = $passwordloginError = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {            
        if (isset($_POST['submit'])) {
            $nameemail = $_POST['user_nameemail'];
            $passwordlogin = $_POST['user_password'];
            
            if (empty($nameemail)) {
                $nameemailError = "<span class='alertNote'><img src='img/alert_icon.jpg' width='16' height='16'> Name or Email is required.</span>";
            }
            if (empty($passwordlogin)) {
                $passwordloginError = "<span class='alertNote'><img src='img/alert_icon.jpg' width='16' height='16'> Password is required.</span>";
            }

            require "config/database.php";

            $sql = "SELECT * FROM registerLogin WHERE user_name = '$nameemail' OR user_email = '$nameemail'";
            $result = $conn->query($sql);            

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($passwordlogin == password_verify($passwordlogin, $row['user_password'])) {                        
                        $_SESSION['id'] = $row['user_id'];
                        $_SESSION['login'] = TRUE;

                        header("location: dashboard.php");
                    } else {
                        $errorLogin = "<span class='alertNote'><img src='img/alert_icon.jpg' width='16' height='16'> Account doesn't exist!</span>";
                        header("location: login.php");
                    }
                }
            }
            
        }

    }
?>
<main class="registerLogin-Main">
    <?php if (isset($errorLogin)) { $errorLogin; }?>
    <!-- Login section -->
    <section class="col-first">
        <div class="title" style="display: flex; align-items:center; justify-content:center; gap:5px;">
            <img src="img/login_icon.png" alt="login icon" width="20" height="20">
            <h2><?= $title ?></h2>
        </div>
        <form action="#" method="post">
            <span class="alertNote">Fields with * is required.</span>
            <div class="inp">
                <img src="img/user_icon.jpg" alt="user icon" width="16" height="16">
                <span style="color: #dc143c;">*</span>
                <input type='text' name='user_nameemail' placeholder="Name or Email" value="">
            </div>
            <?= $nameemailError ?>
            <div class="inp">
                <img src="img/password_icon.jpg" alt="password icon" width="16" height="16">
                <span style="color: #dc143c;">*</span>
                <input type='password' name='user_password' placeholder="Password">
            </div>
            <?= $passwordloginError ?>
            <button type="submit" name="submit">
                <img src="img/file-transfer_img.png" alt="send icon" width="16" height="16"> Send
            </button>
        </form>
        <p><strong>New <a href='registration.php'>registration</a>.</strong></p>
    </section>
</main>