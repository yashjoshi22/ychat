<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ychat - Compose</title>
    <link rel="shortcut icon" href="favicon.ico" />

    <meta charset="utf-8">

<meta name="description" content="Ychat Online - Easiest and secured way to send and receive self destructive messages">
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
                        <a class="nav-link button" href="login.php" >Login/Register</a>
                    </li>
                                    </ul>
            </div>
        </nav>

        <main class="site_main">
                <input type="hidden" name="test" id="test" value="12345647">
    <section class="container">
        <div class="section-main">
            <div id="loader-bg" style="display: none;">
                <div class="loader" id="loader"></div>
            </div>
            <form id="create-message">
                <div class="message-box  create-message">
                    <h1>Compose Self Destructive Message</h1>
                    <p>Write message below and receive a short URL to share with intended recipient  <span>(example: https:www.example.com).</span></p>
                     <input type="email" name="toEmail"  id="toEmail" class="form-control"  placeholder="To Email (optional)" />
                    <label for="email"></label>
                    <input type="email" name="ccEmail"  id="ccEmail" class="form-control" value="" placeholder="Your Email (optional)" />
                    <label for="ccemail"></label>
                    <input type="text" name="subject" id="subject" class="form-control" value="" placeholder="Subject" required />

                    <textarea id="message" name="message" placeholder="Message" rows="5"
                              required maxlength="160"></textarea>
                    <label>Maximum 160 characters</label>
                    <span id="rchars">160 </span> : Character(s) Remaining
                    <select id="duration" name="duration" required>
                        <option value="0" disabled selected>Select Duration</option>
                                                    <option disabled style=" background: #dddddd;"> Never expire (For registered users only.) </option>
                                                <option value="15">15 second</option>
                        <option value="30">30 second</option>
                        <option value="60">1 minute</option>
                        <option value="300">5 minute</option>
                    </select>
                    <label for="duration">Message will self-destruct after the defined duration</label>
                    <div class="proccess-with-password">
                        <label class="Protected">Protect with Password
                            <input type="checkbox" id="is_protected" value="no">
                            <div class="pass-hint">
                                <input type="password" placeholder="Set Password" name="psw" id="psw" maxlength="16" />
                                <input type="text" placeholder="Password Hint" name="psw_hint" maxlength="50" id="psw_hint" />
                            </div>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    
                    <div class="d-flex justify-content-between w-100 align-items-center mt-3 flex-sm-row flex-column">
                        <button class="button m-0" id="generate-btn"><i class="fa fa-link"
                                                                    aria-hidden="true"></i>Generate URL</button>
                        <p class="message-counts m-0 mt-2 mt-sm-0">5,731 messages delivered so far.</p>
                    </div>
                </div>
            </form>
            <div class="message-box hideDiv" style="display: none;">
                <h1>Secure Url</h1>
                <div class="secure-url-box">
                    <p>Share the below URL to provide access to your encrypted secure messages. Recipients with the following can access your secure message. </p>
                    <div class="show-message-box" id="genetated-url" style="text-transform: none"></div>
                    <div class="button-box">
                        <a href="#" id="copyButton" class="button copy-url copy"><i class="fa fa-clone"
                                                                               aria-hidden="true"></i>Copy</a>
                        <a href="javascript:;" class="button share-in-email share share-btn" rel=""><i class="fa fa-share-alt"
                                                                     aria-hidden="true"></i>Share</a>
                        <a href="#" class="button discard-in-message discard"><i class="fa fa-trash-o"
                                                                         aria-hidden="true"></i>Discard</a>
                        <a href="index.html" class="button"><i class="fa fa-commenting-o" aria-hidden="true"></i>Another Message</a>

                    </div>
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


  
    <script type="text/javascript">
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        var element = document.getElementById('text');
        const shareButton = document.querySelector('.share-btn');

        shareButton.addEventListener('click', event => {
            const shareUrl = shareButton.getAttribute("rel");
            if (navigator.share) {
                navigator.share({
                    title: 'Ychat',
                    url: shareUrl
                }).then(() => {
                    console.log('Thanks for sharing!');
                })
                .catch(console.error);
            } else {
                console.log('href needs to work');
                shareButton.setAttribute("href", "mailto:?body=" + shareUrl);
            }
        });

        $(document).ready(function() {
            $("#ccEmail").hide();
            $("#toEmail").hover(function() {
                if ($("#toEmail").val()) {
                    $("#ccEmail").fadeIn(800);
                }
                 else {
                    $("#ccEmail").hide();
                }
              /*  if ($("#toEmail").val())
            {
                $("#ccEmail").fadeIn(1000);
            }*/
            });

                $("#create-message").validate({

                rules: {
                    subject: {
                        required: '' == true,
                    },
                    toEmail: {
                        email: true,
                    },
                    ccEmail: {
                        email: true,
                    },
                    message: {
                        required: true,
                        maxlength: 160
                    },
                    psw: {
                        required: function(element) {
                            if ($('#is_protected').is(':checked')) {
                                var e = document.getElementById("psw");
                                return e.value == "";
                            } else {
                                return false;
                            }
                        }

                    },
                },
                submitHandler: function(form) {
                    $("#send-message").send();
                }
            });
        });
        $(document).delegate(".discard-in-message", "click", function() {
            if (confirm("Do you sure want to discard the message?") == true) {
                $(".discard-in-message").discardMessage();
            }
        });

        document.getElementById("copyButton").addEventListener("click", function() {
            copyToClipboard(document.getElementById("genetated-url"));
        });
        var maxLength = 160;
        $('textarea').keyup(function() {
            var textlen = maxLength - $(this).val().length;
            $('#rchars').text(textlen);
        });
        function copyToClipboard(elem) {
            // create hidden text element, if it doesn't already exist
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);

            // copy the selection
            var succeed;
            try {
                succeed = document.execCommand("copy");
            } catch (e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }

            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            return succeed;
        }
    </script>

</body>
</html>
