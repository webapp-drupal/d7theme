<script type="text/javascript">

  // if( !getCookie('subsRefererPage') ){
    // document.cookie = "subsRefererPage=" + document.referrer + "; path=/";
  // }


  // function getCookie(key) {
      // var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
      // return keyValue ? keyValue[2] : null;
  // }
</script>

<script src="https://use.fontawesome.com/66378f49bf.js"></script>

  <style>
      body{


      }
  .subscription-option {
      border: solid 1px #ccc;
      margin-top: 3em;
      text-align: center;
      padding: 3em 0;
      min-height: 84em;
      transition: all 0.4s ease-in-out;
      position: relative;
      background: white;
  }

  .subscription-header p.christmas_offer{
    font-size: 2em;
    font-weight: 100;
  }

  .svg-snowscene {
    position: absolute;
    top: 389px;
      left: 0;
      width: 100%;
      z-index: 2;
    height: 400px;
  }

  .snow {
  fill: #fff;
  animation-name: snowing;
  animation-duration: 3s;
  animation-iteration-count: infinite;
  animation-timing-function: ease-out;
  }
  .snow:nth-child(2n) {
  animation-delay: 1.5s;
  }
  .snow:nth-child(3n) {
  animation-delay: 2.3s;
  animation-duration: 3.3s;
  }
  .snow:nth-child(4n) {
  animation-delay: 0.8s;
  animation-duration: 3.2s;
  }
  .snow:nth-child(5n) {
  animation-delay: 2.8s;
  }

  @keyframes snowing {
    0% {
    fill-opacity: 1;
    }
    100% {
    fill-opacity: 0;
    transform: translateY(400px);
    }
  }

  .student-cta{
    margin: 0 0 0em 0 !important;
  }

  .student-cta p{
    font-size: 2em !important;
  }

  .subscription-options {
      /*margin-top: 15em;*/
      margin-bottom: 3em;
  }

  @media (max-width: 730px){
    #container-christmas:before{
      content: none !important;
    }

    .student-cta p{
      font-size: 1.5em !important;
    }


    .svg-snowscene {
    top: 0px;
    z-index: 0;
}

    .checkout-header .tns-evo-profile {
      float: none;
      margin-top: 0.65em;
      margin-right: 0em;
  }

    .site-header .tns-evo-profile .tns-login,
    .site-header .tns-evo-profile .tns-register {
        /*width: 50%;*/
        display: inline-block;
        text-align: center;
    }

    .subscription-options {
        margin-top: 0em;
        margin-bottom: 3em;
    }
  }



  </style>
   <?php

   $node = $vars['node'];
    $node_id = $node->nid;
    $ev_page_name = drupal_get_path_alias('node/' . $node_id);
	//echo  $ev_page_name;
	//exit;
   ?>
<div id="container-christmas">
<?php if( isset($_GET['id']) && isset( $_GET['productName']) && isset( $_GET['productProfile'] ) ):  ?>
<?php //if( isset($_GET['product-profile'] ) ):  ?>
  <!-- <ev-login auth-scheme-name="default" forgot-password-service="edit_password" show-social="true" social-style="icons" social-networks="['facebook', 'google']" remember-me="true" title="Login" show-labels="false" show-header="false" show-container="false"  auto-populate="true" submitbtn-caption="Log In" override-translation-key="ev.login"></ev-login> -->

  <div id="ev-login-subs-page" style="display:none;">
    <div class="already-registered">
      <p>Already Registered? Log in...</p>
      <p>If you've already registered, log in below. If not, please <a href="#or">enter your details</a>.</p>
    </div>
    <?php echo @module_invoke('paywall', 'ev_get_modal', 'ev-login'); ?>
  </div>

  <div class="or-register">
      <!-- .ev-login-subs-page -->
      <div class="or" id="or">
        <p>Not registered? Register your details...</p>
      </div>

      <script type="text/javascript">
        (function() {
          console.log('check auth');
          if( EV.util.getEVSession() === null ){
            document.getElementById("ev-login-subs-page").style.display="block";
          }
        })();
      </script>

      <div class="row">
        <div class="large-7 columns pp_summary" id="ev-product-profile-form">
           <!-- <ev-product-profile></ev-product-profile>--->

        </div>
        <div class="large-5 columns">
          <div class="secure-box">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/secure.png">
          </div>
        </div>
      </div>
  </div>
  <!-- or-register -->

