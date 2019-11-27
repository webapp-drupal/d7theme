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

  <?php
    $sanitized_product_id = filter_var( $_GET['id'] , FILTER_SANITIZE_URL);
    $sanitized_product_name = filter_var( $_GET['product-name'] , FILTER_SANITIZE_URL);

    // conditions checks if required parameters are passed
    // if true then it gets the product id from database
    $product_id = (variable_get('paywall_PM_offer_print_id') == $sanitized_product_id) ? $sanitized_product_id : 'default';
    $product_name = (variable_get('paywall_PM_offer_print_name') == $sanitized_product_name) ? $sanitized_product_name : 'default';

    if( $product_id == 'default' ){
      $product_name = 'default';
    }

    $sanitized_product_title = htmlspecialchars( $_GET['product-title'] );
    $sanitized_payment_plans = filter_var( $_GET['payment-plans'] , FILTER_SANITIZE_URL);

    $pp = ( !empty(variable_get('paywall_PM_offer_plans') ) ) ? variable_get('paywall_PM_offer_plans') : '12412print_plus_book_insert';
  ?>
  
  
  <!-- Accordion -->
  
  
  <div id="accordion" class="subspage">
  <!--<h3>Plan Options</h3>-->
  <h3 class="step-1-1" tns-data="0">Plan options <i class="arrow">
							<svg width="13" height="8" xmlns="http://www.w3.org/2000/svg"><path d="M6.499 2.144l4.631 4.57.29.286.58-.572-.29-.286-4.632-4.57-.203-.2-.083-.082-.29-.286L6.498 1l-.29.286L1.29 6.142 1 6.428 1.58 7l.29-.286 4.629-4.57z" stroke="#2C2C2C" stroke-width="1.25" fill="none" fill-rule="evenodd" stroke-linecap="square"></path></svg>
						</i></h3>
  <div class="step-1-2">
    <p>
     <ev-product-selection id="<?php echo variable_get('paywall_PM_offer_print_id'); ?>" 
                           product-name="<?php echo variable_get('paywall_PM_offer_print_name'); ?>"
                           title="Book offer"
                           show-header="false"
                           payment-plans="<?php echo $pp; ?>"
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

  