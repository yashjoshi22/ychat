<?php
    include '../include/connection.php';
    include '../include/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ychat - Dashboard</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <meta charset="utf-8">
    <meta name="description" content="sms Online - Easiest and secured way to send and receive self destructive messages">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include '../include/css.php'; ?>
</head>

<body>
    <div id="app">
        <?php include '../include/header.php'; ?>
        <main class="site_main">
            <section class="container">
                <div class="section-main login-section">
                    <div id="loader-bg" style="display: none;">
                        <div class="loader" id="loader"></div>
                                    
                        <div class="masonry">
                            <div class="item">
                                <div class="message-box-main">
                                    <div class="message-box create-message">
                                        <a href=""><img src="img/create.jpg"></a>
                                        <p>Create Your Message</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  

                </div>
            </section>
        </main>
    </div>
    <?php include '../include/js.php'; ?>
</body>
</html>