<?php elseif( isset($_GET['id']) && isset( $_GET['productName']) && isset( $_GET['productName']) && isset( $_GET['productTitle'] ) ): ?>

  <?php
    $sanitized_product_id = filter_var( $_GET['id'] , FILTER_SANITIZE_URL);
    $sanitized_product_name = filter_var( $_GET['productName'] , FILTER_SANITIZE_URL);
    $sanitized_product_title = htmlspecialchars( $_GET['productTitle'] );
  ?>


  <!-- Accordion -->


  <div id="accordion" class="subspage">
  <!--<h3>Plan Options</h3>-->
  <h3 class="step-1-1" tns-data="0">Plan options <i class="arrow">
							<svg width="13" height="8" xmlns="http://www.w3.org/2000/svg"><path d="M6.499 2.144l4.631 4.57.29.286.58-.572-.29-.286-4.632-4.57-.203-.2-.083-.082-.29-.286L6.498 1l-.29.286L1.29 6.142 1 6.428 1.58 7l.29-.286 4.629-4.57z" stroke="#2C2C2C" stroke-width="1.25" fill="none" fill-rule="evenodd" stroke-linecap="square"></path></svg>
						</i></h3>
  <div class="step-1-2">
    <p>

	<!--<ev-product-selection id="5DAD8A4D25C612698782B328"
                           product-name="XMAS_2019_PRINT_EMAIL"
                           title="XMAS-2019-PRINT-EMAIL"
                           show-header="false"
                           show-delivery-country="true"
                           default-country="United Kingdom"
                           show-hidden="true">
      </ev-product-selection>--->
	  <!--payment-plans="<?php //echo sanitized_product_title; ?>"--->
	  <ev-product-selection id="<?php echo $sanitized_product_id; ?>"
                           product-name="<?php echo $sanitized_product_name; ?>"
                           title="<?php echo urldecode( $sanitized_product_title ); ?>"
                           show-header="false"
						   <?php if($sanitized_product_name != 'xmas_2019_digital_general' ) echo 'show-delivery-country="true" default-country="United Kingdom"'; ?>
						   show-hidden="true">
      </ev-product-selection>


    </p>
  </div>
  <!--<h3>Profile Options</h3>-->
  <h3 class="step-2-1" tns-data="1">Registration <i class="arrow">
							<svg width="13" height="8" xmlns="http://www.w3.org/2000/svg"><path d="M6.499 2.144l4.631 4.57.29.286.58-.572-.29-.286-4.632-4.57-.203-.2-.083-.082-.29-.286L6.498 1l-.29.286L1.29 6.142 1 6.428 1.58 7l.29-.286 4.629-4.57z" stroke="#2C2C2C" stroke-width="1.25" fill="none" fill-rule="evenodd" stroke-linecap="square"></path></svg>
						</i></h3>
  <div class="step-2-2">
	    <ev-profile profile="profile">
  			<ev-profile-when state="available">
            <p>Logged In as: {{profile.email_address}} <a class="navLoggedIn" onclick="javascript:EV.Core.UI.logout();">Change</a></p>
  			</ev-profile-when>
  			<ev-profile-when state="not-loggedIn" class="subspage">
      				 <?php echo @module_invoke('paywall', 'ev_get_modal', 'ev-registration-subs'); ?>
               <div class="already-a-member">
                 <p>Already a member?</p> <button name="login" class="tns-btn tns-login" >Login here</button>
              </div>
  			</ev-profile-when>
		  </ev-profile>
    <div class="ev">
      <button type="button" class="btn btn-success profilepage">Click To Proceed</button>
    </div>

  </div>

  <h3 class="step-3-1" tns-data="2">Personal Details <i class="arrow">
							<svg width="13" height="8" xmlns="http://www.w3.org/2000/svg"><path d="M6.499 2.144l4.631 4.57.29.286.58-.572-.29-.286-4.632-4.57-.203-.2-.083-.082-.29-.286L6.498 1l-.29.286L1.29 6.142 1 6.428 1.58 7l.29-.286 4.629-4.57z" stroke="#2C2C2C" stroke-width="1.25" fill="none" fill-rule="evenodd" stroke-linecap="square"></path></svg>
						</i></h3>
  <div class="step-3-2">
    <ev-payment-type-selector id="paymentSelector" style="display: none;"></ev-payment-type-selector>
