<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    header("location: dashboard.php");
    exit;
}

include("include/connection.php");

$nameErr = $emailErr = $passwordErr = $password_confirmationErr = " ";
$name = $email = $password = $password_confirmation = " ";
$flag = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $flag = false;
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $flag = false;
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $flag = false;
    } else {
        $email = test_input($_POST["password"]);
    }

    if (empty($_POST["password_confirmation"])) {
        $password_confirmationErr = "confirm password is required";
        $flag = false;
    } else {
        $email = test_input($_POST["password_confirmation"]);
    }


    /*if($name!="" && $email!="" && $password!=""  && $password_confirmation!="" )*/
    if ($flag) {
        $date = Date("Y/d/m");
      
      $query = "INSERT INTO users(first_name,email,password,created_at)
        VALUES('$name', '$email', '$password','$date')";

        $data=mysqli_query($link,$query);   

        if ($data) {
            header("location:login.php");
        } else {
            /*echo "All fields Are Required && correctly fieldUp";*/
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



?>
<!DOCTYPE html>
<html lang="en">



<head>
    <title>Ychat - Registration</title>
    <link rel="shortcut icon" href="favicon.ico" />

    <meta charset="utf-8">

    <meta name="description" content="Uchat Online - Easiest and secured way to send and receive self destructive messages">
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
                <img src="img/sms-white.png" alt="logo" title="logo">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarsExample04" style="">
                <ul class="navbar-nav ml-auto" id="nav">

                    <div class="mobile-close-button"><i class="fa fa-times" aria-hidden="true"></i></div>
                    <li class="nav-item active">
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
            <input type="hidden" name="test" id="test" value="12345647">
            <!-- Form Section Start form Here -->

            <section class="container">
                <div class="section-main login-section register-section">
                    <div id="loader-bg" style="display: none;">
                        <div class="loader" id="loader"></div>
                    </div>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="reg-frm">
                        <input type="hidden" name="_token" value="04bZpCtKQKfjPXntUryYT58MxfseuMRGqs84n71y">
                        <div class="message-box">
                            <h1>Welcome To YChat</h1>
                            <p><span>Ychat is an application to share your sensitive information privately and securely.</span> </p>
                            <div class="full-width">
                                <div class="username">
                                    <img src="img/icons/user.svg">
                                    <div class="field-box">
                                        <label for="name">Names</label>

                                        <input type="text" name="name" id="name" value="" />
                                    </div>
                                </div>
                            </div>



                            <div class="full-width">
                                <div class="username">
                                    <img src="img/icons/email.svg">
                                    <div class="field-box">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" value="" />
                                    </div>
                                </div>
                            </div>

                            <div class="full-width">
                                <div class="password">
                                    <img src="img/icons/password.svg">
                                    <div class="field-box">
                                        <label for="psw">Password</label>
                                        <input type="password" name="password" id="password" />
                                    </div>
                                </div>
                            </div>

                            <div class="full-width">
                                <div class="password">
                                    <img src="img/icons/password.svg">
                                    <div class="field-box">
                                        <label for="psw">Confirm Password</label>
                                        <input type="password" id="password-confirm" name="password_confirmation" />
                                    </div>
                                </div>
                            </div>

                            <div class="full-width">
                                <div style="margin: 15px 0;">
                                    <div class="g-recaptcha" data-sitekey="6Lf-d78UAAAAAESlSOYKc809_FYh9X3zVcqeweBQ" data-callback="recaptchaCallback"></div>
                                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha" />
                                    <p id="recaptcha-error" class="text-center" style="display: none; color: red;">
                                        Please ensure that you are a human!
                                    </p>
                                </div>
                            </div>

                            <button id="userRegister-btn" name="signbtn" class="button">Sign Up</button>
                            <div class="already-have-an-account">
                                Already have an account?<a href="login.php">Login</a>
                            </div>
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



    <script src='../www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
        $('.alert-danger,.alert-success').hide().text('');

        $(document).ready(function() {
            registration.init();
        });

        var registration = function() {
            $.validator.addMethod("emailValidate", function(value, element) {
                var emailRegExp = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,5})?$/;
                return emailRegExp.test(value);
            }, 'Please enter valid email address');

            var handleValidationForm = function() {
                $("#reg-frm").validate({
                    rules: {
                        /*username: {
                            required: true
                        },*/
                        name: {
                            required: true
                        },
                        email: {
                            required: true,
                            emailValidate: true
                        },
                        password: {
                            required: true,
                            minlength: 8
                        },
                        password_confirmation: {
                            required: true,
                            minlength: 8,
                            equalTo: "#password"

                        },
                        hiddenRecaptcha: {
                            required: function() {
                                if (grecaptcha.getResponse() == '') {
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        }
                    },
                    // Specify validation error messages
                    messages: {
                        password: {
                            required: "Please provide a password",
                            minlength: "The password must be at least 8 characters."
                        },
                        password_confirmation: "Enter confirm password same as password"
                    },
                    errorPlacement: function(error, element) {
                        element.parent().parent().parent().append(error);
                        return false; // suppresses error message text
                    },
                    submitHandler: function(form) {
                        if (grecaptcha.getResponse() == "") {
                            $('#recaptcha-error').show();
                            return false;
                        }
                        $("#send-message").send();
                        // $.ajax({
                        //     headers: {
                        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //     },
                        //     url: form.action,
                        //     type: form.method,
                        //     data: $(form).serialize(),
                        //     beforeSend: function() {
                        //         $('#userRegister-btn').prop("disabled", true);
                        //         $('.alert-danger').hide().text('');
                        //     },
                        //     success: function(response) {
                        //         $('#userRegister-btn').prop("disabled", false);
                        //         if(response.success==true){
                        //             $('.alert-success').show();
                        //             $('.alert-success').append('you have successfully registered');
                        //             setTimeout(function(){
                        //                 $('.alert-success').hide().text('');
                        //                 form.reset();
                        //             }, 4000);
                        //
                        //         }
                        //     },
                        //     error: function (data) {
                        //         $('#userRegister-btn').prop("disabled", false);
                        //         $('.alert-danger').hide().text('');
                        //         $.each(data.responseJSON.errors, function(key, value){
                        //             $('.alert-danger').show();
                        //             $('.alert-danger').append('<p>'+value+'</p>');
                        //         });
                        //     }
                        // });
                    }
                });
            };
            return {
                init: function() {
                    handleValidationForm();
                }
            }
        }();



        /*$(document).ready(function () {

            $("#reg-frm").validate({
                rules: {
                    /!*username: {
                        required: true
                    },*!/
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        emailValidate: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"

                    },
                    hiddenRecaptcha: {
                        required: function () {
                            if (grecaptcha.getResponse() == '') {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                },
                // Specify validation error messages
                messages: {
                    password: {
                        required: "Please provide a password",
                        minlength: "The password must be at least 8 characters."
                    },
                    password_confirmation: "Enter confirm password same as password"
                },
                errorPlacement: function(error, element){
                    element.parent().parent().parent().append(error);
                    return false;  // suppresses error message text
                },
                submitHandler: function(form) {
                    if (grecaptcha.getResponse() == "") {
                        $('#recaptcha-error').show();
                        return false;
                    }
                    $("#send-message").send();
                    // $.ajax({
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     },
                    //     url: form.action,
                    //     type: form.method,
                    //     data: $(form).serialize(),
                    //     beforeSend: function() {
                    //         $('#userRegister-btn').prop("disabled", true);
                    //         $('.alert-danger').hide().text('');
                    //     },
                    //     success: function(response) {
                    //         $('#userRegister-btn').prop("disabled", false);
                    //         if(response.success==true){
                    //             $('.alert-success').show();
                    //             $('.alert-success').append('you have successfully registered');
                    //             setTimeout(function(){
                    //                 $('.alert-success').hide().text('');
                    //                 form.reset();
                    //             }, 4000);
                    //
                    //         }
                    //     },
                    //     error: function (data) {
                    //         $('#userRegister-btn').prop("disabled", false);
                    //         $('.alert-danger').hide().text('');
                    //         $.each(data.responseJSON.errors, function(key, value){
                    //             $('.alert-danger').show();
                    //             $('.alert-danger').append('<p>'+value+'</p>');
                    //         });
                    //     }
                    // });
                }
            });
        });*/
        function recaptchaCallback() {
            $('#hiddenRecaptcha').valid();
        }
    </script>

</body>

</html>