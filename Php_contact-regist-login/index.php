<?php 
    session_start();
    $title = 'Home';
    $page = 'index';
    $logo = '<link rel="icon" href="img/home_icon.png" type="image/x-icon">';
    include "layouts/header.php";
?>
<main class="homeMain">
    <h1><?= $title ?></h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi officiis inventore esse magnam quidem ipsam
        labore libero. Eveniet sit totam minima, at obcaecati aut, laudantium nam laboriosam optio deleniti cupiditate.
    </p>
</main>

<?php include "layouts/footer.php"; ?>