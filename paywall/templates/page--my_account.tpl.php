
<!--- Code for Header ---->


  <header class="site-header">
   <!-- <h1>Test checkout header</h1>-->
   <a href="/"> <h1>Return to home </h1></a>
  </header>
 <!-- Code end for header ----> 



<?php if( isset($_GET['logout'] ) ):?>
  <script>
    (function() {
     //alert('Successfully Logged out');
       EV.Core.UI.logout();
       console.log('logging out now');

    })();
  </script>
  <noscript>
    Your browser does not support JavaScript! Please enable it!
  </noscript>

<?php elseif( isset($_GET['register']) ): ?>
  <?php echo @module_invoke('paywall', 'ev_get_modal', 'ev-registration'); ?>
  <style type="text/css">
    .node-paywall .site-header, .tns-evo-profile{
      display: none !important;
    }

    .node-paywall {
        margin-bottom: 80px !important;
    }

    .tns-pp {
        text-align: center !important;
    }

  </style>

<?php elseif( isset($_GET['login']) ): ?>
  <?php echo @module_invoke('paywall', 'ev_get_modal', 'ev-login'); ?>
  <style type="text/css">
    .node-paywall .site-header, .tns-evo-profile{
      display: none !important;
    }

    .node-paywall {
        margin-bottom: 80px !important;
    }

    .tns-pp {
        text-align: center !important;
    }
  </style>
  
<?php else: ?>


<?php if ( isset($_GET['orderId'] ) && isset($_GET['userGuid'] ) && isset($_GET['redirect_flow_id'] )  ): ?>
    <div class="ev thankyouns">
      <div class="alert alert-success text-center" style="vertical-align: middle;">Thank you for subscribing to the New Statesman</div>
    </div>
    
<?php endif; ?>

<?php if ( isset($_GET['order'] ) ): ?>
  <?php if ( $_GET['order'] == "success" ): ?>
    <div class="ev thankyouns">
      <div class="alert alert-success text-center" style="vertical-align: middle;">Thank you for subscribing to the New Statesman</div>
    </div>
  <?php endif; ?>
<?php endif; ?>


<div class="my-account-page" style="width: 640px;">
	<ev-profile profile="profile">

    <ev-profile-when state="available">

      <div class="header-mya">
        <h2>My Account</h2>
      </div>
      <div class="tab">
        <button class="tablinks active" data-btnName="details" onclick="showTabs(event, 'details')">Personal Details</button>
        <!--<button class="tablinks" data-btnName="changeMyAddress" onclick="showTabs(event, 'changeMyAddress')">Change My Address</button>-->
        <button class="tablinks" data-btnName="changePassword" onclick="showTabs(event, 'changePassword')">Change Password</button>
        <button class="tablinks" data-btnName="subscriptions" onclick="showTabs(event, 'subscriptions')">Subscriptions</button> 
        <button class="tablinks" data-btnName="newsletter" onclick="showTabs(event, 'newsletter')">Newsletter</button>
        <!--<button class="tablinks" onclick="showTabs(event, 'Address')">Address</button>-->
      </div>


    <div id="details" class="tabcontent" style="display: block;">
        	<ev-edit-profile service-name="manage_profile" title="Edit Profile" show-header="false" show-labels="true"></ev-edit-profile>
    </div>
    
      <div id="changePassword" class="tabcontent">
        	<ev-change-password auth-scheme-name="default" service-name="edit_password" show-header="false" show-labels="false"></ev-change-password>
      </div>

         <div id="subscriptions" class="tabcontent">
		<ev-purchases-list id="purchases-list" title="Purchases List" show-header="false"></ev-purchases-list>
    <ev-grant-list id="grant-invite-list"
                   title="Grant Invite list"
                   show-header="true">
    </ev-grant-list>
      <p style="margin: 1.5em 0 0 0;">To upgrade your existing subscription, please call <strong style="color: #6c6c6c;"><tel>0808 284 9422</tel></strong>  OR  <strong style="color: #6c6c6c;"><tel>+44(0) 20 7030 4927</tel></strong></p>
      <!-- <p style="margin: 1.5em 0 0 0;">To upgrade your existing subscription, please call <strong style="color: #6c6c6c;"><tel>0800 731 8496</tel></strong>  OR  <strong style="color: #6c6c6c;"><tel>0207 936 6459</tel></strong></p> -->
        </div>

        <div id="newsletter" class="tabcontent">
          <ev-edit-profile non-editable="['email_address']" service-name="manage_newsletters" show-header="false" title="Edit Profile" show-labels="false"></ev-edit-profile>
        </div>

        <!-- <div id="changeMyAddress" class="tabcontent">
          <ev-edit-profile  service-name="manage_address" title="Change My Address" show-header="false" show-labels="false"></ev-edit-profile>
        </div> -->
		
		 <!--<div id="Address" class="tabcontent">
          <ev-edit-profile non-editable="['email_address']" service-name="address" title="Edit Profile"></ev-edit-profile>
        </div>-->
	 </ev-profile-when>

		

    <ev-profile-when state="not-loggedIn" class="notLoggedIn">
      <script>
        (function() {
          if( EV.util.getEVSession() === null ){
            document.querySelector('.my-account-page').innerHTML = '<button name="register" class="tns-btn tns-register">Register</button> <span>Already a member?</span> <button name="login" class="tns-btn tns-login" >Login here</button>';
          }
        })();
      </script>
      <noscript>
        Please<button class="tns-login tns-btn" name="login">Log in</button> to access your account.
      </noscript>
    </ev-profile-when>
  </ev-profile>
  
</div>

<!-- <ev-profile profile="profile">
    <ev-profile-when state="available">
       <div style="width: 640px">
	    <ev-edit-profile non-editable="['email_address']" service-name="manage_profile" title="Edit Profile"></ev-edit-profile>
            <ev-change-password auth-scheme-name="default"></ev-change-password>
       </div>
    </ev-profile-when>
    <ev-profile-when state="not-loggedIn">
        User is not logged in!
    </ev-profile-when>
</ev-profile>
 -->

<?php endif; ?>
<noscript>
    <p>Your browser does not support JavaScript! Please enable it!</p>
</noscript>

<script type="text/javascript">
  window.onload = function() {
    if(!EV.util.getEVSession()) { // if session does not exist
      // Open the login/register widget and enforce action
      $('.tns-login').trigger('click');
      //$('.tns-modal .tns-ev-close').parent().attr('href', '/');
    }

    if(window.location.hash) {
        var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
        showTabsExt(hash);
    }

  }

</script>
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