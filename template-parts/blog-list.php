
<?php
	$args = array(
		'posts_per_page' => 6,
		'post_type' => 'post',
		'orderby' => 'date',
		'order' => 'DESC'
	);
	$my_posts = get_posts($args);
?>
<?php foreach ($my_posts as $post) : setup_postdata($post); ?>
	<div class="news-list-item">
		<span class="date"><?php the_time('Y/m/d') ?></span>
		<?php
			$terms = get_the_terms($post->ID, 'news_cat');
			if (!empty($terms)) { 
				$output = array();
				foreach ($terms as $term) {
					if ($term->parent != 0)
					  $output[] = $term->name;
				}
				if (count($output)) {
					echo '<span class="term">' . join(", ", $output) . '</span>';
				} else {
					echo '<span class="term">' . $term->name . '</span>';
				}
			}
		?>
		<span class="list-title"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></span>
	</div>
<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
<!-- .post-list -->