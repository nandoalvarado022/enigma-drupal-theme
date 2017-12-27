jQuery(document).ready(function($) {

	//JS search form

	$('.page-404 form#search-block-form').append('<i class="icon icon_search"></i>');

	$('.widget form#search-block-form').append('<i class="icon icon_search"></i>');

	$('.page-404 form#search-block-form input[type=submit]').val('');

	$('.widget form#search-block-form input[type=submit]').val('');

	$('.navigation form').addClass('search-wrap');

});