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

<?php elseif( isset($_GET['id']) && isset( $_GET['productName']) ): ?>

  <div class="row">
    <div class="large-7 columns pp_summary">

        <ev-product-selection id="<?php echo $_GET['id']; ?>" 
                           product-name="<?php echo $_GET['productName']; ?>"
                           title="Product Unique"
                           show-header="true">
        </ev-product-selection>

    </div>
    <div class="large-5 columns">
      <div class="secure-box">
        <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/secure.png">
		<?php echo $_GET['id']; ?>
		<?php echo $_GET['productName']; ?>
      </div>

    </div>
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
    <h1>Enlightened thinking in dark times.</h1>
    <p>Support 100 years of journalism and get the <span style="font-weight: bold;font-style: italic;">New Statesman</span> before it hits the newsstand.</p>
    <p>Subscribe for just $2 a week. Cancel anytime.</p>
  </header>
  <div class="student-cta">
    <p>If you are a student, trial us for $2 per week below, then, enjoy up to a FURTHER 25% off thereafter. Not a student?  <a href="/<?php echo variable_get('paywall_main_subscribe_page'); ?>">Click here</a></p>
  </div>
  <section class="subscription-options student-subscription-options" id="start">
    <div class="row">
      <div class="large-4 columns">
        <div class="subscription-option print-subscription">
          <h2>Print</h2>
          <div class="product-image">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-print-subscription_0.jpg" alt="New Statesman magazines">
          </div>
		      <div class="cta"><a href="/<?php echo variable_get('paywall_main_subscribe_page_us'); ?>?id=<?php echo variable_get('paywall_PM_student_print_id') ?>&productName=<?php echo variable_get('paywall_PM_student_print_name') ?>&productTitle=<?php echo urlencode('Student Print Only'); ?>&payment-plans=<?php echo variable_get('paywall_PM_student_us_print_plan_names'); ?>">Subscribe now</a></div>
          <div class="offer">
              <h3><small>Introductory offer</small>
              <span class="astrick">*</span>
              <span class="old-price">$4.50</span> $2 per week</h3>
              <span class="single-issue"><span>*</span>Single issue price</span>
              <div class="save-cta">Save 78%</div>
          </div>
          <ev-product-selection id="<?php echo variable_get('paywall_PM_student_print_id'); ?>" 
                  product-name="<?php echo variable_get('paywall_PM_student_print_name'); ?>"
                   title="Student Print Only"
                  show-header="false">
          </ev-product-selection>
        </div>
        <!-- .subscription-option -->
      </div>

      <div class="large-4 columns">
	  
        <div class="subscription-option print-digital-subscription best-value">
          <h2>Print &amp; Digital</h2>
          <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png" alt="NS Instant" class="nsinstant">
          <div class="product-image"></div>
          <div class="app-images">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/app-store.png" alt="Apple Store">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/google-play.png" alt="Google Play">
          </div>
		      <div class="cta"><a href="/<?php echo variable_get('paywall_main_subscribe_page_us'); ?>?id=<?php echo variable_get('paywall_PM_student_print_digital_id') ?>&productName=<?php echo variable_get('paywall_PM_student_print_digital_name') ?>&productTitle=<?php echo urlencode('Student Print and Digital'); ?>&payment-plans=<?php echo variable_get('paywall_PM_student_us_print_digital_plan_names'); ?>">Subscribe now</a></div>
          <div class="offer">
              <h3><small>Introductory offer</small>
              <span class="astrick">*</span>
              <span class="old-price">$9.00</span> $2 per week</h3>
              <span class="single-issue"><span>*</span>Single issues price</span>
              <div class="save-cta">Save 89%</div>
          </div>
		       <ev-product-selection id="<?php echo variable_get('paywall_PM_student_print_digital_id'); ?>" 
									product-name="<?php echo variable_get('paywall_PM_student_print_digital_name'); ?>"
									 title="Student Digital and Print"
									show-header="false">
			    </ev-product-selection>
        </div>
        <!-- .subscription-option -->
      </div>

      <div class="large-4 columns">
        <div class="subscription-option digital-subscription">
          <h2>Digital</h2>
          <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png" alt="NS Instant" class="nsinstant">
          <div class="product-image"></div>
          <div class="app-images">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/app-store.png" alt="Apple Store">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/google-play.png" alt="Google Play">
          </div>
		      <div class="cta"><a href="/<?php echo variable_get('paywall_main_subscribe_page_us'); ?>?id=<?php echo variable_get('paywall_PM_student_digital_id') ?>&productName=<?php echo variable_get('paywall_PM_student_digital_name') ?>&productTitle=<?php echo urlencode('Digital Student Only'); ?>&payment-plans=<?php echo variable_get('paywall_PM_student_us_digital_plan_names'); ?>">Subscribe now</a></div>
			  
          <div class="offer">
              <h3><small>Introductory offer</small>
              <span class="astrick">*</span>
              <span class="old-price">$4.50</span> $2 per week</h3>
              <span class="single-issue"><span>*</span>Single issue price</span>
              <div class="save-cta">Save 78%</div>
          </div>
          <ev-product-selection id="<?php echo variable_get('paywall_PM_student_digital_id'); ?>" 
                           product-name="<?php echo variable_get('paywall_PM_student_digital_name'); ?>"
                           title="Student Digital Only"
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
          <p>For further Information please contact our Subscriptions Helpdesk on <span class="tel" style="display: inline-block;">0207 936 6459</span> OR email: <a href="mailto:digital.subscriptions@newstatesman.co.uk" clss="email">digital.subscriptions@newstatesman.co.uk</a>.</p>
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
  <div class="testimonials">
      <div class="row">
        <div class="large-6 columns">
          <blockquote>
              <p>A great magazine with the status of a national treasure.</p>
              <cite>Richard Dawkins</cite>
          </blockquote>
        </div>
        <div class="large-6 columns">
          <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/richard-dawkins.jpg" alt="Richard Dawkins">
        </div>
      </div>
  </div>

<?php endif; ?>


