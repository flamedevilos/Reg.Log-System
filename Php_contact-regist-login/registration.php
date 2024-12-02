<?php 
    session_start();
    $title = 'Registeration';
    $page = 'registeration';
    $logo = '<link rel="icon" href="img/regist_icon.png" type="image/x-icon">';
    include "layouts/header.php";

    // registration form script client & server -side   
    $name = $email = $password = $confirmPassword = "";
    $nameError = $emailError = $passwordError = $confirmPasswordError = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // --- Client side
        if (isset($_POST['submit'])) {
            $name = $_POST['user_name'];
            $email = $_POST['user_email'];
            $password = $_POST['user_password'];
            $confirmPassword = $_POST['confirm_password'];
            
            $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/";

            if (empty($name)) {
                $nameError = "<span class='alertNote'><img src='img/alert_icon.jpg'> Name is required.</span>";
            } elseif (strlen($name) < 3) {
                $nameError = "<span class='alertNote'><img src='img/alert_icon.jpg'> more than <strong>3</strong> characters!</span>";
            } elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameError = "<span class='alertNote'><img src='img/alert_icon.jpg'> Only letters and white space allowed.</span>";
            }

            if (empty($email)) {
                $emailError = "<span class='alertNote'><img src='img/alert_icon.jpg'> Email is required.</span>";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "<span class='alertNote'><img src='img/alert_icon.jpg'> Invalid Email!</span>";
            }   
            
            if (empty($password)) {
                $passwordError = "<span class='alertNote'><img src='img/alert_icon.jpg'> Password is required.</span>";
            } elseif (!preg_match($passwordPattern, $password) ) {
                $passwordError = "<span class='alertNote'><img src='img/alert_icon.jpg'> Must more than 8 characters including at least 1 Big Letter and 1 Digit.</span>";
            }

            if ($confirmPassword !== $password) {
                $confirmPasswordError = "<span class='alertNote'><img src='img/alert_icon.jpg'> Password confirmation doesn\'t match your password.</span>";
            }

            //--- Server side
            if (!$nameError && !$emailError && !$passwordError && !$confirmPasswordError) {                
                require "config/database.php";

                // Checkin for Duplication
                $sql = "SELECT * FROM registerLogin WHERE user_name = '$name' OR user_email = '$email'";
                $result = $conn->query($sql);          

                if ($result->num_rows > 0) {   
                    while($row = $result->fetch_assoc()) {                                    
                        if ($row['user_name'] == $name) {
                            $sqlAlertN= "<span class='alertNote'><img src='img/alert_icon.jpg'> Name already exists!</span>";
                        } 
                        if ($row['user_email'] == $email) {
                           $sqlAlertE = "<span class='alertNote'><img src='img/alert_icon.jpg'> Email already exists!</span>";
                        }
                    }
                    
                } else {
                    // Insert Data
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    
                    $stmt = $conn->prepare("INSERT INTO registerLogin (user_name, user_Email, user_password) VALUES(?, ?, ?)");
                    $stmt->bind_param("sss", $name, $email, $password);
                    $stmt->execute();    
                
                    $stmt->close();
                    $conn->close();

                    $success = "<span class='successAlert'><img src='img/success_icon.jpg'> Registration has been sent</span>";
                    $name = $email = $password = $confirmPassword = "";
                }                            
            } 
        }
    }
?>

<main class="registerLogin-Main">
    <!-- Registration section -->
    <section class="col-second">
        <p><strong>Already registrated then hier <a href="login.php">Login</a></strong></p>
        <div class="title">
            <img src="img/regist_icon.png" alt="registration icon" width="16" height="16">
            <h2><?= $title ?></h2>
        </div>
        <?php if (isset($success)) { echo $success; } ?>
        <form action="#" method="post">
            <span class="alertNote">Fields with * is required.</span>
            <div class="inp">
                <img src="img/user_icon.jpg" alt="user icon" width="16" height="16">
                <span style="color: #dc143c;">*</span>
                <input type='text' name='user_name' placeholder="Using Name" value="<?= $name ?>">
            </div>
            <?= $nameError ?><?php if (isset($sqlAlertN)){ echo $sqlAlertN; } ?>
            <div class="inp">
                <img src="img/email_icon.jpg" alt="email icon" width="16" height="16">
                <span style="color: #dc143c;">*</span>
                <input type='email' name='user_email' placeholder="example@email.com" value="<?= $email ?>">
            </div>
            <?= $emailError ?><?php if (isset($sqlAlertE)){ echo $sqlAlertE; } ?>
            <div class="inp">
                <img src="img/password_icon.jpg" alt="password icon" width="16" height="16">
                <span style="color: #dc143c;">*</span>
                <input type='password' name='user_password' placeholder="Password">
            </div>
            <?= $passwordError ?>
            <div class="inp">
                <img src="img/repeat-password_icon.jpg" alt="repeat-password icon" width="16" height="16">
                <span style="color: #dc143c;">*</span>
                <input type='password' name='confirm_password' placeholder="Confirm Password">
            </div>
            <?= $confirmPasswordError ?>
            <div class="inp">
                <img src="img/agreement_icon.jpg" alt="terms icon"><span style="color: #dc143c;">*</span>
                <p>Agree to our privacies Terms & conditions...</p>
            </div>
            <button type="submit" name="submit">
                <img src="img/file-transfer_img.png" alt="send icon" width="16" height="16"> Send
            </button>
        </form>
    </section>
</main>
<?php include "layouts/footer.php"; ?>