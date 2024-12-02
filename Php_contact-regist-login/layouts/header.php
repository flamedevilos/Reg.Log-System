<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <?= $logo ?>
    <link rel="stylesheet" href="config/style.css">
</head>

<body>
    <header>
        <a href="#" class="logo"><img src="img/logo_icon.png" alt="logo" width="36" height="36">
            <h2>Site Name</h2>
        </a>
        <p class="regLog"><a href="login.php">Login</a> | <a href='registration.php'>Registration</a></p>
    </header>
    <nav>
        <ul>
            <li>
                <a href="index.php">
                    <img src="img/home_button.png" alt="logo" width="16" height="16"> Home
                </a>
            </li>
            <li>
                <a href="contact.php">
                    <img src="img/email_img.png" alt="logo" width="16" height="16"> Contact
                </a>
            </li>
        </ul>
    </nav>