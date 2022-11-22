<?php
get_header();
?>
<main>
<?php
if ( have_posts() )
{
    echo '<div class="d-flex justify-content-center">';
    echo single_cat_title();
    echo '</div> <br /><hr>';  

while ( have_posts() )
{
the_post();
echo '<div class="d-flex justify-content-center"><a href="'.$post->guid.'"><h4>'.$post->post_title . '</h4></a></div>';
//echo '<div style="text-align:center;">'.$post->post_content . '</div>';
if(get_the_post_thumbnail_url())
{
echo '<div class="d-flex justify-content-center"><img height="300" width="500" src="'.get_the_post_thumbnail_url().'"/></div>';
}
echo '<br /> <hr> <br />';
}
}
?>

<div class="d-flex justify-content-center">
<?php // posts_nav_link(' — ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>
<?php previous_posts_link("<button class='btn btn-secondary m-1'>Previous</button>");  ?>
<?php next_posts_link("<button class='btn btn-secondary m-1'>Next</button>");  ?>
</div>
</main>
<?php
get_footer();
?>
