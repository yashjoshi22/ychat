

<head>
    <title>SMS - About Us</title>
</head>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMS - About-us</title>
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
    function gtag(){dataLayer.push(arguments);}
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
                        <a class="nav-link button" href="login.php" >Login/Register</a>
                    </li>
                                    </ul>
            </div>
        </nav>

        <main class="site_main">
            
    <input type="hidden" name="test" id="test" value="12345647">
    <section class="container">
        <div class="section-main about-us-page">
                <div class="message-box about-us">
                    <h1>About Us</h1>
                    <p><span>youchat</span> is an encrypted messaging platform that provides end-to-end encrypted and self-destructive one-way text-based communication. Share one time passwords, bookmarks, credentials, information of value etc.</p>
                    <p><span>youchat</span> is also ideated as a Open Source project by <a href="https://youchat.com/" target="_blank">youchat Technologies</a>. This platform (youchat.com)  puts its users first. There are no ads, no affiliate marketers, no tracking. Just an open sourced encrypted selfdestructive one way communication platform for a fast, simple, and secure messaging experience.</p>
                    <div class="subscribe-main">
                        <form class="subscribe" method="post" action="https://Ychat/about-us" >
                            <input type="hidden" name="_token" value="04bZpCtKQKfjPXntUryYT58MxfseuMRGqs84n71y">                                <div class="email">
                                    <input type="email" placeholder="Email address*" name="mail" required>
                                </div>
                                <div class="subscribe-button">
                                    <input type="submit" value="Subscribe" name="sub">
                                </div>
                                <br>
                                <span id="text-data"></span>
                        </form>
                    </div>
                </div>
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


  
    <script>
        $(function(){
            $(".subscribe").on("submit", function(event) {
                event.preventDefault();

                var formData = {
                    "_token": "04bZpCtKQKfjPXntUryYT58MxfseuMRGqs84n71y",
                    'email': $('input[name=mail]').val()
                };

                $.ajax({
                    url: "/api/v1/subscribe-newsletter",
                    type: "post",
                    data: formData,
                    success: function(d) {
                        console.log(d);
                        if (d.message_type != 'Error') {
                            $('input[name=mail]').val('');
                            $('#text-data').empty().attr('class','text-success').text(d.message);
                        } else {
                            $('#text-data').empty().attr('class','text-danger').text(d.message);
                        }
                    }
                });
            });
        });
    </script>

</body>
</html>
