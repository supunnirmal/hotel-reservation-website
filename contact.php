<?php

$msg = "";

if(isset($_POST['submit'])) {
   
  
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
   
   
if(!empty($username)||!empty($email)||!empty($subject)||!empty($message)){
   $host = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   
       //create a connection
       $conn = new mysqli($host, $dbUsername,$dbPassword,'hotel');
   if(mysqli_connect_error()){
       die('Connection error('.mysqli_connect_error().')'.mysqli_connect_error());
       
   }else{
       $SELECT = "SELECT email FROM contact_us WHERE email = ? Limit 1";
       $INSERT = "INSERT Into  contact_us (name,email,subject,message) value(?,?,?,?)";
       
        //Prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if ($rnum==0) {
     $stmt->close();
     $stmt = $conn->prepare($INSERT);
     $stmt->bind_param("ssss",$name, $email, $subject, $message);
     $stmt->execute();
     $msg = "New record inserted sucessfully";
//         header("location:contact.html");
    } else {
     $msg = "Someone already register using this email";
//         header("location:contact.html");
    }
    $stmt->close();
    $conn->close();

   }
   
}

}
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Lotus Hotel</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/form.css" type="text/css">
    </head>
    <body>
        <!--================Header Area =================-->
        <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="image/Logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                            <li class="nav-item"><a class="nav-link" href="accomodation.html">Accomodation</a></li>
                            <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="blog-single.html">Blog Details</a></li>
                                </ul>
                            </li> 
                            <li class="nav-item active"><a class="nav-link" href="contact.php">Contact</a></li>
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
        <!--================Header Area =================-->
        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Contact Us</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================Contact Area =================-->
        <br>
        <br>
        <iframe class="iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.047633243311!2d80.1071495094891!3d6.124292219433885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae236d65d605bbd%3A0x7e7d2620674431cc!2sLotus%20Garden%20-%20Hikkaduwa!5e0!3m2!1sen!2slk!4v1582482010694!5m2!1sen!2slk" width="100%" height="600" frameborder="0" style="border:10;" allowfullscreen=""></iframe>
    
        <section class="contact_area section_gap">
          
                <div class="row">
                    <div class="col-md-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-home"></i>
                                <h6>Lotus Garden Hotel</h6>
                                <p>Galle road, Hikkaduwa</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset"></i>
                                <h6><a href="#">+94776680405</a></h6>
                                <p>Mon to Fri 9am to 6 pm</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="#">lotusgardanhotel1@gmail.com</a></h6>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    
    
        <div class="col-md-9">
    
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="contactform">
        <div class="col-md-6">
        <div class="form-group ">
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
			<select class="form-control" id="subject" name="subject" required>
                                    <option value="" selected="selected">- Select -</option>
                                    <option value="General Enquiries">General Enquiries</option>
                                    <option value="Feedback">Feedback</option>
                                    <option value="Special Request">Special Request</option>
                                </select>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <textarea class="form-control" name="message" placeholder="message" required></textarea>
        </div>
        </div>
        <div class="col-md-12 text-right">
            <button class="btn theme_btn button_hover" type="submit" name="submit">send message</button>
        </div>
    </form>
    <span> <?php echo $msg; ?> </span>
</div>

              

                </div>
            
                    </section>
        <!--================Contact Area =================-->
        
        <!--================ start footer Area  =================-->	
<footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Agency</h6>
                            <p>Ranked among the best twenty hotels in the country.Holding a long legacy with the mixture of modern technology.</p>
                        </div>
                    </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Navigation Links</h6>
                            <div class="row">
                                <div class="col-4">
                                    <ul class="list_style">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="accommodation.html">Features</a></li>
                                        <li><a href="about.html#features">Services</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <ul class="list_style">
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>										
                            </div>							
                        </div>
                    </div>							
                   <div class="col-lg-3 col-md-6 col-sm-6">
				   </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget instafeed">
                            <h6 class="footer_title">InstaFeed</h6>
                            <ul class="list_style instafeed d-flex flex-wrap">
                                <li><img src="image/instagram/insta1.jpg" alt=""></li>
                                <li><img src="image/instagram/insta2.jpg" alt=""></li>
                                <li><img src="image/instagram/insta3.jpg" alt=""></li>
                                <li><img src="image/instagram/insta4.jpg" alt=""></li>
                                <li><img src="image/instagram/insta5.jpg" alt=""></li>
                                <li><img src="image/instagram/insta6.jpg" alt=""></li>
                                <li><img src="image/instagram/insta7.jpg" alt=""></li>
                                <li><img src="image/instagram/insta8.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>						
                </div>
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center ss">
                    <div class="col-lg-8 col-sm-12 footer-text m-0">
                        <h4>Contact us through</h4>
                    </div>
                    <div class="col-lg-4 col-sm-12 footer-social margin">
                        <a href="https://www.facebook.com/search/top/?q=Lotus%20Hotel"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/bkk_hotel_lotus?lang=en"><i class="fa fa-twitter"></i></a>                       
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
       
       
       <!--================Contact Success and Error message Area =================-->
        <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Thank you</h2>
                        <p>Your message is successfully sent...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals error -->

        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Sorry !</h2>
                        <p> Something went wrong </p>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Contact Success and Error message Area =================-->
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
    </body>
</html>