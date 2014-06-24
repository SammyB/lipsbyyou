/* Front End Guru: Sam Brunno */
/*   sammybmelbdj@gmail.com    */
/******************************/

/* jshint undef: true, unused: true */
/* global Modernizr */
// make console.log safe to use
window.console||(console={log:function (){}});

var LBT = LBT || {};

//site settings
LBT.Settings = {
	debug: false, // is debugging turned on?
	Root: "/"
};

//site data
LBT.Data = {

	// to be used if wanting
	countTheBalms: 1
};

//Dom Elements
LBT.Elements = {
	$html: $('html'),
	$body: $('body'),
	$footer: $('#footer'),
	$loader: $('.loader'),
	$intro: $('#intro'),
	$begin: $('#lets-begin'),
	$btnScroll: $('a.letsGoBaby'),
	$startAgain: $('a.start-again'),
	$welcomeUser: $('h1.start-welcome span'),
	$tipr: $('span.tipr'),
	$tooltipInfo: $('.lips .tooltip-info span.text'),
	$contactForm: $('#contact_form'),

	$cart : $('a.cart'),
	$form : $('form#lipsForm'),
	$lipsOne : $('#lipsOne'),
	$lipsTwo : $('#lipsTwo'),
	$lipsThree : $('#lipsThree'),
	$lipsFour : $('#lipsFour'),
	$lipsFive : $('#lipsFive'),
	$attributes : $('input#attributes'),
	$attributes2 : $('input#attributes2'),
	$attributes3 : $('input#attributes3'),
	$attributes4 : $('input#attributes4'),
	$finalCart : $('.cart-final'),
	$finalStep : $('.final--step'),
	$buyNowButton : $('.buyNowFinished'),
	$saveBalmButton : $('.saveBalmStartFresh')
};

//site utilities
LBT.utils = {
	scrollToPosition: function (position, duration) {
		$('html, body').animate({
			scrollTop: position
		}, duration);
	},
	getURLParameter: function (name) {
		return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [,""])[1].replace(/\+/g, '%20')) || null;
	},
	log: function (message) {
		if (LBT.Settings.debug) {
			console.log(message);
		}
	},
	error: function (message) {
		if (LBT.Settings.debug) {
			console.log(message);
		}
	},
	reset: function ($this) {
		$this.prop('checked', false);
	},
	toggle: function (element) {
		var klass = 'active';
		element.toggleClass(klass);
		return element.hasClass(klass);
	},
	subToggle: function (element) {
		var bloks = 'showBlock';
		element.toggleClass(bloks);
		return element.hasClass(bloks);
	}
};

