<?php
  $node = $vars['node'];
  $custom = [];

  $items = field_get_items('node', $node, 'field_subs_page_changes');
  $subs_data = call_user_func_array('array_merge', $items); 
  // echo 'here: <pre>' . print_r($subs_data, true) . '</pre>';

  if($subs_data){

    if( isset( $subs_data['field_subs_button_text']['und'][0]['value'] ) ){
      $custom['subscribe_button_text'] = $subs_data['field_subs_button_text']['und'][0]['value'];
    }else{
      $custom['subscribe_button_text'] = 'Subscribe Now';
    }

    if( isset( $subs_data['field_paywall_student_subs_link']['und'][0]['value'] ) ){
      $custom['student_offer_link'] = (boolean) $subs_data['field_paywall_student_subs_link']['und'][0]['value'];
    }

    if( isset( $subs_data['field_subs_display_plan_desc']['und'][0]['value'] ) ){
      $custom['display_plan_desc'] = (boolean) $subs_data['field_subs_display_plan_desc']['und'][0]['value'];
    }

    if( isset( $subs_data['field_subs_print_plan_desc']['und'][0]['value'] ) ){
      $custom['print_plan_description'] = $subs_data['field_subs_print_plan_desc']['und'][0]['value'];
    }

    if( isset( $subs_data['field_subs_bundle_plan_desc']['und'][0]['value'] ) ){
      $custom['bundle_plan_description'] = $subs_data['field_subs_bundle_plan_desc']['und'][0]['value'];
    }

    if( isset( $subs_data['field_subs_digital_plan_desc']['und'][0]['value'] ) ){
      $custom['digital_plan_description'] = $subs_data['field_subs_digital_plan_desc']['und'][0]['value'];
    }

  }

  if( isset( field_get_items('node', $node, 'field_subs_header_section_desc')[0]['value']) ){
    $custom['header_desc'] = field_get_items('node', $node, 'field_subs_header_section_desc')[0]['value'];
  }

  if( isset( field_get_items('node', $node, 'field_subs_display_christmas_ver')[0]['value']) ){
    $custom['display_christmas_version'] = (boolean) field_get_items('node', $node, 'field_subs_display_christmas_ver')[0]['value'];
  }

  // var_dump( $custom );

?>
<?php include( 'partials/header-default.tpl.php' ); ?>

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
    $sanitized_product_id = htmlspecialchars( filter_var( $_GET['id'] , FILTER_SANITIZE_URL) );
    $sanitized_product_name = htmlspecialchars( filter_var( $_GET['productName'] , FILTER_SANITIZE_URL) );
    $sanitized_product_title = htmlspecialchars( filter_var( $_GET['productTitle'] ) , FILTER_SANITIZE_URL );
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
                           <?php if($sanitized_product_name != 'Digital_only' ) echo 'show-delivery-country="true" default-country="United Kingdom"'; ?>
                           <?php
                           if($sanitized_product_name == 'print_only_' && variable_get('paywall_main_subscribe_page_gift_offer') == '1' ) echo 'order-type-option="GIFT"'; 
                           ?> >
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
  </div>

  <?php include( 'partials/footer--checkout-default.tpl.php' ); ?>


