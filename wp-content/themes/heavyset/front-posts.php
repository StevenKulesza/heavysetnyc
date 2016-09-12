<div class="row blog">
<?php $the_query = new WP_Query( 'posts_per_page=1' ); ?>

<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
<div class="col-sm-6">
	<div class="">
		<header class="entry-header">
				<div class="feature-image-container">
				<?php if ( ! post_password_required() && ! is_attachment() ) :
						the_post_thumbnail();
				endif; ?>
			</div><!-- /.feature-image-container -->
		</header><!-- .entry-header -->
		
			<?php if ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
			<?php endif; // is_single() ?>

	<?php the_excerpt($length); ?>
	<br>
	<br>
		<a href="<?php the_permalink(); ?>" title="Read More" class="btn btn-primary btn-sm">Read More <i class="fa fa-angle-right"></i></a>
	</div>
</div>
<br class="visible-xs">
<?php 
endwhile;
wp_reset_postdata();
?>
<div class="col-sm-6">
<a class="twitter-timeline" data-height="700" href="https://twitter.com/HEAVYSETRECORDS">Tweets by HEAVYSETRECORDS</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></div>
</div>