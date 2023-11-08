<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://https://github.com/Alucard17th
 * @since      1.0.0
 *
 * @package    Inter_Depannage_Sync
 * @subpackage Inter_Depannage_Sync/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Inter_Depannage_Sync
 * @subpackage Inter_Depannage_Sync/public
 * @author     Noureddine Eddallal <eddallal.noureddine@gmail.com>
 */
class Inter_Depannage_Sync_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Inter_Depannage_Sync_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Inter_Depannage_Sync_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/inter-depannage-sync-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Inter_Depannage_Sync_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Inter_Depannage_Sync_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/inter-depannage-sync-public.js', array( 'jquery' ), $this->version, false );

	}

	public function register_shortcodes()
	{
		add_shortcode('dep-sync', 'get_articles_tempalte');

		function get_plans_tempalte(){
			
			return $output;
		}
		function get_articles_tempalte(){
			$output = "";
			$user_id = 49;
			$user_meta_fields = get_user_meta($user_id);
			// $user_meta_fields['votre_m_tier'][0];
			$output .= '<ul>';
			foreach ($user_meta_fields as $key => $value) {
				// $user_location = [
				// 	$key => $value
				// ]
				$output .= '<li><strong>' . $key . ':</strong> ' . implode(', ', $value) . '</li>';
			}
			$output .= '</ul>';
			
			$output .= '_________________________________________________________<br>';

			// Get all custom fields (post meta fields)
			$post_id = 1246;
			$post_meta_fields = get_post_meta($post_id);

			// Output the custom fields
			$output .= '<h3>Custom Fields for ' . get_the_title($post_id) . '</h3>';
			$output .= '<ul>';
			foreach ($post_meta_fields as $key => $value) {
				$output .= '<li><strong>' . $key . ':</strong> ' . implode(', ', $value) . '</li>';
			}
			$output .= '</ul>';

			$output .= '<h3>Listing Type: ' . $post_meta_fields['_case27_listing_type'][0] . '</h3>';

			$output .= '_________________________________________________________<br>';

			// Convert French characters to normal form
			$annonce_job_type = iconv('UTF-8', 'ASCII//TRANSLIT', $post_meta_fields['_case27_listing_type'][0]);
			// Remove non-alphanumeric characters
			$annonce_job_type = preg_replace('/[^A-Za-z0-9]/', '', $annonce_job_type);
			// Convert to lowercase
			$annonce_job_type = strtolower($annonce_job_type);

			// Convert French characters to normal form
			$user_job = iconv('UTF-8', 'ASCII//TRANSLIT', $user_meta_fields['votre_m_tier'][0]);
			// Remove non-alphanumeric characters
			$user_job =  preg_replace('/[^A-Za-z0-9]/', '', $user_job);
			// Convert to lowercase
			$user_job = strtolower($user_job);
			
			if($user_job == $annonce_job_type ){
				$output .= 'Does Match => User Job: '.$user_job.' and Annonce Job: '.$annonce_job_type.'<br>';
			} else{
				$output .= 'Does Not Match => User Job: '.$user_job.' and Annonce Job: '.$annonce_job_type.'<br>';
			}

			$output .= '_________________________________________________________<br>';

			if ( function_exists( 'pmpro_hasMembershipLevel' ) ) {
				$user_id = get_current_user_id();
				if ($user_id && pmpro_hasMembershipLevel()) {
					// Get the user's membership level
					$user_membership_level_id = pmpro_getMembershipLevelForUser( $user_id )->ID;
					// Get the user's membership level name
					$user_membership_level_name = pmpro_getMembershipLevelForUser( $user_id )->name;
					// Get the user's membership level description
					$user_membership_level_description = pmpro_getMembershipLevelForUser( $user_id )->description;
					// Get tje user's usage count
					$pmpro_user_usage_count = get_user_meta($user_id, 'pmpro_user_usage_count', true);
					// Get if the user already commented on a post 
					get_user_meta($user_id, 'already_commented_posts', true);
					$plan_usage_count = get_option('pmpro_plan_usage_count_' . $user_membership_level_id);
					$output .= 'User Membership ID: '.$user_membership_level_id.'<br>';
					$output .= 'User Membership Name: '.$user_membership_level_name.'<br>';
					$output .= 'User Membership Description: '.$user_membership_level_description.'<br>';
					$output .= 'Plan Usage Count: '.$plan_usage_count.'<br>';
					$output .= 'User Usage Count: '.$pmpro_user_usage_count.'<br>';

					$output .= 'Is Subscribed: '.pmpro_hasMembershipLevel();

					
				} else {
					// No user is logged in, and $current_user_id is 0.
					echo 'No user is logged in.';
				}
				
			}

			return $output;
		}
	}

	public function restrict_comments_to_user_for_custom_post_type($comments, $query) {
		if (is_user_logged_in() && is_singular('job_listing')) {
			// Get the current user ID
			$current_user_id = get_current_user_id();
	
			// Get all top-level comments for the current user
			$top_level_comments = get_comments(array(
				'post_id' => get_the_ID(),
				'user_id' => $current_user_id,
				'parent' => 0,
			));
	
			if(isset($top_level_comments[0]->comment_ID)){
				$child_comments = get_comments(array(
					'post_id' => get_the_ID(),
					// 'user_id' => $current_user_id,
					'parent ' => $top_level_comments[0]->comment_ID,
				));
				// Combine top-level comments and their responses
				$comments = array_merge($child_comments);
			}else{
				$comments = array();
			}
			
		} else {
			// If user is not logged in or not viewing the custom post type, prevent any comments from being displayed
			$comments = array();
		}
	
		return $comments;
	}

	
	public function my_custom_membership_level_field($the_level) {
		// Get the value of the custom field if it already exists
		$custom_field_value = get_option('pmpro_plan_usage_count_' . $the_level->id);
	
		// Output the custom field HTML
		?>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="pmpro_custom_field"><?php _e('Nombre d\'annonce autorisées', 'pmpro'); ?></label>
			</th>
			<td>
				<input type="text" id="pmpro_custom_field" name="pmpro_custom_field" value="<?php echo esc_attr($custom_field_value); ?>">
				<p class="description"><?php _e('Nombre de propositions autorisées pour ce plan.', 'pmpro'); ?></p>
			</td>
		</tr>
		<?php
	}
	
	public function my_save_custom_membership_level_field($level_id) {
		// Check if the custom field value was submitted
		if (isset($_REQUEST['pmpro_custom_field'])) {
			// Sanitize and save the custom field value
			$custom_field_value = sanitize_text_field($_REQUEST['pmpro_custom_field']);
			update_option('pmpro_plan_usage_count_' . $level_id, $custom_field_value);
		}
	}

	public function detect_membership_restarted_action($user_id) {
		// $user_membership_level = pmpro_getMembershipLevelForUser($user_id);
		// $membership_level_name = $user_membership_level->name;
		// $membership_level_expiry = $user_membership_level->enddate;
		
		if (pmpro_hasMembershipLevel($user_id)) {
			$user_membership_id = pmpro_getMembershipLevelForUser( $user_id )->ID;
			
			if($user_membership_id) {
				$user_usage_count = get_option('pmpro_plan_usage_count_' . $user_membership_id);
				update_user_meta($user_id, 'pmpro_user_usage_count', $user_usage_count);
			}
		}
	}
	
	public function detect_comment_added_action($comment_id, $comment_approved, $comment_data) {
		 // Check if the comment is approved and the post type is 'job_listing'
		 if ($comment_approved == 1 && get_post_type($comment_data['comment_post_ID']) == 'job_listing') {
			$user_id = $comment_data['user_id'];
			$post_id = $comment_data['comment_post_ID'];
	
			// Check if the user has already commented on any job_listing post
			$already_commented_posts = get_user_meta($user_id, 'already_commented_posts', true);
	
			if (!$already_commented_posts) {
				$already_commented_posts = array();
			}
	
			if (!in_array($post_id, $already_commented_posts)) {
				// User is commenting for the first time on this post, do something
	
				// Add the post ID to the 'already_commented_posts' array
				$already_commented_posts[] = $post_id;
				update_user_meta($user_id, 'already_commented_posts', $already_commented_posts);

				$user_usage_count = get_user_meta($user_id, 'pmpro_user_usage_count', true);
				if($user_usage_count > 0){
					$new_user_usage_count = get_user_meta($user_id, 'pmpro_user_usage_count', true) - 1;
					update_user_meta($user_id, 'pmpro_user_usage_count', $new_user_usage_count);
				}
			}
		}
	}

	public function my_custom_js_to_hide_button() {
			$js = '';
			$user_id = get_current_user_id();
			if ($user_id && pmpro_hasMembershipLevel()) {
				// Get the user's membership level
				$user_membership_level_id = pmpro_getMembershipLevelForUser( $user_id )->ID;
				// Get the user's membership level name
				$user_membership_level_name = pmpro_getMembershipLevelForUser( $user_id )->name;
				// Get the user's membership level description
				$user_membership_level_description = pmpro_getMembershipLevelForUser( $user_id )->description;


				$user_usage_count = get_user_meta($user_id, 'pmpro_user_usage_count', true);
				if($user_usage_count <= 0){
					$js = "<script>
						document.addEventListener('DOMContentLoaded', function() {
							var leaveReviewButton = document.querySelector('#listing_tab_deposer-une-offre > div > div > div > div.col-md-5 > div > div > div.pf-body > div > form > button');
							if (leaveReviewButton) {
								leaveReviewButton.style.display = 'none';
								var spanText = document.createElement('span');
								spanText.textContent = 'Crédits insuffisants';
								leaveReviewButton.parentNode.replaceChild(spanText, leaveReviewButton);
							}
						})
					</script>";
				}
				echo $js;

			} else {
				// The URL path of the page
				$page_url_path = 'compte-dadherent/niveaux-dadhesion/';

				// Get the page object by its URL path
				$page = get_page_by_path($page_url_path);

				// Check if the page object is found and not empty
				if ($page) {
					// Get the permalink of the page
					$page_permalink = get_permalink($page->ID);
				}

				// JavaScript code to hide the button based on the user's membership status.
				$js = "<script>
					document.addEventListener('DOMContentLoaded', function() {
						var ctsOpenChatButtons = document.querySelectorAll('.cts-open-chat');
						if (ctsOpenChatButtons) {
							for (var i = 0; i < ctsOpenChatButtons.length; i++) {
								ctsOpenChatButtons[i].style.display = 'none';
							}
						}
						var toggleComments = document.querySelector('.toggle-tab-type-comments');
						if (toggleComments) {
							toggleComments.style.display = 'none';
						}
						var showReviewButtons = document.querySelectorAll('.show-review-form');
						if (showReviewButtons) {
							for (var i = 0; i < showReviewButtons.length; i++) {
								showReviewButtons[i].style.display = 'none';
							}
							var spanText = document.createElement('span');
							spanText.setAttribute('id', 'custom_abnvs_span_id');
							spanText.textContent = 'Aucun abonnement ';
							if(showReviewButtons[0]){
								showReviewButtons[0].parentNode.replaceChild(spanText, showReviewButtons[0]);
							}
							var anchorTag = document.createElement('a');
							anchorTag.setAttribute('id', 'custom_abnvs_anchor_id');
							anchorTag.classList.add('buttons', 'button-2');
							anchorTag.setAttribute('href', '%PAGE_PERMALINK%');
							anchorTag.textContent = 'Abonnez-vous';
							spanText.appendChild(anchorTag);
						}
					});
				</script>";
				
		}
		// get current wordpress user 
		$current_user = wp_get_current_user();
		// get current user role
		$current_user_role = $current_user->roles[0];

		if ($current_user_role == 'customer') {
			// append to $js 
			$js .= "<script>
				document.addEventListener('DOMContentLoaded', function() {
					var spanElement = document.querySelector('#custom_abnvs_span_id');
					if(spanElement){
						spanElement.parentNode.removeChild(spanElement);
					}

					var registerAsPro = document.querySelector('#c27-site-wrapper > div.elementor.elementor-390 > section.elementor-section.elementor-top-section.elementor-element.elementor-element-2woam06.elementor-section-height-min-height.elementor-section-content-middle.elementor-section-boxed.elementor-section-height-default.elementor-section-items-middle > div.elementor-container.elementor-column-gap-no > div > div > div.elementor-element.elementor-element-d157dad.elementor-widget__width-auto.elementor-widget.elementor-widget-heading')
					var registerAsProArrow = document.querySelector('#c27-site-wrapper > div.elementor.elementor-390 > section.elementor-section.elementor-top-section.elementor-element.elementor-element-2woam06.elementor-section-height-min-height.elementor-section-content-middle.elementor-section-boxed.elementor-section-height-default.elementor-section-items-middle > div.elementor-container.elementor-column-gap-no > div > div > div.elementor-element.elementor-element-f0f192f.elementor-widget__width-auto.elementor-view-default.elementor-widget.elementor-widget-icon')
					var dashboardMesAnnoncesTab = document.querySelector('#c27-site-wrapper > div.woocommerce > div > nav > ul > li.menu-item.menu-item-type-custom.menu-item-object-custom.menu-item-195')
					if(registerAsPro){registerAsPro.style.display='none'}
					if(registerAsProArrow){registerAsProArrow.style.display='none'}

					
				})
			</script>";
		}else if($current_user_role == 'customer_alt'){
			$js .= "<script>
					var registerAsPro = document.querySelector('#c27-site-wrapper > div.elementor.elementor-390 > section.elementor-section.elementor-top-section.elementor-element.elementor-element-2woam06.elementor-section-height-min-height.elementor-section-content-middle.elementor-section-boxed.elementor-section-height-default.elementor-section-items-middle > div.elementor-container.elementor-column-gap-no > div > div > div.elementor-element.elementor-element-d157dad.elementor-widget__width-auto.elementor-widget.elementor-widget-heading')
					var registerAsProArrow = document.querySelector('#c27-site-wrapper > div.elementor.elementor-390 > section.elementor-section.elementor-top-section.elementor-element.elementor-element-2woam06.elementor-section-height-min-height.elementor-section-content-middle.elementor-section-boxed.elementor-section-height-default.elementor-section-items-middle > div.elementor-container.elementor-column-gap-no > div > div > div.elementor-element.elementor-element-f0f192f.elementor-widget__width-auto.elementor-view-default.elementor-widget.elementor-widget-icon')
					var dashboardMesAnnoncesTab = document.querySelector('#c27-site-wrapper > div.woocommerce > div > nav > ul > li.menu-item.menu-item-type-custom.menu-item-object-custom.menu-item-195')
					if(registerAsPro){registerAsPro.style.display='none'}
					if(registerAsProArrow){registerAsProArrow.style.display='none'}
					if(dashboardMesAnnoncesTab){dashboardMesAnnoncesTab.style.display='none'}
					
					console.log('customer_alt')
					
			</script>";

			$js .= '<script>
				var callToActionHeader = document.querySelector("#c27-site-wrapper > div.elementor.elementor-390 > section.elementor-section.elementor-top-section.elementor-element.elementor-element-2woam06.elementor-section-height-min-height.elementor-section-content-middle.elementor-section-boxed.elementor-section-height-default.elementor-section-items-middle > div.elementor-container.elementor-column-gap-no > div > div > div.elementor-element.elementor-element-36c89a1.elementor-widget.elementor-widget-eael-creative-button > div > div > a")
				if(callToActionHeader){callToActionHeader.style.display="none"}
				console.log("I m So BLIND")
			</script>';

			$js .= '<script>
				const section = document.querySelectorAll(".ekit-image-box");

				
				section.forEach(link => {
					const anchorLink = link.querySelector("a");
					anchorLink.addEventListener("click", function (event) {
						event.preventDefault(); // Prevent the default click behavior
						console.log("Clicked");
					});
				});
			</script>';
		}


		if (is_user_logged_in()) {
			$js .= "<script>
					var loginRegisterFooterMenu = document.querySelector('#xs_footer_13 > div > div.elementor-column.elementor-col-50.elementor-top-column.elementor-element.elementor-element-3b697dc0 > div > section > div > div.elementor-column.elementor-col-50.elementor-inner-column.elementor-element.elementor-element-e084cf > div > div > div > div > div > div:nth-child(4)')
					if(loginRegisterFooterMenu){loginRegisterFooterMenu.style.display='none'}
				</script>";
		}

		$js.= "<script>
			var seeProfilLink = document.querySelector('#c27-single-listing > section > div.main-info-desktop > div > div:nth-child(1) > div > a')
			if (seeProfilLink) {
				// Get the current href attribute
				var currentHref = seeProfilLink.getAttribute('href');
				
				// Replace spaces with underscores after /members/
				var newHref = currentHref.replace(/\/members\//g, '/members/').replace(/ /g, '-');
				
				// Set the updated href attribute
				seeProfilLink.setAttribute('href', newHref);
			}
		</script>";



		
		$js_with_permalink = str_replace('%PAGE_PERMALINK%', $page_permalink, $js);


		echo $js_with_permalink;
	}

	public function restart_user_count(){
		// Add your custom function to the "pmpro_after_checkout" hook
		// add_action('pmpro_after_checkout', 'my_custom_membership_restarted_action');

		function my_custom_membership_restarted_action($user_id) {
			// Perform your custom action here
			// You can use the $user_id parameter to identify the user whose membership has been restarted
			// Example:
			// $user_membership_level = pmpro_getMembershipLevelForUser($user_id);
			// $membership_level_name = $user_membership_level->name;
			// $membership_level_expiry = $user_membership_level->enddate;

			// Do something with the membership data or send notifications, etc.
			if (pmpro_hasMembershipLevel($user_id)) {
				// Update or create the custom user meta field
				update_user_meta($user_id, 'pmpro_user_usage_count', 15);
			}
		}
	}

	public 	function is_location_within_radius($lat1, $lon1, $lat2, $lon2, $radius_km) {
		// Radius of the Earth in km
		$earth_radius_km = 6371;
	
		// Convert latitude and longitude from degrees to radians
		$lat1_rad = deg2rad($lat1);
		$lon1_rad = deg2rad($lon1);
		$lat2_rad = deg2rad($lat2);
		$lon2_rad = deg2rad($lon2);
	
		// Calculate the differences between latitudes and longitudes
		$delta_lat = $lat2_rad - $lat1_rad;
		$delta_lon = $lon2_rad - $lon1_rad;
	
		// Calculate the distance using the Haversine formula
		$a = sin($delta_lat / 2) * sin($delta_lat / 2) +
			 cos($lat1_rad) * cos($lat2_rad) *
			 sin($delta_lon / 2) * sin($delta_lon / 2);
		$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
		$distance_km = $earth_radius_km * $c;
	
		// Check if the distance is within the specified radius
		return $distance_km <= $radius_km;
	}

	public function get_lnglat_location($location) {
		$curl = curl_init();
	
		$url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($location) . '&key=AIzaSyBNvLfW1iJMSN_A0G9K8ml5-WYqzvI1pew';
	
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
		));
	
		$response = curl_exec($curl);
	
		curl_close($curl);
	
		return $response;
	}

	public function get_users_locations(){
		$all_users = get_users();

		$all_users_array = [];
		// Loop through the users and access their information
		foreach ($all_users as $user) {
			$user_id = $user->ID;
			$user_login = $user->user_login;
			$user_email = $user->user_email;
			
			$user_meta_fields = get_user_meta($user_id);
			$user_rayon = isset($user_meta_fields['rayon_d_intervention'][0]) ? $user_meta_fields['rayon_d_intervention'][0] : '';
			$user_job = isset($user_meta_fields['votre_m_tier'][0]) ? $user_meta_fields['votre_m_tier'][0] : '';
			$user_address = isset($user_meta_fields['addresse'][0]) ? $user_meta_fields['addresse'][0] : '';

			if(!empty($user_meta_fields['addresse'][0])){
				$user_formatted_address = unserialize($user_meta_fields['addresse'][0]);
				$street_address = $user_formatted_address['street_address'];
				$city_name = $user_formatted_address['city_name'];
				$zip = $user_formatted_address['zip'];
				$country = $user_formatted_address['country_select'];
				$state = $user_formatted_address['state'];

				// Create the formatted address
				$user_formatted_address = "$street_address, $city_name, $zip, $state, $country";
				// Get user location from the API
				$user_location_from_api = $this->get_lnglat_location($user_formatted_address);

				// Now, you can process $user_location_from_api to get latitude and longitude
				$location_data = json_decode($user_location_from_api, true);

				// echo "User ID: $user_id, Username: $user_login, Email: $user_email, Job: $user_job, Address: $user_formatted_address<br>";
				if ($location_data && isset($location_data['results'][0]['geometry']['location'])) {
					$user_latitude = $location_data['results'][0]['geometry']['location']['lat'];
					$user_longitude = $location_data['results'][0]['geometry']['location']['lng'];
					
					$all_users_array[] = [
						'user_id' => $user_id,
						'user_lat' => $user_latitude,
						'user_lng' => $user_longitude,
						'user_rayon' => $user_rayon,
						'user_job' => $user_job,
						'user_email' => $user_email
					];
				}
				
			}else{
				// echo "User ID: $user_id, Username: $user_login, Email: $user_email, Job: $user_job, Address: $user_address<br>";
			}
		}

		return $all_users_array;
	}

	public function send_email_on_listing_creation($post_id, $post, $update) {
		// Check if the post type is 'job_listing'
		if ($post->post_type === 'job_listing') {
			
			// Get the post title
			$post_title = get_the_title($post_id);

			// GET ANNONCE LOCATION AND TYPE
			$annonce_job_type = '';
			$post_meta_fields = get_post_meta($post_id);
			
			if (!empty($post_meta_fields['_case27_listing_type'][0])) {
				$annonce_job_type = $post_meta_fields['_case27_listing_type'][0];
			}

			global $wpdb;
			$table_name = $wpdb->prefix . 'mylisting_locations';
			$query = $wpdb->prepare(
				"SELECT * FROM $table_name WHERE listing_id = %d",
				$post_id
			);

			// // Run the query
			$locations = $wpdb->get_results($query);
			// Check if there are any locations found
			if ($locations) {
				$annonce_lat = $locations[0]->lat;
				$annonce_lng = $locations[0]->lng;
				$annonce_address = $locations[0]->address;
			}else{
				$annonce_lat = 0;
				$annonce_lng = 0;
				$annonce_address = '';
			}

			
			// Email subject and content
			$subject = 'Annonce de nouvel emploi créée';
			// $message = "A new job listing has been created:\n\nTitle: $post_title\n\nEdit the job listing: " . get_permalink($post_id). "\n\nLocation: $annonce_lat, $annonce_lng\n\n";
			 
			$user_coordinates = $this->get_users_locations();
			foreach($user_coordinates as $location){

				if ($this->is_location_within_radius($location['user_lat'], $location['user_lng'], $annonce_lat, $annonce_lng, $location['user_rayon'])) {
					
					if(isset($location['user_job']) && isset($annonce_job_type)){
						
						// Convert French characters to normal form
						$annonce_job_type = iconv('UTF-8', 'ASCII//TRANSLIT', $annonce_job_type);
						// Remove non-alphanumeric characters
						$annonce_job_type = preg_replace('/[^A-Za-z0-9]/', '', $annonce_job_type);
						// Convert to lowercase
						$annonce_job_type = strtolower($annonce_job_type);

						// Convert French characters to normal form
						$user_job = iconv('UTF-8', 'ASCII//TRANSLIT', $location['user_job']);
						// Remove non-alphanumeric characters
						$user_job =  preg_replace('/[^A-Za-z0-9]/', '', $user_job);
						// Convert to lowercase
						$user_job = strtolower($user_job);

						// Send the email to the user if the annonce job type matches the user job type
						if($user_job == $annonce_job_type ){
							$formattedJobType = $post_meta_fields['_case27_listing_type'][0];
							$website_name = get_bloginfo('name');
							$message = "<html>
							<head>
								<style>
								body {
									font-family: Arial, sans-serif;
								  }
								  .logo-img{
									width:75px !important;
									height:75px !important;
								  }
								  .hello {
									font-weight: bold !important;
								  }
								  .msg-container{
									border-radius: 5px !important;
									box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;
								  }
								  .project-title{
									font-weight:bold !important;
									font-size:18px !important;
									color:#191b36 !important;
								  }
								  .project-info-list{
									list-style-type: square !important;
								  }
								  .footer{
									margin-top:40px !important;
									background-color: #f0f0f0 !important;
									text-align: center !important;
									padding: 20px !important;
								  }
								  .cta-btn{
									background-color:#191b36 !important;
									padding:25px !important;
									color:#fff !important;
									text-decoration:none !important;
									display: inline-block !important;
									border-radius: 50px !important;
								  }
								  .logo-title{
									color:#191b36 !important;
									font-family: 'Poppins', Sans-serif;
									font-size:28px;
									font-weight:600;
								  }
								</style>
							</head>
							<body>
							<h1 class='logo-title'>$website_name</h1>
							<div class='msg-container'>
							  <div class='header'>
								<p class='hello'>Bonjour,</p>
								<p class='message'>Nous avons un nouveau projet pour vous.</p>
							  </div>
							  <div class='body'>
								<p class='project-title'>$post_title</p>
								<ul class='project-info-list'>
								  <li>
									Type : $formattedJobType
								  </li>
								  <li>
									<p class='project-address'>Address : $annonce_address</p>
								  </li>
								</ul>
							  </div>
							  <div class='footer'>
								<a class='cta-btn' href='" . get_permalink($post_id) . "'>Voir plus de détails</a>
							  </div>
							</div>
						  
							</body>
							</html>";
							wp_mail($location['user_email'], $subject, $message);
							// wp_mail('eddallal.noureddine@gmail.com', $subject, $message);
						} 
					}
				}else{
					// $message .= "<li>The User: ".$location['user_id']." with Radius ".$location['user_rayon']." is NOT within the original location.</li>";
					// echo "<li>".$location['user_email']."The User: ".$location['user_id']." with Radius ".$location['user_rayon']." is NOT within the original location. Annonce Latitude is ".$annonce_lat." and Annonce Longitude is ".$annonce_lng."; And Annonce Type is ".$annonce_job_type."</li>";
				}
				// $message .= '<br>User ID:' .$location['user_id'].', Latitude:' .$location['user_lat'] . ' Longitude:' .$location['user_lng'];
			}

		}
	}
	

	function cssigniter_add_account_details() {
		$user = wp_get_current_user();
		$user_meta = get_user_meta($user->id);
		$metier = get_user_meta($user->id, 'votre_m_tier', true);
		$rayon_d_intervention = get_user_meta($user->id, 'rayon_d_intervention', true);
		$address = get_user_meta($user->id, 'addresse', true); 
		
		// foreach ($user_meta as $key => $value) {
		// 	echo "Meta Key: " . $key . ", Meta Value: " . implode(", ", $value) . "<br>";
		// }

		$image_path = get_user_meta($user->id, 'user_avatar_path', true);
		$image_url = '/wp-content/uploads/' . $image_path 
		
		?>
		<h4>Détails: </h4>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="image"><?php esc_html_e( 'Image de Profile', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<img src="<?php echo esc_url($image_url); ?>" alt="Image Alt Text"style=" width: 75px; height: 75px; border-radius: 50%; object-fit: cover; border: 2px solid #c0c4cc;">
			<input type="file" class="woocommerce-Input" name="user_avatar" accept="image/x-png,image/gif,image/jpeg">
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="dob"><?php esc_html_e( 'Métier', 'your-text-domain' ); ?></label>
			<select class="wpuf_votre_m_tier_871" id="votre_m_tier_871" name="votre_m_tier" data-required="yes" data-type="select">
				<option value="plombiers" <?php echo ($metier === 'plombiers') ? 'selected' : ''; ?>>Plombier</option>
				<option value="serruriers" <?php echo ($metier === 'serruriers') ? 'selected' : ''; ?>>Serruriers</option>
				<option value="vitrier" <?php echo ($metier === 'vitrier') ? 'selected' : ''; ?>>Vitrier</option>
				<option value="electriciens" <?php echo ($metier === 'electriciens') ? 'selected' : ''; ?>>Électricien</option>
				<option value="peintre" <?php echo ($metier === 'peintre') ? 'selected' : ''; ?>>Peintre</option>
				<option value="carreleur" <?php echo ($metier === 'carreleur') ? 'selected' : ''; ?>>Carreleur</option>
				<option value="mecanicien" <?php echo ($metier === 'mecanicien') ? 'selected' : ''; ?>>Mécanicien</option>
				<option value="vtc" <?php echo ($metier === 'vtc') ? 'selected' : ''; ?>>VTC</option>
				<option value="nounou" <?php echo ($metier === 'nounou') ? 'selected' : ''; ?>>Nounou</option>
				<option value="coiffeur-a-domicile" <?php echo ($metier === 'coiffeur-a-domicile') ? 'selected' : ''; ?>>Coiffeur à domicile</option>
				<option value="femme-de-menage" <?php echo ($metier === 'femme-de-menage') ? 'selected' : ''; ?>>Femme de ménage</option>
				<option value="paysagiste" <?php echo ($metier === 'paysagiste') ? 'selected' : ''; ?>>Paysagiste</option>
				<option value="depanneuse" <?php echo ($metier === 'depanneuse') ? 'selected' : ''; ?>>Dépanneuse</option>
				<option value="developpement-web" <?php echo ($metier === 'developpement-web') ? 'selected' : ''; ?>>Développement web</option>
			</select>
		</p>

		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="dob"><?php esc_html_e( 'Rayon d\'intervention', 'your-text-domain' ); ?></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="rayon_d_intervention" id="rayon_d_intervention" value="<?php echo $rayon_d_intervention;?>" />
		</p>
		<?php
		if (is_array($address)) {
			// Access and display individual components
			$street_address = isset($address['street_address']) ? $address['street_address'] : '';
			$city_name = isset($address['city_name']) ? $address['city_name'] : '';
			$zip = isset($address['zip']) ? $address['zip'] : '';
			$country_select = isset($address['country_select']) ? $address['country_select'] : '';
			$state = isset($address['state']) ? $address['state'] : '';
		
			// Display the data in separate input fields
			echo '<h4>Adresse: </h4>';
			echo '<div class="front_address_container" style="display: grid;grid-template-columns: 1fr 1fr;grid-gap: 10px;">';
			echo 'Addresse: <input type="text" name="street_address" value="' . esc_attr($street_address) . '"><br>';
			echo 'Ville: <input type="text" name="city_name" value="' . esc_attr($city_name) . '"><br>';
			echo 'Code postal: <input type="text" name="zip" value="' . esc_attr($zip) . '"><br>';
			echo 'Pays: <input type="hidden" name="country_select" value="' . esc_attr($country_select) . '"><br>';
			echo 'Etat: <input type="text" name="state" value="' . esc_attr($state) . '"><br>';
			echo '</div>';
		}
	}

	function cssigniter_save_account_details( $user_id ) {
		if ( isset( $_POST['votre_m_tier'] ) ) {
			update_user_meta( $user_id, 'votre_m_tier', sanitize_text_field( $_POST['votre_m_tier'] ) );
		}
		if ( isset( $_POST['rayon_d_intervention'] ) ) {
			update_user_meta( $user_id, 'rayon_d_intervention', sanitize_text_field( $_POST['rayon_d_intervention'] ) );
		}

		// Handle avatar upload
		if (isset($_FILES['user_avatar']) ) {
			$upload_dir = wp_upload_dir(); // Get the WordPress uploads directory
			$file_name = $_FILES['user_avatar']['name'];
			$file_tmp = $_FILES['user_avatar']['tmp_name'];
			$file_path = $upload_dir['path'] . '/' . $file_name;
	
			// Move the uploaded file to the uploads directory
			move_uploaded_file($file_tmp, $file_path);

			$position = strpos($file_path, 'wp-content/uploads/');
			$relative_path = substr($file_path, $position + strlen('wp-content/uploads/'));
	
			// Update user meta with the image path
			update_user_meta($user_id, 'user_avatar_path', $relative_path);
		}

		$address_data = array(
			'street_address' => sanitize_text_field($_POST['street_address']),
			'city_name' => sanitize_text_field($_POST['city_name']),
			'zip' => sanitize_text_field($_POST['zip']),
			'country_select' => sanitize_text_field($_POST['country_select']),
			'state' => sanitize_text_field($_POST['state']),
		);
		update_user_meta($user_id, 'addresse', $address_data);
	}

	// Add enctype to form to allow image upload
	function action_woocommerce_edit_account_form_tag() {
		echo 'enctype="multipart/form-data"';
	} 

}
