	$(document).ready(function(){ 
		console.log("Message");
	});


	// contains TNS Modal and its events
	var TNS_Modal = function ($){
		var $ = jQuery; //fixes $ issue

		var $modal = $('.tns-modal-wrapper'),
			$body = $('body'),
			$btn_login = $(".tns-login"),
			$btn_register = $(".tns-register"),
			$metered_content = $('.ev-meter-content'),
			$elem_name = '';
		// active_modal = '';
		function init(){
			/*** events attached to modals ****/
			// When the user clicks anywhere outside of the modal, close it

			$(".tns-ev-close").on( 'click' , hide); //close button
			$('.tns-btn').live( 'click' , function(){ show( this ); }); // login/register button
			$('.tns-goto-login').on( 'click' , function(){ show(this); } ); // login link within modal
			$('.tns-goto-register').on( 'click' , function(){ show(this); } ); //register link within modal
			addTextForPrivacyStuff('.tns-modal--register');
			// auth = check_authentication();

			EV.Event.on("ev.registration.loaded", addTextForPrivacyStuff); //when the registration form is loaded in the paywall modal

			EV.Event.on("ev.login.loaded", function(){ $('ev-login .forgot-password').live('click', function(){ alert('clicked'); } ); });
		}

		// adds privacy policy & Terms of services in the registration form
		function addTextForPrivacyStuff( $elem ){
			if ( !$elem ){
				$elem = ".tns-modal--paywall";
			}
			var html = '<div class="tns-pp ng-scope">By clicking Create Account, I Agree to the <a href="/terms/" target="_blank">Terms of Service</a> and <a href="/privacy-policy/" target="_blank">Privacy Policy</a></div>';
			// default value for $elem is paywall registration form
			$( $elem + ' ' + 'ng-form[name=evRegistrationForm] ev-capture-container').append(html); //terms&condition, privacy policy within register form modal
		}

		function show( $elem ){
			hide(); //hides active modal
			// console.dir(this);
			if(arguments[1] == 'paywall' ){
				$elem_name = 'paywall';
			}else if(arguments[1] == 'paywallRequireEntitlement'){
				$elem_name = 'paywallRequireEntitlement';
			}else if(arguments[1] == 'paywallNotifier'){
				$elem_name = 'paywallNotifier';
			}else if(arguments[1] == 'forgotPassword'){
				$elem_name = "forgotPassword";
			}else{
				return showModal( $elem );
			}

			return showModal($elem, $elem_name);
		}

		// shows relevant modal
		function showModal( $elem ){
			$modal.addClass('tns-modal-active');
			$body.addClass('tns-modal-active');
			// console.log('here');
			// console.dir($elem.data);
			if(arguments[1] == 'paywall'){
				$elem_name = 'paywall';
			}else if(arguments[1] == 'paywallRequireEntitlement'){
				$elem_name = 'paywallRequireEntitlement';
			}else if(arguments[1] == 'paywallNotifier'){
				$elem_name = 'paywallNotifier';
				if ($body.hasClass('tns-modal-active')){
					console.log('testing notifier');
					$body.removeClass('tns-modal-active')
				}
			}else if(arguments[1] == 'forgotPassword'){
				$elem_name = "forgotPassword";
			}else{
				$elem_name = $( $elem ).attr('name');
			}
			// console.log($elem);
			$(".tns-modal--" + $elem_name).addClass('tns-modal-active');
			// active_modal = $elem_name;
			render();
		}

		// closes relevant modal
		function hide(){
			// if( $modal.hasClass('tns-modal-active') ){
			// 	$modal.removeClass('tns-modal-active'); // hide modal wrapper
			// }
			var $active_modals = $('.tns-modal-active');
			console.log('hiding: ');
			console.log($active_modals);
			if( $active_modals ){
				$active_modals.removeClass('tns-modal-active');
			}
			// $('.tns-modal-active').each(function(i){
			// 	$( this ).removeClass('.tns-modal-active');
			// });
		    // if( active_modal ){
		    // 	active_modal_obj = $(".tns-modal--" + active_modal);
		    // 	if( active_modal_obj.hasClass('tns-modal-active') ){
			   //  	active_modal_obj.removeClass('tns-modal-active');
			   //  }
		    // }

		    if( $body.hasClass('tns-modal-active') ){
		    	$body.removeClass('tns-modal-active');
		    }
		    // console.dir($modal_type);
		    // EV.Em.authorize(params, handleMeteringSuccess, handleMeteringError);
		  //   if(TNS_require_login){
		  //   	$( ".tns-ev-close" ).each(function( index ) {
		  //   		$( this ).parent('a').attr('href', 'https://hiran-2-new-statesman.pantheonsite.io/');
				//   	console.log( index + ": " + $( this ).parent('a') );
				// });
		}

		function render(){
			var results;
			// if no argument then its an event
			if( arguments.length == 1 && typeof arguments[0] === "object" ){
				results = arguments[0];
			}else if( arguments.length == 0 ){
				// $body.addClass('tns-modal-active');
				results = TNS_Data.meter;
			}
			if( results != undefined ){
				console.log('start render: ');
			  	 console.log(results.result);
			  	 console.log('end render');
			  	if( results.result == "REQUIRE_LOGIN" || results.result == undefined || results.result == "REQUIRE_ENTITLEMENT" ){
			  		$( ".tns-ev-close" ).each(function( index ) {
			    		$( this ).parent('a').attr('href', 'https://hiran-2-new-statesman.pantheonsite.io/');
					  	// console.log( index + ": " + $( this ).parent('a') );
					});
					$('.ev-meter-content').hide();
			  	}
			  }
		  }
		// init();

		function check_authentication(){
			var auth = EV.util.isAuthenticatedWithEvolok();
			var results, articleId;
			// shows metered content if logged in || if allowed
			// console.log( Object.keys( TNS_Data ) );
			if( arguments.length == 1 ){
				results = arguments[0];
				articleId = arguments[0].articleId;
			}else{
				results = TNS_Data.meter;
				articleId = TNS_Data.articleId;
			}

			if( auth == true ){
				var content = 'Already a subscriber? <a href="/ev-subscriber" name="my-account" class="tns-goto-myaccount" data-context="paywall">Link your subscription</a><br>';
				content += 'Problem with your account? <a href="/contact-new-statesman" name="contact-us" class="tns-goto-contactus" data-context="paywall">Contact us</a>';
				$('.tns-modal--paywall span.tns-right').html(content);
			}

			if( results != undefined ){
				if( results.result == "ALLOW_ACCESS"){
					//displays metered contents
					console.log('showing for: ');
					console.log( articleId );

					$('.ev-meter-content').not( ".not-viewable" ).show();
					$('.ev-meter-content').not( ".not-viewable" ).css({'visibility':'visible','opacity':'1'});
					$(".ev-meter-content.not-viewable" ).after( "<div style='text-align:center;'><p>Please Subscribe to view this article</p></div>" );

			  	}else if( results.result == "REQUIRE_LOGIN" ){
			  		not_viewable( results );
			  		show(document.getElementsByClassName("tns-modal--paywall")[0], "paywall");
			  	}else if( results.result == "REQUIRE_ENTITLEMENT" ){
			  		not_viewable( results );
			  		show(document.getElementsByClassName("tns-modal--paywallRequireEntitlement")[0], "paywallRequireEntitlement");
			  	}
			}

		  	//requireentitlement and other conditions required here
		  	//console.log('Checked');

		}

		function public_render(){
			hide();

			if( arguments.length == 1 ){
				check_authentication( arguments[0] );
				render(arguments[0]);
			}else{
				check_authentication();
				render('paywall_loggedin');
			}
		}

		function not_viewable(){
			var results, articleId;
			console.log("here1: ");
			if( arguments.length == 1 && typeof arguments[0] === "object" ){
				results = arguments[0];
				articleId = arguments[0].articleId;
			}else{
				results = TNS_Data.meter;
				articleId = TNS_Data.articleId;
			}
			console.log('viewability: ' + articleId);
			if( results.result != "ALLOW_ACCESS" && results.result != "undefined" ){
	          	// if( response.exceededMeter ){
	          		console.log( document.querySelectorAll("#node-" + results.articleId + " .ev-meter-content")[0] );
	          		var t = document.querySelectorAll("#node-" + results.articleId + " .ev-meter-content")[0];
	          		t.className += " not-viewable";
	          	// }
	          }
		}

		function displayRequireLoginPaywall( response ){
			if( arguments.length > 1 ){
				if (arguments[1] === "REQUIRE_ENTITLEMENT"){
						document.getElementsByClassName('tns-modal--paywall')[0].className += " modal-ent";
				}
			}

			console.log("here123: ");
          	console.log(response);
          	console.log("-- end here123 -- ");

          	show(document.getElementsByClassName("tns-modal--paywall")[0], "paywall");
          	not_viewable();


	          // TNS_Modal.meterCallback( TNS_Data );
	          // console.log("paywall met");
	          // EV.Event.on("ev.widgets.paywall.load", function(resp){
	          // 	console.log('paywall event triggered');
	          // 	console.log(resp);
	          // 	// $('ev-paywall').html(resp);
	          // });
		}

		// function displayRequireEntitlementPaywall( response ){
		// 	show(document.getElementsByClassName("tns-modal--paywallRequireEntitlement")[0], "paywallRequireEntitlement");
		// 	not_viewable();
		// }

		function meterCallback( response ){
			console.log('metering here');
			TNS_Data.meter = response;

			 if (response.result == "ALLOW_ACCESS") {
		          //user has not reached the limit yet
		          console.log('remove paywall and display content');
		          hide();
		      } else if (response.requireEntitlement) {
		          // displayRequireLoginWithEntitlementPaywall();
		          displayRequireLoginPaywall( response, response.result );
		            // displayRequireLoginPaywall( response );
		      } else {
		          if (response.result == "REQUIRE_LOGIN") {
		              displayRequireLoginPaywall( response, response.result );
		          } else {
		          	console.log('require entitlement from metercallback');
		              displayRequireLoginPaywall( response, response.result );
		            // displayRequireLoginPaywall( response );
		          }
		      }

			console.log('starts: ');
			check_authentication();
			console.log('ends---');
			return TNS_Data.meter;
		}

		return {
			init: init,
			hide: hide,
			show: show,
			public_render: public_render,
			meterCallback: meterCallback
		};
	}();


	// integrates evolok events and TNS modals/events
	var TNS_Events = function($){
		var $ = jQuery; //fixes $ issue
		var $body = $('body'), paywall = false;


		function init(){
			EV.Event.on("login.success", onSuccess);
			EV.Event.on("social-login.success", onSuccess);
			EV.Event.on("login.failed", onFailedHandler);
			EV.Event.on("registration.success", registrationSuccess);
			EV.Event.on("social-register.success", registrationSuccess);
			//Ev.Event.on("registration.failed", registraionFailed);
			EV.Event.on("event_to_listen", onEvReady);
			EV.Event.on("logout.action", onLogOut);
			EV.Event.on("social-login.failed", onSocialRegisterFailed);
			EV.Event.on("reset-password.success", onResetSuccess);

			// EV.Event.on("pm.paymentSuccess", onPaymentSuccess);

			EV.Event.on(EV.Event.PM_REDIRECT_PRODUCT_PROFILE, function () {
			    // redirect("profile") //page with the ev-product-profile widget
			    console.log( "triggered" );
			     window.location = "/product-profile";
			    //var url = window.location.href;
			    console.log( url );
			    // window.location = url + "&productProfile=true";
			    if ( !getUrlParameter('productProfile') ){
			    	redirectPage( url + "&productProfile=true" );
			    }else{
			    	redirectPage( url );
			    }
			});

			EV.Event.on(EV.Event.PM_REDIRECT_ORDER_SUMMARY, function () {
				var url = window.location.href;
				// needs to process order
			    EV.Event.publish(EV.Event.PM_PROCESS_ORDER);
			});


			EV.Event.on(EV.Event.PM_CREATE_ORDER_SUCCESS, function () {
				var url = window.location.href;

			     window.location = "/product-summary-payment";

			    //redirectPage( url + "&productSummary=true" );
			});

			EV.Event.on(EV.Event.PM_REDIRECT_TO_PAYMENT, function () {
				// EV.Event.publish(EV.Event.PM_PROCESS_ORDER);
				var url = window.location.href;

			    redirectPage( url );
			})

			EV.Event.on(EV.Event.LOGIN_SUCCESS, function () {
			    // redirect("profile");
			    console.log('profile now!');
				//window.location.href = "/";
				
				var url = window.location.href;

			    redirectPage( url );
			})

			/*Ev.Event.on(EV.Event.REGISTRATION_FAILED, function(event){
				console.log("Registration is Failed");
			})*/

			EV.Event.on(EV.Event.PM_ERROR, function(event) {
			    console.error("PM Error:", event);
			    if (event.error && event.error.code == "no_products_selected") {
			        redirectPage("/ev-subscribe");
			    }else if(event.error && event.error.code == "ERROR_PROCESSING_ORDER" ){
			    	console.log("please retry!");
			    }
			});

			/*EV.Event.on('registration.failed', function (res) {
			   console.log("Registration Failed = ", res);
			   alert("This account is already registerd");
			});*/

			$('.tns-modal--register button[type="submit"]').live('click', function(){ 

					if(!$('input[name="email_address"]').val()){alert('Data is Empty');} 
			 });

			$('button.product-profile-submit-btn').live('click',function(event) {
				event.stopPropagation();
				console.log('Button Clicked');
				if (!$('#auth-register-email_address').val()) {
				        if ($("#auth-register-email_address").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#auth-register-email_address").parent().after("<div class='validation col-sm-9'>Please enter email address</div>");
				        }				      
				    } else {
				        $("#auth-register-email_address").parent().next(".validation").remove(); // remove it
				}
				if (!$('#auth-register-password').val()) {
				        if ($("#auth-register-password").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#auth-register-password").parent().after("<div class='validation col-sm-9'>Please enter password</div>");
				        }				       
				    } else {
				        $("#auth-register-password").parent().next(".validation").remove(); // remove it
				}
				if (!$('#auth-register-confirm_password').val()) {
				       // if ($("#auth-register-confirm_password").parent().next(".validation").length == 0) // only add if not added
				       // {
				       		$("#auth-register-confirm_password").parent().next(".validation").remove();
				            $("#auth-register-confirm_password").parent().after("<div class='validation col-sm-9'>Please enter confirm password</div>");
				      //  }
				      
				    } else if($('#auth-register-confirm_password').val() != $('#auth-register-password').val()) {

				    	  if ($("#auth-register-confirm_password").val() !== 0) // only add if not added
				        {
				        	$("#auth-register-confirm_password").parent().next(".validation").remove();
				        	console.log('Password is not matching');
				            $("#auth-register-confirm_password").parent().after("<div class='validation col-sm-9'>Password is not matching</div>");
				        }				    	
					}else{
						$("#auth-register-confirm_password").parent().next(".validation").remove(); // remove it
					}				
				if (!$('#personal-details-first_name').val()) {
				        if ($("#personal-details-first_name").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#personal-details-first_name").parent().after("<div class='validation col-sm-9'>Please enter first name</div>");
				        }				      
				    } else {
				        $("#personal-details-first_name").parent().next(".validation").remove(); // remove it
				}
				if (!$('#personal-details-last_name').val()) {
				        if ($("#personal-details-last_name").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#personal-details-last_name").parent().after("<div class='validation col-sm-9'>Please enter last name</div>");
				        }				       
				    } else {
				        $("#personal-details-last_name").parent().next(".validation").remove(); // remove it
				}
				if (!$('#delivery-address-street2').val()) {
				        if ($("#delivery-address-street2").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#delivery-address-street2").parent().after("<div class='validation col-sm-9'>Please enter street name</div>");
				        }				      
				    } else {
				        $("#delivery-address-street2").parent().next(".validation").remove(); // remove it
				}
				if (!$('#delivery-address-city2').val()) {
				        if ($("#delivery-address-city2").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#delivery-address-city2").parent().after("<div class='validation col-sm-9'>Please enter city name</div>");
				        }				       
				    } else {
				        $("#delivery-address-city2").parent().next(".validation").remove(); // remove it
				}
				if (!$('#delivery-address-postcode2').val()) {
				        if ($("#delivery-address-postcode2").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#delivery-address-postcode2").parent().after("<div class='validation col-sm-9'>Please enter postcode</div>");
				        }				      
				    } else {
				        $("#delivery-address-postcode2").parent().next(".validation").remove(); // remove it
				}
				var dvad2 = document.getElementById('delivery-address-country2');
				if ( dvad2 ) {
					if(dvad2.value == ''){
				        if ($("#delivery-address-country2").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#delivery-address-country2").parent().after("<div class='validation col-sm-9'>Please select country</div>");
				        }				     
				    } else {
				        $("#delivery-address-country2").parent().next(".validation").remove(); // remove it
					}
				}

				if (!$('#delivery-address-street').val()) {
				        if ($("#delivery-address-street").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#delivery-address-street").parent().after("<div class='validation col-sm-9'>Please enter email address</div>");
				        }				      
				    } else {
				        $("#delivery-address-street").parent().next(".validation").remove(); // remove it
				}
				if (!$('#delivery-address-city').val()) {
				        if ($("#delivery-address-city").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#delivery-address-city").parent().after("<div class='validation col-sm-9'>Please enter city name</div>");
				        }				      
				    } else {
				        $("#delivery-address-city").parent().next(".validation").remove(); // remove it
				}
				if (!$('#delivery-address-postcode').val()) {
				        if ($("#delivery-address-postcode").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#delivery-address-postcode").parent().after("<div class='validation col-sm-9'>Please enter city name</div>");
				        }				       
				    } else {
				        $("#delivery-address-postcode").parent().next(".validation").remove(); // remove it
				}				
				var dvad3 = document.getElementById('delivery-address-country');
				if ( dvad3 ) {
					if(dvad3.value == ''){
				        if ($("#delivery-address-country").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#delivery-address-country").parent().after("<div class='validation col-sm-9'>Please select country</div>");
				        }				     
				    } else {
				        $("#delivery-address-country").parent().next(".validation").remove(); // remove it
					}
				}

				if (!$('#billing-address-street').val()) {
				        if ($("#billing-address-street").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#billing-address-street").parent().after("<div class='validation col-sm-9'>Please enter street name</div>");
				        }				     
				    } else {
				        $("#billing-address-street").parent().next(".validation").remove(); // remove it
				}
				if (!$('#billing-address-city').val()) {
				        if ($("#billing-address-city").parent().next(".validation").length == 0) // only add if not added
				        {
				           $("#billing-address-city").parent().after("<div class='validation col-sm-9'>Please enter city name</div>");
				        }				      
				    } else {
				        $("#billing-address-city").parent().next(".validation").remove(); // remove it
				}
				if (!$('#billing-address-postcode').val()) {
				        if ($("#billing-address-postcode").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#billing-address-postcode").parent().after("<div class='validation col-sm-9'>Please enter postcode</div>");
				        }				      
				    } else {
				        $("#billing-address-postcode").parent().next(".validation").remove(); // remove it
				}
				if (document.getElementById('billing-address-country').value  == '') {
				        if ($("#billing-address-country").parent().next(".validation").length == 0) // only add if not added
				        {
				            $("#billing-address-country").parent().after("<div class='validation col-sm-9'>Please select country</div>");
				        }				       
				    } else {
				        $("#billing-address-country").parent().next(".validation").remove(); // remove it
				}
				// if (!$('#delivery-address-street').val()) {
				//         if ($("#delivery-address-street").parent().next(".validation").length == 0) // only add if not added
				//         {
				//             $("#delivery-address-street").parent().after("<div class='validation col-sm-9'>Please enter street name</div>");
				//         }				      
				// } else {
				//     $("#delivery-address-street").parent().next(".validation").remove(); // remove it
				// }
					
				
			});

			$('ev-product-profile button').live('click', function(){
				console.log("please wait!!");
				$('ev-product-profile').append("<div class='loading'>Loading</div>");
			});

			// EV.Event.publish(EV.Event.PM_VALIDATE_PROFILE, {
			//     serviceName: "default",
			//     successCb: function(response) {
			//         console.log("The profile is valid")
			//         //redirect to the next step in the flow
			//     },
			//     errorCb: function(error) {
			//         console.log("Error validating profile:", error)
			//         //redirect to the profile widget so that the user provides the missing attributes
			//     }
			// });

			EV.Event.on(EV.Event.PM_REDIRECT_TO_LOGIN, function () {
				var url = window.location.href;
			    console.log('login now!');
			    // window.location = "/product-summary-payment";

			    //redirectPage( url + "&productProfile=true" );
				 window.location = "/product-profile";

			    // window.location = "/login";

			});

			TNS_Modal.init();

			// EV.Event.on("ev.notifier.opened", function(){ TNS_Modal.show('.tns-modal--paywallNotifier', 'paywallNotifier' ); } );
			EV.Event.on("ev.notifier.opened", function(){ console.log('notifier on!'); TNS_Modal.show('.tns-modal--paywallNotifier', 'paywallNotifier' ); } );

			// sets up metering function on ready
			TNS_Data.auth.handleMeteringSuccess = function( response ){

				console.log('resp:');
				console.log(response);
    			TNS_Modal.meterCallback( response );

			};


			TNS_Data.auth.handleMeteringError = function( response ){
				console.log("oops, the meter broke!");
			};
/*
			// ev ready function doesn't work
			$(document).ready(function(){
				$('.tns-checking-profile').removeClass('tns-checking-profile');
				if( EV.util.getEVSession() ){
					$body.addClass('ev-is-active ev-is-loggedin');
				}else{
					$body.addClass('ev-is-active ev-is-anon');
				}
			}());*/

		}

		function redirectPage( url ){
			window.location = url;
		}

		function getUrlParameter(sParam) {
		    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
		        sURLVariables = sPageURL.split('&'),
		        sParameterName,
		        i;

		      // console.log( sURLVariables );
		    for (i = 0; i < sURLVariables.length; i++) {
		        // sParameterName = sURLVariables[i].split('=')[0];
		         sParameterName = sURLVariables[i].split(/=(.+)/);
		         // console.log(sParameterName);

		        if (sParameterName[0] === sParam) {
		            return sParameterName[1] === undefined ? true : sParameterName[1];
		        }
		    }
		}

		function removeUrlParameter(sParam) {
		    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
		    	urlWithoutParam = window.location.href.split('?')[0],
		        sURLVariables = sPageURL.split('&'),
		        sParameterName,
		        i;

		      // console.log( urlWithoutParam );
		    for (i = 0; i < sURLVariables.length; i++) {
		        // sParameterName = sURLVariables[i].split('=')[0];
		         sParameterName = sURLVariables[i].split(/=(.+)/); //only split on the first instance of "="
		         // console.log(sParameterName);

		        if (sParameterName[0] === sParam) {
		            sURLVariables.splice(i, 1);
		        }
		    }
		    return (urlWithoutParam + "?" + sURLVariables.join("&") );
		}

		function onSuccess(res){

			var returnUrl, orderPageLogin, checkIfSubsPage;

			if( $body.hasClass('ev-is-anon') ){
				$body.removeClass('ev-is-anon');
			}
			$body.addClass('ev-is-loggedin');
			// refreshMeterContent();
			console.log('Login Success!');
			// console.log(res);
			// $('ev-login').attr("on-forgot-password", test1);
			// trigger_TNS_ready_event();
			// TNS_Modal.public_render();
			/*** handles login redirect on amp page **/
			returnUrl = getUrlParameter('return');
			// window.location.reload();
			// console.log(returnUrl);
			// console.log(orderPageLogin);
			if(returnUrl !== undefined){
				redirectPage(returnUrl);
				console.log('inside returnUrl');
			}

			/*** handles redirect on order page **/
			if( getUrlParameter('loginRequired') ){
				orderPageLogin = removeUrlParameter('loginRequired');
			}
			if( orderPageLogin !== undefined ){
				// redirectPage(orderPageLogin);
				redirectPage( orderPageLogin + "&productProfile=true" );
				console.log('inside orderPageLogin');
			}
			checkIfSubsPage = getUrlParameter('id') && getUrlParameter('productName') && getUrlParameter('productProfile');

			if( checkIfSubsPage ){
				//hides login form
				$('#ev-login-subs-page').css("display", "none");
				var user, user_email;

				EV.Core.getUserProfile(EV.util.getEVSession().guid, "default").then(function(resp){ 
					user = resp.response.userProfile.attributes; 
					$.each(user, function( index, value ) {
				  		if(value.name == "email_address"){ user_email = value.value; }
					});
					console.log(user);
					console.log("email: " + user_email);

					if( user_email ){
						var $html = "YOU ARE SIGNED IN AS " + user_email;
						console.log($html);

						$('#ev-product-profile-form').prepend($html);
					}

				});				
				console.log("its sub page!");
			}
			TNS_Modal.hide();
		}

		function onResetSuccess(){
			redirectPage('/my-account');
		}

		function onFailedHandler(res){
			console.log('Login Failed!');
		}

		function registrationSuccess(res){
			var returnUrl = getUrlParameter('return');

			// handles logout in amp page
			if(returnUrl !== undefined){
				// console.log('inside returnUrl amp');
				// console.log(returnUrl);
				redirectPage(returnUrl);
			}
			alert('Registration successfully completed');
			TNS_Modal.hide();
			console.log('registraion Success');
		}
		function registraionFailed(res){
			//console.log("Your are Already Registerd with this credentials");
		}
		function onEvReady(){
			// alert('Ready!!');
			$('.tns-checking-profile').removeClass('tns-checking-profile');
			if( EV.util.getEVSession() ){
				$body.addClass('ev-is-active ev-is-loggedin');
			}else{
				$body.addClass('ev-is-active ev-is-anon');
			}
			// $('.ev-open-modal-paywall-login').attr('modal-animation', 'false');
			// $('.ev-open-modal-paywall-login').removeAttr('animate');
			// $('.ev-open-modal-paywall-login').removeAttr('uib-modal-animation-class');
			// $('.ev-open-modal-paywall-login').removeClass('fade');

			// initialized modals
			// TNS_Modal.init();
			// console.dir(TNS_Data);
/*
			// sets up metering function on ready
			TNS_Data.auth.handleMeteringSuccess = function( response ){

				console.log('resp:');
				console.log(response);
    			TNS_Modal.meterCallback( response );

			};

			TNS_Data.auth.handleMeteringError = function( response ){
				console.log("oops, the meter broke!");
			};
*/
			// handles when page loads two article at the same time

			// console.log( "what?" + (TNS_Data.auth.param_init == true) );
			// if( typeof TNS_Data.param_init !== "undefined" ){
			// 	console.log( "init: param: " + TNS_Data.param_init );
			// 	ev_init_authorize().done(function(){ TNS_Data.param_init = done; trigger_TNS_ready_event(); });
			// 	// delete TNS_Data.param_init;
			// 	// TNS_Data.param_init = "done";

			// }

			// trigger_TNS_ready_event();

			// window.addEventListener("TNS_ev_ready", TNS_Data.auth.ev_ready_func);

			console.log( 'Ev ready!' );

			// console.log( EV.Dab.isAdblockDetected() );
		}

		function onLogOut(){
			var returnUrl = getUrlParameter('return');

			// handles logout in amp page
			if(returnUrl !== undefined){
				console.log('inside returnUrl amp');
				console.log(returnUrl);
				redirectPage(returnUrl);
			}else{
				window.location.reload();
			}
		}

		function onSocialRegisterFailed(error){

			/*** if social oauth doesn't provide required field such as firstName
			** this displays the modal to fill the required fields inorder to social login **/

			if (error.error) {
	            if (error.error.code === 'ATTRIBUTE_REQUIRED' ||
	                error.error.code === 'REQUIRED_ATTRIBUTE_MISSING' ||
	                error.error.code === 'USER_NOT_REGISTERED' ||
	                error.error.code === 'USER_PROFILE_NOT_FOUND') {

	                // EV.Event.publish("ev.close.modal.registration-widget");
	                // EV.Event.publish("ev.open.modal.socialRegistration", error.error);
	                TNS_Modal.show($('.tns-modal--sociallogin')); //trigger social register/login modal
	                // alert('failed attrib');
	            }
	        }
		}

		function trigger_TNS_ready_event(){

			if( typeof TNS_Data.auth.ev_ready_event != "undefined" ){
	            window.dispatchEvent( TNS_Data.auth.ev_ready_event );
	        }

	        var ev_queue = TNS_Data.auth.ev_queue;

	        if( ev_queue ){
				console.log( ev_queue  );
				var param, articleId, status;
				// var paywall = false;
				// initializes session for metering
				ev_authorize(ev_queue[0]).done(function(data){
					console.log(data);
					// init_viewable_article(data.articleId, data.result);
					TNS_Modal.public_render( data );
					// if( paywall == false && (data.result.result != "ALLOW_ACCESS" || data.result.result != "undefined") ){
					// 	paywall = true;
					// }

					// tracks paywall meter for remaining article within the same initiated sessionID
					ev_auth_another(ev_queue);

				});

			}
		}

		function ev_auth_another(ev_queue){
			for (var i = 1; i < ev_queue.length; i++) {
				    // param = TNS_Data.auth.ev_queue.shift();

				    console.log( "counting: " + i );
				    console.log('params_new: ' + ev_queue[i] );
					ev_authorize(ev_queue[i]).done(function(data){
						console.log(data);
						// init_viewable_article(data.articleId, data.result);
						TNS_Modal.public_render( data );
						// if( paywall == false && (data.result.result != "ALLOW_ACCESS" || data.result.result != "undefined") ){
						// 	paywall = true;
						// }
					});
					// EV.Em.authorize($param, TNS_Data.auth.handleMeteringSuccess, TNS_Data.auth.handleMeteringError);
				}
		}

		function ev_authorize(params){
			var dfd = $.Deferred(), articleId, result;
			articleId = JSON.parse(params).articleId;
			console.log("article:" + articleId);
			console.log("params:" + params);
			EV.Em.authorize(params, function(response){
				TNS_Data.meter = response;
				console.log( response );
				result = response.result; dfd.resolve({"articleId" : articleId, "result": result});
			}, function(response){ dfd.reject({articleId: "rejected"}) } );
			return dfd;
		}
/*
		function init_viewable_article( articleId, response ){
			console.log('startshere:');
			console.log(response);
			console.log('endsshere:');
			if( response.result != "ALLOW_ACCESS" && response.result != "undefined" ){
	          	// if( response.exceededMeter ){
	          		console.log( document.querySelectorAll("#node-" + articleId + " .ev-meter-content")[0] );
	          		var t = document.querySelectorAll("#node-" + articleId + " .ev-meter-content")[0];
	          		t.className += " not-viewable";
	          		paywall = true;
	          	// }
	        }else if( response.result == "ALLOW_ACCESS"){
					//displays metered contents
				console.log('showing for: ');
				console.log( articleId );

				$('.ev-meter-content').not( ".not-viewable" ).show();
				$('.ev-meter-content').not( ".not-viewable" ).css({'visibility':'visible','opacity':'1'});
				$(".ev-meter-content.not-viewable" ).after( "<div style='text-align:center;'><p>Please Subscribe to view this article</p></div>" );

		  	}
		}
*/
		return {
			init: init,
			getUrlParameter: getUrlParameter
		};

	}();

	//initialization
	TNS_Events.init();	
	window.addEventListener("load", function() { document.getElementById("auth-register-email_address").placeholder = "Email Address"; document.getElementById("auth-register-password").placeholder = "Password"; document.getElementById("auth-register-confirm_password").placeholder = "Confirm password"; console.log('Email'); });
