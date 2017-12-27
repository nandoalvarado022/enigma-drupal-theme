<?php $form['actions']['submit']['#attributes']['class'][] = 'btn btn-lg btn-color btn-submit' ;?>
<div class="row contact-row">
	<?php print drupal_render($form['submitted']['name']); ?>
	<?php print drupal_render($form['submitted']['email']); ?>
</div>
<?php print drupal_render($form['submitted']['subject']); ?>
<?php print drupal_render($form['submitted']['message']); ?>
<?php print drupal_render($form['submitted']); ?>
<?php print drupal_render_children($form); ?>