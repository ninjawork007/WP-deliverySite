<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<?php wp_head(); ?>
	<?php if( cs_get_option('google_analytics', null) ): ?>
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo cs_get_option('ga_tracking_id', ''); ?>"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', '<?php echo esc_js( cs_get_option('ga_tracking_id', '') ) ?>');
		</script>
	<?php endif; ?>
</head>
<body <?php body_class(); ?>>
<?php get_template_part( 'template-parts/headers/header', cs_get_customize_option('header_design', 'v2') ); ?>