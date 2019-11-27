<?php if( isset($_GET['id']) && isset( $_GET['productName']) && isset( $_GET['productProfile'] ) ):  ?>
<?php //if( isset($_GET['productProfile'] ) ):  ?>
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
            <ev-product-profile></ev-product-profile>
            
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
      <!-- <ev-product-selection id="<?php echo $sanitized_product_id; ?>" 
                           product-name="<?php echo $sanitized_product_name; ?>"
                           title="<?php echo urldecode( $sanitized_product_title ); ?>"
                           show-header="false">
      </ev-product-selection> -->
      <ev-product-selection id="<?php echo $sanitized_product_id; ?>" 
                           product-name="<?php echo $sanitized_product_name; ?>"
                           title="Digital"
                           show-header="false">
      </ev-product-selection> 
    </p>
  </div>
  <!-- <ev-payment-type-selector style="display:none" id="paymentSelector"></ev-payment-type-selector> -->
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
    <!-- <ev-payment-type-selector id="paymentSelector" style="display: none;"></ev-payment-type-selector> -->
    <ev-payment-type-selector style="display:none" id="paymentSelector"></ev-payment-type-selector>
    <ev-product-summary show-header="true" display-only="true" style="display: none;"></ev-product-summary>
    <ev-product-profile use-billing-option="true" show-labels="true"></ev-product-profile>
<?php //echo module_invoke('paywall', 'ev_get_html', 'ev-product-profile'); ?>
	<!-- <ev-product-summary show-header="true" display-only="true" style="display: none;"></ev-product-summary> -->
  <!-- <ev-product-profile use-billing-option="true" show-labels="true"></ev-product-profile> -->
  <ev-manual show-header="false"></ev-manual>
  <!-- <div class="text-right">
		<ev-checkout-button></ev-checkout-button>
	</div> -->
  <!-- <div class='loading' style="display:none;">Loading</div> -->


				 <!-- <button type="button" class="btn btn-danger paymentepage" onclick="">Click To Proceed</button> -->
	<!-- <div class="text-right">
		<ev-checkout-button></ev-checkout-button>
	</div>
    </p> -->
    <!--<ul>
      <li>List item one</li>
      <li>List item two</li>
      <li>List item three</li>
    </ul>-->
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

  <header class="subscription-header student-header">
   <h1>Exclusive offer for Labour Party conference delegates!</h1>
  <!-- <p style="font-size: 3.2em; ">  Subscribe to the <span style="font-weight: bold;font-style: italic;">New Statesman</span> today for the best daily analysis of the latest developments in Downing Street. <b>Student offers start from just £1 per week!</b></p> -->
  <p>Enjoy 4 weeks <strong>free online access to</strong> <a href="https://www.newstatesman.com" target="_self" style="color: white;">www.newstatesman.com</a> and get the best daily analysis of the latest developments in Westminster. </p>
    <p></p>
  </header>
  <div class="student-cta">
    <!--<p>Subscribe to the New Statesman today for the best daily analysis of the latest developments in Downing Street. Student offers start at just £1 per week!</p>-->
  </div>
  <section class="subscription-options student-subscription-options" id="start">
    <div class="row">

      <!-- <div class="large-4 columns"> -->
      <?php /* 
        <div class="subscription-option print-subscription">
          <h2>Print</h2>
          <div class="product-image">
            <!-- <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-print-subscription_0.jpg" alt="New Statesman magazines"> -->
          </div>
		      <div class="cta"><a href="/<?php echo variable_get('paywall_main_student_subscribe_page'); ?>?id=<?php echo variable_get('paywall_PM_student_print_id'); ?>&productName=<?php echo variable_get('paywall_PM_student_print_name'); ?>&productTitle=<?php echo urlencode('Student Print Only'); ?>"><strong>12 weeks for £12</strong></a></div>
          <!-- <div class="offer">
              <h3><small>Introductory offer</small>
              <span class="astrick">*</span>
              <span class="old-price">£4.50</span> £1 per week</h3>
              <span class="single-issue"><span>*</span>Single issue price</span>
              <div class="save-cta">Save 78%</div>
          </div> -->
          <ev-product-selection id="<?php echo variable_get('paywall_PM_student_print_id'); ?>" 
                  product-name="<?php echo variable_get('paywall_PM_student_print_name'); ?>"
                   title="Student Print Only"
                  show-header="false">
          </ev-product-selection>
        </div>
        <!-- .subscription-option -->
        */
        ?>
      <!-- </div> -->

      <!-- <div class="large-4 columns"> -->
        <?php
        /*
        <div class="subscription-option print-digital-subscription best-value">
          <h2>Print &amp; Digital</h2>
          <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png" alt="NS Instant" class="nsinstant">
          <div class="product-image"></div>
          <div class="app-images">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/app-store.png" alt="Apple Store">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/google-play.png" alt="Google Play">
          </div>
		      <div class="cta"><a href="/<?php echo variable_get('paywall_main_student_subscribe_page'); ?>?id=<?php echo variable_get('paywall_PM_student_print_digital_id'); ?>&productName=<?php echo variable_get('paywall_PM_student_print_digital_name'); ?>&productTitle=<?php echo urlencode('Student Print and Digital'); ?>"><strong>12 weeks for £12</strong></a></div>
          <!-- <div class="offer">
              <h3><small>Introductory offer</small>
              <span class="astrick">*</span>
              <span class="old-price">£9.00</span> £1 per week</h3>
              <span class="single-issue"><span>*</span>Single issues price</span>
              <div class="save-cta">Save 89%</div>
          </div> -->
		       <ev-product-selection id="<?php echo variable_get('paywall_PM_student_print_digital_id'); ?>" 
									product-name="<?php echo variable_get('paywall_PM_student_print_digital_name'); ?>"
									 title="Student Digital and Print"
									show-header="false">
			    </ev-product-selection>
        </div> */ ?>
        <!-- .subscription-option -->
      <!-- </div> -->

      <div class="large-4" style="margin: auto">
        <div class="subscription-option digital-subscription">
          <h2>Digital</h2>
          <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png" alt="NS Instant" class="nsinstant">
          <div class="product-image"></div>
          <div class="app-images">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/app-store.png" alt="Apple Store">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/google-play.png" alt="Google Play">
          </div>
		      <!-- <div class="cta"><a href="/<?php /* echo variable_get('paywall_main_free_subscribe_page'); ?>?id=<?php echo variable_get('paywall_PM_free_digital_id'); ?>&productName=<?php echo variable_get('paywall_PM_free_digital_name'); ?>&productTitle=<?php echo urlencode('Free Digital Only'); */ ?>"><strong>12 weeks for £12</strong></a></div> -->
          <div class="cta"><a href="?id=<?php echo variable_get('paywall_PM_free_digital_id'); ?>&productName=<?php echo variable_get('paywall_PM_free_digital_name'); ?>&productTitle=<?php echo urlencode('Free Digital Only'); ?>"><strong>Free Trial</strong></a></div>
			  
          <!-- <div class="offer">
              <h3><small>Introductory offer</small>
              <span class="astrick">*</span>
              <span class="old-price">£4.50</span> £1 per week</h3>
              <span class="single-issue"><span>*</span>Single issue price</span>
              <div class="save-cta">Save 78%</div>
          </div> -->
          
          <ev-product-selection id="<?php echo variable_get('paywall_PM_free_digital_id'); ?>" 
                           product-name="<?php echo variable_get('paywall_PM_free_digital_name'); ?>"
                           title="Free Digital Only"
                           show-header="false">
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


