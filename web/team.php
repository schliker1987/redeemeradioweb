<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SuperHeroFM - Free web proxy, Free Anonymous VPN, Free anonymous surfing, IP protection, Secret surfing, Protect your internet freedoms!</title>
	
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
		
		var SuperHeroFM = this.SuperHeroFM = {
			
			init_dropdown: function() {
				$(".dropdown-menu li a").click(function(){
				  var selText = $(this).text();
				  $('.dropdown-toggle').html(selText+' <span class="caret"></span>');
				  
				  // global url
				  var global_url = $('#form-global-url').val();
				  
				  // conditionals
				  if (selText == "CGIProxy") {
					  
				  }
				  
				});
			},
			
			init_onsubmit: function() {
				var global_url = $('#form-global-url').val();
				var service_text = $('.dropdown-toggle').text().trim();
				if (service_text == 'CGIProxy') {
					//set CGIProxy form to the URL value and submit it!
					$('form#cgiproxy').find('input[name="URL"]').val(global_url);
					$('form#cgiproxy').submit();
				}
				if (service_text == 'A2') {
					//set CGIProxy form to the URL value and submit it!
					$('form#a2').find('input[name="q"]').val(global_url);
					$('form#a2').submit();
				}
				if (service_text == 'Glype') {
					//set CGIProxy form to the URL value and submit it!
					$('form#glype').find('input[name="u"]').val(global_url);
					$('form#glype').submit();
				}
				return false;
			},
			
			init_enter: function() {
				$('input#form-global-url').keypress(function (e) {
				  if (e.which == 13) {
				    $('form#global_form').submit();
				    return false;    //<---- Add this line
				  }
				});
				
			},
			
			init: function() {
				SuperHeroFM.init_dropdown();
			}
				
				
		};
		
		$( document ).ready(function() {
			  // Handler for .ready() called.
			  SuperHeroFM.init();
			  SuperHeroFM.init_enter();
		});
	
		function addUrl(url){
			document.getElementById('address_box').value = url;
		}
		
		function showOptions(){
			document.getElementById('options').style.display = 'show';
		}
		
		function form_submit() {
			init_form_submit();
		}
				
  	</script>
	
</head>

