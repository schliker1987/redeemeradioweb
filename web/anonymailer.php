<?php

	if ($_POST['to'] && $_POST['subject'] && $_POST['from']) {
		$to      = $_POST['to'];
		$subject = $_POST['subject'];
		$message = $_POST['message'] . '

-------		
Powered by AnonyMailer (free anonymous emailer) from https://superherofm.com subject to terms: https://superherofm.com/#terms
';

		$headers = 'From: ' . $_POST['from'] . "\r\n" .
		    'Reply-To: ' . $_POST['from'] . "\r\n" .
		    'Sender: no-reply@superherofm.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		
		mail($to, $subject, $message, $headers);
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SuperHeroFM - Free web proxy, Free Anonymous VPN, Free anonymous surfing, IP protection, Secret surfing, AnonySurf, Protect your internet freedoms!</title>
	
    <!-- Bootstrap Core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="static/css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="static/css/font.lora.css" rel="stylesheet" type="text/css">
    <link href="static/css/font.montserrat.css" rel="stylesheet" type="text/css">
    
    <!-- jQuery Version 1.11.0 -->
    <script src="static/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="static/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="static/js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="static/js/grayscale.js"></script>
    
    <!-- Load the different js libraries for the different scripts -->
	<script src="/a2/main.js"></script>
	
	<script type="text/javascript">
		
  	</script>
	
</head>

<body onload="" id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
            	
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars" style='color: #fff;'></i>
                </button>
                
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="glyphicon glyphicon-lock"></i>  <span class="light">Anony</span>Surfer
                </a>
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"> 
                                        
                        <h1 class="brand-heading">Message has been sent!</h1>
                        <p class="intro-text">
                        	Note, we included a small "powered by AnonyMailer from SuperHeroFM.com" advertisement in your footer!  
                        	Subscribe today and we'll remove the advertisement!
                        	
                        </p>
						
                    </div>
                </div>
            </div>
        </div>
    </header>

 
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; SuperHeroFM.com! <a href='privacy.html'>Privacy policy</a>.</p>
        </div>
    </footer>
    
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-55265328-1', 'auto');
	  ga('send', 'pageview');
	
	</script>


</body>

</html>
