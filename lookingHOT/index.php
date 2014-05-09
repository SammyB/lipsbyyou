<?php
if(!file_exists('counter.txt')){
  file_put_contents('counter.txt', '0');
}
?><!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0">

			<title>LipsByYou | Design your own custom lip balm! | Handmade with love in Canberra, Australia.</title>

			<meta name="keywords" content="Lipsbyyou, lipsbytanja, custom lip balm, lip balm, lipbalm, canberra, australia, skin balm, skin care, lip care, lips by you, lips by tanja." />
			<meta name="description" content="Design your own custom lip balm using natural ingredients and delicious colours and flavours. You'll get to pick what's in your balm and best of all it will be your own unique creation!" />

			<meta property="og:site_name" content='Lipsbyyou.com.au'/>
			<meta property="og:locale" content="en_US" />
			<meta property="og:type" content="website"/>
			<meta property="og:url" content="http://www.lipsbyyou.com/"/>

			<meta property="og:image" content="http://www.lipsbyyou.com/lookingHOT/images/facebook.png"/>
			<meta itemprop="image" content="http://www.lipsbyyou.com/lookingHOT/images/facebook.png"/>
			<link rel="image_src" href="http://www.lipsbyyou.com/lookingHOT/images/facebook.png" />

			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="format-detection" content="telephone=no" />

			<meta name="robots" content="noydir" />
			<meta name="robots" content="noodp" />

			<link rel="icon" href="/lookingHOT/favicon.ico" />
			<link rel="SHORTCUT ICON" href="/lookingHOT/favicon.ico" />

			<!-- Standard iPhone --> 
			<link rel="apple-touch-icon" sizes="57x57" href="/lookingHOT/images/apple-touch-icon-iphone.png" />
			<!-- Retina iPhone --> 
			<link rel="apple-touch-icon" sizes="114x114" href="/lookingHOT/images/apple-touch-icon-iphone4.png" />
			<!-- Standard iPad --> 
			<link rel="apple-touch-icon" sizes="72x72" href="/lookingHOT/images/apple-touch-icon-ipad.png" />
			<!-- Retina iPad --> 
			<link rel="apple-touch-icon" sizes="144x144" href="/lookingHOT/images/apple-touch-icon-ipad-144.png" />

			<!--
			/**
			 * @license
			 * MyFonts Webfont Build ID 2798473, 2014-04-21T20:26:23-0400
			 * 
			 * The fonts listed in this notice are subject to the End User License
			 * Agreement(s) entered into by the website owner. All other parties are 
			 * explicitly restricted from using the Licensed Webfonts(s).
			 * 
			 * You may obtain a valid license at the URLs below.
			 * 
			 * Webfont: D.I.Y. Time Hand by Latinotype
			 * URL: http://www.myfonts.com/fonts/latinotype/d-i-y-time/hand/
			 * Copyright: Copyright (c) 2014 by Guisela Mendoza. All rights reserved.
			 * Licensed pageviews: 10,000
			 * 
			 * 
			 * License: http://www.myfonts.com/viewlicense?type=web&buildid=2798473
			 * 
			 * © 2014 MyFonts Inc
			*/
			-->
			<link rel="stylesheet" type="text/css" href="/lookingHOT/css/fonts.css">

			<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

			<link href="/lookingHOT/css/style.css" rel="stylesheet" media="screen" />
			
			<!--[if lte IE 7]>
				<link rel="stylesheet" href="/css/ie7-style.css" />
				<link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
			<![endif]-->

			<!-- IE fix for array indexOF & html5shiv-->
			<!--[if lt IE 9]>
			<script src="/lookingHOT/js/html5shiv.js"></script>
			<![endif]-->

			<script type="text/javascript" src="/lookingHOT/js/modernizr.custom.min.js"></script>
	</head>
	<body>
		<div id="fb-root"></div>
		<script>
			window.fbAsyncInit = function() {
				FB.init({appId:'1441420402766808',oauth:true,status:true,cookie:true,xfbml:true});
				FB.Event.subscribe("auth.logout", function() {
			    	var cookies = $.cookie();
					for(var cookie in cookies) {
						$.removeCookie(cookie);
					}
					var cookies = document.cookie.split(";");
					for(var i=0; i < cookies.length; i++) {
						var equals = cookies[i].indexOf("=");
						var name = equals > -1 ? cookies[i].substr(0, equals) : cookies[i];
						document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
					}
					//reload page
					setTimeout(window.location.reload(), 2000);
				});
			};
			function fb_login(){
				FB.login(function(response) {
					if (response.authResponse) {
						console.log('Welcome to lips by you! Fetching your information.... ');
			            //console.log(response); // dump complete info
			            access_token = response.authResponse.accessToken; //get access token
			            user_id = response.authResponse.userID; //get FB UID
			            FB.api('/me', function(response) {
			                user_email = response.email; //get user email
			                user_name = response.name; //get user email
			          		// lets welcome the lucky person!
			          		$('h1.start-welcome span').html(user_name);
			          		// create cookie of there name to remember
			          		$.cookie('facebookName', user_name);
			            });
			            // lets start your journey...
			            $('#intro').hide();
			            // let me know its active bro!
			            LBT.Elements.$body.addClass('active');
			            // lets begin
			            $('#lets-begin').show();
			            $('#footer').show();
			        } else {
			            //user hit cancel button
			            console.log('User cancelled login or did not fully authorize.');
			        }
			    }, {
			        scope: 'publish_stream,email'
			    });
			};
			(function() {
			    var e = document.createElement('script');
			    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
			    e.async = true;
			    document.getElementById('fb-root').appendChild(e);
			}());

			// Load the SDK asynchronously
			(function(d){
				var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement('script'); js.id = id; js.async = true;
				js.src = "//connect.facebook.net/en_US/all.js";
				ref.parentNode.insertBefore(js, ref);
			}(document));

			function logout(){
				var cookies = $.cookie();
				for(var cookie in cookies) {
					$.removeCookie(cookie);
				}
				var cookies = document.cookie.split(";");
				for(var i=0; i < cookies.length; i++) {
					var equals = cookies[i].indexOf("=");
					var name = equals > -1 ? cookies[i].substr(0, equals) : cookies[i];
					document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
				}
				// reload page
				setTimeout(window.location.reload(), 2000);
			}
		</script>
		<div id="content">
			<div class="loader"></div>
			<div id="intro" class="container">

				<div class="grid">
			        <div class="grid__row">

			        	<!-- logo -->
						<div class="grid__span100">
							<div class="container">
								<div class="logo-container">
									<h1 class="logo-welcome">Lips By You - Welcome to the all Natural, beautiful Australian custom lip balm, made by you!</h1>
									<h1 class="logo">Lips By You - Canberra, Australia Custom Lip Balms.</h1>
								</div>
							</div>
						</div>

						<form id="whoAreYou" name="whoAreYou">
							<div class="grid__span100">
								<div class="container">
									<div class="inputBox">

										<input name="name" class="enter-name" type="text" value="Please enter your name" id="name" onblur="if (this.value == '') {this.value = 'Please enter your name';}" onfocus="if (this.value == 'Please enter your name') {this.value = '';}" />
										
										<input type="submit" class="submit">

										<p class="or">
											or
										</p>

										<a href="#" onclick="fb_login();" class="fb-login"></a>								

									</div>
								</div>
							</div>
						</form>

					</div>
				</div>

			</div>

			<div id="lets-begin" class="grid">
		        <div id="first-up" class="grid__row">
		        	<!-- logo -->
					<div class="grid__span100">
						<div class="container">
							<h1 class="logo">Lips By You - Canberra, Australia Custom Lip Balms.</h1>
							<h1 class="start-welcome">Welcome <span class="introductionsName"></span></h1>
						</div>
					</div>

					<div class="grid__span100">
						<div class="container">
							<div class="inner-container">
								<p class="description">
									Design your own custom lip balm in 5 easy steps using natural ingredients and delicious colours and flavours. You'll get to pick what's in your balm and best of all it will be your own unique creation!
								</p>
								<a href="#" class="start-making letsGoBaby" data-click="step1">Start Making</a>
							</div>
						</div>
					</div>
				</div>

				<!-- step 1 -->
				<form id="lipsForm" action="http://www.lipsbytanja.com/cart/add" method="post">
					<!-- product 1 -->
					<input type="hidden" name="id" value="559931525" />
					<!-- product 2
						<input type="hidden" name="id" value="712322733" />
					-->
					<input type="hidden" id="attributes" name="attributes[balm-attributes]" value="" />
					<!--input type="submit" value="ADD TO SHOPIFY CART" /-->
					<div id="step1" class="grid__row">
						<div class="grid__span100">
			        		<div class="container">
								<!-- WAX -->
								<div id="lipsOne" class="lips">
									<div class="heading">
										<h2>Select your butter - Step 1</h2>
									</div>
									<div class="description">
										Pamper your pucker<br>
										<span>Select one natural butter to form the basis of your balm</span><br>
										<div class="tooltip-info"><span class="text">Hover</span> on the <span class="icon"></span> below for more info on each ingredient.</div>
									</div>

									<a href="#" class="cart coconut" data-cartSection="One" data-cart="Coconut">
										<span class="text">
											Conditioning<br>
											<strong>Coconut</strong>
										</span>
										<span class="tick"></span>
										<span class="tipr" data-tip="<strong>Coconut butter</strong> is great for hydrating the skin. It conditions, moisturises and softens. <strong>Add me</strong> to your balm if you want to nourish your sensitive lips."></span>
									</a>
									<a href="#" class="cart cocoa" data-cartSection="One" data-cart="Cocoa">
										<span class="text">
											Moisturising<br>
											<strong>Cocoa</strong>
										</span>
										<span class="tick"></span>
										<span class="tipr" data-tip="<strong>Cocoa butter</strong> is extremely moisturising and can provide much needed nutrients to lips and skin. <strong>Add me</strong> to your balm if you have dry and chapped lips that need an extra dose of TLC."></span>
									</a>
									<a href="#" class="cart mango" data-cartSection="One" data-cart="Mango">
										<span class="text">
											Nourishing <br>
											<strong>Mango</strong>
										</span>
										<span class="tick"></span>
										<span class="tipr" data-tip="<strong>Mango butter</strong> is highly nourishing filled with loads of antioxidants and smells divine! <strong>Add me</strong> to your balm if you want your lips to have some added hydration and feel soft and supple."></span>
									</a>
									<!--a href="#" class="cart shea" data-cartSection="One" data-cart="Shea">
										<span class="text">
											<strong>Shea</strong>
										</span>
										<span class="tick"></span>
										<span class="tipr" data-tip="<strong>Shea Butter...</strong><br>is a non greasy butter that absorbs well into the skin, enriching it with vitamens A and E.<br>Select me if you want to help keep your lips supple and smooth."></span>
									</a-->

									<a href="#" class="next letsGoBaby" data-click="lipsTwo">Next</a>
								</div>							
							</div>
						</div>
					</div>

					<!-- step 2 -->
					<div id="step2" class="grid__row">
						<div class="grid__span100">
			        		<div class="container">
			        			<!--a href="#" class="back letsGoBaby" data-click="step1">Back</a-->
			        			<!-- BUTTER -->
								<div id="lipsTwo" class="lips">
									<div class="heading">
										<h2>Oil Selection</h2>
									</div>
									<div class="description">
										Replenish those lips<br>
										<span>Select one oil to give your balm shine and moisture</span><br>
										<div class="tooltip-info"><span class="text">Hover</span> on the <span class="icon"></span> below for more info on each ingredient.</div>
									</div>
									
									<a href="#" class="cart almond" data-cartSection="Two" data-cart="Almond">
										<span class="text">
											Soothing<br>
											<strong>Almond</strong>
										</span>
										<span class="tick"></span>
										<span class="tipr" data-tip="<strong>Almond oil </strong>is soothing and revitalising enriched with vitamins, minerals and proteins. <strong>Add me</strong> to your balm if you want to help protect your lips from sun and wind damage."></span>
									</a>
									<a href="#" class="cart avocado" data-cartSection="Two" data-cart="Avocado">
										<span class="text">
											Reviving<br>
											<strong>Avocado</strong>
										</span>
										<span class="tick"></span>
										<span class="tipr" data-tip="<strong>Avocado oil</strong> is a hidden treasure that contains a multitude of vitamins and minerals. <strong>Add me</strong> to your balm if you want to help relieve dehydrated lips."></span>
									</a>
									<a href="#" class="cart olive" data-cartSection="Two" data-cart="Olive">
										<span class="text">
											Conditioning<br>
											<strong>Olive</strong>
										</span>
										<span class="tick"></span>
										<span class="tipr" data-tip="<strong>Olive oil</strong> helps to condition lips and skin and give a healthy radiant shine. <strong>Add me</strong> to your balm if you want your lips to be smooth and shiny all day long!"></span>
									</a>

									<a href="#" class="next letsGoBaby" data-click="lipsThree">Next</a>
								</div>
			        		</div>
			        	</div>
			        </div>

			        <!-- step 3 -->
					<div id="step3" class="grid__row">
						<div class="grid__span100">
			        		<div class="container">
			        			<!--a href="#" class="back letsGoBaby" data-click="step2">Back</a-->
			        			<!-- BUTTER -->
								<div id="lipsThree" class="lips">
									<div class="heading">
										<h2>Essential Oil Selection</h2>
									</div>
									<div class="description">
										Let's infuse this<br>
										<span>Infuse your balm with some beneficial essential ingredients</span><br>
										<div class="tooltip-info"><span class="text">Hover</span> on the <span class="icon"></span> below for more info on each ingredient.</div>
									</div>
									
									<a href="#" class="cart jojoba" data-cartSection="Three" data-cart="Jojoba">
										<span class="text">
											Silky<br>
											<strong>Jojoba</strong>
										</span>
										<span class="tick"></span>
										<span class="tipr" data-tip="<strong>Jojoba oil</strong> is a botanical extract that feels like pure silk. It boasts properties similar to human skin, making it an ideal moisturising ingredient. <strong>Add me</strong> to your balm if you want an extra punch of moisture."></span>
									</a>
									<a href="#" class="cart rosewater" data-cartSection="Three" data-cart="Rosewater">
										<span class="text">
											Rejuvenating <br>
											<strong>Rose water</strong>
										</span>
										<span class="tick"></span>
										<span class="tipr" data-tip="<strong>Rose water</strong> not only smells divine but contains a rich source of antioxidants and skin benefits. <strong>Add me</strong> to your balm if you want to lift your senses and help rejuvenate those lips."></span>
									</a>
									<a href="#" class="cart orange" data-cartSection="Three" data-cart="Orange flower">
										<span class="text">
											Fragrant <br>
											<strong>Orange flower</strong>
										</span>
										<span class="tick"></span>
										<span class="tipr" data-tip="<strong>Orange flower</strong> boasts a range of skin benefits not to mention its intensely relaxing scent. <strong>Add me</strong> to your balm if you want to awaken your senses whilst adding some nutrients back into your lips."></span>
									</a>

									<a href="#" class="next letsGoBaby" data-click="lipsFour">Next</a>
								</div>
			        		</div>
			        	</div>
			        </div>

			        <!-- step 4 -->
					<div id="step4" class="grid__row">
						<div class="grid__span100">
			        		<div class="container">
			        			<!--a href="#" class="back letsGoBaby" data-click="step3">Back</a-->
			        			<!-- INFUSIONS -->
								<div id="lipsFour" class="lips">
									<div class="heading">
										<h2>Oil Selection</h2>
									</div>
									<div class="description">
										Let's get jiggy with it<br>
										<span>Colour and Flavour-up your balm with something tantalising</span><br>
										<div class="tooltip-info"><span class="icon"></span> Select up to two, if you're wanting to mix it up!</div>
									</div>

									<!-- start balms -->
									<a href="#" class="cart coconut balms" data-cartSection="Four" data-cart="No Flavouring">
										<span class="text">None</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart vanilla balms" data-cartSection="Four" data-cart="Vanilla">
										<span class="text">Vanilla</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart lemon balms" data-cartSection="Four" data-cart="Lemon Meringue">
										<span class="text">Lemon Meringue</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart honey balms" data-cartSection="Four" data-cart="Honey">
										<span class="text">Honey</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart passionfruit balms" data-cartSection="Four" data-cart="Passionfruit">
										<span class="text">Passionfruit</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart orange balms" data-cartSection="Four" data-cart="Orange">
										<span class="text">Orange</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart mango balms" data-cartSection="Four" data-cart="Mango">
										<span class="text">Mango</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart peach balms" data-cartSection="Four" data-cart="Peach">
										<span class="text">Peach</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart strawberry balms" data-cartSection="Four" data-cart="Strawberry">
										<span class="text">Strawberry</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart watermelon balms" data-cartSection="Four" data-cart="Watermelon">
										<span class="text">Watermelon</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart raspberry balms" data-cartSection="Four" data-cart="Raspberry">
										<span class="text">Raspberry</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart bubblegum balms" data-cartSection="Four" data-cart="Bubble Gum">
										<span class="text">Bubble Gum</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart spearmint balms" data-cartSection="Four" data-cart="Spearmint">
										<span class="text">Spearmint</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart apple balms" data-cartSection="Four" data-cart="Apple">
										<span class="text">Apple</span>
										<span class="tick"></span>
									</a>
									<a href="#" class="cart chocolate balms" data-cartSection="Four" data-cart="Chocolate">
										<span class="text">Chocolate</span>
										<span class="tick"></span>
									</a>

									<a href="#" class="next letsGoBaby" data-click="lipsFive">Next</a>
								</div>
			        		</div>
			        	</div>
			        </div>

					<!-- step 5 - the order -->
					<div id="step5" class="grid__row">
						<div class="grid__span100">
			        		<div class="container">
			        			<!--a href="#" class="back letsGoBaby" data-click="step4">Back</a-->
			        			<!-- BUTTER -->
								<div id="lipsFive" class="lips final--step">
									<div class="heading">
										<h2>Order Summary</h2>
									</div>
									<div class="description">
										<span>Your order summary: </span><br>
										<h1 class="start-welcome finish"><span class="introductionsName"></span>'s Order</h1>
									</div>

									<div class="order">
										<div class="wax">
											<!-- This is in all the balms as default -->
											<a href="javascript:void(0);"><span class="tipr" data-tip="In addition to your unique selection, your balm will include beeswax as the foundation of your lip balm. This will help provide smooth and long lasting wear that you’ll love.">Wax - <strong>Beeswax</strong></span></a>
										</div>
										<div class="butter">
											Butter - <div id="lipCart-One" data-cartSection="One" class="cart-final"></div>
										</div>
										<div class="oil">
											Oil - <div id="lipCart-Two" data-cartSection="Two" class="cart-final"></div>
										</div>
										<div class="essentialOil">
											Essential Ingredient - <div id="lipCart-Three" data-cartSection="Three" class="cart-final"></div>
										</div>
										<div class="flavour">
											Flavour - <div id="lipCart-Four" data-cartSection="Four" class="cart-final"></div>
										</div>
									</div>

									<div class="order">
										<p class="disclaimer">
											<a href="javascript:void(0);"><span class="tipr" data-tip="*All balms and ingredients of balms may contain traces of fruit and nuts.<br>*Balms should be stored out of direct sunlight and should be used within 12 months of purchase.<br>*Colour selection should be used as a guide only. As all balms are hand made unfortunately we cannot guarantee exact colour replication.<br><br>**Most importantly, enjoy your balm!">Things to note!</span></a>
										</p>
									</div>

									<a href="#" class="start-again" data-click="lets-begin" onclick="logout();">start again</a>
									<a href="#" class="buyNowFinished">checkout</a>

								</div>
			        		</div>
			        	</div>
			        </div>

		        </form>
			</div>

		</div>

		<!-- footer -->
		<div id="footer">
			<div class="container">
				<div class="grid">
					<div class="grid__row">
						<div class="grid__span100">
							<div class="container">
								<div class="logo-container">
									<h1 class="logo">Lips By You - Canberra, Australia Custom Lip Balms.</h1>
								</div>

								<p class="description">Stay in touch on social:</p>

								<div class="social">
									<a href="http://www.facebook.com/lipsbytanja" target="_blank" class="social--links facebook">Follow us on Facebook.</a>
									<a href="http://www.twitter.com/lipsbytanja" target="_blank" class="social--links twitter">Follow us on Twitter.</a>
									<a data-remodal-target="modal" href="#modal" class="social--links mail">Email us anytime.</a>
								</div>

								<p class="description top--padding">
									lipsbyyou is brought to you by:<br>
									<a href="http://www.lipsbytanja.com" target="_blank"><img src="/lookingHOT/images/lipsbytanja-logo.png" alt="Lipsbytanja.com" title="Lipsbytanja.com"></a>
								</p>

								<p class="copyright">Copyright &copy; 2014 <a href="http://www.lipsbytanja.com" target="_blank">lipsbytanja</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- RE_Modal popup -->
		<div class="remodal-bg">
			<div class="remodal" data-remodal-id="modal" id="contact_form">
				<h1>Contact Us</h1>
				<p>Any questions or enquiries, please use the fields below.</p>

				<div class="form-ness">
					<label for="name-form"><span>Name</span>
						<input type="text" name="name-form" id="name-form" placeholder="Enter Your Name" />
					</label>
					<label for="email"><span>Email Address</span>
						<input type="email" name="email" id="email" placeholder="Enter Your Email" />
					</label>
					<label for="message">
						<span>Message</span>
						<textarea name="message" id="message" placeholder="Enter Your Message"></textarea>
					</label>
					<div class="output"></div>
				</div>
				<br>
				<a class="remodal-cancel" href="#">Cancel</a>
				<button class="submit_btn remodal-submit" id="submit_btn">Submit</button>
			</div>
		</div>
		<!-- JavaScript at the bottom for fast page loading -->

		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="/lookingHOT/js/jquery-1.9.1.min.js"><\/script>')</script>   

		<!-- VJ custom js, to be minified on deployment -->
		<script type="text/javascript" src="/lookingHOT/js/plugins.js"></script>
		<script type="text/javascript" src="/lookingHOT/js/core.js"></script>

        <!-- // END \\ -->

		<script type="text/javascript">
			$.validator.addMethod('defaultCheck', function (value, element) {if (element.value == element.defaultValue) {return false;}return true;});

			// lets load sprites before we start anything, shall we?
			function loadSprite(src) {
				var deferred = $.Deferred();
				var sprite = new Image();
				sprite.onload = function() {
					deferred.resolve();
				};
				sprite.src = src;
				return deferred.promise();
			}

			$(document).ready( function() {
				// my pre-loader, simple and sweet!
				var loaders = [];
				// sprites
				loaders.push(loadSprite('/lookingHOT/images/sprite.png'));
				loaders.push(loadSprite('/lookingHOT/images/sprite-small.png'));
				loaders.push(loadSprite('/lookingHOT/images/spriteCircles.png'));
				loaders.push(loadSprite('/lookingHOT/images/spriteCircles-small.png'));
				// background
				loaders.push(loadSprite('/lookingHOT/images/bg-480.jpg'));
				loaders.push(loadSprite('/lookingHOT/images/bg-960_active.jpg'));
				loaders.push(loadSprite('/lookingHOT/images/step1-bg_960.jpg'));
				// if on mobile no need to load these
				if (!Modernizr.touch) {
					loaders.push(loadSprite('/lookingHOT/images/step1-bg.jpg'));
					loaders.push(loadSprite('/lookingHOT/images/step2-bg.jpg'));
					loaders.push(loadSprite('/lookingHOT/images/step4-bg.jpg'));
					loaders.push(loadSprite('/lookingHOT/images/step5-bg.jpg'));
					loaders.push(loadSprite('/lookingHOT/images/bg-1460_active.jpg'));
					loaders.push(loadSprite('/lookingHOT/images/bg-1920_active.jpg'));
				}
				$.when.apply(null, loaders).done(function() {
					// callback when everything was loaded
					LBT.Core.run();
				});

				$("#first-up a.letsGoBaby").click(function() {
					$.ajax({ url: '/lookingHOT/counter.php' });
					return false;
				});

			});
		</script>
		<!-- Google Analytics - make sure to set the account code and any customizations required -->
		<script type="text/javascript">
		
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-50349239-1', 'lipsbyyou.com');
			ga('send', 'pageview');

		</script> 

	</body>
</html>
