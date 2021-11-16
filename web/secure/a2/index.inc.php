<?php 
header('content-type:text/html;charset=utf-8;');
if (basename(__FILE__) == basename($_SERVER['PHP_SELF']))
{
    exit(0);
}

echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SuperHeroFM - <?php echo $GLOBALS['_config']['script_title']; ?> - Free web proxy, Free Anonymous VPN, Free anonymous surfing, IP protection, Secret surfing, AnonySurf, Protect your internet freedoms!</title>
	
    <!-- Bootstrap Core CSS -->
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/static/css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/static/css/font.lora.css" rel="stylesheet" type="text/css">
    <link href="/static/css/font.montserrat.css" rel="stylesheet" type="text/css">
    
    <!-- jQuery Version 1.11.0 -->
    <script src="/static/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/static/js/bootstrap.min.js?"></script>

    <!-- Plugin JavaScript -->
    <script src="/static/js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/static/js/grayscale.js"></script>
</head>

<body onload="" id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="glyphicon glyphicon-align-justify" style='color: #fff;'></i>
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
                    <li>
                        <a class="page-scroll" href="/index.html#about">About</a>
                    </li>
                   	
                   	<li>
                        <a class="page-scroll" href="/index.html#anonymailer">Anony<b>Mailer</b></a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="/index.html#vpn">Anony<b>VPN</b></a>
                    </li>
                   
                    <li>
                        <a class="page-scroll" href="/index.html#contact">Contact</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="/index.html#terms">Terms</a>
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
                                        
                        <h1 class="brand-heading" style='margin-top:0;'>SuperHeroFM</h1>
                        
                        <?php 
                        	if (!$data['category'] || $data['category'] == null) { 
                        ?>
                        		<p>Welcome to the A2 free web proxy powered by SuperHeroFM!</p>
						
						<?php
						
                        	}
						
							switch ($data['category'])
							{
								case 'auth':
						?>
						
						<div id="auth">
							<p>
						    <b>Enter your username and password for "<?php echo htmlspecialchars($data['realm']) ?>" on <?php echo $GLOBALS['_url_parts']['host'] ?></b>
							<form method="post" action="">
							<input type="hidden" name="<?php echo $GLOBALS['_config']['basic_auth_var_name'] ?>" value="<?php echo base64_encode($data['realm']) ?>" />
							<label>Username <input style='color: #000; height: 20px;' type="text" name="username" value="" /></label> 
							<label>Password <input style='color: #000; height: 40px;' type="password" name="password" value="" /></label> 
							<button type="submit" class='btn btn-gray'>Login</button>
							</form>
							</p>
						</div>
						
						<?php
					        break;
					    case 'error':
					        echo '<div id="error"><p>';
					        
					        switch ($data['group'])
					        {
					            case 'url':
					                echo '<b>URL Error (' . $data['error'] . ')</b>: ';
					                switch ($data['type'])
					                {
					                    case 'internal':
					                        $message = 'Failed to connect to the specified host. '
					                                 . 'Possible problems are that the server was not found, the connection timed out, or the connection refused by the host. '
					                                 . 'Try connecting again and check if the address is correct.';
					                        break;
					                    case 'external':
					                        switch ($data['error'])
					                        {
					                            case 1:
					                                $message = 'The URL you\'re attempting to access is blacklisted by this server. Please select another URL.';
					                                break;
					                            case 2:
					                                $message = 'The URL you entered is malformed. Please check whether you entered the correct URL or not.';
					                                break;
					                        }
					                        break;
					                }
					                break;
					            case 'resource':
					                echo '<b>Resource Error:</b> ';
					                switch ($data['type'])
					                {
					                    case 'file_size':
					                        $message = 'The file your are attempting to download is too large.<br />'
					                                 . 'Maxiumum permissible file size is <b>' . number_format($GLOBALS['_config']['max_file_size']/1048576, 2) . ' MB</b><br />'
					                                 . 'Requested file size is <b>' . number_format($GLOBALS['_content_length']/1048576, 2) . ' MB</b>';
					                        break;
					                    case 'hotlinking':
					                        $message = 'It appears that you are trying to access a resource through this proxy from a remote Website.<br />'
					                                 . 'For security reasons, please use the form below to do so.';
					                        break;
					                }
					                break;
					        }
					        
					        echo 'An error has occured while trying to browse through the proxy. <br />' . $message . '</p></div>';
					        break;
							
						}
						?>
							
						<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="" >
						  
						  <div class="input-group">
						      
						      
      						  <input class="form-control" id="address_box" style='color: #000;' type="text" name="<?php echo $GLOBALS['_config']['url_var_name'] ?>" value="<?php echo isset($GLOBALS['_url']) ? htmlspecialchars($GLOBALS['_url']) : '' ?>" onfocus="this.select()" /> 
						      
						      
							  <span id='form-global-search-span' class="input-group-addon">
							  
							  	<a style="cursor:pointer;" onclick="document.getElementById('options').style.display = (document.getElementById('options').style.display=='none'?'':'none')">options</a>
							  
							  </span>
						      
					      </div><!-- /input-group -->
						  
						  <input id="jsOnOff" name="js" type="hidden" value="0" />
						  
						  
						  	<button class='btn btn-gray' id="go" type="submit" style='margin-left: 0px; margin-top: 10px;'>Browse</button>
							
						
							<div id="options" style='display:none; text-align: center;'>
							  <?php
							  
							  foreach ($GLOBALS['_flags'] as $flag_name => $flag_value)
							  {
								  if (!$GLOBALS['_frozen_flags'][$flag_name])
								  {
									  echo '<label> <input type="checkbox" name="' . $GLOBALS['_config']['flags_var_name'] . '[' . $flag_name . ']" id="' . $flag_name . '"' . ($flag_value ? ' checked="checked"' : '') . ' /> ' . $GLOBALS['_labels'][$flag_name][0] . '</label>' . "\n";
								  }
							  }
							  ?>
							</div>
						</form>	
						
                    </div>
                </div>
            </div>
        </div>
    </header>
 	
 	<div id='map' style='display: none;'></div>
	
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
	
	<script language="javascript" type="text/javascript">
		<!--
		function prepare(){
		document.getElementById('address_box').focus();
		document.getElementById('options').style.display = 'none';
		document.getElementById('jsOnOff').value = 1; 
		}
		function addUrl(url){
		document.getElementById('address_box').value = url;
		}
		
		function showOptions(){
		document.getElementById('options').style.display = 'show';
		}
		
		//-->
	</script>


</body>

</html>

