<script src="https://use.fontawesome.com/66378f49bf.js"></script>
<div id="container-christmas">
<?php if( isset($_GET['id']) && isset( $_GET['productName']) && isset( $_GET['productProfile'] ) ):  ?>
    
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
	
      <ev-product-selection id="<?php echo $sanitized_product_id; ?>" 
                           product-name="<?php echo $sanitized_product_name; ?>"
                           title="<?php echo urldecode( $sanitized_product_title ); ?>"
                           show-header="false"
                           <?php if($sanitized_product_name != 'podcast_offer_digital' ) echo 'show-delivery-country="true" default-country="United Kingdom"'; ?>
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
				
    </p>
    
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
        #container-christmas:before {
          content: '';
          position: absolute;
          /* top: 0; */
          top: 150px;
          left: 0;
          right: 0;
          height: 1120px;
          background-image: url(https://www.newstatesman.com/sites/default/files/balls_0.jpg);
          background-size: 100%;
          background-repeat: no-repeat;
          background-position: top;
        }
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
  </style>
  <header class="subscription-header">
    <h1>Exclusive offer for <span style="font-style: italic;">New Statesman</span> podcast listeners!</h1>
    <p>Please note that all subscriptions will start after 25th December 2019. If you would like your subscription to start earlier, please contact us on 0808 284 9422 or email us on <a href="mailto:subs@newstatesman.co.uk">subs@newstatesman.co.uk</a>.</p>
    
  </header>
  <section class="subscription-options" id="start">
    
    <div class="row">
      <div class="large-4 columns">
        <div class="subscription-option print-subscription">
          <h2>Print</h2>
          <div class="product-image">
            <!--<img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-print-subscription_0.jpg" alt="New Statesman magazines">-->
          </div>
		    <div class="cta"><a href="?id=<?php echo variable_get('paywall_PM_podcast_offer_print_id') ?>&productName=<?php echo variable_get('paywall_PM_podcast_offer_print_name') ?>&productTitle=<?php echo urlencode('Print Only'); ?>"><strong>From &#163;49.99</strong></a></div>
		      
         <ev-product-selection id="<?php echo variable_get('paywall_PM_podcast_offer_print_id') ?>" 
                    product-name="<?php echo variable_get('paywall_PM_podcast_offer_print_name') ?>"
                    title="Print Only"
                    show-header="false"
					show-hidden="true">
          </ev-product-selection>
           <!-- <ev-product-selection id="5dc943f925c6120404a21c5c" 
                    product-name="election2019_print"
                    title="Print Only"
                    show-header="false">
          </ev-product-selection>--->
        </div>
        <!-- .subscription-option -->
      </div>

      <div class="large-4 columns">
        <div class="subscription-option print-digital-subscription best-value">
          <h2>Print &amp; Digital</h2>
          <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png" alt="NS Instant" class="nsinstant">
          <div class="product-image">
            <!--<img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-print-and-digital-subscription.jpg" alt="New Statesman magazine and app">-->
          </div>
          <div class="app-images">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/app-store.png" alt="Apple Store">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/google-play.png" alt="Google Play">
          </div>
          <!-- .app-images -->
		  <!--<div class="cta"><a href="/ev-subscribe?id=5a817e8d25c61214ae248c12&productName=Print&Digital">Subscribe now</a></div>-->
		    <div class="cta"><a href="?id=<?php echo variable_get('paywall_PM_podcast_offer_print_digital_id') ?>&productName=<?php echo variable_get('paywall_PM_podcast_offer_print_digital_name') ?>&productTitle=<?php echo urlencode('Digital and Print'); ?>"><strong>From &#163;77</strong></a></div>
         
          <ev-product-selection id="<?php echo variable_get('paywall_PM_podcast_offer_print_digital_id'); ?>" 
                    product-name="<?php echo variable_get('paywall_PM_podcast_offer_print_digital_name'); ?>"
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
          <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png" alt="NS Instant" class="nsinstant">
          <div class="product-image">
            <!--<img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-digital-subscription_0.jpg" alt="New Statesman magazine and app">-->
          </div>
          <div class="app-images">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/app-store.png" alt="Apple Store">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/google-play.png" alt="Google Play">
          </div>
          <!-- .app-images -->
		      <div class="cta"><a href="?id=<?php echo variable_get('paywall_PM_podcast_offer_digital_id') ?>&productName=<?php echo variable_get('paywall_PM_podcast_offer_digital_name') ?>&productTitle=<?php echo urlencode('Digital_Only'); ?>"><strong>From &#163;49.99</strong></a></div>
          
          <ev-product-selection id="<?php echo variable_get('paywall_PM_podcast_offer_digital_id') ?>" 
                           product-name="<?php echo variable_get('paywall_PM_podcast_offer_digital_name') ?>"
                           title="Digital Only"
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