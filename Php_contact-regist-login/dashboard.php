<?php 
session_start();
$title = 'Dashboard';
$page = 'dashboard';
$logo = '<link rel="icon" href="img/login_img.jpg" type="image/x-icon">';
include "layouts/header.php";

require "config/database.php";

if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM registerlogin WHERE user_id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    } else {
       header('location: login.php');
    }    
?>
<main class="registerLogin-Main">
    <h1><?= $title ?></h1><button type="button" class="logoutBtn"
        style="background-color: #87c7ff; width: 100px; height: 50px; border:none; border-radius: 10px; float: right; margin-right: 30px;"><strong><a
                href="logout.php" style="text-decoration: none;">Logout</a></strong></button>
    <p style="display: flex; align-items:center;"><img src='img/Welcome_img.jpg' alt='Welcome img' width="100"
            height="80"><strong><?php  echo $row['user_name']; ?></strong></p>
    <br>
    <p><b>Data: </b><strong><a href="contactMails_tb.php" style="text-decoration: none;">Contact_Mails</a></strong> |
        <strong><a href="UserData_tb.php" style="text-decoration: none;">Registreted_Users</a></strong>
    </p>
    <hr>
</main>

<?php include "layouts/footer.php"; ?>