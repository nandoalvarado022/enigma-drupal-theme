<?php print render($title_prefix); ?>

<div class="container">

	<div class="row mt-minus-30">

	<?php if ($header): ?>

		<?php print $header; ?>

	<?php endif; ?>

	<?php if ($rows): ?>

		<div class="col-sm-6">

			<div class="skills-progress" id="skills">

			<?php print $rows; ?>

			</div>

		</div>

	<?php endif; ?>
	</div>

</div>

