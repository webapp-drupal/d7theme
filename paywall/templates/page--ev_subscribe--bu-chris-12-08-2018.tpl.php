 <!--<script>
    EV.PM.init({
        pmDomain: "https://cmp.uat.evolok.net/pm/api/v2"
    });
</script> --->

<!-- <ev-product-selection id="5a7b421025c61214ae248bf3"
                      group-name="12_week"
                      title="Product Selection Group"
                      show-header="true"
                      payment-plans="" 
                      show-boosted="true" 
                      multi-select="false">
</ev-product-selection> -->


<!-- <ev-product-selection id="5a788f4025c6127a5b7e543e"
                      group-name="Standard"
                      title="Product Selection Group"
                      show-header="true">
</ev-product-selection> -->

<!-- <ev-product-unique id="" 
                   id-product-unique=""
                    group-name="12_week"
                   title="Product Unique"
                   show-header="true">
</ev-product-unique> -->

<!-- <ev-stripe></ev-stripe> -->

<!-- <ev-product-profile></ev-product-profile> -->

<!-- <ev-product-summary id="product-summary"
                    title="Product Summary"
                    show-header="true">
</ev-product-summary> -->


<?php if( isset($_GET['id']) && isset( $_GET['productName']) && isset( $_GET['productProfile'] ) ):  ?>
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
        <div class="large-7 columns" id="ev-product-profile-form">
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
    <div class="large-7 columns">

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

<div class="subscribe-container">
  <header class="subscription-header">
    <h1>Enlightened thinking in darkened times.</h1>
    <p>Support 100 years of journalism and get the New Statesman before it hits the newsstand.</p>
    <p>Subscribe for just £1 a week. Cancel Anytime.</p>
  </header>
  <section class="subscription-options" id="start">
    <div class="student-cta">
      <p>Are you a student? <a href="">Get a further 25% off the prices below!</a></p>
    </div>
    <div class="row">
      <div class="large-4 columns">
        <div class="subscription-option print-subscription">
          <h2>Print</h2>
          <div class="product-image">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-print-subscription_0.jpg" alt="New Statesman magazines">
          </div>
		  <div class="cta"><a href="/ev-subscribe?id=5a7b41aa25c61214ae248bf1&productName=Print">Subscribe now</a></div>
          <div class="offer">
              <h3><small>Introductory offer</small>
              <span class="old-price">£4.50</span> £1 per week</h3>
              <div class="save-cta">Save 78%</div>
              
          </div>
          <ul class="benefits">
            <li>Weekly magazine delivered to your door Early bird and discounted tickets to events</li>
            <li>Early access to podcasts &amp; discounted tickets to NS events</li>
          </ul>
        </div>
        <!-- .subscription-option -->
      </div>

      <div class="large-4 columns">
        <div class="subscription-option print-digital-subscription best-value">
          <h2>Print &amp; Digital</h2>
          <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png" alt="NS Instant" class="nsinstant">
          <div class="product-image">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-print-and-digital-subscription.jpg" alt="New Statesman magazine and app">
          </div>
		  <!--<div class="cta"><a href="/ev-subscribe?id=5a817e8d25c61214ae248c12&productName=Print&Digital">Subscribe now</a></div>-->
		  <div class="cta"><a href="/ev-subscribe?id=5a817e8d25c61214ae248c12&productName=print_digital_bundle">Subscribe now</a></div>
          <div class="offer">
              <h3><small>Introductory offer</small>
              <span class="old-price">£9.00</span> £1 per week</h3>
              <div class="save-cta">Save 89%</div>
              
          </div>
          <ul class="benefits">
            <li>Weekly print magazine, delivered to your door</li>
            <li>Magazine access online, before it hits the newsstand</li>
            <li>Full, unlimited and exclusive content access online</li>
            <li>Early access to podcasts &amp; discounted tickets to NS events</li>
            <li>Exclusive Content; Long reads and weekly round up email</li>
            </li>

          </ul>
        </div>
        <!-- .subscription-option -->
      </div>

      <div class="large-4 columns">
        <div class="subscription-option digital-subscription">
          <h2>Digital</h2>
          <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/instant.png" alt="NS Instant" class="nsinstant">
          <div class="product-image">
            <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-digital-subscription_0.jpg" alt="New Statesman magazine and app">
          </div>
		   <div class="cta"><a href="/ev-subscribe?id=5a8173c325c61214ae248c0a&productName=Digital">Subscribe now</a></div>
          <div class="offer">
              <h3><small>Introductory offer</small>
              <span class="old-price">£4.50</span> £1 per week</h3>
              <div class="save-cta">Save 78%</div>
             
          </div>
          <ul class="benefits">
            <li>Magazine access online, before it hits the newsstand</li>
            <li>Full, unlimited and exclusive content access online</li>
            <li>Early access to podcasts &amp; discounted tickets to NS events</li>
            <li>Exclusive Content; Long reads and weekly round up email</li>
            </li>
          </ul>
        </div>
        <!-- .subscription-option -->
      </div>

    </div>
  </section>
  <section class="why-choose-digital">
    <div class="row">
      <div class="large-8 columns vcard">
          <p>For further Information please contact our Subscriptions Helpdesk on <span class="tel">0207 936 6459</span> OR email; <a href="mailto:sbrasher@newstatesman.co.uk" clss="email">sbrasher@newstatesman.co.uk</a>.</p>
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
</div>
<!-- .subscribe-container -->
<?php endif; ?>

<!-- <script type="text/javascript">
  function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
  }
  console.log("here: ");
  function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

          // console.log( sURLVariables );

        for (i = 0; i < sURLVariables.length; i++) {
            // sParameterName = sURLVariables[i].split('=')[0];
             sParameterName = sURLVariables[i].split(/=(.+)/);
             // console.log(sParameterName);

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    }

  console.log( getCookie("loggedIn") );
  if ( !getCookie("loggedIn") )
  {
    if( getUrlParameter('loggedIn') ){
      window.location.reload();
    }else{
      window.location = window.location.href + "?loginRquired=true";
    }
  }
</script> -->
