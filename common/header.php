<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>" class="<?php echo (get_theme_option('Style Sheet') ? get_theme_option('Style Sheet') : 'vertical'); ?>"> 
<head>
<title><?php echo option('site_title'); ?></title>
<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--Stylesheets-->
    		<?php
      			queue_css_file('style');
			echo head_css();
    		?>
<!-- JavaScripts -->
<?php // queue_js_file('prototype'); echo js('prototype'); ?> <!-- this is causing trouble in 2.0 for some reason --> 
<!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>
<!-- Load Google Font Stylesheet for Header--> 
<?php 
	if (get_theme_option('Heading Text Font') != NULL) {
		$headingTextFont=get_theme_option('Heading Text Font');  
		$googleLink="<link href='http://fonts.googleapis.com/css?family=".$headingTextFont."' rel='stylesheet' type='text/css'>";
		echo $googleLink;
	} 
?>
<!-- Load Google Font Stylesheet for Body--> 
<?php 
	if (get_theme_option('Body Text Font') != NULL) {
		$bodyTextFont=get_theme_option('Body Text Font');  
		$googleLink="<link href='http://fonts.googleapis.com/css?family=".$bodyTextFont."' rel='stylesheet' type='text/css'>";
		echo $googleLink;
	} 
?>
<!-- Load Google Font Stylesheet for Nav--> 
<?php 
	if (get_theme_option('Navigation Font') != NULL) {
		$navigationFont=get_theme_option('Navigation Font');  
		$googleLink="<link href='http://fonts.googleapis.com/css?family=".$navigationFont."' rel='stylesheet' type='text/css'>";
		echo $googleLink;
	} 
?>
<!--Get Variables for Navigation Colors to be Used in Custom Styles Below--> 
<?php 
	if (get_theme_option('Navigation Color One') != NULL) {
		$navColorOne=get_theme_option('Navigation Color One');
	} 
	if (get_theme_option('Navigation Color Two') != NULL) {
		$navColorTwo=get_theme_option('Navigation Color Two');
	} 
?>
<!-- Custom Styles --> 
<style type="text/css"> 
	body { 
		background-color: <?php echo get_theme_option('Background Color'); ?>;
		background-image: url('<?php echo elementaire_custom_background(); ?>');
	} 
	#wrap { 
		background-color: <?php echo get_theme_option('Page Background Color'); ?>;
	}
	#content { 
		<?php if (get_theme_option('Hide Dividers')) echo 'border-left: none;'; ?>
        }
	#header { 
		background-image: url('<?php echo elementaire_custom_header_background(); ?>');
	}
	#exhibit-nav { 
		font-family: <?php echo get_theme_option('Navigation Font'); ?>;
        }
	.horizontal .exhibit-section-nav li a { 
		background-color: <?php echo get_theme_option('Navigation Color One'); ?>;
		color: <?php echo get_theme_option('Navigation Color Two'); ?>;
	}
	.horizontal .exhibit-section-nav li.current a, .horizontal .exhibit-section-nav li a:hover { 
		background-color: <?php echo get_theme_option('Navigation Color Two'); ?>;
		color: <?php echo get_theme_option('Navigation Color One'); ?>;
	} 
	.horizontal .exhibit-page-nav li a { 
		background-color: <?php echo get_theme_option('Navigation Color One'); ?>;
		color: <?php echo get_theme_option('Navigation Color Two'); ?>;
	}	
	.horizontal .exhibit-page-nav li.current a, .horizontal .exhibit-page-nav li a:hover { 
		background-color: <?php echo get_theme_option('Navigation Color Two'); ?>;
		color: <?php echo get_theme_option('Navigation Color One'); ?>;
	} 
	.vertical a.exhibit-section-title, .vertical .exhibit-page-nav li a { 
		background-color: <?php echo get_theme_option('Navigation Color One'); ?>;
		color: <?php echo get_theme_option('Navigation Color Two'); ?>;
	} 
	.vertical .exhibit-page-nav li.current a, .vertical .exhibit-page-nav li a:hover, .vertical li.exhibit-nested-section.current a.exhibit-section-title, .vertical li.exhibit-nested-section a.exhibit-section-title:hover { 
		border-left-color: <?php echo get_theme_option('Navigation Color Two'); ?>; 
	}

	h1, h2, h3, h4, h5, h1 a, h1 a:visited { 
		color: <?php echo get_theme_option('Heading Color'); ?>;
		font-family: <?php echo get_theme_option('Heading Text Font'); ?>;			
	}
	h1 { 
		font-size: <?php echo get_theme_option('Heading Font Size'); ?>; 
	} 
	.exhibit-text, p { 
		color: <?php echo get_theme_option('Body Text Color'); ?>;
		font-family: <?php echo get_theme_option('Body Text Font'); ?>;
		font-size: <?php echo get_theme_option('Body Font Size'); ?>; 
	} 	
	#exhibit-sections { 
		<?php if ((int)get_theme_option('Display Exhibit Sections')==0) echo 'display: none;' ?> 
	}
	</style>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>

	<header>
	    <div id="headerContainer"> 
		    <div id="site-title">
			<?php echo link_to_home_page(theme_logo()); ?>
		    </div>
		    <div id="search-container">
			<?php echo search_form(array('show_advanced' => true)); ?>
		    </div>
		    <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            </div> <!-- end of headerContainer --> 
        </header>

<div id="wrap">

	<div id="header">
		<h5><a href="<?php // echo html_escape(uri('exhibits')); ?>">Back to Exhibits</a></h5>
		<div id="logo">
<!--disabling this because custom_display_logo() doesn't appear to work in 2.0--> 
<?php // echo link_to_home_page(custom_display_logo()); ?></div>
		<?php if ((int)get_theme_option('Hide Header Text')==1) { 
			$exhibitHeaderTextHTML= '<h1>&nbsp;&nbsp;</h1>'; // this is a placeholder so that the background image doesn't get cut off 
			echo $exhibitHeaderTextHTML;
		} else { 
			// disabling these for the moment
			//if($exhibit){$exhibitHeaderTextHTML= '<h1>'.exhibit_builder_link_to_exhibit($exhibit).'</h1>';} 
			//echo $exhibitHeaderTextHTML;
		}
		?> 
	</div> <!-- end of Header --> 
    <div id="exhibit-nav">
<!-- disabling this because of the new nav style for 2.0. Though unfortunately this will break nav styles --> 
	<?php // if (get_theme_option('Style Sheet')!="horizontal") { echo exhibit_builder_nested_nav($exhibit = null); // add $showallpages=TRUE as another argument	to get all pages } else { echo exhibit_builder_section_nav(); echo exhibit_builder_page_nav(); }?>
    </div>

        <nav class="top">
            <?php echo public_nav_main(); ?>
        </nav>

    <?php echo flash(); ?>				
