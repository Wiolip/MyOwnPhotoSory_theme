<?php
    /*

        This is the  template for sidebar
        @pckage mops
    */

?>


<?php if (is_active_sidebar('Blog Sidebar')) : ?>

    <?php dynamic_sidebar('Blog Sidebar'); ?>

<?php endif;  ?>
