<script type="text/javascript">

  if( !getCookie('subsRefererPage') ){
    document.cookie = "subsRefererPage=" + document.referrer + "; path=/"; 
  }
  

  function getCookie(key) {
      var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
      return keyValue ? keyValue[2] : null;
  }  
</script>

<script src="https://use.fontawesome.com/66378f49bf.js"></script>
 
<style type="text/css">
  .subscription-option{
    min-height: 92em !important;
  }
</style>

<?php if( isset($_GET['id']) && isset( $_GET['productName']) && isset( $_GET['productName']) && isset( $_GET['productTitle'] ) && isset( $_GET['payment-plans'] ) && !empty( $_GET['payment-plans'] )  ): ?>

  <?php
    $sanitized_product_id = filter_var( $_GET['id'] , FILTER_SANITIZE_URL);
    $sanitized_product_name = filter_var( $_GET['productName'] , FILTER_SANITIZE_URL);
    $sanitized_product_title = htmlspecialchars( $_GET['productTitle'] );
    $sanitized_payment_plans = filter_var( $_GET['payment-plans'] , FILTER_SANITIZE_URL);
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
                           payment-plans="<?php echo $sanitized_payment_plans; ?>"
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
<ev-product-profile use-billing-option="true" show-labels="true" show-header="false"></ev-product-profile>
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
  <header class="subscription-header">
    <h1>Enlightened thinking in dark times.</h1>
    <p>Support 100 years of journalism and get the <span style="font-weight: bold;font-style: italic;">New Statesman</span> before it hits the newsstand.</p>
    <p></p>
  </header>
  <section class="subscription-options" id="start">
    <div class="student-cta">
      <p>Are you a student? <a href="/<?php echo variable_get('paywall_main_student_subscribe_page'); ?>">Click here</a> for 25% off!</a></p>
    </div>
    <!-- .student-cta -->
    <div class="row">
      <div class="large-6 columns">
        <div class="subscription-option print-subscription">
          <h2>Print</h2>
          <div class="product-image">
            <!--<img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-print-subscription_0.jpg" alt="New Statesman magazines">-->
          </div>
          <div class="cta"><a href="/renewUK?id=<?php echo variable_get('paywall_PM_adult_print_id') ?>&productName=<?php echo variable_get('paywall_PM_adult_print_name') ?>&productTitle=<?php echo urlencode('Print Only'); ?>&payment-plans=print_only_yearly_ONEOFF,print_only_2year_ONEOFF">Subscribe now</a></div>

          <div class="offer">
              <h3><span class="astrick">*</span>1 year for £96</h3>
              <div class="reduced-price"><span class="old-price">£4.50</span> £1.85 per week</div>
              <span>Orders will start with the next available issue</span>
          </div>
          <ev-product-selection id="<?php echo variable_get('paywall_PM_adult_print_id') ?>" 
                    product-name="<?php echo variable_get('paywall_PM_adult_print_name') ?>"
                    title="Print Only"
                    show-header="false">
          </ev-product-selection>
        <!--<ev-product-profile></ev-product-profile>-->
        </div>
        <!-- .subscription-option -->
      </div>

      <div class="large-6 columns">
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
        <div class="cta"><a href="/renewUK?id=<?php echo variable_get('paywall_PM_adult_print_digital_id') ?>&productName=<?php echo variable_get('paywall_PM_adult_print_digital_name') ?>&productTitle=<?php echo urlencode('Digital and Pring'); ?>&payment-plans=print_digital_one_year_ONEOFF_144">Subscribe now</a></div>
          <div class="offer">
              <h3><span class="astrick">*</span>1 year for £144</h3>
              <div class="reduced-price"><span class="old-price">£4.50</span> £2.77 per week</div>
              <span>Orders will start with the next available issue</span> 
          </div>
          <ev-product-selection id="<?php echo variable_get('paywall_PM_adult_print_digital_id') ?>" 
                    product-name="<?php echo variable_get('paywall_PM_adult_print_digital_name') ?>"
                     title="Print and Digital"
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
