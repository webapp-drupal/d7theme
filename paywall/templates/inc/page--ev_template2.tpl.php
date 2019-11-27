<?php
  $node = $vars['node'];
  $custom = [];

  $subs_plan_type = field_get_items('node', $node, 'field_subs_plan_type')[0]['value']; 
  $subs_plan_names = field_get_items('node', $node, 'field_payment_plan_names')[0]['value']; 
  $show_delivery_country = field_get_items('node', $node, 'field_subs_show_delivery_country')[0]['value']; 
  // echo 'here: <pre>' . print_r($subs_plan_type, true) . '</pre>';

  if( isset($subs_plan_type) ){

    if( $subs_plan_type == 'print' ){
      $custom['product_id'] = variable_get('paywall_PM_adult_print_id');
      $custom['product_name'] = variable_get('paywall_PM_adult_print_name');
      $custom['product_title'] = 'Print Only';

    }elseif( $subs_plan_type == 'bundle' ){
      $custom['product_id'] = variable_get('paywall_PM_adult_print_digital_id');
      $custom['product_name'] = variable_get('paywall_PM_adult_print_digital_name');
      $custom['product_title'] = 'Print and Digital';

    }elseif( $subs_plan_type == 'digital' ){
      $custom['product_id'] = variable_get('paywall_PM_adult_digital_id');
      $custom['product_name'] = variable_get('paywall_PM_adult_digital_name');
      $custom['product_title'] = 'Digital Only';

    }elseif( $subs_plan_type == 'print_offer' ){
      $custom['product_id'] = variable_get('paywall_PM_offer_print_id');
      $custom['product_name'] = variable_get('paywall_PM_offer_print_name');
      $custom['product_title'] = 'Print Only';

    }else{
      $subs_other_product_id = field_get_items('node', $node, 'field_subs_plan_type_id')[0]['value']; 
      $subs_other_product_name = field_get_items('node', $node, 'field_subs_plan_type_name')[0]['value']; 
      $subs_other_product_title = field_get_items('node', $node, 'field_subs_plan_title')[0]['value']; 

      if( isset($subs_other_product_id) && isset($subs_other_product_name) ){
        $custom['product_id'] = $subs_other_product_id;
        $custom['product_name'] = $subs_other_product_name;
        $custom['product_title'] = $subs_other_product_title;
      }
      
    }

    if( isset($subs_plan_names) ){
      $custom['plan_names'] = $subs_plan_names;
    }

    if( isset($show_delivery_country) ){
      $custom['show_delivery_country'] = $show_delivery_country;
    }

  }

  // var_dump($custom);

?>
<?php include( 'partials/header-default.tpl.php' ); ?>
  
  <!-- Accordion -->
  
  
  <div id="accordion" class="subspage">
  <!--<h3>Plan Options</h3>-->
  <h3 class="step-1-1" tns-data="0">Plan options <i class="arrow">
              <svg width="13" height="8" xmlns="http://www.w3.org/2000/svg"><path d="M6.499 2.144l4.631 4.57.29.286.58-.572-.29-.286-4.632-4.57-.203-.2-.083-.082-.29-.286L6.498 1l-.29.286L1.29 6.142 1 6.428 1.58 7l.29-.286 4.629-4.57z" stroke="#2C2C2C" stroke-width="1.25" fill="none" fill-rule="evenodd" stroke-linecap="square"></path></svg>
            </i></h3>
  <div class="step-1-2">
    <p>
      <ev-product-selection id="<?php echo @$custom['product_id'] ?>" 
                           product-name="<?php echo @$custom['product_name']; ?>"
                           title="<?php echo @$custom['product_title']; ?>"
                           show-header="false"
                           payment-plans="<?php echo @$custom['plan_names']; ?>"
                           show-hidden="true"
                           <?php if( $custom['show_delivery_country'] && $custom['product_name'] != 'Digital_only' ) echo 'show-delivery-country="true" default-country="United Kingdom"'; ?>
                           <?php
                           if( ($custom['product_name'] == 'print_only_' || $custom['product_name'] == 'print_only_new_offer') && variable_get('paywall_main_subscribe_page_gift_offer') == '1' ) echo 'order-type-option="GIFT"'; 
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
  </div>

<?php include( 'partials/footer--checkout-default.tpl.php' ); ?>


