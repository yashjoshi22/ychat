<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
/*if(!define('MYSITE')){

    header('location:login.php');
    die();
}else
{*/
/*if($_SERVER['REQUEST_METHOD'] == 'POST')
{
           echo $userprofile=$_SESSION['user_name'];

            if($userprofile==true)
            {

                    echo "<h1> your successfully loged in </h1>";
            }
            else
                {
                    header('location:login.php');
                }
}
*/
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

    <!-- CSRF Token -->
    <meta name="csrf-token" content="04bZpCtKQKfjPXntUryYT58MxfseuMRGqs84n71y">



    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-152964388-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-152964388-1');
    </script>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.minf700.css?v=1.0.1">
    <link rel="stylesheet" type="text/css" href="fonts/stylesheetf700.css?v=1.0.1">
    <link rel="stylesheet" type="text/css" href="css/font-awesomef700.css?v=1.0.1">
    <link rel="stylesheet" type="text/css" href="css/new_stylef700.css?v=1.0.1">
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-md header">
            <a href="index.html" class="site-logo navbar-brand">
                <img src="img/sms-white.png" alt="logo" title="logo" />
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarsExample04" style="">
                <ul class="navbar-nav ml-auto" id="nav">

                    <div class="mobile-close-button"><i class="fa fa-times" aria-hidden="true"></i></div>
                    <li class="nav-item ">
                        <a class="nav-link button" href="request-quote.php">Request a quote</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link button" href="index.php">Compose</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link button" href="about-us.php">Get In Touch</a>
                    </li>
                    <li class="nav-item ">
                    <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle button" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre="">
                            yj <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="dashboard.php">
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="logout.php" >
                            <!--onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"-->
                                Logout
                            </a>

                            <!--   <form id="logout-form" class="button" action="logout.php" method="POST" style="display: none;">
                                    <input type="hidden" name="_token" value="F9K4mUAekB9uoTjubeB0yNE72EFfjFgP4u6UKKEq">                                </form> -->
                        </div>
                    </li>

                    </li>

            </div>
        </nav>

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
                    <a href="index.php"><img src="img/create.jpg"></a>

                </div>
            </section>
        </main>
    </div>

    <!-- <div id="snackbar">Copy to clipboard</div> -->
    <!-- Scripts -->
    <script type="text/javascript">
        var baseURL = '';
    </script>
    <script src="js/jquery.minf700.js?v=1.0.1"></script>
    <script src="js/jquery.validate.minf700.js?v=1.0.1"></script>
    <script src="js/securemsgf700.js?v=1.0.1"></script>
    <script src="js/popper.minf700.js?v=1.0.1" type="text/javascript"></script>
    <script src="js/clipboard.minf700.js?v=1.0.1" type="text/javascript"></script>
    <script src="js/bootbox.all.minf700.js?v=1.0.1" type="text/javascript"></script>
    <script src="js/bootstrap.minf700.js?v=1.0.1"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $.validator.addMethod("emailValidate", function(value, element) {
                var emailRegExp = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,5})?$/;
                return emailRegExp.test(value);
            }, 'Please enter valid email address');

            $("#login-frm").validate({
                rules: {
                    username: {
                        required: true,
                        emailValidate: true
                    },
                    password: {
                        required: true
                    },
                },
                errorPlacement: function(error, element) {
                    element.parent().parent().parent().append(error);
                },
                submitHandler: function(form) {
                    $("#send-message").send();
                    //form.submit();
                }
            });
        });
    </script>

</body>

</html>