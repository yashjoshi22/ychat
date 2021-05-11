<?php
session_start();
include("include/connection.php");

$emailErr = "";
$email = "";
$flag = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $flag = false;
    } else {
        $email = test_input($_POST["email"]);
    }

    if ($flag) {
        $query = "SELECT * FROM users WHERE email='$email' && password='$password'";
        /*$query="select email from users where email=='$email' "
        UPDATE users
        SET password='changepassword'
        WHERE CustomerName='$email';*/
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if ($total == 1) {
            $_SESSION['user_name'] = $email;
            header("location:loged_in.php");
        } else {
            /*echo "login Failed";*/
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function setvalue($field)
{

    if (isset($_COOKIE[$field])) {
        echo $_COOKIE[$field];
    }
}
function setchecked($field)
{

    if (isset($_COOKIE[$field])) {
        echo "checked='checked'";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ychat - Compose</title>
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
                        <a class="nav-link button" href="login.php">Login/Register</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="site_main">
            <section class="container">
                <div class="section-main login-section">
                    <div id="loader-bg" style="display: none;">
                        <div class="loader" id="loader"></div>
                    </div>
                    <form method="POST" action="" id="login-frm">
                        <input type="hidden" name="_token" value="04bZpCtKQKfjPXntUryYT58MxfseuMRGqs84n71y">
                        <div class="message-box">
                            <h1>Welcome Back:)</h1>
                            <p><span>Please Enter Your Registered Email For Reset Your Password.</span></p>
                            <div class="full-width">
                                <div class="username">
                                    <img src="img/icons/email.svg">
                                    <div class="field-box">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" required>
                                    </div>
                                </div>
                            </div>





                            <button class="button" name="logbtn">Reset Password</button>

                        </div>
                    </form>
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