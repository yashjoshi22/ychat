<?php
// Initialize the 
require_once "include/connection.php";
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    header('location:login.php');
    exit();
}
// Define variables and initialize with empty values
$emailErr = $passwordErr = "";
$email = $password = "";
$flag = true;

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $flag = false;
    } else {
        $email = test_input($_POST["email"]); 
    }

    if (empty($_POST["password"])) {
        $passwordErr = "password is required";
        $flag = false;
    } else {
        $password = test_input($_POST["password"]);
    }
   
    if ($flag) {
        

        $query = "SELECT * FROM users WHERE email='$email' and password='$password'";
        $data = mysqli_query($link, $query);
        $total = mysqli_num_rows($data);
        if ($total == 1) {
            if (isset($_POST["remark"])) {
                setcookie("user", $_POST["email"], time() + 60 * 60);
                setcookie("pass", $_POST["password"], time() + 60 * 60);
            } else {
                setcookie("user", $_POST["email"], time() - 60 * 10);
                setcookie("pass", $_POST["password"], time() - 60 * 10);
            }
            $_SESSION['user_name'] = $email;
            header("location:dashboard.php");
        } else {
            $login_Err = "Invalid Username and Password";
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

<!-- html  starts from here -->
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
    <!-- a -->
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
                    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="login-frm">
                        <input type="hidden" name="_token" value="04bZpCtKQKfjPXntUryYT58MxfseuMRGqs84n71y">
                        <div class="message-box">
                            <h1>Welcome Back:)</h1>
                            <p><span>Please login with your registered email/username and password.</span></p>
                            <span style="color:red;"><?php echo isset($login_Err) ?  $login_Err : ''; ?> </span>
                            <div class="full-width">
                                <div class="username">
                                    <img src="img/icons/email.svg">
                                    <div class="field-box">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" required value="<?php setvalue("user") ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="full-width">
                                <div class="password">
                                    <img src="img/icons/password.svg">
                                    <div class="field-box">
                                        <label for="psw">Password</label>
                                        <input type="password" name="password" required value="<?php setvalue("pass") ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="proccess-with-password">
                                <label class="Protected">Remember Me
                                    <input type="checkbox" id="is_protected" name="remark" value="<?php setchecked("user") ?>">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="forget-password.php" class="forgot-password"><span>Forgot Password?</span></a>
                            </div>

                            <input type="submit" value="Login" name="logbtn" class="button">
                            <div class="already-have-an-account">
                                Don't have an account?<a href="signup.php">Sign Up</a>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>

    <!-- <div id="snackbar">Copy to clipboard</div> -->
    <!-- Scripts -->
    <!-- <script type="text/javascript">
    var baseURL = '';
</script>
<script src="js/jquery.minf700.js?v=1.0.1"></script>
<script src="js/jquery.validate.minf700.js?v=1.0.1"></script>
<script src="js/securemsgf700.js?v=1.0.1"></script>
<script src="js/popper.minf700.js?v=1.0.1" type="text/javascript"></script>
<script src="js/clipboard.minf700.js?v=1.0.1" type="text/javascript"></script>
<script src="js/bootbox.all.minf700.js?v=1.0.1" type="text/javascript"></script>
<script src="js/bootstrap.minf700.js?v=1.0.1"></script>

 -->
     <script type="text/javascript">
        $(document).ready(function () {
            $.validator.addMethod("emailValidate", function (value, element) {
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
                errorPlacement: function (error, element) {
                    element.parent().parent().parent().append(error);
                },
                submitHandler: function (form) {
                    $("#send-message").send();
                    //form.submit();
                }
            });
        });
    </script>
 
</body>

</html>