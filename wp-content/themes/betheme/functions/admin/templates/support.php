<?php
if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}
?>

<div id="mfn-dashboard" class="wrap about-wrap">

	<?php include_once get_theme_file_path('/functions/admin/templates/parts/header.php'); ?>

	<div class="dashboard-tab support">

		<div class="col col-left">

			<h3 class="primary"><?php esc_html_e( 'Video tutorials', 'mfn-opts' ); ?></h3>

			<ul class="videos">

				<li>
					<a class="lightbox" href="https://www.youtube.com/watch?v=Njz5XX2cGSI">
						<img src="<?php echo get_theme_file_uri('/functions/admin/assets/images/video.jpg'); ?>" alt="video" />
						<span class="desc">How to import pre-built websites</span>
					</a>
				</li>

				<li>
					<a class="lightbox" href="https://www.youtube.com/watch?v=k29jfkjae2o">
						<img src="<?php echo get_theme_file_uri('/functions/admin/assets/images/video.jpg'); ?>" alt="video" />
						<span class="desc">How to use Muffin Options</span>
					</a>
				</li>

				<li>
					<a class="lightbox" href="https://www.youtube.com/watch?v=8kAGSKVM3eo">
						<img src="<?php echo get_theme_file_uri('/functions/admin/assets/images/video.jpg'); ?>" alt="video" />
						<span class="desc">Muffin Builder Guided Tour</span>
					</a>
				</li>

				<li>
					<a class="lightbox" href="https://www.youtube.com/watch?v=u817Bn30UaY">
						<img src="<?php echo get_theme_file_uri('/functions/admin/assets/images/video.jpg'); ?>" alt="video" />
						<span class="desc">How to use Page Options</span>
					</a>
				</li>

				<li>
					<a class="lightbox" href="https://www.youtube.com/watch?v=bKJbY5crvTE">
						<img src="<?php echo get_theme_file_uri('/functions/admin/assets/images/video.jpg'); ?>" alt="video" />
						<span class="desc">Set up the Blog and Portfolio pages</span>
					</a>
				</li>

				<li>
					<a class="lightbox" href="https://www.youtube.com/watch?v=pa0eP-fKX24">
						<img src="<?php echo get_theme_file_uri('/functions/admin/assets/images/video.jpg'); ?>" alt="video" />
						<span class="desc">Widgets and the widgets section</span>
					</a>
				</li>

			</ul>

			<a class="mfn-button mfn-button-fw mb-30" target="_blank" href="https://www.youtube.com/user/MuffinGroup/videos">View more videos</a>

			<?php if( ! mfn_is_hosted() ): ?>

				<h3 class="primary"><?php esc_html_e( 'Support Center', 'mfn-opts' ); ?></h3>

				<h4>Item support includes:</h4>

				<ul class="forum">
					<li><span class="status yes dashicons dashicons-yes"></span>Responding to questions or problems regarding the item and its features</li>
					<li><span class="status yes dashicons dashicons-yes"></span>Fixing bugs and reported issues</li>
					<li><span class="status yes dashicons dashicons-yes"></span>Providing updates to ensure compatibility with new WordPress versions</li>
			    </ul>

				<h4>However, item support does not include:</h4>

				<ul class="forum">
					<li><span class="status no dashicons dashicons-no"></span>Customization and installation services</li>
					<li><span class="status no dashicons dashicons-no"></span>Support for third party software and plug-ins</li>
			    </ul>

			    <?php if( mfn_is_registered() ): ?>

			    	<a class="mfn-button mfn-button-fw" target="_blank" href="https://support.muffingroup.com/">Betheme Support Center</a>

			    <?php else: ?>

			    	<p>Please register this version of theme to get access to our Support Center.</p>
			    	<a class="mfn-button mfn-button-fw" href="admin.php?page=betheme">Register Betheme</a>

			    <?php endif; ?>

			<?php endif; ?>

		</div>

		<div class="col col-right">

			<h3><?php esc_html_e( 'Support Center', 'mfn-opts' ); ?></h3>

			<div class="manual">

				<div class="group">

					<h4><a target="_blank" href="https://support.muffingroup.com/documentation/installation-updates/">Getting started</a></h4>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/installation-updates/">Installation & Updates</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/pre-built-websites/">Pre-built websites</a></li>
					</ul>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/bundled-plugins/">Bundled plugins</a></li>
					</ul>

				</div>

				<div class="group">

					<h4><a target="_blank" href="https://support.muffingroup.com/documentation/page-creation/">Pages</a></h4>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/page-creation/">Page creation</a></li>
					</ul>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/page-options/">Page Options</a></li>
					</ul>

				</div>

				<div class="group">

					<h4><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-global/">Theme Options</a></h4>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-global/">Global</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-header-subheader/">Header & Subheader</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-menu-action-bar/">Menu & Action bar</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-sidebars/">Sidebars</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-blog-portfolio-shop/">Blog, Portfolio & Shop</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-pages/">Pages</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-footer/">Footer</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-responsive/">Responsive</a></li>
					</ul>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-seo/">SEO</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-social/">Social</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-addons-plugins/">Addons & Plugins</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-colors/">Colors</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-fonts/">Fonts</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-translate/">Translate</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-custom-css-js/">Custom CSS & JS</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/theme-options-backup-reset/">Backup & Reset</a></li>
					</ul>

				</div>

				<div class="group">

					<h4><a target="_blank" href="https://support.muffingroup.com/documentation/shortcodes/">Muffin Builder</a></h4>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/shortcodes/">Shortcodes</a></li>
					</ul>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/sections/">Sections & Wraps</a></li>
					</ul>

				</div>

				<div class="group">

					<h4><a target="_blank" href="https://support.muffingroup.com/documentation/blog-creation/">Blog</a></h4>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/blog-creation/">Creation</a></li>
					</ul>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/single-post-options/">Post Options</a></li>
					</ul>

				</div>

				<div class="group">

					<h4><a target="_blank" href="https://support.muffingroup.com/documentation/portfolio-creation/">Portfolio</a></h4>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/portfolio-creation/">Creation</a></li>
					</ul>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/single-portfolio-options/">Project Options</a></li>
					</ul>

				</div>

				<div class="group">

					<h4><a target="_blank" href="https://support.muffingroup.com/documentation/shop-creation/">Shop</a></h4>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/shop-creation/">Creation</a></li>
					</ul>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/single-product-options/">Product Options</a></li>
					</ul>

				</div>

				<div class="group">

					<h4><a target="_blank" href="https://support.muffingroup.com/documentation/footer/">Footer & Sidebars</a></h4>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/footer/">Footer</a></li>
					</ul>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/sidebars/">Sidebars</a></li>
					</ul>

				</div>

				<div class="group">

					<h4><a target="_blank" href="https://support.muffingroup.com/documentation/clients/">Custom post types</a></h4>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/clients/">Clients</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/offer/">Offer</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/slides/">Slides</a></li>
					</ul>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/testimonials/">Testimonials</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/templates/">Templates</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/layouts/">Layouts</a></li>
					</ul>

				</div>

				<div class="group">

					<h4><a target="_blank" href="https://support.muffingroup.com/documentation/menus/">Menus</a></h4>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/menus/">Menus</a></li>
					</ul>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/mega-menu/">Mega Menu</a></li>
					</ul>

				</div>

				<div class="group">

					<h4><a target="_blank" href="https://support.muffingroup.com/documentation/header-builder/">Extras</a></h4>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/header-builder/">Header Builder</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/supported-plugins/">Supported Plugins</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/static-css/">Static CSS</a></li>
					</ul>

					<ul>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/white-label/">White Label</a></li>
						<li><a target="_blank" href="https://support.muffingroup.com/documentation/translation/">Translation & WPML</a></li>
					</ul>

				</div>

			</div>

		</div>


	</div>

</div>
