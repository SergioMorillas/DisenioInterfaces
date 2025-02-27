<?php
//about theme info
add_action( 'admin_menu', 'vw_logistics_shipping_gettingstarted' );
function vw_logistics_shipping_gettingstarted() {
	add_theme_page( esc_html__('About VW Logistics Shipping ', 'vw-logistics-shipping'), esc_html__('About VW Logistics Shipping', 'vw-logistics-shipping'), 'edit_theme_options', 'vw_logistics_shipping_guide', 'vw_logistics_shipping_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_logistics_shipping_admin_theme_style() {
	wp_enqueue_style('vw-logistics-shipping-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('vw-logistics-shipping-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_logistics_shipping_admin_theme_style');

//guidline for about theme
function vw_logistics_shipping_mostrar_guide() { 
	//custom function about theme customizer
	$vw_logistics_shipping_return = add_query_arg( array()) ;
	$vw_logistics_shipping_theme = wp_get_theme( 'vw-logistics-shipping' );
?>

<div class="wrapper-info">
    <div class="col-left sshot-section">
    	<h2><?php esc_html_e( 'Welcome to VW Logistics Shipping ', 'vw-logistics-shipping' ); ?> <span class="version"><?php esc_html_e( 'Version', 'vw-logistics-shipping' ); ?>: <?php echo esc_html($vw_logistics_shipping_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-logistics-shipping'); ?></p>
    </div>
    <div class="col-right coupen-section">
    	<div class="logo-section">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
		</div>
		<div class="logo-right">			
			<div class="update-now">
				<h4><?php esc_html_e('Try Premium ','vw-logistics-shipping'); ?></h4>
				<h4><?php esc_html_e('VW Logistics Shipping Theme','vw-logistics-shipping'); ?></h4>
				<h4 class="disc-text"><?php esc_html_e('at 20% Discount','vw-logistics-shipping'); ?></h4>
				<h4><?php esc_html_e('Use Coupon','vw-logistics-shipping'); ?> ( <span><?php esc_html_e('vwpro20','vw-logistics-shipping'); ?></span> ) </h4> 
				<div class="info-link">
					<a href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-logistics-shipping' ); ?></a>
				</div>
			</div>
		</div>   
		<div class="logo-img">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
    </div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="vw_logistics_shipping_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-logistics-shipping' ); ?></button>
			
			<button class="tablinks" onclick="vw_logistics_shipping_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-logistics-shipping' ); ?></button>
  			<button class="tablinks" onclick="vw_logistics_shipping_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free Vs Premium', 'vw-logistics-shipping' ); ?></button>
  			<button class="tablinks" onclick="vw_logistics_shipping_open_tab(event, 'get_bundle')"><?php esc_html_e( 'Get 250+ Themes Bundle at $99', 'vw-logistics-shipping' ); ?></button>
		</div>

		<?php 
			$vw_logistics_shipping_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_logistics_shipping_plugin_custom_css ='display: block';
			}
		?>

	

		<div id="lite_theme" class="tabcontent open">
			<?php  if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Logistics_Shipping_Plugin_Activation_Settings::get_instance();
				$vw_logistics_shipping_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-logistics-shipping-recommended-plugins">
				    <div class="vw-logistics-shipping-action-list">
				        <?php if ($vw_logistics_shipping_actions): foreach ($vw_logistics_shipping_actions as $key => $vw_logistics_shipping_actionValue): ?>
				                <div class="vw-logistics-shipping-action" id="<?php echo esc_attr($vw_logistics_shipping_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_logistics_shipping_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_logistics_shipping_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_logistics_shipping_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-logistics-shipping'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_logistics_shipping_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-logistics-shipping' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('VW Logistics Shipping is an impeccably designed digital template tailored to cater to the discerning needs of businesses operating within the realm of shipping and logistics. In essence, it serves as the virtual attire for your website, akin to selecting a finely tailored suit for a corporate presentation – it epitomizes sophistication and aids in conveying a poised message to your web audience. Visualize your website as a high-end boutique, and this theme is the meticulously crafted visual storefront. Whether you provide services like freight delivery, logistics storage, moving company,Shipping, Logistics, Freight, Supply Chain, Delivery, packaging,shipment,home shifting, house moving, local shipping, Moving Solutions, professional movers, relocation services, import export services, shipment tracking system, online tracking,transport company and delivery company you have one stop that is this theme. It boasts a polished and professional aesthetic replete with arresting imagery, an exquisite color palette, and thoughtfully structured layouts, ensuring that your visitors are instantaneously immersed in the essence of your shipping and logistics enterprise. This theme exhibits a user-centric disposition, guaranteeing that your clientele experiences seamless navigation without getting lost amidst a labyrinthine maze of menus, thereby facilitating a user-friendly interface. The theme offers an unparalleled degree of versatility, akin to a diversified wardrobe replete with options to suit any occasion. Its customizable nature ensures that it harmonizes effortlessly with the distinctive identity of your brand, providing a platform for the comprehensive presentation of services, pricing models, and the composition of your proficient team. Furthermore, it facilitates the seamless dissemination of pivotal updates, corporate news, and client testimonials, effectively mirroring the art of sharing your latest achievements with an audience of global proportions.','vw-logistics-shipping'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-logistics-shipping' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-logistics-shipping' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-logistics-shipping' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-logistics-shipping'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-logistics-shipping'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-logistics-shipping'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-logistics-shipping'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-logistics-shipping'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-logistics-shipping'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-logistics-shipping'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-logistics-shipping'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-logistics-shipping'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-logistics-shipping' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-logistics-shipping'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_logistics_shipping_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-logistics-shipping'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_logistics_shipping_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-logistics-shipping'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_logistics_shipping_about_us_section') ); ?>" target="_blank"><?php esc_html_e('About Section','vw-logistics-shipping'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-logistics-shipping'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-logistics-shipping'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_logistics_shipping_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-logistics-shipping'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_logistics_shipping_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-logistics-shipping'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-logistics-shipping'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-logistics-shipping'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-logistics-shipping'); ?></span><?php esc_html_e(' Go to ','vw-logistics-shipping'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-logistics-shipping'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-logistics-shipping'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-logistics-shipping'); ?></span><?php esc_html_e(' Go to ','vw-logistics-shipping'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-logistics-shipping'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-logistics-shipping'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','vw-logistics-shipping'); ?> <a class="doc-links" href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','vw-logistics-shipping'); ?></a></p>
			  	</div>
			</div>
		</div>

		
		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-logistics-shipping' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('The Shipping WordPress Theme is a top-tier digital template meticulously crafted for businesses in the shipping and logistics industry. It’s designed to serve as the cornerstone of a professional online presence, making it ideal for companies looking to distinguish themselves in a competitive market. The foremost benefit of opting for a premium theme lies in the enhanced set of features and functionalities it offers. These features are tailored to empower logistics companies by providing a more extensive toolkit to meet their digital needs. The Shipping WordPress Theme offers a broader range of customization options, enabling you to create a website that perfectly mirrors your brand’s identity. They come with advanced layouts, color schemes, and design elements to give your website a polished, sophisticated look that captivates your visitors. What truly sets the Shipping WordPress Theme apart are its advanced features and functionalities. These may include e-commerce integration for streamlined online transactions, enhanced SEO optimization to boost your site’s visibility on search engines, and top-notch performance enhancements for faster loading and smooth user experiences','vw-logistics-shipping'); ?></p>
		    	
		    </div>
		    <div class="col-right-pro">
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-logistics-shipping'); ?></a>
					<a href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-logistics-shipping'); ?></a>
					<a href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-logistics-shipping'); ?></a>
					<a href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get 250+ Themes Bundle at $99', 'vw-logistics-shipping'); ?></a>
				</div>
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-logistics-shipping' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-logistics-shipping'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-logistics-shipping'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-logistics-shipping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'vw-logistics-shipping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-logistics-shipping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'vw-logistics-shipping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-logistics-shipping'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-logistics-shipping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-logistics-shipping'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-logistics-shipping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Global Color Option', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Reordering', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Demo Importer', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Detailed Service Page', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Ordered Tracking', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('WordPress 6.4 or later', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('PHP 8.2 or 8.3', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'vw-logistics-shipping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-logistics-shipping'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">		  	
		   <div class="col-left-pro">
		   	<h3><?php esc_html_e( 'WP Theme Bundle', 'vw-logistics-shipping' ); ?></h3>
		    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 250+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','vw-logistics-shipping'); ?></p>
		    	<div class="feature">
		    		<h4><?php esc_html_e( 'Features:', 'vw-logistics-shipping' ); ?></h4>
		    		<p><?php esc_html_e('250+ Premium Themes & 5+ Plugins.', 'vw-logistics-shipping'); ?></p>
		    		<p><?php esc_html_e('Seamless Integration.', 'vw-logistics-shipping'); ?></p>
		    		<p><?php esc_html_e('Customization Flexibility.', 'vw-logistics-shipping'); ?></p>
		    		<p><?php esc_html_e('Regular Updates.', 'vw-logistics-shipping'); ?></p>
		    		<p><?php esc_html_e('Dedicated Support.', 'vw-logistics-shipping'); ?></p>
		    	</div>
		    	<p><?php esc_html_e('Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!', 'vw-logistics-shipping'); ?></p>
		    	<div class="pro-links">
					<a href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'vw-logistics-shipping'); ?></a>
					<a href="<?php echo esc_url( VW_LOGISTICS_SHIPPING_THEME_BUNDLE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'vw-logistics-shipping'); ?></a>
				</div>
		   </div>
		   <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/bundle.png" alt="" />
		   </div>		    
		</div>

	</div>
</div>

<?php } ?>