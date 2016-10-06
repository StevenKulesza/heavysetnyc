<style>
/** Buttons **/
.btn-primary {
	background: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
	border-color: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
}
#secondary h3 {
	background: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
	color: #fff !important;
}
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active {
	background: <?php echo get_theme_mod( 'prim-btn-hover' ); ?>;
	border-color: <?php echo get_theme_mod( 'prim-btn-hover' ); ?>;
}
.btn-default .fa-circle,
#main-content .btn-default i {
	color: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
}
.fboxes-round-under .pic-container {
	border-color: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
}

.btn-info {
	background: <?php echo get_theme_mod( 'second-button-color' ); ?>;
	border-color: <?php echo get_theme_mod( 'second-button-color' ); ?>;
}
.btn-info:hover,
.btn-info:focus,
.btn-info:active {
	background: <?php echo get_theme_mod( 'sec-btn-hover' ); ?>;
	border-color: <?php echo get_theme_mod( 'sec-btn-hover' ); ?>;
}
#page .open > .dropdown-toggle.btn-primary {
	background: <?php echo get_theme_mod( 'sec-btn-hover' ); ?>;
	border-color: <?php echo get_theme_mod( 'sec-btn-hover' ); ?>;
}

.need-answers .glyphicon,
#close-box {
	background: <?php echo get_theme_mod( 'second-button-color' ); ?>;
}

.btn-success {
	background: <?php echo get_theme_mod( 'ter-button-color' ); ?>;
	border-color: <?php echo get_theme_mod( 'ter-button-color' ); ?>;
}
.btn-success:hover,
.btn-success:focus,
.btn-success:active {
	background: <?php echo get_theme_mod( 'ter-button-color-hover' ); ?>;
	border-color: <?php echo get_theme_mod( 'ter-button-color-hover' ); ?>;
}


/** Header Tags **/
#page h1,
#page h2 {
	color: <?php echo get_theme_mod( 'h1-color' ); ?>;
}
#page h1 small,
#page h3,
#page h4,
#page h5,
#page h6 {
	color: <?php echo get_theme_mod( 'h2-color' ); ?>;
}

/** Content Links **/
a {
	color: <?php echo get_theme_mod( 'a-color' ); ?>;
}
a:hover {
	color: <?php echo get_theme_mod( 'ah-color' ); ?>;
}
</style>