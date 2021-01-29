<?php defined( 'ABSPATH' ) || exit;


class NewPost {
	function __construct($array) {

			 
					// Set the post ID to -1. This sets to no action at moment
					$post_id = -1;
			 
					// Set the Author, Slug, title and content of the new post
					$author_id = 1;
					// Cheks if doen't exists a post with slug "wordpress-post-created-with-code".
					if( !$this->post_exists_by_slug( $array ) ) {
							// Set the post ID
							$post_id = wp_insert_post($array);
					} else {
			 
									// Set pos_id to -2 becouse there is a post with this slug.
									$post_id = -2;
					 
					} // end if
			 
			} // end oaf_create_post_with_code

		function post_exists_by_slug( $array ) {
				$args_posts = $array;
				$args_posts["posts_per_page"] = 1;
						// 'post_type'      => 'post',
						// 'post_status'    => 'any',
						// 'name'           => $post_slug,
						// 'posts_per_page' => 1,
				// );
				$loop_posts = new WP_Query( $args_posts );
				if ( ! $loop_posts->have_posts() ) {
						return false;
				} else {
						$loop_posts->the_post();
						return $loop_posts->post->ID;
				}
		}

}