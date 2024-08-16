<?php

global $skins;
global $active_skin;

/*********************
THEME CUSTOMIZER
**********************/
/**
 * Adds the Customize page to the WordPress admin area
 */

function creepy_sanitize_text( $input ) {
    return strip_tags( stripslashes( $input ) );
}


function creepy_customizer_css() { 
	global $skins;
	global $active_skin;

	if ( !isset($active_skin) || $active_skin == '') {
		$active_skin = $skins['dirt'];
		set_theme_skin();
	}

	$slug = $active_skin['slug'];

	?>
    <style type="text/css">

		.creepy-main-border .border-left {	background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_main_left.png') top left no-repeat; }
		.creepy-main-border .border-right{	background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_main_right.png') top right no-repeat; }
		.creepy-main-border .border-middle span { background-color: <?= $active_skin['main_border_color']; ?>; }
		.creepy-content-border .border-left {	background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_content_left.png') top left no-repeat; }
		.creepy-content-border .border-right{	background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_content_right.png') top right no-repeat; }
		.creepy-content-border .border-middle span { background-color: <?= $active_skin['content_border_color']; ?>; }
    	.creepy-footer-border .border-left {	background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_footer_left.png') top left no-repeat; }
		.creepy-footer-border .border-right{	background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_footer_right.png') top right no-repeat; }
		.creepy-footer-border .border-middle span { background-color: <?= $active_skin['footer_border_color']; ?>; }
    	#main, #inner-content {background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_text.jpg') repeat top left; }
    	.widgettitle .inner-title{background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_widget_title.jpg') repeat top center; }
    	.menu-wrapper {background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_m.jpg') repeat top left; }
    	#main .slider-wrap .inner-bg{ background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_bg.jpg') repeat top left; }
    	.widgettitle .inner-title,#minecraftsv-status .btn, .widget_wp_sidebarlogin .button-primary, #lwa_wp-submit, .mcserver-solo-online, .mcserver-multi-online, .mcserver-solo-offline, .mcserver-multi-offline { color: <?= $active_skin['widget_title_color']; ?> ;}
    	.widget .inner-widget { background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_side_bg.png') no-repeat top left white;}
    	.menu-wrapper a:hover{background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_m_hover.png') repeat top left; }
    	.mcserver-solo-online, #minecraftsv-status .btn-success, .widget_wp_sidebarlogin .button-primary { background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_online.png') no-repeat top center; }
    	.mcserver-multi-online, #lwa_wp-submit { background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_multi_online.png') no-repeat top center; }
    	.mcserver-solo-offline, #minecraftsv-status .btn-danger { background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_offline.png') no-repeat top center; }
    	.mcserver-multi-offline { background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_multi_offline.png') no-repeat top center; }
       	.nav li ul.sub-menu { background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_menu_texture.jpg') repeat top left; }
    	
    	.vcard .author{ background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_author.png') no-repeat center left; }
		.vcard .comment-number{ background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_comments.png') no-repeat center left; }
		.mcserver-online { background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_sml_online.png') no-repeat center center; }
		.mcserver-offline { background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_sml_offline.png') no-repeat center center; }
		.mcplayers-solo{ background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/online-players.png') no-repeat center left; }
		.mcip-solo{ background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/world-cube.png') no-repeat center left; }

		<?php // Version 1.1 added possibility to change online status text color with skin
		if ( isset($active_skin['online_status_color']) and $active_skin['online_status_color'] != '' ){ ?>
			#inner-footer .mcserver-solo-online, #inner-footer .mcserver-multi-online { color:<?= $active_skin['online_status_color']; ?> }
		<?php } else { ?>
			#inner-footer .mcserver-solo-online, #inner-footer .mcserver-multi-online { color: <?= $active_skin['widget_title_color']; ?> ;}
		<?php } ?>

		<?php if ( isset($active_skin['offline_status_color']) and $active_skin['offline_status_color'] != '' ){ ?>
			#inner-footer .mcserver-solo-offline, #inner-footer .mcserver-multi-offline { color:<?= $active_skin['offline_status_color']; ?> }
		<?php } else { ?>
			#inner-footer .mcserver-solo-offline, #inner-footer .mcserver-multi-offline { color: <?= $active_skin['widget_title_color']; ?> ;}
		<?php } ?>


    	<?php /* DISPLAY slider */
        if( false === get_theme_mod( 'creepy_display_slider') ) { ?>
		    #header { display: none; }
		<?php } // end if ?>

		@media only screen and (min-width: 768px) {
			<?php
			if ( 'left' == get_theme_mod( 'creepy_sidebar_position' ) ){ ?>
				#main{ float: right;}
				.sidebar{ float: left;}
			<?php } else { ?>
				#main{ float: left;}
				.sidebar{float: right;}
			<?php }
			?>
		}	

		.widget ul li {border-bottom: 1px dotted <?= $active_skin['widget_li_border']; ?>;}
		#inner-footer .widget-title { border-bottom: 1px solid <?= $active_skin['widget_li_border']; ?>;}


		<?php // First load bug
		if ( get_theme_mod( 'creepy_heading_color' ) != false ) 
		{ ?>
			@media screen and (max-width: 768px) {
				.menu-wrapper .nav a{ border-bottom: 1px solid <?= $active_skin['submenu_border_color']; ?>;}
				.menu-wrapper .nav a:hover{ border-bottom: 1px solid <?= get_theme_mod( 'creepy_menu_hover_color' ); ?>; }
				.nav li ul.sub-menu { background: none;}
				#main-menu{background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_menu_texture.jpg') repeat top left; }
			}

			<?php // Logo spacing ?>
			.header #logo{ margin: <?= get_theme_mod('space_before_logo'); ?>px 0 <?= get_theme_mod('space_after_logo'); ?>px 0; }


	    	<?php /* COLOURS */ 
	    	$creepy_link_color = get_theme_mod( 'creepy_link_color' );
	    	$creepy_link_hover_color = get_theme_mod( 'creepy_link_hover_color' );
	    	?>
	    	::selection {
			  color: <?php echo get_theme_mod( 'creepy_body_color' ); ?>;
			  background: <?= $creepy_link_hover_color ?>; /* WebKit/Blink Browsers */
			}
			::-moz-selection {
			  color: <?php echo get_theme_mod( 'creepy_body_color' ); ?>;
			  background: <?= $creepy_link_hover_color ?>; /* Gecko Browsers */
			}

	        a { color: <?php echo $creepy_link_color; ?>; }
	        a:hover, .vcard a:hover, .pagination li a:hover { color: <?php echo $creepy_link_hover_color; ?>; }

	        .button{
	        	background: <?= $creepy_link_color; ?>;
	        	color:<?= get_theme_mod( 'creepy_body_color' ); ?>;
	        	-webkit-box-shadow: 0px 4px 0px 0px <?= $creepy_link_hover_color ?>;
				-moz-box-shadow:    0px 4px 0px 0px <?= $creepy_link_hover_color ?>;
				box-shadow:         0px 4px 0px 0px <?= $creepy_link_hover_color ?>;
	        }
	        .button:hover, .button:focus{
	        	-webkit-box-shadow: 0px 3px 0px 0px <?= $creepy_link_hover_color ?>;
				-moz-box-shadow:    0px 3px 0px 0px <?= $creepy_link_hover_color ?>;
				box-shadow:         0px 3px 0px 0px <?= $creepy_link_hover_color ?>;
	        }
	        .button:active{
	        	-webkit-box-shadow: 0px 0px 0px 0px <?= $creepy_link_hover_color ?>;
				-moz-box-shadow:    0px 0px 0px 0px <?= $creepy_link_hover_color ?>;
				box-shadow:         0px 0px 0px 0px <?= $creepy_link_hover_color ?>;
	        }

	        #main .inner-bg, .widget .inner-widget, .inner-bg{ background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_side_bg.png') no-repeat top left <?php echo get_theme_mod( 'creepy_body_color' ); ?>; }

	        h1, h1 a, h2, h2 a, h3, h3 a, h4, h4 a, h5, h5 a, h6, h6 a, .mcplayers-solo, .mcversion-solo, .mcip-solo{ color:<?php echo get_theme_mod( 'creepy_heading_color' ); ?>; }

	        .nav li a, nav a, a.menu-link{color: <?php echo get_theme_mod( 'creepy_menu_color' ); ?>;}
	        .nav li a:hover, nav a:hover, a.menu-link:hover{color: <?php echo get_theme_mod( 'creepy_menu_hover_color' ); ?>;}


			<?php $c_slider_color = get_theme_mod( 'creepy_slider_color' ); // SLIDER COLOR ?> 
	        #slidr-div div{ color: <?php echo $c_slider_color; ?>; }
	        aside#slidr-div-breadcrumbs .slidr-breadcrumbs li.normal, aside#slidr-div-breadcrumbs .slidr-breadcrumbs li.active { border-color: <?php echo $c_slider_color; ?> !important; background-color: <?php echo $c_slider_color; ?> !important; }
	        
	        .slider-content, .slider-content h1, .slider-content h2, .slider-content h3, .slider-content h4 { color: <?php echo $c_slider_color; ?> ; }
	        .slider-nav__item{ background: <?php echo $c_slider_color; ?>; }

	        .vcard a{ color: <?php echo get_theme_mod( 'creepy_text_color' ); ?>; }
			body {	color: <?php echo get_theme_mod( 'creepy_text_color' ); ?>;
					font-size: <?php echo get_theme_mod( 'creepy_text_size'); ?>px;
			}

			<?php // if there is a backround for footer
			if ( $active_skin['creepy_footer_background'] == 1 && isset($active_skin['creepy_footer_background']) ){ ?>
				#inner-footer{ background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_footer_bg.png') no-repeat top left; }
			<?php } ?>
			#inner-footer {background-color: <?php echo get_theme_mod( 'creepy_footer_bg_color' ); ?>;	}
			#inner-footer, #inner-footer a, #inner-footer h1, #inner-footer h2, #inner-footer h3, #inner-footer h4, #inner-footer h5, #inner-footer h6{color: <?php echo get_theme_mod( 'creepy_footer_text_color' ); ?>;	}
			#inner-footer .mcplayers-solo, #inner-footer .mcversion-solo, #inner-footer .mcip-solo{color: <?php echo get_theme_mod( 'creepy_footer_text_color' ); ?>;	}
			#inner-footer .widget_archive ul li a:hover,#inner-footer .widget_meta ul li a:hover,#inner-footer .widget_nav_menu ul li a:hover{
				background: <?php echo get_theme_mod( 'creepy_footer_text_color' ); ?>;	
				color: <?php echo get_theme_mod( 'creepy_footer_bg_color' ); ?> !important;
			}

		

			<?php $slider_font = get_theme_mod( 'creepy_slider_font_size'); ?>
			.slider-content h1{ font-size: <?php echo $slider_font; ?>px;}
			.slider-content p{ font-size: <?php echo $slider_font*0.75; ?>px;}
			h1 { font-size: <?php echo get_theme_mod( 'creepy_h1_size'); ?>px;}
			h2 { font-size: <?php echo get_theme_mod( 'creepy_h2_size'); ?>px;}
			h3 { font-size: <?php echo get_theme_mod( 'creepy_h3_size'); ?>px;}
			h4 { font-size: <?php echo get_theme_mod( 'creepy_h4_size'); ?>px;}
			h5 { font-size: <?php echo get_theme_mod( 'creepy_h5_size'); ?>px;}
			h6 { font-size: <?php echo get_theme_mod( 'creepy_h6_size'); ?>px;}

		<?php }else{ ?>

			TEST
			@media screen and (max-width: 768px) {
				.menu-wrapper .nav a{ border-bottom: 1px solid <?= $active_skin['submenu_border_color']; ?>;}
				.menu-wrapper .nav a:hover{ border-bottom: 1px solid <?= $active_skin[ 'creepy_menu_hover_color' ]; ?>; }
				.nav li ul.sub-menu { background: none;}
				#main-menu{background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_menu_texture.jpg') repeat top left; }
			}


	    	<?php /* COLOURS */ 
	    	$creepy_link_color = $active_skin[ 'creepy_link_color' ];
	    	$creepy_link_hover_color = $active_skin[ 'creepy_link_hover_color' ];
	    	?>

	        a { color: <?php echo $creepy_link_color; ?>; }
	        a:hover, .vcard a:hover, .pagination li a:hover { color: <?php echo $creepy_link_hover_color; ?>; }

	        .button{
	        	background: <?= $creepy_link_color; ?>;
	        	color:<?= get_theme_mod( 'creepy_body_color' ); ?>;
	        	-webkit-box-shadow: 0px 4px 0px 0px <?= $creepy_link_hover_color ?>;
				-moz-box-shadow:    0px 4px 0px 0px <?= $creepy_link_hover_color ?>;
				box-shadow:         0px 4px 0px 0px <?= $creepy_link_hover_color ?>;
	        }
	        .button:hover, .button:focus{
	        	-webkit-box-shadow: 0px 3px 0px 0px <?= $creepy_link_hover_color ?>;
				-moz-box-shadow:    0px 3px 0px 0px <?= $creepy_link_hover_color ?>;
				box-shadow:         0px 3px 0px 0px <?= $creepy_link_hover_color ?>;
	        }
	        .button:active{
	        	-webkit-box-shadow: 0px 0px 0px 0px <?= $creepy_link_hover_color ?>;
				-moz-box-shadow:    0px 0px 0px 0px <?= $creepy_link_hover_color ?>;
				box-shadow:         0px 0px 0px 0px <?= $creepy_link_hover_color ?>;
	        }

	        #main .inner-bg, .widget .inner-widget, .inner-bg{ background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_side_bg.png') no-repeat top left <?php echo $active_skin[ 'creepy_body_color' ]; ?>; }

	        h1, h1 a, h2, h2 a, h3, h3 a, h4, h4 a, h5, h5 a, h6, h6 a, .mcplayers-solo, .mcversion-solo, .mcip-solo{ color:<?php echo $active_skin[ 'creepy_heading_color' ]; ?>; }

	        .nav li a, nav a, a.menu-link{color: <?php echo $active_skin[ 'creepy_menu_color' ]; ?>;}
	        .nav li a:hover, nav a:hover, a.menu-link:hover{color: <?php echo $active_skin[ 'creepy_menu_hover_color' ]; ?>;}


			<?php $c_slider_color = $active_skin[ 'creepy_slider_color' ]; // SLIDER COLOR ?> 
	        #slidr-div div{ color: <?php echo $c_slider_color; ?>; }
	        aside#slidr-div-breadcrumbs .slidr-breadcrumbs li.normal, aside#slidr-div-breadcrumbs .slidr-breadcrumbs li.active { border-color: <?php echo $c_slider_color; ?> !important; background-color: <?php echo $c_slider_color; ?> !important; }
	        
	        .slider-content, .slider-content h1, .slider-content h2, .slider-content h3, .slider-content h4 { color: <?php echo $c_slider_color; ?> ; }
	        .slider-nav__item{ background: <?php echo $c_slider_color; ?>; }

	        .vcard a{ color: <?php echo $active_skin[ 'creepy_text_color' ]; ?>; }
			body {	color: <?php echo $active_skin[ 'creepy_text_color' ]; ?>;
			}

			<?php // if there is a backround for footer
			if ( $active_skin['creepy_footer_background'] == 1 && isset($active_skin['creepy_footer_background']) ){ ?>
				#inner-footer{ background: url('<?= THEMEROOT; ?>/library/skins/<?= $slug; ?>/<?= $slug; ?>_footer_bg.png') no-repeat top left; }
			<?php } ?>
			#inner-footer {background-color: <?php echo $active_skin[ 'creepy_footer_bg_color' ]; ?>;	}
			#inner-footer, #inner-footer a, #inner-footer h1, #inner-footer h2, #inner-footer h3, #inner-footer h4, #inner-footer h5, #inner-footer h6{color: <?php echo $active_skin[ 'creepy_footer_text_color' ]; ?>;	}
			.widget_archive ul li a:hover, .widget_meta ul li a:hover, .widget_nav_menu ul li a:hover, .widget_categories ul li a:hover {
				background: <?php echo get_theme_mod( 'creepy_footer_text_color' ); ?>;	
				color: <?php echo get_theme_mod( 'creepy_footer_bg_color' ); ?> !important;
			}

		<?php } ?>

		body{

		/* Font section */
			<?php $chosen_font = get_theme_mod('creepy_font'); 
			if ("opensans" == $chosen_font) {?> font-family: 'Open Sans', 'Helvetica', 'Arial',sans-serif; <?php
			}else if("roboto" == $chosen_font){?> font-family: 'Roboto', 'Helvetica', 'Arial',sans-serif; <?php
			}else if ("robotoslabs" == $chosen_font) {?> font-family: 'Roboto Slab', 'Verdana', 'Times New Roman', serif; <?php
			}else if("ptsans" == $chosen_font){?> font-family: 'PT Sans', 'Helvetica', 'Arial',sans-serif; <?php
			}else if ("times" == $chosen_font) {?> font-family: 'Times New Roman', 'Verdana', serif; <?php
			}else if ("courier" == $chosen_font) {?> font-family: 'Courier New', 'Helvetica', 'Arial', sans-serif; <?php
			}else { ?> font-family: '<?php echo $chosen_font; ?>','Open Sans', 'Helvetica', 'Arial' sans-serif; <?php } ?>
		} 

		<?php // Fullscreen background image
		if ( get_background_image() && get_option( 'fullwidth-bg-image' ) ) {
		?> body.custom-background{ background-size: cover; }	<?php
		}	?>

    </style>
    <?php
}
// register ccs customizer into header, so it loads, when header does ;)
add_action( 'wp_head', 'creepy_customizer_css' );


$chosen_font = get_theme_mod('creepy_font');
if ( ("opensans" == $chosen_font) or ("roboto" == $chosen_font) or ("robotoslabs" == $chosen_font) or ("ptsans" == $chosen_font) ){
   function load_fonts() {
   		$chosen_font = get_theme_mod('creepy_font');
   		if ("opensans" == $chosen_font ){
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700&subset=latin,latin-ext');
        }else if ( "roboto" == $chosen_font){
            wp_register_style('googleFonts','http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,700,700italic&subset=latin,latin-ext');
        }else if ( "robotoslabs" == $chosen_font){
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700&subset=latin,latin-ext');
		}else if ("ptsans" == $chosen_font){
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,latin-ext');
        }
            wp_enqueue_style( 'googleFonts');
    }
 
    add_action('wp_print_styles', 'load_fonts');
}

function creepy_register_theme_customizer( $wp_customize ) {


	// Get $skins data, each skin in array;
	global $skins;
	global $active_skin;

	if ( !isset($active_skin) || $active_skin == '') {
		$active_skin = $skins['dirt'];
		set_theme_skin();
	}

	/**************************
	CREATING CUSTOM INPUT TYPES
	****************************/

	// Register number input
	class Creepy_Number_Control extends WP_Customize_Control {
	    public $type = 'number';
	 
	    public function render_content() {
	        ?>
	        <label>
		        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		        <input type="number" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>" ><span>px</span>
	        </label>
	        <?php
	    }
	}



	/* Top logo */
	$wp_customize->add_setting(
	    'top_logo',
	    array(
	        'default'     => 'IMAGES/logo.png',
	    )
	);
	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'top_logo',
           array(
               'label'          => __( 'Upload a logo', 'theme_name' ),
               'section'        => 'title_tagline',
               'settings'       => 'top_logo',
               'priority'		=> 1,
           )
       )
   );

	$wp_customize->add_setting( 'space_before_logo', array(
    	'default'        => '44',

	) );
	 
	$wp_customize->add_control( new Creepy_Number_Control( $wp_customize, 'space_before_logo', array(
	    'label'   => 'Space before logo [px]',
	    'section' => 'title_tagline',
	    'settings'   => 'space_before_logo',
	    'priority'  => 2
	) ) );

	$wp_customize->add_setting( 'space_after_logo', array(
    	'default'        => '32',

	) );
	 
	$wp_customize->add_control( new Creepy_Number_Control( $wp_customize, 'space_after_logo', array(
	    'label'   => 'Space before logo [px]',
	    'section' => 'title_tagline',
	    'settings'   => 'space_after_logo',
	    'priority'  => 3
	) ) );



	/********************************
		COLORS
	*********************************/


	//body color
	$wp_customize->add_setting(
	    'creepy_body_color',
	    array(
	        'default'     => $active_skin['creepy_body_color'],
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'creepy_body_color',
	        array(
	            'label'      => __( 'Body Color', 'creepy' ),
	            'section'    => 'colors',
	            'settings'   => 'creepy_body_color',
	            'priority'	 => 20,
	        )
	    )
	);

	//menu color
	$wp_customize->add_setting(
	    'creepy_menu_color',
	    array(
	        'default'     => $active_skin['creepy_menu_color'],
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'creepy_menu_color',
	        array(
	            'label'      => __( 'Menu Color', 'creepy' ),
	            'section'    => 'colors',
	            'settings'   => 'creepy_menu_color',
	            'priority'	 => 21,
	        )
	    )
	);

	//menu color
	$wp_customize->add_setting(
	    'creepy_menu_hover_color',
	    array(
	        'default'     => $active_skin['creepy_menu_color'],
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'creepy_menu_hover_color',
	        array(
	            'label'      => __( 'Menu Hover Color', 'creepy' ),
	            'section'    => 'colors',
	            'settings'   => 'creepy_menu_hover_color',
	            'priority'	 => 22,
	        )
	    )
	);

	//slider color
	$wp_customize->add_setting(
	    'creepy_slider_color',
	    array(
	        'default'     => $active_skin['creepy_slider_color'],
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'creepy_slider_color',
	        array(
	            'label'      => __( 'Slider Color', 'creepy' ),
	            'section'    => 'colors',
	            'settings'   => 'creepy_slider_color',
	            'priority'	 => 23,
	        )
	    )
	);

	//slider color
	$wp_customize->add_setting(
	    'creepy_heading_color',
	    array(
	        'default'     => $active_skin['creepy_heading_color'],
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'creepy_heading_color',
	        array(
	            'label'      => __( 'Heading Color', 'creepy' ),
	            'section'    => 'colors',
	            'settings'   => 'creepy_heading_color',
	            'priority'	 => 24,
	        )
	    )
	);

	//text color
	$wp_customize->add_setting(
	    'creepy_text_color',
	    array(
	        'default'     => $active_skin['creepy_text_color'],
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'creepy_text_color',
	        array(
	            'label'      => __( 'Text Color', 'creepy' ),
	            'section'    => 'colors',
	            'settings'   => 'creepy_text_color',
	            'priority'	 => 25,
	        )
	    )
	);

	// link color
	$wp_customize->add_setting(
	    'creepy_link_color',
	    array(
	        'default'     => $active_skin['creepy_link_color'],
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'creepy_link_color',
	        array(
	            'label'      => __( 'Link Color', 'creepy' ),
	            'section'    => 'colors',
	            'settings'   => 'creepy_link_color',
	            'priority'	 => 26,
	        )
	    )
	);


	//link hover color
	$wp_customize->add_setting(
	    'creepy_link_hover_color',
	    array(
	        'default'     => $active_skin['creepy_link_hover_color'],
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'creepy_link_hover_color',
	        array(
	            'label'      => __( 'Link Color - Hover', 'creepy' ),
	            'section'    => 'colors',
	            'settings'   => 'creepy_link_hover_color',
	            'priority'	 => 27,
	        )
	    )
	);

	//footer bg color
	$wp_customize->add_setting(
	    'creepy_footer_bg_color',
	    array(
	        'default'     => $active_skin['creepy_footer_bg_color'],
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'creepy_footer_bg_color',
	        array(
	            'label'      => __( 'Footer Background Color', 'creepy' ),
	            'section'    => 'colors',
	            'settings'   => 'creepy_footer_bg_color',
	            'priority'	 => 28,
	        )
	    )
	);

	// footer text color
	$wp_customize->add_setting(
	    'creepy_footer_text_color',
	    array(
	        'default'     => $active_skin['creepy_footer_text_color'],
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'creepy_footer_text_color',
	        array(
	            'label'      => __( 'Footer Text Color', 'creepy' ),
	            'section'    => 'colors',
	            'settings'   => 'creepy_footer_text_color',
	            'priority'	 => 29,
	        )
	    )
	);

	/*
	DISPLAY OPTIONS
	*/
	$wp_customize->add_section(
	    'creepy_display_options', // ID of section
	    array(
	        'title'     => 'Display Options',
	        'priority'  => 200
	    )
	);

	$wp_customize->add_setting(
	    'creepy_display_slider',
	    array(
	        'default'    =>  'false',
	    )
	);

    $wp_customize->add_control(
	    'creepy_display_slider',
	    array(
	        'section'   => 'creepy_display_options',
	        'label'     => 'Display slider?',
	        'type'      => 'checkbox'
	    )
	);


	$wp_customize->add_setting(
	    'creepy_footer_copyright_text',
	    array(
	        'default'            => 'All Rights Reserved',
	        'sanitize_callback'  => 'creepy_sanitize_text'
	    )
	);
	$wp_customize->add_control(
	    'creepy_footer_copyright_text',
	    array(
	        'section'  => 'title_tagline',
	        'label'    => 'Copyright Message',
	        'type'     => 'text',
	        'priority' => 200,
	    )
	);
	/*** Sidebar ***/
	$wp_customize->add_setting(
	    'creepy_sidebar_position',
	    array(
	        'default'   => 'right'
	    )
	);
	 
	$wp_customize->add_control(
	    'creepy_sidebar_position',
	    array(
	        'section'  => 'creepy_display_options',
	        'label'    => 'Sidebar position',
	        'type'     => 'radio',
	        'choices'  => array(
	            'right'    => 'Right',
	            'left'   => 'Left'
	        )
	    )
	);
	/*** FOOTER WIDGETS ***/
	$wp_customize->add_setting(
	    'creepy_footer_widgets',
	    array(
	        'default'   => '3'
	    )
	);
	 
	$wp_customize->add_control(
	    'creepy_footer_widgets',
	    array(
	        'section'  => 'creepy_display_options',
	        'label'    => 'Widgets columns in FOOTER',
	        'type'     => 'radio',
	        'choices'  => array(
	        	'4'    => '4 [25% width each]',
	            '3'    => '3 [33% width each]',
	            '2'   => '2 [50% width each]',
	            '1' => '1 [100% width each]'
	        )
	    )
	);


	/**************
		SKINS
	***************/

	// get array for choices.
	// its just 'slug' => 'skinname'
	$skin_array = array();
	foreach ($skins as $skin) {
		$skin_array[ $skin['slug'] ] = $skin['skin'];
	}

	$wp_customize->add_section(
	    'creepy_skins_section', // ID of section
	    array(
	        'title'     => 'Skin',
	        'priority'  => 100
	    )
	);

	/*** Skins ***/


	$wp_customize->add_setting(
	    'creepy_skins',
	    array(
	        'default'   => 'dirt', 
	    )
	);
	 
	$wp_customize->add_control(
	    'creepy_skins',
	    array(
	        'section'  => 'creepy_skins_section',
	        'label'    => 'Select Your Theme Skin',
	        'type'     => 'radio',
	        'choices'  => $skin_array
	    )
	);

	// Set colours for skin

	$wp_customize->add_setting(
	    'set_skin_colours',
	    array(
	        'default'    =>  'false',
	    )
	);

    $wp_customize->add_control(
	    'set_skin_colours',
	    array(
	        'section'   => 'creepy_skins_section',
	        'label'     => 'Set skin colours? (Recommended) [Save settings and refresh page to activate.]',
	        'type'      => 'checkbox'
	    )
	);




	/*** advanced ***/
	$wp_customize->add_section(
    'creepy_advanced_options',
    array(
        'title'     => 'Advanced Options',
        'priority'  => 201
    ));

    /*** 
			FONTS SECTION
    ***/
	$wp_customize->add_section(
    'creepy_fonts',
    array(
        'title'     => 'Fonts options',
        'priority'  => 202
    ));

    	// number input, get it by echo get_theme_mod( 'creepy_h1_size');
		$wp_customize->add_setting( 'creepy_slider_font_size', array(
	    	'default'        => '32',

		) );
		 
		$wp_customize->add_control( new Creepy_Number_Control( $wp_customize, 'creepy_slider_font_size', array(
		    'label'   => 'Slider font size',
		    'section' => 'creepy_fonts',
		    'settings'   => 'creepy_slider_font_size',
		    'priority'  => 12
		) ) );

	    // number input, get it by echo get_theme_mod( 'creepy_h1_size');
		$wp_customize->add_setting( 'creepy_h1_size', array(
	    	'default'        => '30',

		) );
		 
		$wp_customize->add_control( new Creepy_Number_Control( $wp_customize, 'creepy_h1_size', array(
		    'label'   => 'Heading 1 size (number)',
		    'section' => 'creepy_fonts',
		    'settings'   => 'creepy_h1_size',
		    'priority'  => 5
		) ) );

		// number input, get it by echo get_theme_mod( 'creepy_h1_size');
		$wp_customize->add_setting( 'creepy_h2_size', array(
	    	'default'        => '26',
		) );
		 
		$wp_customize->add_control( new Creepy_Number_Control( $wp_customize, 'creepy_h2_size', array(
		    'label'   => 'Heading 2 size (number)',
		    'section' => 'creepy_fonts',
		    'settings'   => 'creepy_h2_size',
		    'priority'  => 6
		) ) );

		    // number input, get it by echo get_theme_mod( 'creepy_h1_size');
		$wp_customize->add_setting( 'creepy_h3_size', array(
	    	'default'        => '22',
		) );
		 
		$wp_customize->add_control( new Creepy_Number_Control( $wp_customize, 'creepy_h3_size', array(
		    'label'   => 'Heading 3 size (number)',
		    'section' => 'creepy_fonts',
		    'settings'   => 'creepy_h3_size',
		    'priority'  => 7
		) ) );

		// number input, get it by echo get_theme_mod( 'creepy_h1_size');
		$wp_customize->add_setting( 'creepy_h4_size', array(
	    	'default'        => '18',
		) );
		 
		$wp_customize->add_control( new Creepy_Number_Control( $wp_customize, 'creepy_h4_size', array(
		    'label'   => 'Heading 4 size (number)',
		    'section' => 'creepy_fonts',
		    'settings'   => 'creepy_h4_size',
		    'priority'  => 8
		) ) );
			// number input, get it by echo get_theme_mod( 'creepy_h1_size');
		$wp_customize->add_setting( 'creepy_h5_size', array(
	    	'default'        => '16',
		) );
		 
		$wp_customize->add_control( new Creepy_Number_Control( $wp_customize, 'creepy_h5_size', array(
		    'label'   => 'Heading 5 size (number)',
		    'section' => 'creepy_fonts',
		    'settings'   => 'creepy_h5_size',
		    'priority'  => 9
		) ) );
			// number input, get it by echo get_theme_mod( 'creepy_h1_size');
		$wp_customize->add_setting( 'creepy_h6_size', array(
	    	'default'        => '16',
		) );
		 
		$wp_customize->add_control( new Creepy_Number_Control( $wp_customize, 'creepy_h6_size', array(
		    'label'   => 'Heading 6 size (number)',
		    'section' => 'creepy_fonts',
		    'settings'   => 'creepy_h6_size',
		    'priority'  => 10
		) ) );

		// number input, get it by echo get_theme_mod( 'creepy_h1_size');
		$wp_customize->add_setting( 'creepy_text_size', array(
	    	'default'        => '13',
		) );
		 
		$wp_customize->add_control( new Creepy_Number_Control( $wp_customize, 'creepy_text_size', array(
		    'label'   => 'Text size (number)',
		    'section' => 'creepy_fonts',
		    'settings'   => 'creepy_text_size',
		    'priority'  => 11
		) ) );

			/*** FONTS ***/
		$wp_customize->add_setting(
	  	  'creepy_font',
		    array(
		        'default'   => $active_skin['creepy_font'],
		    )
		);
		$wp_customize->add_control(
		    'creepy_font',
		    array(
		        'section'  => 'creepy_fonts',
		        'label'    => 'Theme Font',
		        'type'     => 'select',
		        'priority'  => 1,
		        'choices'  => array(
		            'opensans'   => 'Open Sans',
		            'ptsans'   => 'PT Sans',
		            'roboto'   => 'Roboto',
		            'robotoslabs' => 'Roboto Slabs',
		            'times'     => 'Times New Roman',
		            'arial'     => 'Arial',
		            'courier'   => 'Courier New',
		        )
		    )
		);

		/*backgroun image stretch*/
   // Add full screen background option
   $wp_customize->add_setting( 'fullwidth-bg-image', array(
        'default' => 10,
        'type' => 'option'
    ) );
 
    // This will be hooked into the default background_image section
    $wp_customize->add_control( 'fullwidth-bg-image', array(
        'settings' => 'fullwidth-bg-image',
        'label'    => 'Full Screen Background',
        'section'  => 'background_image',
        'type'     => 'checkbox'
    ) );


}
add_action( 'customize_register', 'creepy_register_theme_customizer' );
