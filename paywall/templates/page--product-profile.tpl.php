<?php //if( isset($_GET['product-profile'] ) ):  ?>

<div id="ev-login-subs-page" style="display:none;">
    <div class="already-registered">
      <p>Already Registered? Log in...</p>
      <p>If you've already registered, log in below. If not, please <a href="#or">enter your details</a>.</p>
    </div>
    <?php echo @module_invoke('paywall', 'ev_get_modal', 'ev-login'); ?>
  </div>

  <div class="or-register">
      <!-- .ev-login-subs-page -->
      <div class="or" id="or" style="display:none;">
        <p>Not registered? Register your details...</p>
      </div>

      <script type="text/javascript">
        (function() {
          console.log('check auth');
          if( EV.util.getEVSession() === null ){
            document.getElementById("ev-login-subs-page").style.display="block";
			console.log('1');
			document.getElementById("or").style.display="block";
          }
		  
        })();
      </script>
	<div class="row">
        <div class="large-7 columns pp_summary" id="ev-product-profile-form">
        <!-- <div class="large-7 columns " id="ev-product-profile-form"> -->
            <ev-product-profile custom-non-editable='["email_address", "first_name", "last_name"]'></ev-product-profile>
            
        </div>
        <!--<div class="large-5 columns">
          <div class="secure-box">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/secure.png">
          </div>
        </div>--->
	</div>
 </div>	
<?php //endif; ?>
<!--<ev-product-profile use-billing-option="true"></ev-product-profile>--->

