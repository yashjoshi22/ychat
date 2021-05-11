<head>
    <title></title>
</head>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMS - Request Quote</title>
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
            <section class="container">
    <div class="section-main requet-a-quote-section">
        <div id="loader-bg" style="display: none;">
            <div class="loader" id="loader"></div>
        </div>
        <form id="requet-a-quote">
            <div class="message-box create-message requet-a-quote">
                <h1>Request A quote</h1>
                <label for="email"></label>
                <input type="email" name="email_id" id="email_id" class="form-control" value="" placeholder="Email" />
                <textarea name="message" id="message" placeholder="Description" rows="5" required maxlength="160"></textarea>
                <input class="button" type="submit" name="submit" id="submit" value="Submit">
                <span id="text-data" class="response-message"></span>
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


  
<script>
    $(document).ready(function() {
        $("#requet-a-quote").validate({
            rules: {
                email_id: {
                    required: true,
                    email: true,
                },
                message: {
                    required: true,
                    maxlength: 500
                },
            },
            submitHandler: function(form) {
                $(".btn-loader").removeClass("hide");
                saveQuote();
            }
        });
    });

    function saveQuote() {
        var formData = {
            "_token": "04bZpCtKQKfjPXntUryYT58MxfseuMRGqs84n71y",
            'email_id': $('input[name=email_id]').val(),
            'message': $('#message').val()
        };

        $.ajax({
            url: "/api/v1/request-quote-store",
            type: "post",
            data: formData,
            success: function(d) {
                console.log(d);
                if (d.message_type != 'Error') {
                    $('#message').val('');
                    $('input[name=email_id]').val('');
                    $('#text-data').empty().attr('class','response-message text-success').text(d.message);
                } else {

                    $('#text-data').empty().attr('class','response-message text-danger').text(d.message);
                }
                $(".btn-loader").addClass("hide");
            }
        });
    }



</script>

</body>
</html>
