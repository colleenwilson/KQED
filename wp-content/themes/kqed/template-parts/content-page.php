<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kqed
 */

?>

<?php
	$thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
	$url = $thumb;
?>

<div class="innerpage-head">
	<img src="<?php echo $url ?>" alt="header">
	<div class="container">
		<h2><?php single_post_title(); ?></h2>
	</div>	
</div>

<!-- Homepage-Content -->
<div class="page-content">
	<div class="container">
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kqed' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>
</div>


<!-- create shortcodes -->
<?php $accordion = get_post_meta($post->ID, 'accordion', true); ?>
<?php echo do_shortcode($accordion); ?>

<?php $slider = get_post_meta($post->ID, 'slider', true); ?>
<?php echo do_shortcode($slider); ?>

<?php $investors_left = get_post_meta($post->ID, 'investors_left', true); ?>
<?php $investors_right= get_post_meta($post->ID, 'investors_right', true); ?>

<?php $future_subcontent = get_post_meta($post->ID, 'future_subcontent', true); ?>
<?php $bg =   get_field( "background", $post->ID ); ?>

<?php $video_url = get_field( "video_url", $post->ID ); ?>

<!-- subcontent for the future page -->
<?php if ( $future_subcontent ) : ?>
	<div class="page-content">
		<div class="container">
			<p><?php echo do_shortcode($future_subcontent); ?></p>
		</div>
	</div>
<?php endif; ?>

<!-- Video-box -->
<?php if ( $bg ) : ?>
	<div class="videobox-wrapper">
		<img src="<?php echo $bg['url'] ?>" class="videobox-bg" alt="video" />
		<div class="container">
			<h3>lorem ipsum dolor sit amet</h3>
			<a href="<?php echo $video_url ?>" class="lightbox fancybox.iframe">
				<img src="<?php bloginfo('template_directory'); ?>/img/play-icon.png" alt="play icon" />
				Play video
			</a>
		</div>
	</div>
<?php endif; ?>

<!-- Progress Slider Block Static -->
<?php 
// if ( is_page( 'progress' ) ) : 
// 	include('progress.php');
// endif; 
?>

<!-- Investors -->
<?php if ( $investors_left ) : ?>
 <div class="investors-wrapper">
	<div class="container">
		<h3>INVESTORS</h3>
	</div>
	<div class="left-side">
		<?php echo do_shortcode($investors_left); ?>
	</div>
	<div class="right-side">
		<?php echo do_shortcode($investors_right); ?>
	</div>
</div> 
<?php endif; ?>