//$(document).ready(function(){ 
	//$( "#auth-register-email_address" ).load(function() {
 		/*$("#auth-register-email_address").attr("placeholder", "Email address");
 		console.log("Hello");*/
 		//console.log("hello word!")
	//});
//});

//var em = document.getElementById("auth-register-email_address").placeholder = "Email Address";
//var pas = document.getElementById("auth-register-password").placeholder = "Password";
//var cpas = document.getElementById("auth-register-confim_password").placeholder = "Confirm password";

//$("#auth-register-email_address").attr("placeholder", "Email address");


	/*var pl = document.getElementById("auth-register-email_address").placeholder;
	console.log("This is Place = "+pl);*/
	//window.addEventListener("load", function() { document.getElementById("auth-register-email_address").placeholder = "Email Address"; console.log("hello!");});
//$(document).ready(function(){ 
//var palce =  $("#auth-register-email_address").val( $("#auth-register-email_address").attr("placeholder"));
//var palce =  $("#auth-register-email_address").attr("placeholder");

/*console.log("Page is coming");
console.log(palce);
console.log(document.getElementById("auth-register-email_address").placeholder);*/
	/*if(!$("#auth-register-email_address").val()){
  var palce = $("#auth-register-email_address").attr("placeholder");
  	console.log("This is a Placehoder: "+palce);}*/

//});

		/*$("#auth-register-email_address").attr("placeholder", "Email address");
$("#auth-register-password").attr("placeholder", "Password");
$("#auth-register-confirm_password").attr("placeholder", "Confirm password");*/
	


/****** disable browser console *****/
// (function() {
//     try {
//         var $_console$$ = console;
//         Object.defineProperty(window, "console", {
//             get: function() {
//                 if ($_console$$._commandLineAPI)
//                     throw "Sorry, for security reasons, the script console is deactivated on netflix.com";
//                 return $_console$$
//             },
//             set: function($val$$) {
//                 $_console$$ = $val$$
//             }
//         })
//     } catch ($ignore$$) {
//     }
// })();

// (function(){

//   var _z = console;
//   Object.defineProperty( window, "console", {
// 		get : function(){
// 		    if( _z._commandLineAPI ){
// 			throw "Sorry, Can't execute scripts!";
// 		          }
// 		    return _z;
// 		},
// 		set : function(val){
// 		    _z = val;
// 		}
//   });

// })();
