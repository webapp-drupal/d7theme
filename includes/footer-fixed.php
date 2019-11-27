<footer class="site-footer site-footer-hidden">
        <p>&copy; New Statesman 1913 - <?php echo date("Y"); ?></p>
	<div class="toggle footer-links-toggle">About us</div>
	 <?php if ($page['footer']): ?>
	<div id="foot">
	 <?php print render($page['footer']) ?>
	</div>
   <?php endif; ?>
</footer>