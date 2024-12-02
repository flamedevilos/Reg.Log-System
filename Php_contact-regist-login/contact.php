<?php 
    session_start();
    // Header config
    $title = 'CONTACT';
    $page = 'contact';
    $logo = '<link rel="icon" href="img/email_img.png" type="image/x-icon">';
    include "layouts/header.php";

    // Contact form script client & server -side    
    // --- Client side
    $name = $email = $msg = "";
    $nameError = $emailError = $msgError = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $name = $_POST['sender_name'];
            $email = $_POST['sender_email'];
            $msg = $_POST['sender_request'];

            if (empty($name)) {
                $nameError = "<span class='alertNote'><img src='img/alert_icon.jpg'> Name is required.</span>";
            } elseif (strlen($name) < 3) {
                $nameError = "<span class='alertNote'><img src='img/alert_icon.jpg'> more than <strong>3</strong> characters!</span>";
            } elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameError = "<span class='alertNote'><img src='img/alert_icon.jpg'> Only letters and white space allowed.</span>";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "<span class='alertNote'><img src='img/alert_icon.jpg'> Invalid Email!</span>";
            }
            if (empty($msg)) {
                $msgError = "<span class='alertNote'><img src='img/alert_icon.jpg'> Request is required.</span>";
            } elseif (strlen($msg) < 10) {
                $msgError = "<span class='alertNote'><img src='img/alert_icon.jpg'> more than <strong>10</strong> characters!</span>";
            }

            //--- Server side
            if (!$nameError && !$emailError && !$msgError) {
                // DB Validation & Insert
                require "config/database.php";

                $stmt = $conn->prepare("INSERT INTO mails (sender_name, sender_Email, sender_request) VALUES(?, ?, ?)");
                $stmt->bind_param("sss", $name, $email, $msg);
                $stmt->execute();    

                $stmt->close();
                $conn->close();

                $success = "<span class='successAlert'><img src='img/success_icon.jpg'> Email has been sent</span>";
                $name = $email = $msg = "";
            }   
            
        }
    }

?>
<main class="contactMain">
    <div class="col-first">
        <div class="card">
            <ul>
                <li><img src="img/Building _icon.jpg" alt="building icon">
                    <strong>Site Name</strong>
                </li>
                <li><img src="img/street_icon.jpg" alt="logo">Street Name & Number</li>
                <li><img src="img/postal_icon.jpg" alt="logo">Post code & State</li>
                <li><img src="img/country_icon.jpg" alt="logo">Country</li>
                <li><img src="img/tel_icon.jpg" alt="logo">(0)123 0123 1234</li>
                <li><img src="img/email_icon.jpg" alt="logo">example@email.com</li>
                <li><img src="img/website_icon.jpg" alt="logo">www.exampleName.com</li>
            </ul>
        </div>
    </div>

    <div class="col-second">
        <?php if (isset($success)) {
            echo $success;
         } ?>

        <div class="title">
            <img src="img/email_img.png" alt="contact image">
            <h2><?= $title ?></h2>
        </div>
        <p>Please send your request and we will response soon as possible, Thank you.</p>

        <form action="#" method="post" class="contactFrom">
            <span class="alertNote">Fields with * is required.</span>
            <div class="inp">
                <img src="img/user_icon.jpg" alt="user icon">
                <span style="color: #dc143c;">*</span>
                <input type='text' name='sender_name' placeholder="Full Name" value="<?= $name ?>">
            </div>
            <?= $nameError ?>

            <div class="inp">
                <img src="img/email_icon.jpg" alt="email icon">
                <span style="color: #dc143c;">*</span>
                <input type='email' name='sender_email' placeholder="example@email.com" value="<?= $email ?>">
            </div>
            <?= $emailError ?>

            <div class="inpTextarea">
                <img src="img/request-icon.png" alt="request icon">
                <span style="color: #dc143c;">*</span>
                <textarea name="sender_request" placeholder="My request is..."><?= $msg ?></textarea>
            </div>
            <?= $msgError ?>

            <div class="inp">
                <img src="img/agreement_icon.jpg" alt="terms icon"><span style="color: #dc143c;">*</span>
                <p>Agree to our privacies Terms & conditions...</p>
            </div>

            <button type="submit" name="submit">
                <img src="img/file-transfer_img.png" alt="send icon"> Send
            </button>

        </form>
    </div>

</main>

<?php include "layouts/footer.php"; ?>