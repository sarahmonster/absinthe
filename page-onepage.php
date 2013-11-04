<?php
/*
Template Name: One-page site
*/
?>

<?php get_header(); ?>

<?php // Let's show all the static pages!
$pages = get_pages(array('child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'asc')); 
$count = 1;
foreach ($pages as $page_data) :
	$content = apply_filters('the_content', $page_data->post_content); 
	$title = $page_data->post_title; 
	$slug = $page_data->post_name;
	?>
	<div id="<?php echo $slug; ?>" class="page-panel" data-slide="<?php echo $count; ?>" data-stellar-background-ratio="0.5">
		<div class="inner-content wrap clearfix">
			<div class="twelvecol first last clearfix entry-content" role="main">
				<?php if ($slug != "home"):  echo '<h1>' . $title . '</h1>';  endif; ?>
				<?php echo $content; ?>
				
				<?php if ($slug == "news"): ?>
					<?php get_template_part('news'); ?>
					<div class="twelvecol first last clearfix center"><a class="button" href="/news">Read all news posts</a></div>
				<?php endif; ?>	
			
			</div>
		</div>
		
		<a class="down-button" data-slide="<?php echo ++$count; ?>" title=""></a>
	</div>
	
	
<div class="middle-slide" data-stellar-background-ratio="2.5">
	
	<?php if ($slug == "home"):  ?>
	<img id="the-books" src="<?php echo get_template_directory_uri(); ?>/library/images/books.png" alt="books" data-stellar-ratio=".5" data-stellar-vertical-offset="350" />
	<img id="angel" src="<?php echo get_template_directory_uri(); ?>/library/images/angel.png" alt="fleuron" data-stellar-ratio="1.5" data-stellar-vertical-offset="250" />
	<?php endif; ?>
	
</div>
	
<?php endforeach; ?>

<img id="smoke" src="<?php echo get_template_directory_uri(); ?>/library/images/smoke.png" alt="smoke" width="547" height="820" data-stellar-ratio="3.5"/>

<?php get_footer(); ?>
