
<?php
    /*
        This is the template part for comments navigation
        @package mops
    */

?>


<nav class="comment-navigation" role="navigation">
	<div class="row">
		<div class="">
			<div class="post-link-nav">
				<span class="chevron-left" aria-hidden="true"></span>
				<?php previous_comments_link( esc_html__( 'Older Comments', 'mops' ) ) ?>
			</div>
		</div>
		<div class="text-right">
			<div class="post-link-nav">
				<?php next_comments_link( esc_html__( 'Newer Comments', 'mops' ) ) ?>
				<span class="chevron-right" aria-hidden="true"></span>
			</div>
		</div>
	</div>
</nav>