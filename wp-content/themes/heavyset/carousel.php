<!-- Carousel
================================================== -->
<?php if (get_theme_mod ( 'themeslug_change_to_slider') == 'value1'  ) : ?>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
	      
	    <!-- SLIDE 1 -->
	    <?php if (get_theme_mod ( 'themeslug_hide_slide1') == 'value2'  ) : ?>			
			<div class="item active slide1">
				<a href="<?php echo get_theme_mod( 'themeslug_slide1_link' ); ?>">
					<img src="<?php echo get_theme_mod( 'themeslug_slide1_pic' ); ?>" alt="" />
				</a>
	        </div>
        <?php endif; ?>
        
        <!-- SLIDE 2 -->
	    <?php if (get_theme_mod ( 'themeslug_hide_slide2') == 'value2'  ) : ?>			
			<div class="item slide2">
				<a href="<?php echo get_theme_mod( 'themeslug_slide2_link' ); ?>">
					<img src="<?php echo get_theme_mod( 'themeslug_slide2_pic' ); ?>" alt="" />
				</a>
	        </div>
        <?php endif; ?>
        
        <!-- SLIDE 3 -->
	    <?php if (get_theme_mod ( 'themeslug_hide_slide3') == 'value2'  ) : ?>
			<div class="item slide3">
				<a href="<?php echo get_theme_mod( 'themeslug_slide3_link' ); ?>">
					<img src="<?php echo get_theme_mod( 'themeslug_slide3_pic' ); ?>" alt="" />
				</a>
	        </div>
        <?php endif; ?>
        
        <!-- SLIDE 4 -->
	    <?php if (get_theme_mod ( 'themeslug_hide_slide4') == 'value2'  ) : ?>
			<div class="item slide4">
				<a href="<?php echo get_theme_mod( 'themeslug_slide4_link' ); ?>">
					<img src="<?php echo get_theme_mod( 'themeslug_slide4_pic' ); ?>" alt="" />
				</a>
	        </div>
        <?php endif; ?>
        
        <!-- SLIDE 5 -->
	    <?php if (get_theme_mod ( 'themeslug_hide_slide5') == 'value2'  ) : ?>
			<div class="item slide5">
				<a href="<?php echo get_theme_mod( 'themeslug_slide5_link' ); ?>">
					<img src="<?php echo get_theme_mod( 'themeslug_slide5_pic' ); ?>" alt="" />
				</a>
	        </div>
        <?php endif; ?>

        
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

<?php else : ?>

	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">	
			
			<div class="item active static-feature">
				<img src="<?php echo get_theme_mod( 'themeslug_slide1_pic' ); ?>" alt="" />
	        </div>
	      </div>
	      	      
	</div><!-- /.carousel -->

<?php endif; ?>