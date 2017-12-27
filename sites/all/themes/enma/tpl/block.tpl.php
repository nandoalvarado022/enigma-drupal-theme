<?php

$out = '';
if($block->region == 'section_content'){

	$out .= '<section class="'.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<h2>'.$block->subject.'</h2>';
	endif;
	$out .= $content;
	$out .= '</section>';


} else if($block->region == 'pages_bottom'){

	$out .= '<div class="'.$classes.'" '.$attributes.' >';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<h2>'.$block->subject.'</h2>';
	endif;
	$out .= $content;
	$out .= '</div>';


} else if($block->region == 'footer'){

	$out .= '<div class="col-md-3 col-sm-6 col-xs-12"><div class="widget '.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<h5>'.$block->subject.'</h5>';
	endif;
	$out .= $content;
	$out .= '</div></div>';

} else if($block->region == 'footer2' || $block->region == 'footer4'){

	$out .= '<div class="'.$classes.'" '.$attributes.' >';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<h2>'.$block->subject.'</h2>';
	endif;
	$out .= $content;
	$out .= '</div>';

} else if($block->region == 'bottom_right'){

	$out .= '<div class="col-sm-4 col-sm-offset-2 col-xs-12 '.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<h4>'.$block->subject.'</h4>';
	endif;
	$out .= $content;
	$out .= '</div>';

}elseif($block->region == 'slider_wrap' || $block->region == 'footer'){
	$out .= '<div class="'.$classes.'"  '.$attributes.' >';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<h5 class="white">'.$block->subject.'</h5>';
	endif;
	$out .= $content;
	$out .= '</div>';

}elseif($block->region == 'slider' || $block->region == 'content'){
	$out .= '<div class="'.$classes.'"  '.$attributes.' >';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= 'h2>'.$block->subject.'</h2>';
	endif;
	$out .= $content;
	$out .= '</div>';

}elseif($block->region == 'sidebar'){

	$out .= '<div class="widget '.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
    if ($block->subject)
		$out .= '<h3 class="widget-title">'.$block->subject.'</h3>';
	$out .= $content;
	$out .= '</div>';


} elseif($block->region == 'main_menu'){
	$out .= '<div class="collapse navbar-collapse '.$classes.'"  '.$attributes.' id="navbar-collapse">';
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</div>';

} elseif($block->region == 'blog_menu'){
	$out .= '<div class="collapse navbar-collapse text-center '.$classes.'"  '.$attributes.' id="navbar-collapse">';
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</div>';

} elseif($block->region == 'mini_menu'){
	$out .= '<nav class="overlay-menu '.$classes.'"  '.$attributes.' >';
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</nav>';

}elseif($block->region == 'sidebar_second'){
	$out .= '<aside class="'.$classes.'" '.$attributes.' >';
	$out .= render($title_suffix);
   if ($block->subject)
		$out .= '<h4>'.$block->subject.'</h4>';
	$out .= $content;
	$out .= '</aside>';


}else{
	$out .= '<div id="'.$block_html_id.'" class="'.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	 if ($block->subject)
		$out .= '<h5>'.$block->subject.'</h5>';
	$out .= $content;
	$out .= '</div>';
}
print $out;
?>