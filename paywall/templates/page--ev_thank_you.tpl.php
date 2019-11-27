
<!--- Code for Header ---->

 <?php if ( isset($_GET['orderId'] )  ): ?>
    <div class="ev thankyouns">
      <div class="alert alert-success text-center" style="vertical-align: middle;">Please wait a moment. We are just processing your subscription.</div>
    </div>
    <ev-complete-directdebit-mandate id="completeDirectDebitMandate" show-error-msgs="false" style="display: none;" ></ev-complete-directdebit-mandate>
    <script type="text/javascript">
    	(function () {
    		var tns_wrapper = document.getElementsByClassName('tns-modal-wrapper')[0];
    		tns_wrapper.innerHTML += '<div class="tns-modal ev-please-wait tns-modal-active"><div class="loading" style="display:block;">Loading</div><p style="text-align: center;">Please wait a moment while we process your subscription.</p></div>';
    		tns_wrapper.className += " tns-modal-active";
    		document.getElementsByTagName("body")[0].className += " tns-modal-active";
    	})();
    </script>

<?php else: ?>
	<div class="ev thankyouns">
      <div class="alert alert-success text-center" style="vertical-align: middle;">Thank you</div>
    </div>
<?php endif; ?>
