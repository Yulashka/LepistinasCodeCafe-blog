<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta name="google-site-verification" content="naOlAJ-YWHYZx1ELq1JHbC26h8WegxdsdbS6tprAXrc" />
    <title><?php wp_title('-', true, 'right'); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,400italic' rel='stylesheet' type='text/css'>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('Lepistina\'s Code Café - is a journal of a self-taught Web Developer from Seattle, who would love to share her tips and tricks with you. '); ?>">
    
     <!-- Meta Tags -->
    <meta property="og:url" content="http://lepistinacodecafe.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Lepistina\'s Code Café" />
    <meta property="og:description" content="Lepistina\'s Code Café - is a journal of a self-taught Web Developer from Seattle, who would love to share her tips and tricks with you." />
    <meta property="og:image" content="http://lepistinacodecafe.com/wp-content/uploads/2016/05/full.png" />
    
    <?php wp_head(); ?>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
</head>

<body <?php body_class(); ?>>
<?php include_once("analyticstracking.php") ?>

    <!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TX6VQC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TX6VQC');</script>
<!-- End Google Tag Manager -->
    
    <?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		</a>
	</div>
	<?php endif; ?>
    <header class="header">
        <div class="container">
            <h1 id="main-title" class="text-center margin-top-sm margin-bottom-lg">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
                </a>
            </h1> 
            <div id="navbar" class="navbar">
                <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                     <div class="col-sm-8">
                        <button class="menu-toggle"><?php _e( 'Menu', 'dare2believe' ); ?></button>
                        <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'dare2believe' ); ?>"><?php _e( 'Skip to content', 'dare2believe' ); ?></a>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
                    </div>
                    <div class="col-sm-4" role="search">
                        <?php get_search_form(); ?>
                    </div>
                </nav><!-- #site-navigation -->
            </div><!-- #navbar -->
        </div>
    </header>