LBT.Core = (function () {

	"use strict";

	var init = function () {
		if (Modernizr.touch) {
			// if on mobile below is true
			LBT.Data.touch = true;
			LBT.Elements.$tooltipInfo.html('Click');
		}
		// start application
		application.init();

		// start tipr functionality
		LBT.Elements.$tipr.tipr({
			'speed': 300,
			'mode': 'top'
		});

		$(document).on('open', '.remodal', function () {
			var modal = $(this);
		});

		var inst = $.remodal.lookup[$('[data-remodal-id=modal]').data('remodal')];
		// check if resize happens, then close email popup because its buggy.
		$(window).resize(function() {
			if(this.resizeTO) clearTimeout(this.resizeTO);
				this.resizeTO = setTimeout(function() {
				$(this).trigger('resizeEnd');
			}, 500);
		});

		$(window).bind('resizeEnd', function() {
			if ($('.remodal-overlay').is(':visible')){
				inst.close();
			}
		});
	},
	scrollBaby = function () {
		// start button
		LBT.Elements.$btnScroll.click(function(event) {

			event.preventDefault(); 
	        var defaultAnchorOffset = 0;
	        var anchor = $(this).attr('data-click');
	        var anchorOffset = $('#'+anchor).attr('data-scroll-offset');
	        if (!anchorOffset)
	            anchorOffset = defaultAnchorOffset;
	        $('html,body').animate({ 
	            scrollTop: $('#'+anchor).offset().top - anchorOffset
	        }, 500);
		});

	},
	loggedIn = function (user_name) {
		LBT.Elements.$welcomeUser.html(user_name);
		LBT.Elements.$loader.hide();
		LBT.Elements.$intro.hide();
		LBT.Elements.$begin.show();
		LBT.Elements.$footer.show();
		LBT.Elements.$body.addClass('active');
	},
	cart = function () {
		// calculates what you click in each section
		LBT.Elements.$cart.click(function(e){
			var cartVerify = $(this).attr('data-cartSection');

			if ($(this).hasClass('balms')) {
				// select up to 2 flavours! Thanks Daniel for feedback.
				if ($(this).parents('#lips'+cartVerify).find('a.active').size() >= 2) {
					$(this).parents('#lips'+cartVerify).find('a.active').removeClass('active');
					$('#lipCart-' + cartVerify).html('');
				}
	    		$(this).addClass('active');
	    		if ($('#lipCart-' + cartVerify).text() != ''){
		    		// when clicking an ingredient, add to bottom of review
					$('#lipCart-' + cartVerify).append(', '+$(this).attr('data-cart'));
					$('#lipCart-' + cartVerify).css({ 'font-size' : "15px" });
				} else {
					$('#lipCart-' + cartVerify).append($(this).attr('data-cart'));
					$('#lipCart-' + cartVerify).css({ 'font-size' : "inherit" });
				}
			}
			else {
				$(this).parents('#lips'+cartVerify).find('a.cart').removeClass('active');
	    		$(this).addClass('active');

	    		// when clicking an ingredient, add to bottom of review
				$('#lipCart-' + cartVerify).html($(this).attr('data-cart'));
    		}

			$('.current--cart').addClass('show').show();

			// once entered all values
			if (LBT.Elements.$finalCart.is(':empty') == false) {
				console.log('result before',result);
				var letsAddUp = LBT.Elements.$form.find('.cart-final'),
					result = '';
				// lets add up what you selected, and created a neat little string
				result = letsAddUp.map( function(){
					return $(this).text();
				}).get().join();
				console.log('result after',result);

				LBT.Elements.$buyNowButton.click(function(){
					finalPayment(result);
				});

				LBT.Elements.$saveBalmButton.unbind().click(function(){
					console.log('inside click result ',result);
					saveBalm(result);
					$('#lipCart-One').html('');
					$('#lipCart-Two').html('');
					$('#lipCart-Three').html('');
					$('#lipCart-Four').html('');
					result = '';
				});
			}
			e.preventDefault();
		});
		/* finish steps on form to proceed */
		LBT.Elements.$buyNowButton.click(function(){
			if (LBT.Elements.$finalCart.is(':empty') == true) {
				alert('Please finish all steps before proceeding to checkout.');
			}
		});
		LBT.Elements.$saveBalmButton.click(function(){
			if (LBT.Elements.$finalCart.is(':empty') == true) {
				alert('Please finish all steps before proceeding to save your balm.');
			}
		});
		
	},
	contactForm = function () {
		$("#submit_btn").click(function() { 
			//get input field values

			var user_name       = $('input[name=name-form]').val(); 
			var user_email      = $('input[name=email]').val();
			var user_message    = $('textarea[name=message]').val();

			//simple validation at client's end
			//we simply change border color to red if empty field using .css()
			var proceed = true;
			if(user_name==""){ 
			    $('input[name=name-form]').css('border-color','red'); 
			    proceed = false;
			}
			if(user_email==""){ 
			    $('input[name=email]').css('border-color','red'); 
			    proceed = false;
			}
			if(user_message=="") {  
			    $('textarea[name=message]').css('border-color','red'); 
			    proceed = false;
			}

			//everything looks good! proceed...
			if(proceed) {
				
				//data to be sent to server			
				var post_data = new FormData();
				var inst = $.remodal.lookup[$('[data-remodal-id=modal]').data('remodal')];

				post_data.append( 'userName', user_name );
				post_data.append( 'userEmail', user_email );
				post_data.append( 'userMessage',user_message);
				
				//instead of $.post() we are using $.ajax()
				//that's because $.ajax() has more options and can be used more flexibly.
				$.ajax({
				  url: '/lookingHOT/contact_me.php',
				  data: post_data,
				  processData: false,
				  contentType: false,
				  type: 'POST',
				  dataType:'json',
				  success: function(data){
						//load json data from server and output message     
						if(data.type == 'error') {

							$('#contact_form .output').html(data.text);

						}else{
							$('#contact_form .output').addClass('sent').html(data.text);
							//reset values in all input fields
							$('#contact_form input').val(''); 
							$('#contact_form textarea').val(''); 

							// close a modal
							inst.close();
						}
					}
				});

			}
		});

		//reset previously set border colors and hide all message on .keyup()
		$("#contact_form input, #contact_form textarea").keyup(function() { 
			$("#contact_form input, #contact_form textarea").css('border-color',''); 
			$("#result").slideUp();
		});
	},
	finalPayment = function($result) {
		LBT.Elements.$loader.show();
		LBT.Elements.$begin.hide();
		LBT.Elements.$footer.hide();
		var quantity = LBT.Elements.$form.find('select#quantity option:selected').val(),
			attributes = $result;
		// this adds all attributes into hidden field to submit
		LBT.Elements.$attributes.val('Beeswax,'+attributes);
		// checkout
		$('form#lipsForm').submit();
	},
	saveBalm = function($result) {

		console.log(LBT.Data.countTheBalms);

		// checks if you have already created balms, and sets up for others
		if (LBT.Data.countTheBalms === 4) {

			if (LBT.Elements.$attributes4.val() == ''){
				LBT.Elements.$attributes4.val('Beeswax,'+$result);
				console.log(LBT.Elements.$attributes4.val());
				LBT.Data.countTheBalms++;
			}

		} 
		if (LBT.Data.countTheBalms === 3) {

			if (LBT.Elements.$attributes3.val() == ''){
				LBT.Elements.$attributes3.val('Beeswax,'+$result);
				console.log(LBT.Elements.$attributes3.val());
				LBT.Data.countTheBalms++;
			}

		} 
		if (LBT.Data.countTheBalms === 2) {
			if (LBT.Elements.$attributes2.val() == ''){
				LBT.Elements.$attributes2.val('Beeswax,'+$result);
				LBT.Data.countTheBalms++;
			}

		} 
		if (LBT.Data.countTheBalms === 1) {

			if (LBT.Elements.$attributes.val() == ''){
				LBT.Elements.$attributes.val('Beeswax,'+$result);
				console.log(LBT.Elements.$attributes.val());
				LBT.Data.countTheBalms++;
			}
		}

		LBT.Elements.$saveBalmButton.attr('data-count',LBT.Data.countTheBalms);
		console.log('count ',LBT.Data.countTheBalms);
		//ok all saved, lets set stuff back
		LBT.Elements.$form.find('.active').removeClass('active');
	},
	login = {
		init: function () {
			$('#whoAreYou').validate({
				rules: {name: "required defaultCheck"},
				messages: {
					name: "Please specify your name, or log in below."
				},
				submitHandler: function(form) {
					// get all the inputs into an array.
					var $inputs = $('#whoAreYou :input');
					var values = {};
					$inputs.each(function() {
						values[this.name] = $(this).val();
					});

					// log me in
					loggedIn(values.name);

					// create cookie, with the user name
					$.cookie('textName', values.name);

					// disable submit
					$('#whoAreYou').find(":submit").attr("disabled", true).attr("value","Submitting...");
					return false;
				}
			});
			LBT.Elements.$loader.hide();
			LBT.Elements.$intro.show();
			if (LBT.Data.touch == true) {
				LBT.Elements.$tooltipInfo.html('Click');
			}
		}
	},
	application = {
		init: function () {

			// login page
			login.init();
			cart();
			contactForm();

			scrollBaby();

			if ($.cookie('textName')) {
				loggedIn($.cookie('textName'));
			}
			if ($.cookie('facebookName')) {
				loggedIn($.cookie('facebookName'));
			}
		}
	};
	return {
		run: init
	};
}());