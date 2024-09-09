<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_register";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_name = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Prepare the SQL query to insert data into the table
    $sql = "INSERT INTO contacts (username, email, phone, subject, message) VALUES ('$user_name', '$email', '$phone', '$subject', '$message')";

    // Execute the query and check for errors
    if ($conn->query($sql) === TRUE) {
        // Show success alert using JavaScript
        echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'contact.php'; // Redirect to the contact page after alert is closed
              </script>";
    } else {
        // Show error alert using JavaScript
        echo "<script>
                alert('There was an error sending your message: " . $conn->error . "');
              </script>";
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>JanSeva - Urban CO-Operative Bank</title>

<!-- Fav Icon -->
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="assets/css/font-awesome-all.css" rel="stylesheet">
<link href="assets/css/flaticon.css" rel="stylesheet">
<link href="assets/css/owl.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/css/nice-select.css" rel="stylesheet">
<link href="assets/css/elpath.css" rel="stylesheet">
<link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
<link href="assets/css/switcher-style.css" rel="stylesheet">
<link href="assets/css/rtl.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/module-css/page-title.css" rel="stylesheet">
<link href="assets/css/module-css/contact.css" rel="stylesheet">
<link href="assets/css/module-css/subscribe.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">
<!-- Include SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>


<!-- page wrapper -->
<body>
    <div class="boxed_wrapper ltr">

        <!-- page-direction -->
        <div class="page_direction">
            <div class="demo-rtl direction_switch"><button class="rtl">RTL</button></div>
            <div class="demo-ltr direction_switch"><button class="ltr">LTR</button></div>
        </div>
        <!-- page-direction end -->

        <!-- main header -->
        <header class="main-header">
            <!-- header-top -->
            <div class="header-top">
                <div class="large-container" style="height: 5px;padding-bottom: 13px;">
                    <div class="top-inner">
                        <ul class="links-list clearfix">
                            <li><a href="index.php">Career</a></li>
                            <li><a href="index.php">Faq</a></li>
                            <li><a href="index.php">Rewards</a></li>
                            <li><a href="index.php">Media</a></li>
                        </ul>
                        <ul class="info-list clearfix"> 
                            <li>
                                <i class="icon-1"></i>
                                <a href="mailto:info@example.com">JanSevaBank@gmail.com</a>
                            </li>
                            <li>
                                <i class="icon-2"></i>
                                Find Nearest Branch
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header-lower -->
            <div class="header-lower" style="height: 60px;">
                <div class="large-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <div class="shape"></div>
                            <figure class="logo"><a href="index.php"><img src="assets/images/log.png" style="height: 50px;margin-top: 15px;" alt=""></a></figure>
                        </div>
                        <div class="menu-area">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light clearfix">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li><a href="about.php" style="padding-top: 19px;">About</a></li>
                                        <li class="dropdown"><a href="services-2.php" style="padding-top: 19px;">Services</a>
                                            <ul>
                                                <li><a href="service-2.php">Our Services</a></li>
                                                <li><a href="service-2.php">Our Services 2</a></li>
                                                <li><a href="service-2.php">Digital Banking</a></li>
                                                <li><a href="service-2.php">Mobile & Web Banking</a></li>
                                                <li><a href="service-2.php">Insurance Policies</a></li>
                                                <li><a href="service-2.php">Home & Property Loan</a></li>
                                                <li><a href="service-2.php">All Bank Account</a></li>
                                                <li><a href="service-2.php">Borrowing Accounts</a></li>
                                                <li><a href="service-2.php">Private Banking</a></li>
                                                <li><a href="service-2.php">Fixed Term Account</a></li>
                                            </ul>
                                        </li> 
                                        <li class="dropdown"><a href="index.php" style="padding-top: 19px;">Pages</a>
                                            <ul>
                                                <li class="dropdown"><a href="index.php">Directors</a>
                                                    <ul>
                                                        <li><a href="team.php">Board of Directors</a></li>
                                                        <li><a href="team-details.php">Director Details</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown"><a href="career.php" style="padding-top: 19px;">Career</a>
                                                    <ul>
                                                        <li><a href="career.php">Career Page</a></li>
                                                        <li><a href="career-details.php">Career Details</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown"><a href="index.php" style="padding-top: 19px;">Blog</a>
                                                </li>
                                                <li><a href="service-2.php">Credit Cards</a></li>
                                                <li><a href="faq.php">General FAQ’s</a></li>
                                                
                                            </ul>
                                        </li> 
                                        <li class="current"><a href="contact.php" style="padding-top: 19px;">Contact</a></li> 
                                    </ul>
                                </div>
                            </nav>
                            <div class="menu-right-content ml_70">
                                <a href="/login-register/myadmin/login.php" class="theme-btn btn-two mr_20">Login</a>
                                <a href="contact.php" class="theme-btn btn-one">Open Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="large-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <div class="shape"></div>
                            <figure class="logo"><a href="index.php"><img src="assets/images/log.png" style="height: 50px;" alt=""></a></figure>
                        </div>
                        <div class="menu-area">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                            <div class="menu-right-content ml_70">
                                <a href="/login-register/myadmin/login.php" class="theme-btn btn-two mr_20">Login</a>
                                <a href="contact.php" class="theme-btn btn-one">Open Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->


        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.php"><img src="assets/images/log.png" style="height: 50px;" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>JanSeva Urban Co-operative Bank</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">JanSevaBank@gmail.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.php"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->


        <!-- page-title -->
        <section class="page-title centred">
            <div class="bg-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-18.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-17.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Contact Details</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->


        <!-- contact-info-section -->
        <section class="contact-info-section centred pt_120 pb_90">
            <div class="auto-container">
                <div class="sec-title mb_70">
                    <h6>Contact US</h6>
                    <h2>Contact Details</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                        <div class="info-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-2"></i></div>
                                <h3>Our Location</h3>
                                <p>JanSeva Urban Co-operative Bank <br />Itwari</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                        <div class="info-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-43"></i></div>
                                <h3>Email Address</h3>
                                <p><a href="mailto:contact@example.com">JanSevaBank@gmail.com</a><br /> <a href="mailto:support@example.com">support@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                        <div class="info-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-44"></i></div>
                                <h3>Phone Number</h3>
                                <p>Emergency Cases <br /><a href="tel:2085550112">+(208) 555-0112</a> (24/7)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-info-section end -->

        <!-- contact-section -->
        <section class="contact-section pt_120 pb_120">
            <div class="auto-container">
                <div class="sec-title centred mb_70">
                    <h6>Contact US</h6>
                    <h2>Contact Details</h2>
                </div>
                <div class="form-inner">
    <form method="post" action="contact.php" id="contact-form" class="default-form"> 
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="text" name="username" placeholder="Your Name" required="">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="email" name="email" placeholder="Your email" required="">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="text" name="phone" required="" placeholder="Phone">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="text" name="subject" required="" placeholder="Subject">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <textarea name="message" placeholder="Type message"></textarea>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                <button class="theme-btn btn-one" type="submit" name="submit-form">Send Message</button>
            </div>
        </div>
    </form>
</div>

            </div>
        </section>
        <!-- contact-section end -->


        <!-- subscribe-section -->
        <section class="subscribe-section">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-5.png);"></div>
            <div class="auto-container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                        <div class="text-box">
                            <h2>Subscribe us to Recieve Latest Updates</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                        <div class="form-inner ml_40">
                            <form method="post" action="https://main/JanSeva/contact.php">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Your email" required>
                                    <button type="submit" class="theme-btn btn-two">Subscribe Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscribe-section end -->


        <!-- main-footer -->
        <footer class="main-footer">
            <div class="widget-section">
                <div class="pattern-layer">
                    <div class="pattern-1" style="background-image: url(assets/images/shape/shape-8.png);"></div>
                    <div class="pattern-2" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                </div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget logo-widget">
                                <figure class="footer-logo"><a href="index.php"><img src="assets/images/log.png" style="height: 50px;" alt=""></a></figure>
                                <p>Tincidunt neque pretium lectus donec risus. Mauris mi tempor nunc orc leo consequat vitae erat gravida lobortis nec et sagittis.</p>
                                <ul class="social-links">
                                    <li><a href="index.php"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index.php"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index.php"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml_40">
                                <div class="widget-title">
                                    <h4>Explore</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="index.php">Testimonials</a></li>
                                        <li><a href="career.php">Careers</a></li>
                                        <li><a href="career.php">Career Detail</a></li>
                                        <li><a href="faq.php">Faq’s</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>Usefull Links</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.php">Credit Card</a></li>
                                        <li><a href="index.php">Saving Account</a></li>
                                        <li><a href="index.php">Digital Gift Cards</a></li>
                                        <li><a href="index.php">Apply for Loans</a></li>
                                        <li><a href="index.php">Mobile Application</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h4>Find Our Branch & ATM</h4>
                                </div>
                                <div class="form-inner">
                                    <form method="post" action="https://main/JanSeva/index.php">
                                        <div class="form-group">
                                            <div class="select-box">
                                                <select class="wide">
                                                   <option data-display="Branch">Branch</option>
                                                   <option value="1">Nagpur</option>
                                                   <option value="2">Mumbai</option>
                                                   <option value="3">Delhi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="location" placeholder="Location">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="theme-btn btn-one">Find on Map</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom centred">
                <div class="auto-container">
                    <div class="copyright"><p>Copyright 2024 by <a href="index.php">JanSeva Urban Co-operative Bank </a>. All Right Reserved.</p></div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->



        <!--Scroll to top-->
        <div class="scroll-to-top">
            <div>
                <div class="scroll-top-inner">
                    <div class="scroll-bar">
                        <div class="bar-inner"></div>
                    </div>
                    <div class="scroll-bar-text">Go To Top</div>
                </div>
            </div>
        </div>
        <!-- Scroll to top end -->
        
    </div>


    <!-- jequery plugins -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jQuery.style.switcher.min.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body>

</html>
