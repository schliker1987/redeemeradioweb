<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SuperHeroFM - Super Hero FM is the world's most amazing radio reaching out to Defense, Army, Navy, Air Force, Space Force, onwards!  Halleluyas guys, Halleluyas girls, Halleluyas Sir!</title>

    <!-- Bootstrap Core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="static/css/grayscale.css" rel="stylesheet">
    <link href="static/css/jquery.modal.css" rel="stylesheet">

    <!-- modal CSS -->
    <style>
        p#1weeklyvpn-windows {
            display: none;
        }
        @media (max-width: 590px) {
            section#anonyproxy img {
                display: none;
            }
        }
        #modal-login {
            border-radius: 25px;
            display: none;
            min-width: 280px;
            background: #fff;
            min-height: 220px;
        }
        #modal-login input.form-control {
            min-width: 0;
            width: auto;
            display: inline;
            font-size: .9em;
        }
        #modal-1weeklyproxy-access {
            border-radius: 25px;
            display: none;
            min-width: 280px;
            background: #fff;
            min-height: 220px;
        }
        #modal-1weeklyproxy-access .form-control {
            min-width: 0;
            width: auto;
            display: inline;
            font-size: .9em;
        }
        #modal-1weeklyvpn-access {
            border-radius: 25px;
            display: none;
            min-width: 280px;
            background: #fff;
            min-height: 390px;
        }
        #modal-1weeklyvpn-access input.form-control {
            min-width: 0;
            width: auto;
            display: inline;
            font-size: .9em;
        }
        #modal-stripe {
            border-radius: 25px;
            display: none;
            min-width: 280px;
            background: #fff;
            min-height: 355px;
            background: rgb(255, 255, 255);
            /* Old browsers */
            background: -moz-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(229, 229, 229, 1) 100%);
            /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255, 255, 255, 1)), color-stop(100%, rgba(229, 229, 229, 1)));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(229, 229, 229, 1) 100%);
            /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(229, 229, 229, 1) 100%);
            /* Opera 11.10+ */
            background: -ms-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(229, 229, 229, 1) 100%);
            /* IE10+ */
            background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(229, 229, 229, 1) 100%);
            /* W3C */
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#e5e5e5', GradientType=0);
            /* IE6-9 */
        }
        #modal-stripe input.form-control {
            min-width: 0;
            width: auto;
            display: inline;
        }
    </style>

    <!-- Custom Fonts -->
    <link href="static/css/font.lora.css" rel="stylesheet" type="text/css">
    <link href="static/css/font.montserrat.css" rel="stylesheet" type="text/css">

    <!-- jQuery Version 1.11.0 -->
    <script src="static/js/jquery-1.11.0.js"></script>

    <!-- payment -->
    <script src="static/js/jquery.payment.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="static/js/bootstrap.min.js"></script>

    <!-- bpopup -->
    <script src="static/js/jquery.modal.js"></script>

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

            //modal init
            mirror: function () {
                var selection = $('#select-mirror');
                var option_select = selection.find('option:selected');
                data_hostname = option_select.attr('data-hostname');
                data_ip = option_select.attr('data-ip');
                var timer_loading = setTimeout(function () {
                    $('<option>loading...</option>').appendTo(selection);
                    selection.val('loading...');
                }, 1000);
                var timer_redirect = setTimeout(function () {
                    if ($('#ip-surf-checked').is(':checked'))
                        window.location = 'http://' + data_ip;
                    else
                        window.location = 'http://' + data_hostname;
                }, 2000);

            },

            modal_login: function () {

                if (window.localStorage["email"]) {
                    $('#superherofm_user_form_username').val(window.localStorage["email"]);
                }
                if (window.localStorage["password"]) {
                    $('#superherofm_user_form_password').val(window.localStorage["password"]);
                }
                $('#modal-login').bPopup();

            },

            modal_stripe: function (id, pricing, label, plan) {

                $(id).bPopup({
                    follow: false
                });
                $(id).find('.modal-pricing').html(pricing);
                $(id).find('.modal-label').html(label);
                $(id).find('#plan').val(plan);

            },

            //billing

            stripe_init_form: function () {

                $('input[data-stripe="number"]').payment('formatCardNumber');
                $('input[data-stripe="cvc"]').payment('formatCardCVC');

                $('input[data-stripe="number"]').blur(function () {
                    var card_type = $.payment.cardType($('input[data-stripe="number"]').val());
                    if (card_type)
                        $('.input-group-cc').html(card_type);
                });

                if (window.localStorage["1weeklyvpn-token"]) {
                    $('#btn-1weeklyvpn-access').show();
                    $('#btn-1weeklyvpn-subscribe').hide();
                }

                if (window.localStorage["1weeklyproxy-token"]) {
                    $('#btn-1weeklyproxy-access').show();
                    $('#btn-1weeklyproxy-subscribe').hide();
                }

                if (window.localStorage["1weeklypptp-token"]) {
                    $('#pptp-username').attr('type', 'text');
                    $('#pptp-password').attr('type', 'text');
                    $('#btn-1weeklypptp-subscribe').hide();
                }

                $('button#cc_submit').on('touchend', function (e) {
                    $('#superherofm_stripe').submit();
                });


                $('#superherofm_stripe').submit(function (e) {

                    // show card type: 
                    var card_type = $.payment.cardType($('input[data-stripe="number"]').val());
                    $('.input-group-cc').html(card_type);

                    // run the post
                    SuperHeroFM.stripe(this, '#superherofm_stripe input[data-stripe="email"]', $('#plan').val());

                    return false;

                });

            },

            stripe: function (form_selector, email_field, plan) {

                var $form = $(form_selector);
                var number = $form.find('input[data-stripe="number"]').val();
                var email = $(email_field).val();

                $form.find('button').prop('disabled', true);

                // post to stripe get a card token back
                Stripe.card.createToken($form, function (status, response) {
                    if (response.error) {
                        // Show the errors on the form
                        alert(response.error.message);
                        $form.find('button').prop('disabled', false);
                    } else {
                        // response contains id and card, which contains additional card details
                        var token = response.id;
                        var last_four = number.slice(-4);

                        //generate a password
                        password = Math.floor(Math.random() * 9000) + 1000;

                        // Insert the token into the form so it gets submitted to the server
                        $form.append($('<input type="hidden" name="stripeToken" />').val(token));

                        $.post("/api/users/create_user_token/", {
                                "username": email,
                                "email": email,
                                "password": password,
                                "token": token,
                                "plan": plan,
                                "last_four": last_four,
                            },
                            function (data) {
                                if (data.success) {
                                    alert("Your username and password are now created!  Write down your password! \n\nUsername: " + email + "\nPassword: " + password);

                                    // store the token email and pass
                                    window.localStorage["token"] = token;
                                    window.localStorage["email"] = email;
                                    window.localStorage["password"] = data.password;
                                    window.localStorage["last_four"] = last_four;
                                    window.localStorage["user_stripe_customer_id"] = data.user_stripe_customer_id;
                                    window.localStorage["user_id"] = data.user_id;

                                    // store the token and password for the plan
                                    window.localStorage[plan + "-token"] = token;
                                    window.localStorage[plan + "-email"] = email;
                                    window.localStorage[plan + "-password"] = data.password;
                                    window.localStorage[plan + "-last_four"] = last_four;
                                    window.localStorage[plan + "-user_stripe_customer_id"] = data.user_stripe_customer_id;
                                    window.localStorage[plan + "-user_id"] = data.user_id;

                                    // close the modal
                                    $('.b-close').click();

                                    // launch the vpn details modal
                                    $('#modal-' + plan + '-access').bPopup({
                                        follow: false
                                    });

                                    // show the button
                                    $('#btn-' + plan + '-subscribe').hide();
                                    $('#btn-' + plan + '-access').show();
                                } else {
                                    alert(data.error_msg);
                                }



                            }
                        );




                        // and submit
                        // $form.get(0).submit();
                    }

                    //reset the card type:
                    $('.input-group-cc').html("<i class='glyphicon glyphicon-ok'></i>");

                });
                return false;
            },


            init_dropdown: function () {
                $(".dropdown-menu li a").click(function () {
                    var selText = $(this).text();
                    $('.dropdown-toggle').html(selText + ' <span class="caret"></span>');

                    // global url
                    var global_url = $('#form-global-url').val();

                    // conditionals
                    if (selText == "CGIProxy") {

                    }

                });


            },

            init_onsubmit: function () {
                var global_url = $('#form-global-url').val();
                var service_text = $('.dropdown-toggle').text().trim();
                var is_search = $('#form-global-search').is(':checked');

                var global_search_url = 'http://m.search.aol.com/search?s_it=topsearchbox.nrf&v_t=na&q=';

                if (service_text == 'CGIProxy') {
                    //set CGIProxy form to the URL value and submit it!
                    if (is_search) {
                        var search_string = encodeURI(global_search_url + global_url);
                        $('form#cgiproxy').find('input[name="URL"]').val(search_string);
                    } else {
                        $('form#cgiproxy').find('input[name="URL"]').val(global_url);
                    }
                    $('form#cgiproxy').submit();

                }
                if (service_text == 'A2') {
                    //set A2 form to the URL value and submit it!
                    if (is_search) {
                        var search_string = encodeURIComponent('https://duckduckgo.com/html/?q=' + global_url);
                        window.location = '/a2/index.php?q=' + search_string + '&hl=5c5';
                    } else {
                        window.location = '/a2/index.php?q=' + encodeURIComponent(global_url) + '&hl=5c5';
                    }

                }
                if (service_text == 'Glype') {
                    //set Glype form to the URL value and submit it!
                    if (is_search) {
                        var search_string = encodeURI(global_search_url + global_url);
                        $('form#glype').find('input[name="u"]').val(search_string);
                    } else {
                        $('form#glype').find('input[name="u"]').val(global_url);
                    }
                    $('form#glype').submit();
                }
                if (service_text == 'PHProxy') {
                    //set Glype form to the URL value and submit it!
                    if (is_search) {
                        var search_string = encodeURI(global_search_url + global_url);
                        $('form#phproxy').find('input[id="address_box"]').val(search_string);
                    } else {
                        $('form#phproxy').find('input[id="address_box"]').val(global_url);
                    }
                    $('form#phproxy').submit();
                }
                if (service_text == 'PHProxy++') {
                    //set Glype form to the URL value and submit it!
                    if (is_search) {
                        var search_string = encodeURI(global_search_url + global_url);
                        $('form#phproxy_plus_plus').find('input[name="u"]').val(search_string);
                    } else {
                        $('form#phproxy_plus_plus').find('input[name="u"]').val(global_url);
                    }
                    $('form#phproxy_plus_plus').submit();
                }
                if (service_text == 'v3.2b2') {
                    //set Glype form to the URL value and submit it!
                    if (is_search) {
                        var search_string = encodeURI(global_search_url + global_url);
                        $('form#v32b2').find('input[name="url"]').val(search_string);
                    } else {
                        $('form#v32b2').find('input[name="url"]').val(global_url);
                    }
                    $('form#v32b2').submit();
                }

                return false;
            },

            init_enter: function () {
                $('input#form-global-url').keypress(function (e) {
                    if (e.which == 13) {
                        $('form#global_form').submit();
                        return false; //<---- Add this line
                    }
                });

            },

            init_search: function () {

                $('input[type="checkbox"]#form-global-search').on('click', function (e) {
                    if ($(this).is(":checked")) {
                        $("#form-global-url").val("").focus();
                    } else {
                        $("#form-global-url").val("http://").focus();
                    }

                });

                $('span#form-global-search-span').on('click touchstart', function (e) {
                    if ($(this).find('input[type="checkbox"]').is(':checked') && $('input#form-global-url').val() != '') {
                        if (!$(this).is(':checked'))
                            SuperHeroFM.init_onsubmit();
                    }
                });


            },

            init: function () {
                SuperHeroFM.init_dropdown();
            }


        };

        $(document).ready(function () {
            SuperHeroFM.init();
            SuperHeroFM.init_enter();
            SuperHeroFM.init_search();

            SuperHeroFM.stripe_init_form();
            var timeoutId;
            $('.btn-circle').mousedown(function () {
                timeoutId = setTimeout(function () {
                    window.localStorage.clear();
                    alert('localstore cleared!');
                    window.location = 'index.html';
                }, 5000);
            }).bind('mouseup mouseleave', function () {
                clearTimeout(timeoutId);
            });

            var iOS = (navigator.userAgent.match(/iPad|iPhone|iPod/g) ? true : false);

            if (iOS) {
                $('.ios-hide').hide();
            }

        });

        function addUrl(url) {
            document.getElementById('address_box').value = url;
        }

        function showOptions() {
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
        <div class="container" style='padding-right: 0px;'>
            <div class="navbar-header">

                <button style='padding-top: 7px;' type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="glyphicon glyphicon-align-justify" style='color: #fff;'></i>
                </button>

                <!--<label id='ip-surf' style='float: right; margin: 15px 0px 0px 10px; font-size: .9em; font-weight:normal;'>
                    <input id='ip-surf-checked' type='checkbox' />IP<span id='ip-surf-mirror'>-mirror</span>
                </label>-->

                <select id='select-mirror' onchange='SuperHeroFM.mirror();' style='float: right; margin: 16px 0px 0px 0px; max-width: 64px; color: #000; font-size: .85em;'>
                    <option>mirror</option>
                    <option data-ip="104.194.232.247" data-hostname="www.superherofm.com">www.superherofm.com (global) SSL: on</option>
                    <option data-ip="104.194.232.247" data-hostname="www.anonyproxi.es">www.anonyproxi.es (global) SSL: on</option>
                    <option data-ip="104.194.232.247" data-hostname="www.github.com/superherofm/anonyweb">+ [Add a mirror]</option>
                    <!-- 104.219.54.54 -->

                </select>



                <a class="navbar-brand page-scroll" href="#page-top" style=''>
                    <i style='font-size:.9em;top:0px;left:2px;position:relative;' class="glyphicon glyphicon-sound">&#x1F50A;</i>  <span style='color:gold;'>Super</span><span style='color:;'>Hero</span><span style='color:gold;'>FM</span>
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
                        <a class="page-scroll" id='nav_login_link' onclick='SuperHeroFM.modal_login(); return false;' href="#">Login</a>
                    </li>

                    <li>
                        <a class="page-scroll" id='nav_about_link' href="#about">About</a>
                    </li>

                    <li>
                        <a class="page-scroll" href="#anonymailer">Email us</a>
                    </li>

                    <li>
                        <a class="page-scroll" id='nav_contact_link' href="#contact">Contact details</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" id='nav_terms_link' href="/team.php">Team</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" id='nav_terms_link' href="#terms">Terms</a>
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

                        <h1 class="brand-heading" style='text-shadow:7px 2px #000;'><span style='color:gold;'>Super</span><span style='color:;'>Hero</span><span style='color:gold;'>FM</span></h1>
                        <p class="intro-text" style='text-shadow:2px 2px #000;'>

                            World's most amazing radio station featuring <a href="https://alexanderschliker.com/?ref=superherofm.com" class='page-scroll btn btn-default'>Alexander Schliker</a>, a man that flies as your host! Subject to <a href='#terms' class='page-scroll btn btn-default'>Terms</a> above the auspices of Golden Ticket, Ticket to Gold and Disabled to Gold.

                        </p>
                        
                        <p>
                        
                            <audio controls autoplay loop>
                                  <source src="https://superherofm.com/live.mp3">
                            </audio>
                        
                        </p>

                        <form id='global_form' action='#' onsubmit='SuperHeroFM.init_onsubmit(); return false;' method='post'>

                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn dropdown-toggle" data-toggle="dropdown">A2 <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" onclick='return false;'>A2</a>
                                        </li>
                                        <!--<li><a href="#" onclick='return false;'>CGIProxy</a>
                                        </li>-->
                                        <li><a href="#" onclick='return false;'>Glype</a>
                                        </li>
                                        <li><a href="#" onclick='return false;'>PHProxy</a>
                                        </li>
                                        <li><a href="#" onclick='return false;'>PHProxy++</a>
                                        </li>
                                    </ul>

                                </div>
                                <!-- /btn-group -->

                                <input type="text" class="form-control" id='form-global-url' value='http://'>
                                <span id='form-global-search-span' class="input-group-addon"><input id='form-global-search' type='checkbox' onclick='' /> Search</span>

                            </div>
                            <!-- /input-group -->



                            <button class='btn btn-gray' id="go" type="submit" style='margin-left: 0px; margin-top: 10px;'>Browse</button>

                            <!--
                            <a class='ios-hide' href="https://play.google.com/store/apps/details?id=com.phonegap.anonygap">
                                <img style='height: 35px; max-width: 150px; margin: 9px 0 0 5px;' alt="Android app on Google Play" src="/static/img/android.png" />
                            </a>

                            <a class='ios-hide' href="http://www.windowsphone.com/en-us/store/app/superherofm-web-proxy-vpn/1d1cfa2e-2d11-45c0-a8d7-fc1bbf1cd6dd">
                                <img style='height: 35px; max-width: 150px; margin: 9px 0 0 5px;' alt="Windows Phone app on Windows Phone Store" src="/static/img/windows.png" />
                            </a>
                            -->


                        </form>

                        
                        
                        <form id='phproxy_plus_plus' action="/phproxy++/includes/process.php?action=update" method="post" style='display: none;' class="form">
                            <input type="text" name="u" id="input" size="40" class="textbox">
                            <input type="submit" value="Go" class="button">&nbsp; [<a style="cursor:pointer;" onclick="document.getElementById('options').style.display=(document.getElementById('options').style.display=='none'?'':'none')">options</a>]
                            <ul id="options" style="display: none;">
                                <li>
                                    <input type="checkbox" name="encodeURL" id="encodeURL" checked="checked">
                                    <label for="encodeURL" class="tooltip" onmouseover="tooltip('Encrypts the URL of the page you are viewing so that it does not contain the target site in plaintext.')" onmouseout="exit();">Encrypt URL</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="encodePage" id="encodePage">
                                    <label for="encodePage" class="tooltip" onmouseover="tooltip('Helps avoid filters by encrypting the page before sending it and decrypting it with javascript once received.')" onmouseout="exit();">Encrypt Page</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="allowCookies" id="allowCookies" checked="checked">
                                    <label for="allowCookies" class="tooltip" onmouseover="tooltip('Cookies may be required on interactive websites (especially where you need to log in) but advertisers also use cookies to track your browsing habits.')" onmouseout="exit();">Allow Cookies</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="stripJS" id="stripJS" checked="checked">
                                    <label for="stripJS" class="tooltip" onmouseover="tooltip('Remove scripts to protect your anonymity and speed up page loads. However, not all sites will provide an HTML-only alternative. (Recommended)')" onmouseout="exit();">Remove Scripts</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="stripObjects" id="stripObjects" checked="checked">
                                    <label for="stripObjects" class="tooltip" onmouseover="tooltip('You can increase page load times by removing unnecessary Flash, Java and other objects. If not removed, these may also compromise your anonymity.')" onmouseout="exit();">Remove Objects</label>
                                </li>
                            </ul>
                            <br style="clear: both;">
                        </form>

                        <form id='phproxy' method="post" action="/phproxy/index.php" onsubmit="" style='display: none;'>
                            <ul id="form">
                                <li id="address_bar">
                                    <label>Web Address
                                        <input id="address_box" type="text" name="q" value="" onfocus="this.select()">
                                    </label>
                                    <input id="go" type="submit" value="Go">
                                </li>
                                <li class="option">
                                    <label>
                                        <input type="checkbox" name="hl[include_form]" checked="checked">Include mini URL-form on every page</label>
                                </li>
                                <li class="option">
                                    <label>
                                        <input type="checkbox" name="hl[remove_scripts]" checked="checked">Remove client-side scripting (i.e JavaScript)</label>
                                </li>
                                <li class="option">
                                    <label>
                                        <input type="checkbox" name="hl[accept_cookies]" checked="checked">Allow cookies to be stored</label>
                                </li>
                                <li class="option">
                                    <label>
                                        <input type="checkbox" name="hl[show_images]" checked="checked">Show images on browsed pages</label>
                                </li>
                                <li class="option">
                                    <label>
                                        <input type="checkbox" name="hl[show_referer]" checked="checked">Show actual referring Website</label>
                                </li>
                                <li class="option">
                                    <label>
                                        <input type="checkbox" name="hl[rotate13]">Use ROT13 encoding on the address</label>
                                </li>
                                <li class="option">
                                    <label>
                                        <input type="checkbox" name="hl[base64_encode]" checked="checked">Use base64 encodng on the address</label>
                                </li>
                                <li class="option">
                                    <label>
                                        <input type="checkbox" name="hl[strip_meta]" checked="checked">Strip meta information tags from pages</label>
                                </li>
                                <li class="option">
                                    <label>
                                        <input type="checkbox" name="hl[strip_title]">Strip page title</label>
                                </li>
                                <li class="option">
                                    <label>
                                        <input type="checkbox" name="hl[session_cookies]" checked="checked">Store cookies for this session only</label>
                                </li>
                            </ul>
                        </form>

                        <form style='display:none;' id='cgiproxy' name="URLform" action="/cgiproxy/nph-proxy.cgi/en/20/x-proxy/start" method="post" onsubmit="return true;">
                            <input name="URL" size="66" value="">
                            <br>
                            <input type="checkbox" id="rc" name="rc">
                            <label for="rc">Remove all cookies (except certain proxy cookies)</label>
                            <br>
                            <input type="checkbox" id="rs" name="rs">
                            <label for="rs">Remove all scripts (recommended for anonymity)</label>
                            <br>
                            <input type="checkbox" id="fa" name="fa">
                            <label for="fa">Remove ads</label>
                            <br>
                            <input type="checkbox" id="br" name="br">
                            <label for="br">Hide referrer information</label>
                            <br>
                            <input type="checkbox" id="if" name="if" checked="checked">
                            <label for="if">Show URL entry form</label>

                            <p>
                                <input type="submit" value="   Begin browsing   ">
                            </p>
                        </form>

                        <form id='glype' style='display:none;' action="/glype/includes/process.php?action=update" method="post" onsubmit="" class="form">
                            <input type="text" name="u" id="input" style="width: 99%;" value="http://" class="textbox">
                            <input type="submit" value="Go" class="button">&nbsp; [<a style="cursor:pointer;" onclick="document.getElementById('options').style.display=(document.getElementById('options').style.display=='none'?'':'none')">options</a>]
                            <ul id="options" style="display: none;">
                                <li>
                                    <input type="checkbox" name="encodeURL" id="encodeURL" checked="checked">
                                    <label for="encodeURL" class="tooltip" onmouseover="tooltip('Encrypts the URL of the page you are viewing so that it does not contain the target site in plaintext.')" onmouseout="exit();">Encrypt URL</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="encodePage" id="encodePage">
                                    <label for="encodePage" class="tooltip" onmouseover="tooltip('Helps avoid filters by encrypting the page before sending it and decrypting it with javascript once received.')" onmouseout="exit();">Encrypt Page</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="allowCookies" id="allowCookies" checked="checked">
                                    <label for="allowCookies" class="tooltip" onmouseover="tooltip('Cookies may be required on interactive websites (especially where you need to log in) but advertisers also use cookies to track your browsing habits.')" onmouseout="exit();">Allow Cookies</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="stripJS" id="stripJS" checked="checked">
                                    <label for="stripJS" class="tooltip" onmouseover="tooltip('Remove scripts to protect your anonymity and speed up page loads. However, not all sites will provide an HTML-only alternative. (Recommended)')" onmouseout="exit();">Remove Scripts</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="stripObjects" id="stripObjects" checked="checked">
                                    <label for="stripObjects" class="tooltip" onmouseover="tooltip('You can increase page load times by removing unnecessary Flash, Java and other objects. If not removed, these may also compromise your anonymity.')" onmouseout="exit();">Remove Objects</label>
                                </li>
                            </ul>
                            <br style="clear: both;">
                        </form>


                        

                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="glyphicon glyphicon-chevron-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About </h2>
                <p>
                    <a href="/?ref=superherofm.com" class='page-scroll btn btn-default'>SuperHeroFM</a> was founded to reach out to our branches to get them motivated to serve and to excite them about living forever and having gratifying futures.
                </p>
                <p>
                    Our Super Hero, <a href="https://alexanderschliker.com/?ref=superherofm.com" class='page-scroll btn btn-default'>Alexander Schliker</a>, is your host.
                </p>
            </div>
        </div>
    </section>


    <section id="anonymailer" class="content-section text-center">
        <div class="anonymailer-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">

                    <form method='POST' action='/anonymailer.php'>
                        <h2>Email us</h2>
                        <p>Send us an email at <a href='mailto:founders@superherofm.com' class='page-scroll btn btn-default'>founders@superherofm.com</a>
                        </p>

                        <div class="input-group">
                            <span class="input-group-addon">From</span>
                            <input name='from' type="text" class="form-control" value="">
                        </div>

                        <div class="input-group" style='margin-top: 10px;'>
                            <span class="input-group-addon">To</span>
                            <input name='to' disabled type="text" class="form-control" required value="founders@superherofm.com">
                        </div>

                        <div class="input-group" style='margin-top: 10px;'>
                            <span class="input-group-addon">Subject</span>
                            <input name='subject' type="text" class="form-control" value="">
                        </div>

                        <div class="input-group" style='margin-top: 10px;'>
                            <span class="input-group-addon">
						  	Body
						  </span>
                            <textarea name="message" class="form-control"></textarea>
                        </div>

                        <button class='btn btn-gray' id="go" type="submit" style='margin-left: 0px; margin-top: 10px;'>
                            Send
                        </button>


                    </form>

                </div>
            </div>
        </div>
    </section>
    
    <section id="vpn" class="content-section text-center">
        <div class="vpn-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Listen with VPN privacy</h2>

                    <!-- <p id='1weeklyvpn-windows'>
                        <i>New</i>! Need <b>Windows Phone VPN</b>?

                        <button id='btn-1weeklyvpn-subscribe' onclick='SuperHeroFM.modal_stripe("#modal-stripe", "Subscribe for $1.33/week", "SuperHeroFM <i>Windows Phone VPN</i>", "1weeklyvpn"); return false;' class='btn btn-blue' type='button'>Subscribe now</button>
                        <button id='btn-1weeklyvpn-access' style='display:;' onclick='$("#modal-1weeklyvpn-access").bPopup({follow: false}); return false;' class='btn btn-blue' type='button'>Windows Phone VPN Settings</button>

                    </p> -->

                    <p>Listen to use while using our VPN.  Just connect via your computer's VPN settings below then simply open up your browser to hear our audio.  Supporting web ports 80 & 443.  Subject to <a href='#terms' class='page-scroll btn btn-default'>Terms</a>
                    </p>

                    <div class="input-group">
                        <span class="input-group-addon">Hostname</span>
                        <input type="text" class="form-control" value="superherofm.com">
                    </div>

                    <div class="input-group" style='margin-top: 10px;'>
                        <span class="input-group-addon">Username</span>
                        <input id='pptp-username' type="text" class="form-control" value="superherofm">
                    </div>

                    <div class="input-group" style='margin-top: 10px;'>
                        <span class="input-group-addon">Password</span>
                        <input id='pptp-password' type="text" class="form-control" value="superherofm">
                    </div>

                    <div class="input-group" style='margin-top: 10px;'>
                        <span class="input-group-addon">
					  	<span class='glyphicon glyphicon-ok'></span>
                        </span>
                        <input type="text" class="form-control" value="Use Point-to-Point-Encryption (MPPE)">
                    </div>

                    <br/>

                    <!--<button id='btn-1weeklypptp-subscribe' onclick='SuperHeroFM.modal_stripe("#modal-stripe", "Subscribe for $1.33/week", "SuperHeroFM <i>PPTP VPN</i> for Android, iOS, Windows, Mac or Linux", "1weeklypptp"); return false;' class='btn btn-blue' type='button'>Unlock user &amp; password</button>-->

                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Open Source </h2>
                <p>
                    This project is open source! 
                    <a href='https://github.com/superherofm/anonyweb'>Clone the Github repository</a> and be added to our Mirrors list with ample traffice for you!  Attribution required :)
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://github.com/superherofm/anonyweb" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact </h2>
                <p>Feel free to email us at <a href="mailto:founders@superherofm.com">founders@superherofm.com</a>!</p>
                <p><a href="mailto:founders@superherofm.com">founders@superherofm.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="mailto:founders@superherofm.com" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Email</span></a>
                        <a href="https://twitter.com/superherofm" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a> 
                        <a href="https://github.com/superherofm/anonyweb" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="terms" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Terms of Use</h2>

                <div style='overflow-y: scroll; height: 200px; font-size: .8em; padding-right: 15px;'>
                    <p>Terms of Service SuperHeroFM.com provides Anonymous Website Proxies, Virtual Private Networking (&ldquo;VPN&rdquo;), Encryption Services and Hidden IP Addresses to its clients. You (&ldquo;Client&rdquo; or &ldquo;Subscriber&rdquo;) (SuperHeroFM.com and Subscriber collectively known as &ldquo;Parties&rdquo;) acknowledge that SuperHeroFM.com and/or any of its parent companies or constituents will not be held liable for any and all liability arising from your use of its services and website.</p>

                    <p>Subscriber affirms that they are either more than eighteen (18) years of age or an emancipated minor, or possess legal parental or guardian consent, and are fully able and competent to enter into the terms, conditions, obligations, affirmations, representations, and warranties set forth in these Terms of Service, and to abide by and comply with these Terms and Conditions contained herein.</p>

                    <p>If you are under the age of eighteen (18) years of age and between thirteen (13) and seventeen (17) years of age, then you must find a legal parent or guardian to purchase and activate this service for you. If you are unable to find a legal parent or guardian to purchase and activate this service for you or if you are under thirteen (13) years of age, you are not permitted to use this website or its services.</p>

                    <p>ACCEPTANCE By using and/or visiting the SuperHeroFM.com service and website (collectively, including but not limited to all services and webpages available through SuperHeroFM.com, the website) subscriber agrees in full to the terms and conditions provided herein and the terms and conditions of SuperHeroFM.com's Privacy Policy found on this website, Digital Millennium Copyright Act (&ldquo;DMCA&rdquo;) policy, in addition to all future amendments and modifications (collectively referred to as the &quot;Agreement&quot;). By entering this website and/or subscribing to the services, subscriber agrees to be bound by these terms and conditions. If subscriber does not agree to be bound to the terms and conditions contained herein, then access to the SuperHeroFM.com website and/or its services is prohibited.</p>

                    <p>LICENSE SuperHeroFM.com grants you a personal, limited, non- exclusive license to use an account to which you have access for your personal, private, non-commercial, non-transferable, limited uses solely as set forth herein and as set forth in any additional documentation and/or agreements applicable to the Services accessed by you. All intellectual property rights on SuperHeroFM.com are owned by Noted, Inc. and are protected by United States and International copyright, trade dress, patent, and trademark laws, international conventions, and other laws protecting intellectual property and related proprietary rights. You may not copy or download any Content from the SuperHeroFM.com website unless you are expressly authorized to do so. Any commercial use is prohibited. You agree not to remove, obscure, or alter copyright, patent, trademark, or other proprietary rights notices affixed to SuperHeroFM.com Content. Your rights are subject to your compliance with these Terms of Service as well as any other agreements applicable to SuperHeroFM.com. New or future services that may be offered by SuperHeroFM.com will require a separate subscription or agreement. Subscriber understands that this Agreement is limited to VPN services only and do not include any other services herein.</p>

                    <p>CHANGES TO THIS AGREEMENT Client understands that the present Terms of Service are subject to changes made by SuperHeroFM.com at any time at its sole discretion, and you agree to be bound by any and all modifications, changes and/or revisions. You understand that it is your obligation to periodically review this webpage in order to account for any changes made, as they will be binding upon assent.</p>

                    <p>The terms and conditions herein apply to all users of SuperHeroFM.com whether a 'visitor,' a &lsquo;subscriber,&rsquo; or a 'client' and you are only authorized to use SuperHeroFM.com if you agree to abide by all applicable federal and state laws and be legally bound by the terms and conditions of this Agreement.</p>

                    <p>CONDUCT You agree to comply with all applicable laws and regulations in connection with use of this service. You must also agree that you nor any other user that you have provided access to will not engage in any of the following activities:</p>

                    <p>Sending or receiving unsolicited and/or commercial emails, promotional materials, &ldquo;junk mail,&rdquo; &ldquo;spam,&rdquo; &ldquo;chain letters,&rdquo; or &ldquo;pyramid schemes&rdquo;; Exploiting, possessing, producing, receiving, transporting, or distributing any illegal content, including but not limited to any sexually explicit depiction of children; Uploading, possessing, receiving, transporting, or distributing any copyrighted, trademark, or patented content which you do not own or lack written consent or a license from the copyright owner; Forging headers or otherwise manipulating e-mail identifiers in order to mask or mislead the origins of certain content; Interfering with the service to any other user, client, host or network which reduces the quality of service for other clients and users; Using the service to engage in Denial-of-service (&ldquo;DOS&rdquo;) attacks to any third-parties or to SuperHeroFM.com; Accessing data, systems or networks including attempts to probe scan or test for vulnerabilities of a system or network or to breach security or authentication measures without written consent from the owner of the system or network; Using this service to transmit any material (by email, uploading, posting, or otherwise) that threatens or encourages bodily harm, injury or destruction of property, defames one or more third parties, or promotes any act of cruelty to animals; or Accessing the service to violate any laws at the local, state and federal level in the United States of America or the country/territory in which you reside.</p>

                    <p>EXPORT CONTROLS The SuperHeroFM.com service offered as part of this Agreement is subject to all relevant United States export control laws and regulations. Company makes no representation that this Site is appropriate or available for use in other locations outside the United States. By using this Site, you represent and warrant that: (i) you are not listed on the U.S. Commerce Department's Table of Denial Orders, the U.S. Treasury Department's lists of specially designated nationals, or otherwise denied the privilege of participating in transactions involving the export of U.S.-origin products and services; (ii) you are not located in a country that is subject to embargo by the United States (currently Cuba, Iraq, Libya, North Korea, Sudan, Syria, or the Taliban Occupied Part of Afghanistan); (iii) you are not engaged, directly or indirectly, in the design, development, production, stockpiling, or use of nuclear, chemical, or biological weapons or missiles; and (iv) you will not, without prior authorization from the Bureau of Export Administration, (a) knowingly re-export the technical data received from you to any destination or (b) export the direct product of the technical data, directly or indirectly, to a country listed in Country Group D:1 or E:2 in Supplement No. 1 to Part 740 of the Export Administration Regulations (Albania, Armenia, Azerbaijan, Belarus, Bulgaria, Cambodia, Cuba, Estonia, Georgia, Kazakhstan, Kyrgyzstan, Laos, Latvia, Libya, Lithuania, Macau, Moldova, Mongolia, North Korea, People's Republic of China, Romania, Russia, Tajikistan, Turkmenistan, Ukraine, Uzbekistan, or Vietnam).</p>

                    <p>BREACH SuperHeroFM.com abides by a ZERO TOLERANCE policy relating to any activity which breaches or violates our terms and conditions.</p>

                    <p>Along with the ZERO TOLERANCE policy, Clients who materially breach the terms and conditions will have their account removed without any refund. Additionally, Client understands that SuperHeroFM.com expressly reserves the right to hold the Client or any third-party using the service on Client&rsquo;s behalf responsible for any and all financial damages and losses which may be incurred arising out of said breach or breaches, including, but not limited to attorneys fees, fees for expert witnesses, court costs, and other charges.</p>

                    <p>Subscriber understands that SuperHeroFM.com reserves the right in its sole discretion to enforce breaches of this Agreement. Failure to comply with the present Terms of Service constitutes a material breach of the Agreement, and may result in one or more of these following actions: Issuance of a warning; Immediate, temporary, or permanent revocation of access to SuperHeroFM.com with no refund; Legal actions against you for reimbursement of any costs incurred via indemnity resulting from a breach; Independent legal action by SuperHeroFM.com as a result of a breach; or Disclosure of such information to law enforcement authorities as deemed reasonably necessary. SuperHeroFM.com reserves the right to take any other actions deemed necessary to enforce and protect its rights. If you find that your SuperHeroFM.com account has been suspended, then you may contact: helpdesk@SuperHeroFM.com</p>

                    <p>SERVICE LEVEL AGREEMENT Service coverage, speeds, locations and quality are not guaranteed. While SuperHeroFM.com will make every attempt to maintain the Service availability at all times, the Service may be subject to unavailability for numerous reasons including maintenance, emergencies, third party service failures, transmission errors, equipment failures, network issues, interference, natural disaster, amongst other reasons. SuperHeroFM.com does not guarantee that data, messages, or packets will be delivered and shall not be held responsible in the event data, messages, or packets are lost, not delivered, delayed, misdirected or are otherwise inaccessible.</p>

                    <p>Additionally, we may impose usage limits to our services, suspend or block services, or cancel any and all services at our sole discretion at any time. Finally, we do not guarantee the accuracy and timeliness of any data received.</p>

                    <p>We make no guarantee that this service will be accessible at any time. However, we will do our best to keep the service up and running for our beloved clients.</p>

                    <p>CLIENT RESPONSIBILITIES As a client of SuperHeroFM.com, you are responsible for: Maintaining the confidentiality and security of the account you are provided. Ensuring that subscriber connections to the SuperHeroFM.com network are limited to no more than five (5) simultaneous connections. Providing valid and accurate identifying information related to the user account. Liability for any use and/or abuse which occurs while you or any third-party is logged into the SuperHeroFM.com service with your account credentials.</p>

                    <p>FEES You acknowledge that SuperHeroFM.com reserves the right to create a subscription service through one or more third party merchants. Payments will be charged on the day you sign up for service and will cover use of that service for the duration of one (1) month, six (6) months, one (1) year, or a &ldquo;lifetime&rdquo; account without subscription depending on the service plan level. A subscription plan is an automatic payment recurring based on the service plan. The &ldquo;lifetime&rdquo; account is based on a single transaction and will provide the subscriber access to an account for the SuperHeroFM.com VPN service so long as the account remains in good standing and as long as SuperHeroFM.com remains solvent. All accounts are offered as is at the time of purchase. Future services offered by SuperHeroFM.com and Noted, Inc. may not be included with the account. You may cancel the account subscription at anytime; the account will remain active for the remainder of your billing cycle.</p>

                    <p>SuperHeroFM.com reserves the right to change the fees at anytime at its discretion. Subscriber understands that SuperHeroFM.com is not obligated to honor errors due to typos and is not responsible for misinformation provided on third party websites or affiliates.</p>

                    <p>Subscriber also understands that any gift-card based transactions for service are not subject to any reductions in price, discounts, promotional rates, or other lowered subscription rates.</p>

                    <p>REFUND POLICY If you are less than 100% satisfied with the SuperHeroFM.com VPN service, we will gladly refund your payment if the refund is requested within seven (7) days from the date of the purchase. Requests made later than the 7 day purchase date window will be denied.</p>

                    <p>You understand that by paying for SuperHeroFM using BitCoin as a transaction method, you are using a payment means that is not backed by an official governmental entity or international financial institution, and that the payment system may be prone to large fluctuations in value in a short period of time. The parties agree that any refunds for transactions using BitCoin will be assessed on the Bit Coin exchange rate to USD at the time of the refund disbursement, and not at the time of the original transaction or refund request.</p>

                    <p>Subscriber understands that refunds for gift-card based transactions are not available under any circumstances.</p>

                    <p>OUR RIGHTS SuperHeroFM.com reserves the right to close your account at any given time without any given notice. While SuperHeroFM.com will, at its best interest, attempt to provide full and complete service to its users, this right is reserved for reasons which may arise at a later date.</p>

                    <p>Subscriber understands that SuperHeroFM.com also reserves the right to scale back or throttle bandwidth originating from subscriber accounts that may breach the present Agreement or in the event of excessive usage on the SuperHeroFM.com network.</p>

                    <p>Subscriber also understands that SuperHeroFM.com for reasons beyond its control may shut down and terminate services. If SuperHeroFM.com ceases operations, subscribers will be notified with at least thirty (30) days advance notice. Subscribers will not be eligible for a pro-rated, partial, or complete refund in the event of a shut down.</p>

                    <p>WARRANTIES Subscriber represents and warrants that all of the identifying information provided to SuperHeroFM.com to use the SuperHeroFM.com website is accurate and current and you have all necessary right, power, and authority to enter into this Agreement and to perform the acts required of you hereunder.</p>

                    <p>As a condition to using the SuperHeroFM.com website or its services, you must agree to the terms of SuperHeroFM.com's privacy policy, Digital Millennium Copyright Act (&ldquo;DMCA&rdquo;) policy, and any modifications and/or updates. You acknowledge and agree that the technical processing and transmission of the Website may involve transmissions over various networks; and changes to conform and adapt to technical requirements of connecting networks or devices. You further acknowledge and agree that other data collected and maintained by SuperHeroFM.com with regard to its users may be disclosed in accordance with the SuperHeroFM.com Privacy Policy.</p>

                    <p>WARRANTY DISCLAIMER SUBSCRIBER UNDERSTANDS THAT THE SuperHeroFM.COM WEBSITE AND SERVICE IS PROVIDED AS-IS. SUBSCRIBER AGREES THAT USE OF THE SuperHeroFM.COM WEBSITE SHALL BE AT YOUR SOLE RISK. TO THE FULLEST EXTENT PERMITTED BY LAW, SuperHeroFM.COM, ITS OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS DISCLAIM ALL WARRANTIES, EXPRESS OR IMPLIED, IN CONNECTION WITH THE WEBSITE AND YOUR USE THEREOF. SuperHeroFM.COM MAKES NO WARRANTIES, EXPRESS, OR IMPLIED, NOR ANY REPRESENTATIONS ABOUT THE ACCURACY OR COMPLETENESS OF THIS SITE'S CONTENT OR THE CONTENT OF ANY SITES LINKED TO THIS SITE AND ASSUMES NO LIABILITY OR RESPONSIBILITY FOR ANY: ERRORS, MISTAKES, OR INACCURACIES OF CONTENT, PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF OUR WEBSITE, ANY UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION STORED THEREIN, ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM OUR WEBSITE AND/OR SERVICE, ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE WHICH MAY BE TRANSMITTED TO OR THROUGH OUR WEBSITE BY ANY THIRD PARTY, ANY ERRORS OR OMISSIONS IN ANY CONTENT OR FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF ANY CONTENT POSTED, EMAILED, TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE SuperHeroFM.COM WEBSITE. SuperHeroFM.COM DOES NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR ANY PRODUCT OR SERVICE ADVERTISED OR OFFERED BY A THIRD PARTY THROUGH THE SuperHeroFM.COM WEBSITE OR ANY HYPERLINKED WEBSITE OR FEATURED IN ANY BANNER OR OTHER ADVERTISING, AND SuperHeroFM.COM WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND THIRD-PARTY PROVIDERS OF PRODUCTS OR SERVICES. AS WITH THE PURCHASE OF A PRODUCT OR SERVICE THROUGH ANY MEDIUM OR IN ANY ENVIRONMENT, YOU SHOULD USE YOUR BEST JUDGMENT AND EXERCISE CAUTION WHERE APPROPRIATE. THE FOREGOING LIMITATION OF LIABILITY SHALL APPLY TO THE FULLEST EXTENT PERMITTED BY LAW IN THE APPLICABLE JURISDICTION. YOU SPECIFICALLY ACKNOWLEDGE THAT SuperHeroFM.COM SHALL NOT BE LIABLE FOR DEFAMATORY, OFFENSIVE, OR ILLEGAL CONDUCT OF ANY THIRD PARTY AND THAT THE RISK OF HARM OR DAMAGE FROM THE FOREGOING RESTS ENTIRELY WITH YOU.</p>

                    <p>LIMITATION OF LIABILITY IN NO EVENT SHALL SuperHeroFM.COM, ITS OFFICERS, DIRECTORS, EMPLOYEES, OR AGENTS, BE LIABLE TO YOU FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, PUNITIVE, OR CONSEQUENTIAL DAMAGES WHATSOEVER RESULTING FROM ANY ERRORS, MISTAKES, OR INACCURACIES OF CONTENT, PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF OUR WEBSITE, ANY UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION STORED THEREIN, ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM OUR WEBSITE AND/OR SERVICE ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE, WHICH MAY BE TRANSMITTED TO OR THROUGH OUR WEBSITE BY ANY THIRD PARTY, AND/OR ANY ERRORS OR OMISSIONS IN ANY CONTENT OR FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF YOUR USE OF ANY CONTENT POSTED, EMAILED, TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE SuperHeroFM.COM WEBSITE, WHETHER BASED ON WARRANTY, CONTRACT, TORT, OR ANY OTHER LEGAL THEORY, AND WHETHER OR NOT THE COMPANY IS ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THE FOREGOING LIMITATION OF LIABILITY SHALL APPLY TO THE FULLEST EXTENT PERMITTED BY LAW IN THE APPLICABLE JURISDICTION. YOU SPECIFICALLY ACKNOWLEDGE THAT SuperHeroFM.COM SHALL NOT BE LIABLE FOR DEFAMATORY, OFFENSIVE, OR ILLEGAL CONDUCT OF ANY THIRD PARTY AND THAT THE RISK OF HARM OR DAMAGE FROM THE FOREGOING RESTS ENTIRELY WITH YOU.</p>

                    <p>INDEMNITY Subscriber agrees to defend, indemnify and hold harmless SuperHeroFM.com, its parent corporation, officers, directors, employees and agents, from and against any and all claims, damages, obligations, losses, liabilities, costs or debt, and expenses (including but not limited to attorney's fees) arising from: your use of and access to the SuperHeroFM.com Website and/or Service; your material breach of any term of these Terms of Service; your violation of any third party right, including without limitation any copyright, patent, trademark, property, or privacy right; or Any claim that your use caused damage or injury to any third party. This defense and indemnification obligation will survive these Terms of Service and your use of the SuperHeroFM.com Website.</p>

                    <p>ARBITRATION The Parties agree that any legal claim or dispute between them or against any agent, employee, successor, or assign of the other, whether related to this agreement or otherwise, and any claim or dispute related to this agreement or the relationship or duties contemplated under this contract, including the validity of this arbitration clause, shall be resolved by binding arbitration by the American Arbitration Association (or name other firm providing arbitration services, i.e., National Arbitration Forum), under the Arbitration Rules then in effect. Any award of the arbitrator(s) may be entered as a judgment in any court of competent jurisdiction. Information may be obtained and claims may be filed at any office of the American Arbitration Association within Frisco, TX or Plano, TX. This agreement shall be interpreted under the Federal Arbitration Act.</p>

                    <p>ASSIGNMENT The Terms and Conditions contained herein and any rights and licenses granted hereunder, may not be transferred or assigned by you, but may be assigned by SuperHeroFM.com without restriction.</p>

                    <p>SEVERANCE If any term, clause or provision of the present agreement is held invalid or unenforceable by a court of competent jurisdiction, such invalidity shall not affect the validity or operation of any term, clause or provision and such invalid term, clause or provision shall be deemed to be severed from this Agreement.</p>

                    <p>CHOICE OF LAW This Agreement shall be governed by and construed in accordance with the laws of the State of Texas, county of Denton, without regard to conflicts of law principles. The sole and exclusive jurisdiction and venue for any action or proceeding arising out of or related to this Agreement shall be in an appropriate state or federal court located in the State of Texas, county of Denton. You hereby submit to the jurisdiction and venue of said Courts. You consent to service of process in any legal proceeding.</p>
                    
                    <p>
                    NEITHER PARTY, NOR ANY OF ITS AFFILIATES, DIRECTORS, OFFICERS, AND EMPLOYEES SHALL BE LIABLE TO THE OTHER PARTY, OR ITS AFFILIATES, FOR ANY SPECIAL, INDIRECT, INCIDENTAL, PUNITIVE OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, LOST PROFITS, REVENUE OR BUSINESS) ARISING OUT OF OR RELATED TO THIS AGREEMENT. THIS LIMITATION APPLIES REGARDLESS OF WHETHER SUCH DAMAGES ARE SOUGHT BASED ON BREACH OF CONTRACT, NEGLIGENCE OR ANY OTHER LEGAL THEORY.
                    </p>
                    
                    <p>
                     IN NO EVENT WILL EITHER PARTY BE LIABLE UNDER OR IN CONNECTION WITH THIS AGREEMENT UNDER ANY LEGAL OR EQUITABLE THEORY, INCLUDING BREACH OF CONTRACT, TORT (INCLUDING NEGLIGENCE), LIABILITY, AND OTHERWISE, FOR ANY CONSEQUENTIAL, INCIDENTAL, INDIRECT, EXEMPLARY, SPECIAL, ENHANCED, OR PUNITIVE DAMAGES, REGARDLESS OF WHETHER ANY PARTY WAS ADVISED OF THE POSSIBILITY OF SUCH LOSSES OR DAMAGES OR SUCH LOSSES OR DAMAGES WERE OTHERWISE FORESEEABLE.
                    </p>
                    
                    <p>
                      NOTWITHSTANDING ANYTHING TO THE CONTRARY CONTAINED IN THIS AGREEMENT, SELLER AND ITS SHAREHOLDERS, AFFILIATES, DIRECTORS, MANAGERS, EMPLOYEES OR OTHER REPRESENTATIVES SHALL NOT BE LIABLE TO CLIENT, AUTHORIZED USERS OR ANY THIRD PARTY FOR ANY INDIRECT, INCIDENTAL, SPECIAL, OR CONSEQUENTIAL DAMAGES (INCLUDING REASONABLE ATTORNEYS’ FEES AND LOST PROFITS) THAT RESULT FROM OR ARE RELATED TO THIS AGREEMENT, EVEN IF SELLER HAS BEEN INFORMED OF THE POSSIBILITY OF SUCH DAMAGES.
                    </p>
                    
                    <p>
                      THERE IS NO WARRANTY FOR THE SELLER, TO THE EXTENT PERMITTED BY APPLICABLE LAW. EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE SELLER "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE SELLER IS WITH YOU. SHOULD THE SELLER PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.
                    </p>
                    
                    <p>If Subscriber agrees to all of the foregoing terms and conditions, Subscriber may gain access to and use the SuperHeroFM.com service.</p>

                    <p>Last revised September 29, 2014</p>

                </div>


            </div>
        </div>
    </section>

    <!--<div id="map"></div>-->

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; <a href='https://www.superherofm.com'>SuperHeroFM.com</a>: free web proxy, http proxy & VPN! <!-- Attribution link to SuperHeroFM.com is required! Email founders@superherofm.com and we can add your website to our list of mirrors sending you ample traffic! --> <a href='privacy.html'>Privacy policy</a>. <a href='/team.html'>Our team</a>.</p>
        </div>
    </footer>

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-55265328-1', 'auto');
        ga('send', 'pageview');
    </script>

    <div id='modal-login'>
        <a style='float: right;' class="close b-close"></a>
        <div class="bodyView">
            <div class="layoutView contentView" style="height: ;">
                <div class="layoutSubview" style="z-index: 100; height: ; transform: translateY(0px); opacity: 1; transition: none; -webkit-transition: none;">
                    <header>
                        <div class='content' style='min-width:280px; width: 100%; padding: 15px; text-align: center; color: #000; background: #eee; border-radius: 25px; border-bottom: 2px solid #ccc;'>
                            <strong>SuperHeroFM.com user settings</strong>
                            <br/>
                            <i>The following is your SuperHeroFM.com username and password.  Write it down.</i>
                        </div>
                        <div class="content" style='background: #eee; text-align: center;'>
                            <div class="image">
                                <img src="72x72.png">
                            </div>
                        </div>
                    </header>


                    <div class='container col-sm-6 col-sm-6' style='position: relative; top: 0px; padding: 15px; color: #000; width: 95%; font-size: .9em;'>
                        <form id='superherofm_user_form' method='post' onsubmit='return false;'>


                            <div class="input-group">
                                <span class="input-group-addon">Username</span>
                                <input type="text" class="form-control" id='superherofm_user_form_username' value="">
                            </div>

                            <div class="input-group" style='margin-top: 10px;'>
                                <span class="input-group-addon">Password</span>
                                <input type="text" class="form-control" id='superherofm_user_form_password' value="">
                            </div>

                        </form>

                    </div>

                </div>



            </div>
        </div>

    </div>

    <div id='modal-1weeklyproxy-access'>
        <a style='float: right;' class="close b-close"></a>
        <div class="bodyView">
            <div class="layoutView contentView" style="height: ;">
                <div class="layoutSubview" style="z-index: 100; height: ; transform: translateY(0px); opacity: 1; transition: none; -webkit-transition: none;">
                    <header>
                        <div class='content' style='min-width:280px; width: 100%; padding: 15px; text-align: center; color: #000; background: #eee; border-radius: 25px; border-bottom: 2px solid #ccc;'>
                            <strong>Windows Phone Proxy Settings</strong>
                            <br/>
                            <i>Copy these settings to your Windows Phone WLAN settings area.</i>
                        </div>
                        <div class="content" style='background: #eee; text-align: center;'>
                            <div class="image">
                                <img src="72x72.png">
                            </div>
                        </div>
                    </header>


                    <div class='container col-sm-6 col-sm-6' style='position: relative; top: 0px; padding: 15px; color: #000; width: 95%; font-size: .9em;'>
                        <form id='superherofm_stripe_proxy_access' method='post' onsubmit='return false;'>

                            <div class="input-group">
                                <span class="input-group-addon">Hostname</span>
                                <select class="form-control">
                                    <option>superherofm.com</option>
                                </select>

                            </div>

                            <div class="input-group" style='margin-top: 10px;'>
                                <span class="input-group-addon">Port</span>
                                <input type="text" class="form-control" value='3128'>
                            </div>

                        </form>

                    </div>

                </div>



            </div>
        </div>

    </div>



    <div id='modal-1weeklyvpn-access'>
        <a style='float: right;' class="close b-close"></a>
        <div class="bodyView">
            <div class="layoutView contentView" style="height: ;">
                <div class="layoutSubview" style="z-index: 100; height: ; transform: translateY(0px); opacity: 1; transition: none; -webkit-transition: none;">
                    <header>
                        <div class='content' style='min-width:280px; width: 100%; padding: 15px; text-align: center; color: #000; background: #eee; border-radius: 25px; border-bottom: 2px solid #ccc;'>
                            <strong>Windows Phone VPN Settings</strong>
                            <br/>
                            <i>Copy these settings to your Windows Phone VPN settings area.</i>
                        </div>
                        <div class="content" style='background: #eee; text-align: center;'>
                            <div class="image">
                                <img src="72x72.png">
                            </div>
                        </div>
                    </header>


                    <div class='container col-sm-6 col-sm-6' style='position: relative; top: 0px; padding: 15px; color: #000; width: 95%; font-size: .9em;'>
                        <form id='superherofm_stripe_vpn_access' method='post' onsubmit='return false;'>

                            <div class="input-group">
                                <span class="input-group-addon"><i class='glyphicon glyphicon-chevron-down'></i></span>
                                <span class='form-control' style='width: 200px;'><a href='https://superherofm.com/ca.cer' target='_blank'>Download &amp; install certificate.</a></span>
                            </div>

                            <div class="input-group" style='margin-top: 10px;'>
                                <span class="input-group-addon">Hostname</span>
                                <input type="text" class="form-control" value="dallas.superherofm.com">
                            </div>

                            <div class="input-group" style='margin-top: 10px;'>
                                <span class="input-group-addon">Type</span>
                                <input type="text" class="form-control" value="IKEv2">
                            </div>

                            <div class="input-group" style='margin-top: 10px;'>
                                <span class="input-group-addon">Connect via</span>
                                <input type="text" class="form-control" value="User name + password">
                            </div>

                            <div class="input-group" style='margin-top: 10px;'>
                                <span class="input-group-addon">Username</span>
                                <input type="text" class="form-control" value="superherofm">
                            </div>

                            <div class="input-group" style='margin-top: 10px;'>
                                <span class="input-group-addon">Password</span>
                                <input type="text" class="form-control" value="superherofm">
                            </div>

                        </form>

                    </div>

                </div>



            </div>
        </div>

    </div>

    <div id='modal-stripe'>
        <a style='float: right;' class="close b-close"></a>
        <div class="bodyView">
            <div class="layoutView contentView" style="height: ;">
                <div class="layoutSubview" style="z-index: 100; height: ; transform: translateY(0px); opacity: 1; transition: none; -webkit-transition: none;">
                    <header>
                        <div class='content' style='min-width:280px; width: 100%; padding: 15px; text-align: center; color: #000; background: #eee; border-radius: 25px; border-bottom: 2px solid #ccc;'>
                            <strong class='modal-pricing'>Subscribe for $1.33/week</strong>
                            <br/>
                            <span class='modal-label'>SuperHeroFM <i>Windows Phone VPN</i></span>
                        </div>
                        <div class="content" style='background: #eee; text-align: center;'>
                            <div class="image">
                                <img src="72x72.png">
                            </div>
                        </div>
                    </header>


                    <div class='container col-sm-6 col-sm-6' style='position: relative; top: 0px; padding: 15px; color: #000; width: 95%;'>
                        <form id='superherofm_stripe' method='post' onsubmit='return false;'>

                            <div class="input-group">
                                <span class="input-group-addon input-group-cc">
	                            	<i class='glyphicon glyphicon-ok'></i>
	                            </span>
                                <input required type="text" class="form-control" data-stripe="number" placeholder="Credit Card #">
                            </div>

                            <div class="input-group" style='margin-top: 10px; width: 48%;'>
                                <span class="input-group-addon">
	                            	<i class='glyphicon glyphicon-ok'></i>
	                            </span>
                                <input required type="text" class="form-control" data-stripe="exp-month" placeholder="MM" style='width:50px;'>
                                <input required type="text" class="form-control" data-stripe="exp-year" placeholder="YY" style='width:50px;'>
                            </div>

                            <div class="input-group" style='margin-top: 10px; width: 30%;'>
                                <span class="input-group-addon">
	                            	<i class='glyphicon glyphicon-ok'></i>
	                            </span>
                                <input required type="text" class="form-control" data-stripe="cvc" placeholder="CVC" style='width:60px;'>
                            </div>

                            <div class="input-group" style='margin-top: 10px;'>
                                <span class="input-group-addon">
						  			<span class='glyphicon glyphicon-ok'></span>
                                </span>
                                <input required type="email" class="form-control" data-stripe="email" placeholder="Email address">
                            </div>

                            <input type='hidden' id='plan' value='' />
                            <button class='btn btn-blue' id="cc_submit" type="submit" style='margin-left: 0px; margin-top: 10px;'>Subscribe now</button>
                        </form>

                    </div>

                </div>



            </div>
        </div>

    </div>

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-55265328-1', 'auto');
        ga('send', 'pageview');
    </script>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        // This identifies your website in the createToken call below
        Stripe.setPublishableKey('pk_live_NTIgT7A7OTic2PIZz3gEdY0S');
         // ...
    </script>

</body>

</html>

