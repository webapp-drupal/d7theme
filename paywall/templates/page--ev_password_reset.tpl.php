<style>
	.ev.col-sm-offset-4 {
	    width: 100%;
	}
</style>

<?php if( isset($_GET['resetAttributeKey']) && isset($_GET['serviceName'])  ):  ?>
	<ev-reset-password auth-scheme-name="default"></ev-reset-password>

<?php else: ?>
	<script type="text/javascript">
		window.location = '/';
	</script>
	<noscript>
		<a href="/">Go Home</a>
	</noscript>
<?php endif; ?>