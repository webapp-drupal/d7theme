<section class="why-choose-digital">

  <div class="row">
    <?php
	$node = $vars['node'];
    $node_id = $node->nid;
	$ev_page_name = drupal_get_path_alias('node/' . $node_id);
	// echo "<pre>";
	// print_r($ev_page_name);
	// echo"</pre>";
	// echo $node_id;
	// exit;
	
	if( $ev_page_name == 'subscription-discount-us' ){
	?>
	<div class="large-8 columns vcard">
        <p>For further Information please contact our Subscriptions Helpdesk on <span class="tel" style="display: inline-block;">+44 20 7030 4927 </span> OR email: <a href="mailto:digital.subscriptions@newstatesman.co.uk" clss="email">digital.subscriptions@newstatesman.co.uk</a>.</p>
        <ul class="social-logos">
          <li class="twitter"><a href="https://twitter.com/NewStatesman" target="_blank">New Statesman Twitter</a></li>
          <li class="facebook"><a href="https://www.facebook.com/NewStatesman" target="_blank">New Statesman Facebook</a></li>
        </ul>
    </div>
    <div class="large-4 columns">
      <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/new-statesman-app.png" alt="New Statesman app">
    </div>
	<?php
	}
	else{?>
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
	<?php
	}
	?>
  </div>
</section>
<?php if( $custom['display_christmas_version'] ) { ?>
</div> <!-- end div id "container-christmas" -->
<?php } ?>