<body onload="" id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="glyphicon glyphicon-align-justify" style='color: #fff;'></i>
                </button>
                <a class="navbar-brand page-scroll" href="/">
                    <i class="glyphicon glyphicon-lock"></i>  <span class="light">Anony</span>Proxies
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/#about">About</a>
                    </li>
                   	
                   	<li>
                        <a class="page-scroll" href="/#anonymailer">Anony<b>Mailer</b></a>
                    </li>
                   	
                    <li>
                        <a class="page-scroll" href="/#vpn">Anony<b>VPN</b></a>
                    </li>
                   
                    <li>
                        <a class="page-scroll" href="/#contact">Contact</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="/#terms">Terms</a>
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
                        
                        <h1>Our Team</h1>
                
		                <div style='font-size:; padding-right: 15px;'>
		                	
							<p>We have an amazing team of amazing people at SuperHeroFM: </p>
							
                            <ul dir="auto">
                                <li>Alexander Schliker (Founder) - <a href="http://alexanderschliker.com" rel="nofollow">http://alexanderschliker.com</a> </li>
                                <li>King David S. </li>
                                <li>Schliker Family</li>
                                <li>Shliker Family</li>
                                <li>Misha S.</li>
                                <li>Alexander Schliker Sr Sr Sr</li>
                                <li>Lubov S.</li>
                                <li>Dora A.</li>
                                <li>I. Akselrod</li>
                                <li>Sadovsky Family</li>
                                <li>Zilberman Family</li>
                                <li>Jake</li>
                                <li>Teddy R.</li>
                                <li>Pauly Graham</li>
                                <li>Mikey Arrington (co-Founder)</li>
                                <li>Austin Jones</li>
                                <li>Mike Adams</li>
                                <li>LBJ</li>
                                <li>Biden</li>
                                <li>KH</li>
                                <li>Barack Obama</li>
                                <li>Austin L.</li>
                                <li>Ben Franklin</li>
                                <li>JFK</li>
                                <li>D.J.</li>
                                <li>YC</li>
                                <li>Einsteins</li>
                                <li>George Washington</li>
                                <li>George Washington Sr Sr Sr</li>
                                <li>Alexander Hamilton Family</li>
                                <li>Malia Obama</li>
                                <li>John Sibley</li>
                                <li>Team Github</li>
                                <li>Post Offices</li>
                                <li>DownNotifier</li>
                                <li>DigitalOcean Founders (Sponsor)</li>
                                <li>Github (Sponsor)</li>
                                <li>Facebook earliest team</li>
                                <li>PHProxy</li>
                                <li>PHProxy++</li>
                                <li>CGIProxy</li>
                                <li>A2</li>
                                <li>Glype</li>
                                <li>Squirrelmail</li>
                                <li>James Brown Jr Jr Jr Jr.</li>
                                <li>Teddy DR Jr Jr...</li>
                                <li>Kennedy Squared Sr Sr Sr Sr Sr</li>
                                <li>Bush Jr Jr Jr.</li>
                                <li>Moses Rayhawk Charles Jr Jr Jr.</li>
                                <li>Einstein Squared.</li>
                                <li>Alexander Schliker (Founder)</li>
                                <li>BofA</li>
                                <li>Wells Fargo</li>
                                <li>PayPal</li>
                                <li>Hewlett and Packard</li>
                                <li>HP</li>
                                <li>Adobe</li>
                                <li>PhoneGap</li>
                                <li>Kennedy Sr Sr</li>
                                <li>Billy Gates</li>
                                <li>Git-scm</li>
                                <li>King David S. </li>
                                <li>Alexander Schliker </li>
                                <li>Nginx</li>
                                <li>Veronica M.</li>
                                <li>Gerald F.</li>
                                <li>Michael Clinton</li>
                                <li>Clinton</li>
                                <li>Teddy Jr. Jr. Jr.</li>
                                <li>Kroger Grocery Store</li>
                                <li>Humanoids</li>
                                <li>Whitehouse.com</li>
                                <li>Gerald F. Jr Jr Jr Jr</li>
                                <li>Kenedy Jr Jr Jr</li>
                                <li>Larry Page (Co-Founder)</li>
                                <li>Sergey Brin (Co-Founder)</li>
                                <li>Emil Gilliam</li>
                                <li>Gerald F. Jr Jr Jr Jr Jr</li>
                                <li>Teddy Jr Jr</li>
                                <li>Kennedy Sr.</li>
                                <li>S.H.</li>
                                <li>Moses Sr.</li>
                                <li>Obama Sr.</li>
                                <li>Bush Sr Sr</li>
                                <li>Kennedy Jr</li>
                                <li>Eisy Senior</li>
                                <li>Luke Eisy</li>
                                <li>James Lindenbaum</li>
                                <li>Kirt</li>
                                <li>Moses Charles 2nd</li>
                                <li>Einstein Jr Jr Jr Jr Jr</li>
                                <li>Gerald Ford Jr Jr Jr</li>
                                <li>Brooke S.</li>
                                <li>Kensington</li>
                                <li>Weiser</li>
                                <li>Sanitation Departments</li>
                                <li>Builders Lodge Frisco</li>
                                <li>Kennedy Sr Sr Sr</li>
                                <li>Kennedy Squared</li>
                                <li>Eisy from the Bronx</li>
                                <li>Bush Jr Jr F.</li>
                                <li>Teddy from H.</li>
                                <li>Kennedy Jr Jr F.</li>
                                <li>Team Google</li>
                                <li>Team Adobe</li>
                                <li>Teddy Sr Sr Sr Sr Sr</li>
                                <li>Bush Sr Sr</li>
                                <li>Circles</li>
                                <li>Shields</li>
                                <li>Infinities</li>
                                <li>Superheroes</li>
                                <li>Grids</li>
                                <li>Super-grids</li>
                                <li>Whitehouse.com</li>
                                <li>Africa</li>
                                <li>Moses RC Jr</li>
                                <li>HP Enterprise</li>
                                <li>HP</li>
                                <li>Johnston Family</li>
                                <li>Dustin Curtis</li>
                                <li>Pidgin</li>
                                <li>Einstein Sr Sr Sr</li>
                                <li>Jefferson Jr Jr Jr</li>
                                <li>Biden Sr Sr</li>
                                <li>Joseph Stalin Sr</li>
                                <li>PE Alexander Schliker (co-Founder)</li>
                                <li>AWStats</li>
                                <li>Richie Rich</li>
                                <li>Moses Rayhawk Sr Sr</li>
                                <li>Teddy Jr Jr Jr</li>
                                <li>Kennedy Sr Sr Sr</li>
                                <li>Teddy Delano Bush Sr Sr Sr</li>
                                <li>ChronicPulse.net</li>
                                <li>WindySurf</li>
                                <li>Gerald Ford Jr Jr Jr Jr</li>
                                <li>Moses Rayhawk Sr Sr</li>
                                <li>Kennedy Sr Sr</li>
                                <li>Kennedy Jr Jr Jr Jr Jr</li>
                                <li>Teddy Sr Squared</li>
                                <li>Bush</li>
                                <li>Einstein Sr Sr</li>
                                <li>Gerald Ford Sr Sr</li>
                                <li>Stalin</li>
                                <li>King David S.</li>
                                <li>Alexander Schliker</li>
                            </ul>

							
		                </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- 
    <div id="map"></div>
	Map Section -->
	
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; <a href='https://www.superherofm.com'>SuperHeroFM.com</a>: free web proxy, http proxy & VPN! <!-- Attribution link to SuperHeroFM.com is required! Email founders@superherofm.com and we can add your website to our list of mirrors sending you ample traffic! --> <a href='/privacy.html'>Privacy policy</a>. <a href='/team.html'>Our team</a>.</p>
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