<?php echo module_invoke('paywall', 'ev_get_html', 'ev-product-profile'); ?>
	<ev-product-summary show-header="true" display-only="true" style="display: none;"></ev-product-summary>
        <div class='loading' style="display:none;">Loading</div>
				 <!-- <button type="button" class="btn btn-danger paymentepage" onclick="">Click To Proceed</button> -->
	<!--<div class="text-right">
		<ev-checkout-button></ev-checkout-button>
	</div>-->
    </p>
    <!--<ul>
      <li>List item one</li>
      <li>List item two</li>
      <li>List item three</li>
    </ul>-->
  </div>
  <h3 class="step-4-1">Payment Details <i class="arrow">
							<svg width="13" height="8" xmlns="http://www.w3.org/2000/svg"><path d="M6.499 2.144l4.631 4.57.29.286.58-.572-.29-.286-4.632-4.57-.203-.2-.083-.082-.29-.286L6.498 1l-.29.286L1.29 6.142 1 6.428 1.58 7l.29-.286 4.629-4.57z" stroke="#2C2C2C" stroke-width="1.25" fill="none" fill-rule="evenodd" stroke-linecap="square"></path></svg>
						</i></h3>
  <div class="step-4-2">
    <p>
		<ev-stripe></ev-stripe>
    <ev-request-directdebit-mandate id="requestDirectDebitMandate"></ev-request-directdebit-mandate>
    </p>

  </div>
</div>


  <!--- Accordion ----->












    </div>
   <!-- <div class="large-5 columns">
      <div class="secure-box">
        <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/secure.png">
		<?php //echo $_GET['id']; ?>
		<?php //echo $_GET['productName']; ?>
      </div>

    </div>-->
  </div>

<footer class="checkout-footer">
  <div class="row">
    <p>&copy; New Statesman 1913 - <?php echo date("Y"); ?></p>
    <div class="secure-badge">
        <div id="DigiCertClickID_QNxAUcL7" data-language="en"><div id="DigiCertClickID_QNxAUcL7Seal" style="text-decoration: none; text-align: center; display: block; vertical-align: baseline; font-size: 100%; font-style: normal; text-indent: 0px; line-height: 1; width: auto; margin: 0px auto; padding: 0px; border: 0px; background: transparent; position: relative; top: 0px; right: 0px; bottom: 0px; left: 0px; clear: both; float: none; cursor: default;"><img src="//seal.digicert.com/seals/cascade/?s=QNxAUcL7,11,m,subscribe.newstatesman.com" alt="DigiCert Seal" tabindex="0" style="text-decoration: none; text-align: center; display: block; vertical-align: baseline; font-size: 100%; font-style: normal; text-indent: 0px; line-height: 1; width: auto; margin: 0px auto; padding: 0px; border: 0px; background: transparent; position: relative; top: 0px; right: 0px; bottom: 0px; left: 0px; clear: both; float: none; cursor: pointer;"></div><span style="text-decoration: none; text-align: center; display: block; vertical-align: baseline; font-size: 100%; font-style: normal; text-indent: 0px; line-height: 1; width: auto; margin: 0px auto; padding: 0px; border: 0px; background: transparent; position: relative; top: 0px; right: 0px; bottom: 0px; left: 0px; clear: both; float: none; cursor: default; color: black;">
          <a href="https://www.digicert.com/ssl-certificate.htm" style="text-decoration: none; text-align: center; display: inline; vertical-align: baseline; font-size: 100%; font-style: normal; text-indent: 0px; line-height: 1; width: auto; margin: 0px auto; padding: 0px; border: 0px; background: transparent; position: relative; top: 0px; right: 0px; bottom: 0px; left: 0px; clear: both; float: none; cursor: pointer; color: black;">SSL Certificate</a>
        </span></div>
      </div>
    </div>
