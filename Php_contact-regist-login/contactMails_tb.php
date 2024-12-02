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
    
    //$stmt = "SELECT * FROM mails";
    //$query = $conn->query($stmt);

    if (isset($_GET['submit'])) {
        $filter = $_GET['filter'];
        $stmt = "SELECT * FROM mails WHERE concat(sender_id, sender_name, sender_email, sender_request, reg_date) LIKE '%$filter%'";
        $query= $conn->query($stmt);
    } else {
        $stmt = "SELECT * FROM mails";
        $query = $conn->query($stmt);
    }   
?>

<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #DDD;
}

th {
    background-color: #D6EEEE;
}

tr:hover {
    background-color: #87c7ff;
}

.filter {
    display: flex;
    gap: 5px;
}
</style>
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
    <form action="contactMails_tb.php" method="get" class="filter">
        <input type="text" name="filter" placeholder="Search..." value="<?php if (isset($_GET['filter'])) {
            echo $_GET['filter'];
        } ?>">
        <button type="submit" name="submit">Search</button>
    </form>
    <table style="width:100%">
        <tr>
            <th>ID</th>
            <th>Client_Name</th>
            <th>Client_Email</th>
            <th>Client_Request</th>
            <th>Send_Date</th>
        </tr>

        <?php 
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        echo "<tr> <td>" . $row['sender_id'] . "</td>
                                    <td>" . $row['sender_name'] . "</td>
                                    <td>" . $row['sender_email'] . "</td>
                                    <td>" . $row['sender_request'] . "</td>
                                    <td>" . $row['reg_date'] . "</td>
                            </tr>";
                    }
                } else {
                    echo "0 Record found!";
                }
                $conn->close();
            ?>


    </table>
</main>
<?php include "layouts/footer.php"; ?>