<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="">	
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>
				<?php /* get_template_part( 'content', 'page' ); */ ?>
			<?php endwhile; // end of the loop. ?>
			<div class="wide fCheck" id="section1">
				<div class="container">
					<h1>News</h1>
					<hr class="thick">
					<?php get_template_part( 'front-posts' ); ?>
				</div>
			</div>
			<section class="artistContainer">
				<div class="wide artists text-center fCheck" id="section2">
					<a class="btn btn-primary btn-lg lightbox" href="https://soundcloud.com/heavysetrecordsnyc"><i class="fa fa-soundcloud"></i> LISTEN TO OUR ARTISTS <i class="fa fa-angle-right"></i></a>

				</div>
			</section>
			<!-- <div class="wide gray fCheck" id="section2">
				<div class="container">
					<h1>Artists</h1>
					<hr class="thick">
					<div class="row text-left">
						<div class="col-sm-4">
					    <a href="http://heavysetrecordsnyc.com/artists/quadie-diesel"> 
					       <div class="featured-box artist">
					            <img src="http://heavysetrecordsnyc.com/wp-content/uploads/2016/06/quadie-diesel-rectangle.jpg" alt="quadie-diesel-rectangle" width="600" height="400" class="aligncenter size-full wp-image-3972" />
					            <div class="artist-text">
					                <h3>Quadie Diesel <i class="fa fa-angle-right"></i></h3>
					            </div>
					        </div>
					</a>
					    </div>
					    <div class="col-sm-4">
					    <a href="http://heavysetrecordsnyc.com/artists/thwag-lord">
					        <div class="featured-box artist">
					           <img src="http://heavysetrecordsnyc.com/wp-content/uploads/2016/06/thwag-lord-rectangle.jpg" alt="thwag-lord-rectangle" width="600" height="400" class="aligncenter size-full wp-image-3971" />
					            <div class="artist-text">
					                <h3>THWAG LORD <i class="fa fa-angle-right"></i></h3>
					            </div>
					        </div>
					    </a>
					    </div>
					    <div class="col-sm-4">
					    <a href="http://heavysetrecordsnyc.com/artists">
					        <div class="featured-box artist">
					           <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/listen.jpg" alt="thwag-lord-rectangle" width="600" height="400" class="aligncenter size-full wp-image-3971" />
					            <div class="artist-text">
					                <h3>Artists <i class="fa fa-angle-right"></i></h3>
					            </div>
					        </div>
					    </a>
					    </div>
					</div>
				</div>
			</div>		 -->		
			<div class="wide fCheck" id="section3">
				<div class="container">
					<h1>Watch</h1>
					<hr class="thick">
					<div class="row">
						<div class="col-sm-4">
							<div class="video-container">
							<a href="https://www.youtube.com/watch?v=<?php echo get_theme_mod( 'themeslug_vidone' ); ?>" class="lightbox">
							<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x" style="color:#000;"></i>
							<i class="fa fa-play fa-stack-1x fa-inverse"></i>
							</span>
							<div class="shader"></div>
							<img src="http://img.youtube.com/vi/<?php echo get_theme_mod( 'themeslug_vidone' ); ?>/maxresdefault.jpg"/></a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="video-container">
							<a href="https://www.youtube.com/watch?v=<?php echo get_theme_mod( 'themeslug_vidtwo' ); ?>" class="lightbox">
							<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x" style="color:#000;"></i>
							<i class="fa fa-play fa-stack-1x fa-inverse"></i>
							</span>
							<div class="shader"></div>
							<img src="http://img.youtube.com/vi/<?php echo get_theme_mod( 'themeslug_vidtwo' ); ?>/maxresdefault.jpg"/></a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="video-container">
							<a href="https://www.youtube.com/watch?v=<?php echo get_theme_mod( 'themeslug_vidthree' ); ?>" class="lightbox">
							<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x" style="color:#000;"></i>
							<i class="fa fa-play fa-stack-1x fa-inverse"></i>
							</span>
							<div class="shader"></div>
							<img src="http://img.youtube.com/vi/<?php echo get_theme_mod( 'themeslug_vidthree' ); ?>/maxresdefault.jpg"/></a>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>