</footer>


<?php else: ?>
  <style>
       
		/*
		ul.benefits {
			margin: 0 !important;
			padding: 1em 1em 0 1em;
			font: 600 1em "Source Sans Pro";
			text-align: left;
		}*/
		ul.benefits li, .product-features ul li {
            font-size: 1.4em;
        }
        .after-text {
            position: relative;
            z-index: 1;
            margin: 0em 3em 3em 3em;
            text-align: center;
        }
        .christmas-bcg {
            width: 100vw !important;
            position: relative;
            margin-left: -50vw;
            height: 140px;
            left: 50%;
            background-image: url(https://www.newstatesman.com/sites/default/files/berries.png);
            background-position: bottom;
            background-size: contain;
			top:-43px;
        }
        @media (max-width: 739px){
            .christmas-bcg {
                height: 60px;
            }
            .after-text {
            font-size: 0.8em;
            margin: 0em 1em 0em 1em;
            }
        }
  </style>
  <header class="subscription-header">
    <h1>Merry Christmas from the <span style="font-style: italic;">New Statesman</span>!</h1>
      <!--  <div class="student-cta">
      <p>Are you a student? <a href="/<?php //echo variable_get('paywall_main_student_subscribe_page'); ?>">Click here</a> for 25% off!</a></p>
    </div>--->
    <!-- .student-cta -->
  </header>
  <section class="subscription-options" id="start">
    <div class="row christmas-bcg">
        <div class="large-12 columns">

        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <!--<div class="after-text">
                <p>If you are purchasing a gift subscription and would like it to start after Christmas please contact our Customer Service team on <a href="tel:0808-284-9422">0808 284 9422</a> or email <a href="mailto:digital.subscriptions@newstatesman.co.uk">digital.subscriptions@newstatesman.co.uk</a>.</p>
            </div>--->
        </div>
    </div>
    <div class="row">
      <div class="large-4 columns">
        <div class="subscription-option print-subscription">
          <h2>Print</h2>
           <div class="product-image mb-3">
				<img src="https://www.newstatesman.com/sites/default/files/new-statesman-print-and-digital-subscription-new04.jpg" alt="New Statesman magazines">
           </div>
		  <?php
		  // echo "<pre>";
		  // print_r($variable);
		  ?>
		  <?php //echo variable_get('paywall_xmas_2019_print_id_email'); echo "|||||||||";?>
		  <?php //echo variable_get('paywall_xmas_2019_print_name_email'); ?>

			<!-- EVOLOK UAT Product --->
			<!--<div class="cta"><a href="?id=5dad8a4d25c612698782b328&productName=xmas_2019_print_email&productTitle=<?php //echo urlencode('Xmas 2019 Print Email'); ?>">From &#163;49.99</a></div>


          <ev-product-selection id="5dad8a4d25c612698782b328"
                    product-name="xmas_2019_print_email"
                    title="Print Only"
                    show-header="false"
					show-hidden="true">
          </ev-product-selection>

		  --->
		  <!-- EVolok Production product id --->
			<div class="cta"><a href="?id=5dceb1dc673ce07e41c3a3f9&productName=xmas_2019_print_general&productTitle=<?php echo urlencode('Xmas 2019 Print'); ?>&startDate=25122019"><strong>From &#163;49.99</strong></a></div>


          <ev-product-selection id="5dceb1dc673ce07e41c3a3f9"
                    product-name="xmas_2019_print_general"
                    title="Print Only"
                    show-header="false"
					show-hidden="true">
          </ev-product-selection>

        </div> 
        <!-- .subscription-option -->
      </div>

        <div class="large-4 columns">
			<div class="subscription-option print-digital-subscription best-value">
				<h2>Print &amp; Digital</h2>
				<img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png"
					 alt="NS Instant" class="nsinstant">
				<div class="product-image mb-3">
					<img src="https://www.newstatesman.com/sites/default/files/update-online-bundled-picture.jpg"
						 alt="New Statesman magazine and app">
				</div>
				<div class="app-images">
					<img src="https://www.newstatesman.com/sites/default/files/styles/large/public/app-store.png"
						 alt="Apple Store" style="width: 8em;">
					<img src="https://www.newstatesman.com/sites/default/files/styles/large/public/google-play.png"
						 alt="Google Play" style="width: 9.85em;">
				</div>
				<!-- .app-images -->

			<!-- Evlok UAT Product id---->
			  <!--<div class="cta"><a href="?id=5daeadda25c6126987a9f8a3&productName=xmas_2019_print_digital_email&productTitle=<?php //echo urlencode('Xmas 2019 Print and Digital Email'); ?>">From &#163;77</a></div>


				<ev-product-selection id="5daeadda25c6126987a9f8a3"
						product-name="xmas_2019_print_digital_email"
						title="Print and Digital"
						show-header="false"
						show-hidden="true">
				</ev-product-selection>

				--->
				<!-- Evolok Production Product id --->

				 <div class="cta"><a href="?id=5dceb56e086fa55a80b527cc&productName=xmas_2019_print_digital_general&productTitle=<?php echo urlencode('Xmas 2019 Print and Digital Email'); ?>&startDate=25122019"><strong>From &#163;77</strong></a></div>


				<ev-product-selection id="5dceb56e086fa55a80b527cc"
						product-name="xmas_2019_print_digital_general"
						title="Print and Digital"
						show-header="false"
						show-hidden="true">
				</ev-product-selection>


			</div>
            <!-- .subscription-option -->
        </div>

        <div class="large-4 columns">
			<div class="subscription-option digital-subscription">
				<h2>Digital</h2>
				<img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png"
					 alt="NS Instant" class="nsinstant">
				<div class="product-image mb-3">
					<img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-digital-subscription_0.jpg"
						 alt="New Statesman magazine and app">
				</div>
				<div class="app-images">
					<img src="https://www.newstatesman.com/sites/default/files/styles/large/public/app-store.png"
						 alt="Apple Store" style="width: 8em;">
					<img src="https://www.newstatesman.com/sites/default/files/styles/large/public/google-play.png"
						 alt="Google Play" style="width: 9.85em;">
				</div>
				<!-- .app-images -->

				<!--- Evolok UAT Product ID--->
			  <!--<div class="cta"><a href="?id=5daea3df25c6126987a89ea9&productName=xmas_2019_digital_email&productTitle=<?php echo urlencode('Xmas 2019 Print Email'); ?>">From &#163;49.99</a></div>


				<ev-product-selection id="5daea3df25c6126987a89ea9"
						product-name="xmas_2019_digital_email"
						title="XMAS 2019 Digital "
						show-header="false"
						show-hidden="true">
				</ev-product-selection>
				---->

				<!--- Evolok Production product id ---->

			  <div class="cta"><a href="?id=5dceb663086fa55a80b55825&productName=xmas_2019_digital_general&productTitle=<?php echo urlencode('Xmas 2019 Print Email'); ?>&startDate=25122019"><strong>From &#163;49.99</strong></a></div>


				<ev-product-selection id="5dceb663086fa55a80b55825"
						product-name="xmas_2019_digital_general"
						title="XMAS 2019 Digital "
						show-header="false"
						show-hidden="true">
				</ev-product-selection>


			</div>
			<!-- .subscription-option -->
        </div>

    </div>
  </section>
  <section class="why-choose-digital">
    <div class="row">
      <div class="large-8 columns vcard">
          <p>For further Information please contact our Subscriptions Helpdesk on <span class="tel" style="display: inline-block;">0808 284 9422</span> OR email: <a href="mailto:digital.subscriptions@newstatesman.co.uk" clss="email">digital.subscriptions@newstatesman.co.uk</a>.</p>
          <ul class="social-logos">
            <li class="twitter"><a href="https://twitter.com/NewStatesman" target="_blank">New Statesman Twitter</a></li>
            <li class="facebook"><a href="https://www.facebook.com/NewStatesman" target="_blank">New Statesman Facebook</a></li>
          </ul>
      </div>
      <div class="large-4 columns">
        <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-app.png" alt="New Statesman app">
      </div>
    </div>
  </section>
<?php endif; ?>
</div>
