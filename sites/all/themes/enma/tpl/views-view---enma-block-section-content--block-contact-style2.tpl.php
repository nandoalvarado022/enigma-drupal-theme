<?php print render($title_prefix); ?>
<div class="container">
<?php if ($header): ?>
	<?php print $header; ?>
<?php endif; ?>
	<div class="row">
		<?php if ($footer): ?>
		<?php print $footer; ?>
		<?php endif; ?>
		<?php if ($rows): ?>
		<?php print $rows; ?>
		<?php endif; ?>
	</div>
</div>

