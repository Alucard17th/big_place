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

		function get_user_location($user_location) {
			$curl = curl_init();
		
			$url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($user_location) . '&key=AIzaSyBNvLfW1iJMSN_A0G9K8ml5-WYqzvI1pew';
		
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

		function is_location_within_radius($lat1, $lon1, $lat2, $lon2, $radius_km) {
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

		function get_users_locations(){
			$all_users = get_users();

			$all_users_array = [];
			// Loop through the users and access their information
			foreach ($all_users as $user) {
				$user_id = $user->ID;
				$user_login = $user->user_login;
				$user_email = $user->user_email;
				
				$user_meta_fields = get_user_meta($user_id);

				// $all_users_array = [
				// 	$user_id,
				// 	isset($user_meta_fields['votre_m_tier'][0]) ? $user_meta_fields['votre_m_tier'][0] : '',
				// ];

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
					$user_location_from_api = get_user_location($user_formatted_address);

					// Now, you can process $user_location_from_api to get latitude and longitude
					$location_data = json_decode($user_location_from_api, true);

					echo "User ID: $user_id, Username: $user_login, Email: $user_email, Job: $user_job, Address: $user_formatted_address<br>";
					
					if ($location_data && isset($location_data['results'][0]['geometry']['location'])) {
						$user_latitude = $location_data['results'][0]['geometry']['location']['lat'];
						$user_longitude = $location_data['results'][0]['geometry']['location']['lng'];
						
						$all_users_array[] = [
							'user_id' => $user_id,
							'user_lat' => $user_latitude,
							'user_lng' => $user_longitude
						];
					}

					
					
				}else{
					echo "User ID: $user_id, Username: $user_login, Email: $user_email, Job: $user_job, Address: $user_address<br>";
				}
			}

			return $all_users_array;
		}
		

		function get_articles_tempalte(){
			$user_id = 48;
			// Get all user meta fields
			$user_meta_fields = get_user_meta($user_id);
			$user_location = [];
			$output = '';
			// Output the user meta fields
			// $output = '<div style="padding:20px;"><h3>User Meta Fields for ' . $user->email . '</h3>';
			$output .= '<ul>';
			foreach ($user_meta_fields as $key => $value) {
				// $user_location = [
				// 	$key => $value
				// ]
				$output .= '<li><strong>' . $key . ':</strong> ' . implode(', ', $value) . '</li>';
			}
			$output .= '</ul>';

			// $output .= '<h3>Métier: ' . $user_meta_fields['votre_m_tier'][0] . '</h3>';
			// $output .= '<h3>Addresse: ' . $user_meta_fields['addresse'][0] . '</h3>';



			// $output .= '____________________________________________';

			// // Get all custom fields (post meta fields)
			// $post_id = 1246;
			// $post_meta_fields = get_post_meta($post_id);

			// // Output the custom fields
			// $output .= '<h3>Custom Fields for ' . get_the_title($post_id) . '</h3>';
			// $output .= '<ul>';
			// foreach ($post_meta_fields as $key => $value) {
			// 	$output .= '<li><strong>' . $key . ':</strong> ' . implode(', ', $value) . '</li>';
			// }
			// $output .= '</ul>';

			// $output .= '<h3>Listing Type: ' . $post_meta_fields['_case27_listing_type'][0] . '</h3>';



			// $output .= '____________________________________________';

			// $args = array(
			// 	'post_type'      => 'job_listing',
			// 	'posts_per_page' => -1, // Retrieve all posts
			// );
			
			// // Run the query
			// $query = new WP_Query($args);
			
			// // Check if there are any posts
			// if ($query->have_posts()) {
			// 	// Output the titles in a loop
			// 	$output .= '<ul>';
			// 	while ($query->have_posts()) {
			// 		$query->the_post();
			// 		$post_id = get_the_ID();
			// 		$post_listing_type = get_post_meta($post_id, '_case27_listing_type', true);
			// 		$output .= '<li> Titre: ' . get_the_title() . '</li>';
			// 		$output .= '<li> Type: ' . $post_listing_type . '</li><br>';

			// 	}
			// 	$output .= '</ul>';
			
			// 	// Reset the post data
			// 	wp_reset_postdata();
			// } else {
			// 	$output .= 'No job listings found.';
			// }
			// $output .= '</div>';



			/////////// TESTING LOCATIONS -> Get Annonce location(lat, lng) from database///////////////
			global $wpdb;
			// Change 'wp_mylisting_locations' to the actual table name if it's different
			$table_name = $wpdb->prefix . 'mylisting_locations';
			// Replace 8216 with the post ID you want to retrieve the locations for
			$post_id = 1246;
			// Prepare the SQL query
			$query = $wpdb->prepare(
				"SELECT * FROM $table_name WHERE listing_id = %d",
				$post_id
			);

			// Run the query
			$locations = $wpdb->get_results($query);
			$annonce_locations = [];
			// Check if there are any locations found
			if ($locations) {
				// Output the locations
				// $output .= '<ul>';
				// foreach ($locations as $location) {
				// 	$annonce_locations = [
				// 		'lat' => $location->lat,
				// 		'lng' => $location->lng
				// 	];
				// 	$output .= '<li>' . $location->lat . ', ' . $location->lng . ', ' . $location->address .  '</li>';
				// }
				// $output .= '</ul>';

				$output .= 'Annonce Latitude: ' . $locations[0]->lat . ', Longitude: ' . $locations[0]->lng;
			} else {
				$output .= 'No locations found for this post.';
			}

			// Assuming $user_meta_fields['addresse'][0] contains the serialized address
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
				$user_location_from_api = get_user_location($user_formatted_address);

				// Now, you can process $user_location_from_api to get latitude and longitude
				$location_data = json_decode($user_location_from_api, true);

				$user_latitude = 0;
				$user_longitude = 0;
				
				if ($location_data && isset($location_data['results'][0]['geometry']['location'])) {
					$user_latitude = $location_data['results'][0]['geometry']['location']['lat'];
					$user_longitude = $location_data['results'][0]['geometry']['location']['lng'];
					$output .= "Latitude: $user_latitude, Longitude: $user_longitude";
					$user_rayon = $user_meta_fields['rayon_d_intervention'][0];
					$output .= "Rayon d'intervention: $user_rayon";
					
					// Check if the other location is within a radius from the original location
					if (is_location_within_radius($user_latitude, $user_longitude, $locations[0]->lat, $locations[0]->lng, $user_rayon)) {
						$output .= "The other location is within 10 km from the original location.";
					} else {
						$output .= "The other location is more than 10 km away from the original location.";
					}

				} else {
					$output .= "Location data not available.";
				}

				

				$output .= $user_formatted_address;
			}

			$user_coordinates = get_users_locations();
			foreach($user_coordinates as $location){
				$output .= '<br>User ID:' .$location['user_id'].', Latitude:' .$location['user_lat'] . ' Longitude:' .$location['user_lng'];
			}
			
			$output = '<div style="padding:20px;">' . $output . '</div>';


			return $output;
		}
	}


	function send_email_on_job_listing_creation($post_id, $post, $update) {
		// Check if the post type is 'job_listing'
		if ($post->post_type === 'job_listing') {
			// Get the post title
			$post_title = get_the_title($post_id);
	
			// Email subject and content
			$subject = 'New Job Listing Created';
			$message = "A new job listing has been created:\n\nTitle: $post_title\n\nEdit the job listing: " . get_edit_post_link($post_id);
	
			// Make sure to configure your site's email settings to ensure successful delivery
			wp_mail('eddallal.noureddine@gmail.com', $subject, $message);

			// // Prepare data for the new 'article' post
			// $article_data = array(
			// 	'post_title'   => $post_title,
			// 	'post_content' => $message,
			// 	'post_status'  => 'publish',
			// 	'post_type'    => 'post',
			// );
			// // Insert the new 'article' post
			// $new_article_id = wp_insert_post($article_data);
		}
	}

}