<?php else: ?>
  <?php if( $custom['display_christmas_version'] ) { ?>
    <style>
          #container-christmas:before {
            content: '';
            position: absolute;
            /* top: 0; */
            top: 200px;
            left: 0;
            right: 0;
            height: 1120px;
            background-image: url(<?php echo '/' . drupal_get_path( 'module', 'paywall' ) . '/assets/img/templates/christmasbgnew2.jpg'; ?>);
            background-size: 100%;
            background-repeat: no-repeat;
            background-position: top;
          }
    </style>
  <?php } ?>
  <header class="subscription-header">
    <?php 
      if( isset( $custom['header_desc'] ) ){
          print $custom['header_desc'];
      }else{ ?>

        <h1>Enlightened thinking in dark times.</h1>
        <p>Support 100 years of journalism and get the <span style="font-weight: bold;font-style: italic;">New Statesman</span> before it hits the newsstand.</p>
        <p></p>

      <?php } ?>
      <?php if( isset($custom['student_offer_link']) && $custom['student_offer_link'] && $custom['display_christmas_version'] ){ ?>
      <div class="student-cta">
        <p>Are you a student? <a href="/<?php echo variable_get('paywall_main_student_subscribe_page'); ?>">Click here</a> for 25% off!</a></p>
      </div>
      <!-- .student-cta -->
      <?php } ?>
  </header>
  <section class="subscription-options" id="start">

    <?php if( isset($custom['student_offer_link']) && $custom['student_offer_link'] && !$custom['display_christmas_version'] ){ ?>
    <div class="student-cta">
      <p>Are you a student? <a href="/<?php echo variable_get('paywall_main_student_subscribe_page'); ?>">Click here</a> for 25% off!</a></p>
    </div>
    <!-- .student-cta -->
    <?php } ?>

    <div class="row">
      <div class="large-4 columns">
        <div class="subscription-option print-subscription">
          <h2>Print</h2>
          <div class="product-image">
          </div>
		      <div class="cta"><a href="?id=<?php echo variable_get('paywall_PM_adult_print_id') ?>&productName=<?php echo variable_get('paywall_PM_adult_print_name') ?>&productTitle=<?php echo urlencode('Print Only'); ?>"><strong><?php echo @$custom['subscribe_button_text']; ?></strong></a></div>

          <?php 
        if( isset($custom['display_plan_desc']) && $custom['display_plan_desc'] ){

          if( isset( $custom['print_plan_description']) && !empty( $custom['print_plan_description']) ){
            print $custom['print_plan_description'];
          } else {
        ?>
            <div class="offer">
                <h3>
                  <!-- <small>Special offer</small> -->
                <span class="astrick">*</span>
                1 year for £120</h3>
                <div class="reduced-price"><span class="old-price">£4.50</span> £2.31 per issue</div>
                <span>Orders will start with the next available issue</span>
            </div>
          <?php } } ?>

          <ev-product-selection id="<?php echo variable_get('paywall_PM_adult_print_id'); ?>" 
                    product-name="<?php echo variable_get('paywall_PM_adult_print_name'); ?>"
                    title="Print Only"
                    show-header="false">
          </ev-product-selection>
        </div>
        <!-- .subscription-option -->
      </div>

      <div class="large-4 columns">
        <div class="subscription-option print-digital-subscription best-value">
          <h2>Print &amp; Digital</h2>
          <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png" alt="NS Instant" class="nsinstant">
          <div class="product-image">
          </div>
          <div class="app-images">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/app-store.png" alt="Apple Store">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/google-play.png" alt="Google Play">
          </div>
          <!-- .app-images -->
		    <div class="cta"><a href="?id=<?php echo variable_get('paywall_PM_adult_print_digital_id') ?>&productName=<?php echo variable_get('paywall_PM_adult_print_digital_name') ?>&productTitle=<?php echo urlencode('Digital and Print'); ?>"><strong><?php echo @$custom['subscribe_button_text']; ?></strong></a></div>

        <?php 
        if( isset($custom['display_plan_desc']) && $custom['display_plan_desc'] ){

          if( isset( $custom['bundle_plan_description']) && !empty( $custom['bundle_plan_description']) ){
            print $custom['bundle_plan_description'];
          } else {
        ?>
          <div class="offer">
                <h3>
                  <!-- <small>Special offer</small> -->
                <span class="astrick">*</span>
                1 year for £154</h3>
                <div class="reduced-price"><span class="old-price">£4.50</span> £2.96 per week</div>
                <span>Orders will start with the next available issue</span> 
          </div>
        <?php } } ?>

          <ev-product-selection id="<?php echo variable_get('paywall_PM_adult_print_digital_id'); ?>" 
                    product-name="<?php echo variable_get('paywall_PM_adult_print_digital_name'); ?>"
                     title="Print and Digital"
                    show-header="false">
          </ev-product-selection>
        </div>
        <!-- .subscription-option -->
      </div>

      <div class="large-4 columns">
        <div class="subscription-option digital-subscription">
          <h2>Digital</h2>
          <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png" alt="NS Instant" class="nsinstant">
          <div class="product-image">
          </div>
          <div class="app-images">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/app-store.png" alt="Apple Store">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/google-play.png" alt="Google Play">
          </div>
          <!-- .app-images -->
		      <div class="cta"><a href="?id=<?php echo variable_get('paywall_PM_adult_digital_id') ?>&productName=<?php echo variable_get('paywall_PM_adult_digital_name') ?>&productTitle=<?php echo urlencode('Digital Only'); ?>"><strong><?php echo @$custom['subscribe_button_text']; ?></strong></a></div>

          <?php 
          if( isset($custom['display_plan_desc']) && $custom['display_plan_desc'] ){

            if( isset( $custom['digital_plan_description']) && !empty( $custom['digital_plan_description']) ){
              print $custom['digital_plan_description'];
            }else{ 
            ?>

            <div class="offer">
                <h3>
                  <!-- <small>Special offer</small> -->
                <span class="astrick">*</span>
                1 year for £120</h3>
                <div class="reduced-price"><span class="old-price">£4.50</span> £2.31 per week</div>
            </div>
          <?php } } ?>

          <ev-product-selection id="<?php echo variable_get('paywall_PM_adult_digital_id'); ?>" 
                           product-name="<?php echo variable_get('paywall_PM_adult_digital_name'); ?>"
                           title="Digital Only"
                           show-header="false">
          </ev-product-selection>
        </div>
        <!-- .subscription-option -->
      </div>

    </div>
  </section>
  <?php include( 'partials/footer-default.tpl.php' ); ?>

<?php endif; ?>  