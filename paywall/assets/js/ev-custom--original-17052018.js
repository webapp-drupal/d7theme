/****
	* @license ev-custom.js v1.7.1
	*
****/

	$(document).ready(function(){ 
		console.log("Message");
		// $("#accordion").accordion();
		$("#accordion").accordion({ disabled: true, animate: true });
		// $("#accordion .step-4-2").accordion({ disabled: true, collapsible:true});
	});		  
	
	(function ($) {

		var $ads_to_hide = ['.taxonomy-america .secondary-content-box.desktop-only-banner.mpu', '.taxonomy-america .top-leaderboard', '.page-america .secondary-content-box.desktop-only-banner.mpu', '.page-america .top-leaderboard'];

		$.each($ads_to_hide, function( index, value ) {
		  if( $(value).length ){
		  	$( value ).hide();
		  }
		});

		function ads_logic($elem, $ad){
			if( $elem.length ){
				$elem.html('');
				$elem.append($ad);
				$elem.show();
			}
		}

		// if( $('.page-america .header-leaderboard').length ){
		// 	$('.page-america .header-leaderboard').show();
		// }

		var $ads_dianomi_sidebar_us = '<!--Smartad # 4309: New Statesman USA - Right Rail 300x600-->' + 
				'<iframe WIDTH="300" HEIGHT="600" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4309"  style="width: 300px; height: 600px; border: none; overflow: hidden;"></iframe>';

		ads_logic( $('.taxonomy-america .desktop-only-banner.mpu.dianomi-ad-sidebar'), $ads_dianomi_sidebar_us);

		var $ads_inarticle_us_1 = '<!--Smartad # 4306: New Statesman USA - In Article - Position 1-->' +
				'<iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4306"  style="width: 100%; height: 150px; border: none; overflow: hidden;"></iframe>';

		var $ads_inarticle_us_2 = '<!--Smartad # 4307: New Statesman USA - In Article - Position 2-->' +
				'<iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4307"  style="width: 100%; height: 150px; border: none; overflow: hidden;"></iframe>';

		var $ads_inarticle_us_3 = '<!--Smartad # 4308: New Statesman USA - In Article - Position 3-->' +
				'<iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4308"  style="width: 100%; height: 150px; border: none; overflow: hidden;"></iframe>';

		ads_logic( $('.page-america .dianomi-ad-1'), $ads_inarticle_us_1);
		ads_logic( $('.page-america .dianomi-ad-2'), $ads_inarticle_us_2);
		ads_logic( $('.page-america .dianomi-ad-3'), $ads_inarticle_us_3);

		var $ads_related_sponsored_us = '<!--Smartad # 4305: New Statesman USA - Below Article 8 Images-->' +
				'<iframe WIDTH="1051" HEIGHT="690" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4305"  style="width: 100%; height: 690px; border: none; overflow: hidden;"></iframe>';
		
		ads_logic( $('.page-america .related-articles.dianomi-sponsored'), $ads_related_sponsored_us);

	})(jQuery);

	// contains TNS Modal and its events
	var TNS_Modal = function ($){
		var $ = jQuery; //fixes $ issue

		var $modal = $('.tns-modal-wrapper'),
			$body = $('body'),
			$btn_login = $(".tns-login"),
			$btn_register = $(".tns-register"),
			$metered_content = $('.ev-meter-content'),
			$elem_name = '',
			$is_article = false;
		// active_modal = '';
		function init(){
			/*** events attached to modals ****/

			if( $body.hasClass('node-type-blogs') || $body.hasClass('node-type-longread') ){
				$is_article = true;
			}

			if( !EV.util.getEVSession() && !$body.hasClass('ev-is-anon') ){
				$body.addClass('ev-is-anon');
				
			}else if( EV.util.getEVSession() ){
				$body.addClass('ev-is-loggedin');

				//only if not article page
				if( !$body.hasClass('node-type-blogs') && !$body.hasClass('node-type-longread')){
					EV.Em.segment('{}', function(res){loggedInSubs(res.segments);}, function(err){return err;}); //subs logic
				}

			}

			$(".tns-ev-close").on( 'click' , close_modal); //close button
			$(document).on("click", '.tns-btn', function() { show(this); } ); // login/register button
			$(document).on("click", '.tns-goto-login', function() { show(this); } ); // login link within modal

			$('.tns-goto-register').on( 'click' , function(){ show(this); } ); //register link within modal
			addTextForPrivacyStuff('.tns-modal--register');
			// auth = check_authentication();

			EV.Event.on("ev.registration.loaded", addTextForPrivacyStuff); //when the registration form is loaded in the paywall modal

			evProfileload();

			$('body.ev-is-loggedin .mobile-login-container .ev-myaccount button.tns-login').on('click', function(){

				$(this).closest('.ev-myaccount').children('.ev-myaccount-list').toggleClass('show');
			});

			$('body.ev-is-loggedin .mobile-login-container .ev-myaccount').on('blur', function(){

				if( $(this).children('.ev-myaccount-list').hasClass('show') ){
					$(this).children('.ev-myaccount-list').removeClass('show');
				};
			});

			// $("body").on('DOMSubtreeModified', ".tns-modal--privateMode", function(res) {
			//     console.log('modal changed ', res);
			// });
		
		}

		function incognito_detection(){

			if( !EV.util.getEVSession() && $is_article) {
				// EV.Dab.detectPrivateMode().then(function(result) {
				    // window.isIncognito = result; 
				    // console.log(window.isIncognito);
				    if( window.isIncognito == true ){
				    	// alert('Incognito detected'); 

				    	if( !$(".tns-modal--paywall").hasClass('tns-modal-active') ){
				    		showModalLogic();
				    		$(".tns-modal--privateMode").addClass('tns-modal-active');
				    	}

				    	$( ".tns-ev-close" ).each(function( index ) {
				  			if( TNS_Data.meter.userProperties['site'] != 'undefined' && TNS_Data.meter.userProperties['site'] == 'US' ){
				  				$( this ).parent('a').attr('href', '/us');
				  			}else{
				  				$( this ).parent('a').attr('href', '/uk');
				  			}
						});
				    }
				}

		}

		function loggedInSubs(res){
			var $body = $('body'); 

			if( ['digital-subscriber'].some(function (v) {return (res).indexOf(v) >= 0;}) ){
				if( !$body.hasClass('ev-subbed') ){
					$body.addClass('ev-subbed');
				}
			}

			return res;
		}


		function evProfileload(){
			var evProfileHtml;

			if( !EV.util.getEVSession() ){
				evProfileHtml = '<button name="login" class="tns-btn tns-login" >Login</button>  <button name="register" class="tns-btn tns-register">Register</button>'; 

			}else{
				evProfileHtml = '<a href="/my-account" class="navLoggedIn">My Account</a>  ' +
        						'<a class="navLoggedIn" onclick="javascript:EV.Core.UI.logout();">Log out</a>';
			}

			$('.tns-evo-profile').html(evProfileHtml);
			console.log(evProfileHtml);
		}

		// adds privacy policy & Terms of services in the registration form
		function addTextForPrivacyStuff( $elem ){
			if ( !$elem ){
				$elem = ".tns-modal--paywall";
			}
			var html = '<div class="tns-pp ng-scope">By registering, I Agree to the <a href="/terms/" target="_blank">Terms of Service</a> and <a href="/privacy-policy/" target="_blank">Privacy Policy</a></div>';
			// default value for $elem is paywall registration form
			$( $elem + ' ' + 'ng-form[name=evRegistrationForm]').append(html); //terms&condition, privacy policy within register form modal
		}

		function show( $elem ){
			close_modal();
			console.log('closing modal');
			// hide(); //hides active modal
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

		function showModalLogic(){
			$modal.addClass('tns-modal-active');
			$body.addClass('tns-modal-active');
		}

		// shows relevant modal
		function showModal( $elem ){
			showModalLogic();
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
			// fixes special case 

			$(".tns-modal--" + $elem_name).addClass('tns-modal-active');
			// active_modal = $elem_name;
			render();
		}

		// used for closing modal -- buttons
		function close_modal(){
			var $active_modals = $('.tns-modal-active');
			console.log('hiding: ');
			// console.log($active_modals);
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

		// closes relevant modal
		function hide(){
			// if( $modal.hasClass('tns-modal-active') ){
			// 	$modal.removeClass('tns-modal-active'); // hide modal wrapper
			// }
			if( window.isIncognito === true ){ return; }
			close_modal();

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
			  			if( results.userProperties['site'] != 'undefined' && results.userProperties['site'] == 'US' ){
			  				$( this ).parent('a').attr('href', '/us');
			  			}else{
			  				$( this ).parent('a').attr('href', '/uk');
			  			}
					  	// console.log( index + ": " + $( this ).parent('a') );
					});
					$('.ev-meter-content').hide();
			  	}
			  }
		  }
		// init();

		function hide_ads( $elem_arr ){
			// hides ads
			$.each($elem_arr, function( index, value ) {
			  if( $(value).length ){
			  	$( value ).hide();
			  }
			});

		}

		function inject_dynamic_ads(){
			//New Statesman article inText
			$('.node-type-blogs').prepend('<script type="text/javascript" async="true" src="//fo-api.omnitagjs.com/fo-api/ot.js?Placement=f73945131d2fdd86a659b7a2f02d24b8"></script>');
		}

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
					// console.log('showing for: ');
					// console.log( articleId );

					$('.ev-meter-content').not( ".not-viewable" ).show();
					$('.ev-meter-content').not( ".not-viewable" ).css({'visibility':'visible','opacity':'1'});
					$(".ev-meter-content.not-viewable" ).after( "<div style='text-align:center;'><p>Please Subscribe to view this article</p></div>" );


					// ads logic for paid subscriber
					if( EV.util.getEVSession() !== null ){
						$subs = loggedInSubs(results.segments);

						if( $.inArray('digital-subscriber', results.segments) >= 0  ){
							var $ads_to_hide = ['.article-mpu-1', '.article-mpu-2', '.article-mpu-3', '.article-mpu-5', '.article-mpu-51', '.article-mpu-52', '.secondary-content-box.desktop-banner.mpu', '.dianomi-ad', '.bottom-leaderboard-section'];
							hide_ads($ads_to_hide);
						}else{
							inject_dynamic_ads();
						}
					}else{
						inject_dynamic_ads();
					}

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
			close_modal();
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
			// console.log("here1: ");
			if( arguments.length == 1 && typeof arguments[0] === "object" ){
				results = arguments[0];
				articleId = arguments[0].articleId;
			}else{
				results = TNS_Data.meter;
				articleId = TNS_Data.articleId;
			}
			// console.log('viewability: ' + articleId);
			/*
			if( results.result != "ALLOW_ACCESS" && results.result != "undefined" ){
	          	// if( response.exceededMeter ){
	          		console.log( document.querySelectorAll("#node-" + results.articleId + " .ev-meter-content")[0] );
	          		var t = document.querySelectorAll("#node-" + results.articleId + " .ev-meter-content")[0];
	          		t.className += " not-viewable";
	          	// }
	          }
	          */
		}

		function displayRequireLoginPaywall( response ){
			if( arguments.length > 1 ){
				if (arguments[1] === "REQUIRE_ENTITLEMENT"){
						document.getElementsByClassName('tns-modal--paywall')[0].className += " modal-ent";
				}
			}

			// console.log("here123: ");
   //        	console.log(response);
   //        	console.log("-- end here123 -- ");

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

		function allow_callback( results ){
			//displays metered contents
			// console.log('showing for: ');
			// console.log( articleId );

			$('.ev-meter-content').not( ".not-viewable" ).show();
			$('.ev-meter-content').not( ".not-viewable" ).css({'visibility':'visible','opacity':'1'});
			$(".ev-meter-content.not-viewable" ).after( "<div style='text-align:center;'><p>Please Subscribe to view this article</p></div>" );


			// ads logic for paid subscriber
			if( EV.util.getEVSession() !== null ){
				$subs = loggedInSubs(results.segments);

				if( $.inArray('digital-subscriber', results.segments) >= 0  ){
					var $ads_to_hide = ['.article-mpu-1', '.article-mpu-2', '.article-mpu-3', '.article-mpu-5', '.article-mpu-51', '.article-mpu-52', '.secondary-content-box.desktop-banner.mpu', '.dianomi-ad', '.bottom-leaderboard-section'];
					hide_ads($ads_to_hide);
				}else{
					inject_dynamic_ads();
				}
			}else{
				inject_dynamic_ads();
			}
		}

		function meterCallback( response ){
			console.log('metering');
			TNS_Data.meter = response;

			incognito_detection(); //private mode user logic

			 if (response.result == "ALLOW_ACCESS") {
		          //user has not reached the limit yet
		          // console.log('remove paywall and display content');
		          hide();
		          allow_callback( response );
		      } else if (response.requireEntitlement) {
		          // displayRequireLoginWithEntitlementPaywall();
		          displayRequireLoginPaywall( response, response.result );
		            // displayRequireLoginPaywall( response );
		      } else {
		          if (response.result == "REQUIRE_LOGIN") {
		              displayRequireLoginPaywall( response, response.result );
		          } else {
		          	// console.log('require entitlement from metercallback');
		              displayRequireLoginPaywall( response, response.result );
		            // displayRequireLoginPaywall( response );
		          }
		      }

			// console.log('starts: ');
			// check_authentication();
			// console.log('ends---');
			return TNS_Data.meter;
		}

		return {
			init: init,
			hide: hide,
			show: show,
			public_render: public_render,
			meterCallback: meterCallback,
			evProfileload: evProfileload
		};
	}();


	// integrates evolok events and TNS modals/events
	var TNS_Events = function($){
		var $ = jQuery; //fixes $ issue
		var $body = $('body'), paywall = false, orderProcessed = false;

		function init(){
			EV.Event.on("login.success", onSuccess);
			EV.Event.on("social-login.success", onSuccess);
			EV.Event.on("login.failed", onFailedHandler);
			EV.Event.on("registration.success", registrationSuccess);
			EV.Event.on("social-register.success", registrationSuccess);
			EV.Event.on("registration.failed", registraionFailed);
			EV.Event.on("event_to_listen", onEvReady);
			EV.Event.on("logout.action", onLogOut);
			EV.Event.on(EV.Event.SOCIAL_LOGIN_FAILED, onSocialRegisterFailed);
			EV.Event.on(EV.Event.SOCIAL_REGISTER_FAILED, onSocialRegisterFailed);
			EV.Event.on("reset-password.success", onResetSuccess);
			EV.Event.on("login_loaded", onLoginLoaded);

			function onLoginLoaded(){
				$('ev-login button[type="submit"]').removeAttr('disabled');
			}

			EV.Event.publish( EV.Event.PM_PAYMENT_TYPE_ENFORCE, null );

			// for subspage
			EV.Event.on(EV.Event.PM_PRODUCTS_LOADED, function(e){
				// console.log('product selection loaded2'); 
				// console.log(e);

				setTimeout(function () {
					if ($('.subspage ev-product-selection div[ng-if="orderTypeOption"]').length > 0){
						$('.subspage ev-product-selection div[ng-if="orderTypeOption"]').appendTo('.subspage ev-product-selection .product-footer').css('display', 'flex');					
					}
				    $('.subspage ev-product-selection .product-features').appendTo('.subspage ev-product-selection .product-header');
				    if( $('.svg-snowscene').length > 0 ){
				    	$('.svg-snowscene')
				    		.prependTo('.subspage ev-product-selection .product-image')
				    		.css({'top' : 'inherit', 'width' : '40%'});
				    }
				    
				}, 100);
				
				
			}); 

			function paymentCurrency( prodName, planName, prodCurrency ){
				// console.log(prodName, planName, prodCurrency);

				if( prodName == "Digital_only" || prodName == "student_digital_" ){
					if( planName == "12for12_digital" || planName == "12for12_digital_student" || planName == "12for12_digital_new"){
						EV.Widgets.Display.country = {
		                  type: "dropdown",
		                  values: [
		                          { caption: "Select Country"},
		                          { caption: "United Kingdom", value: "United Kingdom" }
		                  ]

		                };
		                
					}else{
						EV.Widgets.Display.country = {
							type: "dropdown",
							values: countriesList()
						};
					}
					
				}else if( planName == "print_only_yearly_christmas" || planName == "printdigital_yearly_christmas" ){
					EV.Widgets.Display.country = {
		                  type: "dropdown",
		                  values: [
		                          { caption: "Select Country"},
		                          { caption: "United Kingdom", value: "United Kingdom" }
		                  ]

		                };

				}else if( planName == "printonly_yearly_world" || planName == "print_digital_yearly_world" || planName == "digital_yearly_world" || planName == "print_yearly_WORLD_RENEW" || planName == "printdigital_yearly_WORLD_RENEW" || planName == "print_only_yearly_USA" || planName == "print_digital_yearly_USA" ){
					EV.Widgets.Display.country = {
	                  type: "dropdown",
	                  values: RoWCountriesList()
	                };

				}else if( prodCurrency == "GBP" ){
					EV.Widgets.Display.country = {
	                  type: "dropdown",
	                  values: [
	                          { caption: "Select Country"},
	                          { caption: "United Kingdom", value: "United Kingdom" }
	                  ]

	                };
					
				}else if( prodCurrency == "USD" ){
					EV.Widgets.Display.country = {
	                  type: "dropdown",
	                  values: [
	                          { caption: "Select Country"},
	                          { caption: "United States", value: "United States" },
	                          { caption: "Canada", value: "Canada" }
	                  ]

	                };

				}else if( prodCurrency == "EUR" ){
					EV.Widgets.Display.country = {
	                  type: "dropdown",
	                  values: EuroCountriesList()

	                };

				}else{
					EV.Widgets.Display.country = {
						type: "dropdown",
						values: countriesList()
					};
				}

				EV.Widgets.Display.country2 = EV.Widgets.Display.country;
				EV.Widgets.Display.address1_country = EV.Widgets.Display.address2_country = EV.Widgets.Display.address3_country = EV.Widgets.Display.address4_country = EV.Widgets.Display.address5_country = EV.Widgets.Display.country;
				EV.Widgets.Display.address6_country = EV.Widgets.Display.address7_country = EV.Widgets.Display.address8_country = EV.Widgets.Display.address9_country = EV.Widgets.Display.address10_country = EV.Widgets.Display.country;

				TNS_Data.countries = EV.Widgets.Display.country;
			}

			function paymentTypeSelect( prodName ){
				// var adult_dd = [
				// 				"12for12_printonly_36", "printonly_6month_60", "printonlyplan_120", 
				// 				"12for12_36", "digital_plan_120_gbp", "6_month_digital_60_plan",
				// 				"12for12_bundle_44", "1year_bundle_144", "6month_bundle_72"
				// 				];

				// var student_dd = [
				// 				"Print_only_student_12for12", "print_only_student_6month", "print only student plan £90 - direct debit",
				// 				"student_digital_plan", "student_digital_plan_90_gpb", "student_digital_6month_45",
				// 				"1year_student_bundle_108", "6month_bundle_student_54", "12for12bundle_student_33"
				// 				];

				// new DD
				var adult_dd = ["print_12for12_quarterly", "print_digital_12for12_", "12for12_digital", "print_12for12_quarterly_new", "12for12_digital_new", "print_digital_12for12_new", "insert_print_only_12for12"];
				var student_dd = ["12for12_print_only_student", "print_digital_student_12for12", "12for12_digital_student"];


				var product_names_for_dd = adult_dd.concat(student_dd);
				// checks dd plans from CMS
				try{
					if( Array.isArray(TNS_Data.ddPlans) || TNS_Data.ddPlans.length != 0 ){
						product_names_for_dd = product_names_for_dd.concat(TNS_Data.ddPlans);
					}
				}catch(err){
					console.log('DD plan error');
				}				

				if( $.inArray( prodName, product_names_for_dd) !== -1 ){
					// console.log('plan name: ' + prodName);
					$('ev-stripe').css('display', 'none');
					$('ev-request-directdebit-mandate').css('display', 'block');
					EV.Event.publish( EV.Event.PM_PAYMENT_TYPE_ENFORCE, EV.Event.PM_PAYMENT_TYPE.DIRECT_DEBIT );
					TNS_Data.paymentType = EV.Event.PM_PAYMENT_TYPE.DIRECT_DEBIT;
				}else{
					// console.log('plan name: ' + prodName);
					$('ev-stripe').css('display', 'block');
					$('ev-request-directdebit-mandate').css('display', 'none');
					EV.Event.publish( EV.Event.PM_PAYMENT_TYPE_ENFORCE, EV.Event.PM_PAYMENT_TYPE.CARD );
					TNS_Data.paymentType = EV.Event.PM_PAYMENT_TYPE.CARD;
				}

				// console.log('paymentType logic triggered!!');
			}



			$('ev-product-profile').on("click focus", '.personal-details input', function() {
				productProfileNonEditable();
			});

			function productProfileNonEditable(){
				if(EV.util.getEVSession() !== null){
					$('ev-product-profile .personal-details input').prop('readonly', true);
				}
			}

			EV.Event.on(EV.Event.PM_PAYMENT_SUCCESS, function () {
			   // window.location.href = "/my-account?order=success";
			});


			// EV.Event.on("pm.paymentSuccess", onPaymentSuccess);

			//EV.Event.on(EV.Event.PM_REDIRECT_PRODUCT_PROFILE, function () {
			    // redirect("profile") //page with the ev-product-profile widget
			   // console.log( "triggered" );
			    // window.location = "/product-profile";
			   // var url = window.location.href;
			   // console.log( url );
			    // window.location = url + "&productProfile=true";
			    // if ( !getUrlParameter('productProfile') ){
			    	// redirectPage( url + "&productProfile=true" );
			    // }else{
			    	// redirectPage( url );
			    // }
				//redirectPage( url );
			//});

			//EV.Event.on(EV.Event.PM_REDIRECT_ORDER_SUMMARY, function () {
			//	var url = window.location.href;
				// needs to process order
			  //  EV.Event.publish(EV.Event.PM_PROCESS_ORDER);
			//});


			//EV.Event.on(EV.Event.PM_CREATE_ORDER_SUCCESS, function () {
				//var url = window.location.href;

			     //window.location = "/product-summary-payment";

			    //redirectPage( url + "&productSummary=true" );
				//redirectPage( url );
			//});

			//EV.Event.on(EV.Event.PM_REDIRECT_TO_PAYMENT, function () {
				// EV.Event.publish(EV.Event.PM_PROCESS_ORDER);
				//var url = window.location.href;

			    //redirectPage( url );
			//})

			
/*
			EV.Event.on(EV.Event.LOGIN_SUCCESS, function () {
			    // redirect("profile");
			    console.log('profile now!');
				//window.location.href = "/";

				$('.sublogin').hide();
				$('.pp_summary').show();	

				var url = window.location.href;

			    redirectPage( url );
			})
*/
			// Ev.Event.on("registration.failed", function(){
			// 	console.log("Registration is Failed");
			// });

			function addTopValidationSubsPage($elem, $elem_header, $msg){
				if( $($elem + ' .top-validation').length == 0 ){
		    		$($elem).prepend('<div class="ev top-validation"><p class="alert alert-danger center">' + $msg + '</p></div>');
		    	}
		    	$( "#accordion").trigger( "editSection:error", $elem_header );
			}

			function removeTopValidationSubsPage(){
				if( $('.top-validation').length > 0 ){
		    		$('.top-validation').remove();
		    	}
			}

			EV.Event.on(EV.Event.PM_ERROR, function(event) {
			    console.error("PM Error:", event);
			    if(event.code == "NO_PRODUCT_SELECTED"){
			    	addTopValidationSubsPage('#accordion .step-1-2', '#accordion .step-1-1' , 'Please choose a plan');
			    	console.log('Please select a plan');
			    }
			});

			/*EV.Event.on('registration.failed', function (res) {
			   console.log("Registration Failed = ", res);
			   alert("This account is already registerd");
			});*/
			/*EV.Translate.addTranslationTable("en", {
				"ev.widgets.errors.reset_validation_failed": "Please enter minimum 2 characters in First name and Last name",
				"ev.widgets.errors.attribute_validation_failed": "Please enter minimum 2 characters in First name and Last name" ,
			    "ev.widgets.errors.reset_user_profile_not_found": "Please enter minimum 2 characters in First name and Last name" 
			});*/

			$('ev-registration button[type="submit"]').live('click', function(){ 
					var $that = $(this).closest("ev-registration");
					var $email = $that.find("input[type|='email']");

					var $pass = $that.find("input[name|='password']");
					var $confirm_pass = $that.find("input[name|='confirm_password']");

					var $first_name = $that.find("input[name|='first_name']");
					var $last_name = $that.find("input[name|='last_name']");
					
					if(!$email.val() ){	
						if ($email.parent().next(".rvalidation").length == 0){
				            $email.parent().after("<div class='rvalidation col-sm-12'>Please enter valid email address</div>");			        				      
				      	}
				    }else{

				        $email.parent().next(".rvalidation").remove(); // remove it

						var ema = $email.val();
						var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

						if (filter.test(ema)) {
							console.log('ifchecked');
							$email.parent().next(".rvalidation").remove(); // remove it
						}else{

							if ($email.parent().next(".rvalidation").length == 0){
					            console.log('else checked');
					            	$email.parent().after("<div class='rvalidation col-sm-12'>Please enter valid email address</div>");	
				      		}
						}
				        
					}


					if(!$pass.val()){
						if ($pass.parent().next(".rvalidation").length == 0){
				        	$pass.parent().after("<div class='rvalidation col-sm-12'>Please enter password</div>");
				    	}
				        				      
				    } else{
				        $pass.parent().next(".rvalidation").remove(); // remove it
					}
					
					if(!$confirm_pass.val()){
						 if ($confirm_pass.parent().next(".rvalidation").length == 0) // only add if not added
				        {
				            $confirm_pass.parent().after("<div class='rvalidation col-sm-12'>Please enter confirm password</div>");
				        }				      
				    } else if($confirm_pass.val() != $pass.val()) {

				    	  if ($confirm_pass.val() !== 0) // only add if not added
				        {
				        	$confirm_pass.parent().next(".rvalidation").remove();
				        	console.log('Password is not matching');
				            $confirm_pass.parent().after("<div class='rvalidation col-sm-12'>Your password and confirmation password does not match</div>");
				        }				    	
					}else {
				        $confirm_pass.parent().next(".rvalidation").remove(); // remove it
				        console.log('removed');

					}


					if(!$first_name.val()){
						 if ($first_name.parent().next(".rvalidation").length == 0) // only add if not added
				        {
				            $first_name.parent().after("<div class='rvalidation col-sm-12'>Please enter valid first name</div>");
				        }				      
				    } else if($first_name.val().length < 2){
				    		if ($first_name.parent().next(".rvalidation").length == 0) // only add if not added
				        	{
				            	$first_name.parent().after("<div class='rvalidation col-sm-12'>Please enter minimum 2 characters in first name</div>");
				        	}
				    }else {
				        $first_name.parent().next(".rvalidation").remove(); // remove it
					}
					if(!$last_name.val()){
						 if ($last_name.parent().next(".rvalidation").length == 0) // only add if not added
				        {
				            $last_name.parent().after("<div class='rvalidation col-sm-12'>Please enter valid last name</div>");
				        }				      
				    } else if($last_name.val().length < 2){
				    		if ($last_name.parent().next(".rvalidation").length == 0) // only add if not added
				        	{
				            	$last_name.parent().after("<div class='rvalidation col-sm-12'>Please enter minimum 2 characters in last name</div>");
				        	}
				    }else {
				        $last_name.parent().next(".rvalidation").remove(); // remove it
					} 
			 });


			// $('ev-registration button[type="submit"]').live('click', function(){ 
			// 	console.log('clicked');
			// });

			function subsValidationHandler(elems){
				var error = false; // check if form is submitable
				var reg = /^.{1,255}$/;

				$.each( elems, function( elem, msg ) {
					
					if( $(elem).val() === undefined ){

					}else if ( !$(elem).val() || (reg.test($(elem).val()) === false && $(elem).val() !== undefined) ) {
					    if ($(elem).parent().next(".validation").length == 0) // only add if not added
					    {
					        $(elem).parent().after("<div class='validation col-sm-9'>" + msg + "</div>");
					    }				      
					    error = true;
					}else {
					    $(elem).parent().next(".validation").remove(); // remove it
					}

				});
				return error;
			}

			function subsPageValidation(event){
				var error1 = false, error2 = false;

				var $required_addresses = {
							// '#auth-register-email_address': 'Please enter valid email address',
							// '#auth-register-password': 'Please enter password',
							'#personal-details-first_name': 'Please enter valid first name',
							'#personal-details-last_name': 'Please enter valid last name',
							'#billing-address-street': 'Please enter street name',
							'#billing-address-city': 'Please enter city name',
							'#billing-address-postcode': 'Please enter postcode',
							'#billing-address-street2': 'Please enter street name',
							'#billing-address-city2': 'Please enter city name',
							'#billing-address-postcode2': 'Please enter postcode',

							'#billing-address-country': 'Please select country',
							'#billing-address-country2': 'Please select country',
				};

				var $delivery_addresses = {
							'#delivery-address-street2': 'Please enter street name',
							'#delivery-address-city2': 'Please enter city name',
							'#delivery-address-postcode2': 'Please enter postcode',
							'#delivery-address-street': 'Please enter street name',
							'#delivery-address-city': 'Please enter city name',
							'#delivery-address-postcode': 'Please enter postcode',

							'#delivery-address-country': 'Please select country',
							'#delivery-address-country2': 'Please select country',

							'.delivery-address .select-address select.form-control': 'Please enter valid billing address and click submit',
				};

				for( var i = 1; i <= 10; i++){
						$required_addresses['#billing-address-address' + i + '_first_name'] =  'Please enter valid first name';
						$required_addresses['#billing-address-address' + i + '_last_name'] =  'Please enter valid last name';
						$required_addresses['#billing-address-address' + i + '_1'] =  'Please enter address line 1';
						$required_addresses['#billing-address-address' + i + '_city'] =  'Please enter city name';
						$required_addresses['#billing-address-address' + i + '_postcode'] =  'Please enter postcode';
						
						$delivery_addresses['#delivery-address-address' + i + '_first_name'] =  'Please enter valid first name';
						$delivery_addresses['#delivery-address-address' + i + '_last_name'] =  'Please enter valid last name';
						$delivery_addresses['#delivery-address-address' + i + '_1'] =  'Please enter address line 1';
						$delivery_addresses['#delivery-address-address' + i + '_city'] =  'Please enter city name';
						$delivery_addresses['#delivery-address-address' + i + '_postcode'] =  'Please enter postcode';

						$required_addresses['#billing-address-address' + i + '_country'] =  'Please select country';
						$delivery_addresses['#delivery-address-address' + i + '_country'] =  'Please select country';

				}
				event.stopPropagation();

				error1 = subsValidationHandler($required_addresses);

				// if different address for delivery
				if( !$('.delivery-address.profile-section input[type=checkbox]').hasClass('ng-not-empty') ){ 
					error2 = subsValidationHandler($delivery_addresses);
				}	

				if(error1 === true || error2 === true){
					event.preventDefault();
				}else{
					return true;
				}

				if (!$('#auth-register-confirm_password').val()) {
			       		$("#auth-register-confirm_password").parent().next(".validation").remove();
			            $("#auth-register-confirm_password").parent().after("<div class='validation col-sm-9'>Please enter confirm password</div>");
			      
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
			}

			$('#accordion').on('click', 'button.product-profile-submit-btn', subsPageValidation ); //validation subs page

			$('ev-product-profile button').live('click', function(){
				console.log("please wait!!");
				// $('ev-product-profile').append("<div class='loading'>Loading</div>");
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

			EV.Event.on(EV.Event.SESSION_REFRESH, function () {				
				
				if( EV.util.getEVSession() !== null ){
					console.log('Session is refereshed');
					//EV.Event.publish(EV.Event.PM_REDIRECT_PRODUCT_PROFILE);
				}				
			});



			EV.Event.on(EV.Event.PM_REDIRECT_TO_LOGIN, function () {
				var url = window.location.href;
			    console.log('login now!');

			    $('.pp_summary').hide();
			    $('.sublogin').show();
			    // window.location = "/product-summary-payment";

			    //redirectPage( url + "&productProfile=true" );
				 //window.location = "/product-profile";
				 //window.history.back();
				
			    // window.location = "/login";

			});

			EV.Event.on(EV.Event.PM_PRODUCTS_SELECTED, function (product) {
				console.log('Product selected');
				// console.log(product);

				paymentTypeSelect( product[0].paymentPlan.name ); // selects payment type

				// paymentCurrency( product[0].name, product[0].paymentPlan.name, product[0].paymentPlan.currency.id ); // handles country lists

				// EV.Event.publish( EV.Event.PM_PAYMENT_TYPE_ENFORCE );

		    	$("#accordion").accordion('option', 'active', 1);
		    	removeTopValidationSubsPage();

		    	orderProcessed = false; // resets order
		    	subsPageEditSection('#accordion .step-1-1'); //adds edit button
			});

			EV.Event.on(EV.Event.PM_REDIRECT_ORDER_SUMMARY, function () {
				// $('ev-product-profile ~ span.order-process-loading').css('display', 'block');
				if( orderProcessed == false) {
					$('ev-product-profile ~ .loading').css('display', 'block');
					$('.subspage .edit-section').hide();
					EV.Event.publish(EV.Event.PM_PROCESS_ORDER);
					$('ev-product-profile .product-profile-submit-btn').css('display', 'none');
					
				}
			});

			//Edit profile succes

			EV.Event.on(EV.Event.EDIT_PROFILE_COMPLETE_SUCCESS, function(){
				orderProcessed = false; // resets order
				console.log('Edit profile Success');
				
			});

			EV.Event.on(EV.Event.PM_CREATE_ORDER_SUCCESS, function(){
			        
			    $("#accordion").accordion('option', 'active', 3);
				//console.log('order success');
				orderProcessed = true;
				$('ev-product-profile .product-profile-submit-btn').css('display', 'block');
				$('ev-product-profile ~ .loading').css('display', 'none');
				$('.subspage .edit-section').show();
				subsPageEditSection('#accordion .step-3-1');
			});

			
			// User redirect after payment sucess 
			
			EV.Event.on(EV.Event.PM_PAYMENT_SUCCESS, function () {
				var url = window.location.href, referer = getCookie('subsRefererPage');	
				if( referer ){
					document.cookie = 'subsRefererPage' + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
					window.location.href = referer;	

				}else{
			    	window.location.href = "/";		
				}			    

			});

			$('#accordion').on("click", '.profilepage', function(e) {

				if( EV.util.getEVSession() !== null ){

				    EV.Event.publish(EV.Event.PM_REDIRECT_PRODUCT_PROFILE);
				    $("#accordion").accordion('option', 'active', 2);
				    removeTopValidationSubsPage();
				    subsPageEditSection('#accordion .step-2-1');
				}else{
					console.log('Please login to proceed');
					addTopValidationSubsPage('#accordion .step-2-2', '#accordion .step-2-1', 'Please login or register to proceed');
				}
			    
			});

			// restricts payment steps
			$('#accordion').on("click", '.edit-section', function(e) {
				$(this).closest('h3').nextAll().children('.edit-section').remove();
			});

			$('.paymentepage').live("click", function(e){
				
			        
			    $("#ui-id-5").removeClass('ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-active ui-state-active').addClass('ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-collapsed ui-corner-all');

			    $("#ui-id-6").removeClass('ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content ui-accordion-content-active').addClass('ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content').hide();

			    $("#ui-id-7").removeClass('ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-collapsed ui-corner-all').addClass('ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-active ui-state-active');

			    $("#ui-id-8").removeClass('ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content').addClass('ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content ui-accordion-content-active').show();
			});
			
			TNS_Modal.init();

			// EV.Event.on("ev.notifier.opened", function(){ TNS_Modal.show('.tns-modal--paywallNotifier', 'paywallNotifier' ); } );
			EV.Event.on("ev.notifier.opened", function(){ 
				console.log('notifier on!'); 
				if( window.isIncognito != true || EV.util.getEVSession() ){
					TNS_Modal.show('.tns-modal--paywallNotifier', 'paywallNotifier' ); 
				}
			} );

			// sets up metering function on ready
			TNS_Data.auth.handleMeteringSuccess = function( response ){

				// console.log('resp:');
				// console.log(response);
    			TNS_Modal.meterCallback( response );

			};


			TNS_Data.auth.handleMeteringError = function( response ){
				console.log("oops, the meter broke!");
			};

			TNS_Data.auth.init = function( params_obj ){
				var params = "";

				if( EV.util.getEVSession() ){
					params = JSON.stringify(params_obj);
                  	return EV.Em.authorize(params, TNS_Data.auth.handleMeteringSuccess, TNS_Data.auth.handleMeteringError);
				}

				EV.Dab.detectPrivateMode().then(function(result) {
                  window.isIncognito = result;
                  params_obj.incognito_notifier = result;
                  
                  params = JSON.stringify(params_obj);

                  EV.Em.authorize(params, TNS_Data.auth.handleMeteringSuccess, TNS_Data.auth.handleMeteringError);
                }).catch(function(error){
                  console.log("incognito failed ", error);

                  params = JSON.stringify(params_obj);
                  EV.Em.authorize(params, TNS_Data.auth.handleMeteringSuccess, TNS_Data.auth.handleMeteringError);
                });
			}

			
			/**** according section title (h3) event logic ****/

			function subsPageEditSection($elem){
				if ($($elem + ' .edit-section').length == 0 ){
					$( $elem ).append('<button class="edit-section" style="float: right; font-size: 1em;"> edit </button>');
				}
			}

			// error on edit section subs page
			$( "#accordion" ).on( "editSection:error", function( event, $elem ) {
			  // on error editing form data in each section
				var $currentActive = parseInt( $( $elem ).attr('tns-data') );
				if( $currentActive >= 0 && $currentActive <= 3 ){
					$( "#accordion .edit-section" ).each(function( index ) {
					  // console.log( index + ": " + $( this ).text() );
					  $cActive = parseInt($( this ).parent().attr('tns-data'));
					  if( $cActive !== $currentActive && $cActive  > $currentActive  ){
					  	$(this).remove();
					  }
					});
				}
			});

			$('#accordion').on('click', '.edit-section', function(){
				$("#accordion").accordion('option', 'active', parseInt($( this ).parent().attr('tns-data')) ); 
			});

/*
			$("#accordion .step-2-1").on('click', function(){
				$('#accordion ev-product-selection .product-footer button').trigger('click');
			}); 

			$("#accordion .step-3-1").on('click', function(){
				$('#accordion button.profilepage').trigger('click');
			}); 

			$("#accordion .step-4-1").on('click', function(){
				$('#accordion ev-product-profile button[type="submit"]').trigger('click');
			}); 
*/

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

		function getCookie(cname) {
		      var name = cname + "=";
		      var decodedCookie = decodeURIComponent(document.cookie);
		      var ca = decodedCookie.split(';');
		      for(var i = 0; i <ca.length; i++) {
		          var c = ca[i];
		          while (c.charAt(0) == ' ') {
		              c = c.substring(1);
		          }
		          if (c.indexOf(name) == 0) {
		              return c.substring(name.length, c.length);
		          }
		      }
		      return "";
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

			TNS_Modal.evProfileload();

			EV.Event.publish(EV.Event.PM_REDIRECT_PRODUCT_PROFILE);

			var returnUrl, orderPageLogin, checkIfSubsPage;

			if( $body.hasClass('ev-is-anon') ){
				$body.removeClass('ev-is-anon');
			}			

			$body.addClass('ev-is-loggedin');
			//console.log(EV.util.Storage.session.get("evolok:ev_profile"));

			// refreshMeterContent();
			//console.log('Login Success!');
			// console.log(res);
			// $('ev-login').attr("on-forgot-password", test1);
			// trigger_TNS_ready_event();
			// TNS_Modal.public_render();


			/*** handles login redirect on amp page **/
			returnUrl = getUrlParameter('return');
			// window.location.reload();
			// console.log(returnUrl);
			// console.log(orderPageLogin);

			if(returnUrl){
				redirectPage(returnUrl);
				console.log('inside returnUrl');
			}

			/*** handles redirect on order page **/
			/*
			if( getUrlParameter('loginRequired') ){
				orderPageLogin = removeUrlParameter('loginRequired');
			}
			if( orderPageLogin !== undefined ){
				// redirectPage(orderPageLogin);
				redirectPage( orderPageLogin + "&productProfile=true" );
				console.log('inside orderPageLogin');

			}
			*/
			// checkIfSubsPage = getUrlParameter('id') && getUrlParameter('productName') && getUrlParameter('productProfile');
			else if( getUrlParameter('id') && getUrlParameter('productName') ){			
/*
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
*/	
				

				console.log("its sub page!");
				console.log(TNS_Data.paymentType);
				if(TNS_Data.paymentType !== undefined){
					console.log('trigger payment type change');
					if( $('button.profilepage').length ){
						$('button.profilepage').trigger('click'); // next section
					}
					// EV.Event.publish( EV.Event.PM_PAYMENT_TYPE_ENFORCE, null );
					EV.Event.publish( EV.Event.PM_PAYMENT_TYPE_ENFORCE, TNS_Data.paymentType ); // selects correct payment type
				}				
				
			}else if( getUrlParameter('register') ){
				window.location.href = "/my-account";
			}else{
				window.location.reload();
			}

			TNS_Modal.hide();
		}

		EV.Event.on( EV.Event.PM_PAYMENT_TYPE_ENFORCE, function(data){
			console.log('enforce triggered: ' + data);
		} );

		function onResetSuccess(){
			alert("Reset Password is Successful");
			var rdrul = window.location.origin;
			//console.log('Reset Password is sucess');
			//redirectPage('/my-account');
			redirectPage('/');
			//window.location.origin;

		}

		function onFailedHandler(res){
			console.log('Login Failed!');
			console.log(res);
		}

		function registrationSuccess(res){
			var returnUrl = getUrlParameter('return');

			// handles logout in amp page
			if(returnUrl){
				// console.log('inside returnUrl amp');
				// console.log(returnUrl);
				EV.Event.publish(EV.Event.LOGIN_SUCCESS);
				// redirectPage(returnUrl);
			}else if( getUrlParameter('id') && getUrlParameter('productName') ){
				EV.Event.publish(EV.Event.LOGIN_SUCCESS);
			}else if( getUrlParameter('register') ){
				EV.Event.publish(EV.Event.LOGIN_SUCCESS);
			}
			 //EV.Event.publish(EV.Event.SESSION_REFRESH);

			TNS_Modal.hide();
			console.log('registraion Success');
		}

		function registraionFailed(res){
			console.log("Your are Already Registerd with this credentials");
		}
		
		function onEvReady(){
			// alert('Ready!!');
			$('ev-profile .tns-checking-profile').removeClass('tns-checking-profile');
			if( EV.util.getEVSession() ){
				$body.addClass('ev-is-active ev-is-loggedin');
			}else{
				$body.addClass('ev-is-active ev-is-anon');
			}


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
			// console.log('new: ' + returnUrl);
			// handles logout in amp page
			if(returnUrl){
				// console.log('inside returnUrl amp');
				// console.log(returnUrl);
				// console.log('logout success if');
				redirectPage(returnUrl);
			} 

			else if( getUrlParameter('id') && getUrlParameter('productName') ){
				
				// removeTopValidationSubsPage();

				window.location.reload(); //remove this when the issue is fixed
				if( TNS_Data.paymentType ){
					$( "#accordion").trigger( "editSection:error", '#accordion .step-1-1' );
					$("#accordion").accordion('option', 'active', 1);
					
				}else{
					$( "#accordion").trigger( "editSection:error", '#accordion .step-1-1' );
					$("#accordion").accordion('option', 'active', 0);
				}
				// console.log('logout success');
			}else{
				// console.log('logout success else');
				// window.location.href = '/';
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
				// console.log( response );
				result = response.result; dfd.resolve({"articleId" : articleId, "result": result});
			}, function(response){ dfd.reject({articleId: "rejected"}) } );
			return dfd;
		}
		$('#product-print_digital_bundle button').click(function(){ console.log('btn clicked'); });
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

	window.addEventListener("load", function() { 
		if( document.getElementById("auth-register-email_address") != null && document.getElementById("auth-register-password") != null && document.getElementById("auth-register-confirm_password") != null ){
			document.getElementById("auth-register-email_address").placeholder = "Email Address";
			document.getElementById("auth-register-password").placeholder = "Password";
			document.getElementById("auth-register-confirm_password").placeholder = "Confirm password"; 					
		}		
	});
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
