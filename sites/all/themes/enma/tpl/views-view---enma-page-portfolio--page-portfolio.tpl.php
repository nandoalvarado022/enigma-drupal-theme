<?php
	if (isset($_GET['style'])) {
		$portfolio_style = $_GET['style'];
	} else $portfolio_style = theme_get_setting('portfolio_style', 'enma');
	if (empty($portfolio_style)) $portfolio_style = '2cols';
?>
<?php if ($portfolio_style == '2cols'): ?>
	<?php print views_embed_view('_enma_page_portfolio','block_portfolio_2columns'); ?>
<?php  elseif ($portfolio_style == '3cols'): ?>
	<?php print views_embed_view('_enma_page_portfolio','block_portfolio_3columns'); ?>
<?php else: ?>
	<?php print views_embed_view('_enma_page_portfolio','block_portfolio_4columns'); ?>
<?php endif; ?>