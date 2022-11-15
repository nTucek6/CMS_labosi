<?php
get_header();
?>

<div class="row">
<?php
if ( have_posts() )
{
while ( have_posts() )
{
the_post();
echo '<div class="col-md-8">';
echo '<div class="container">';
//echo '<div><h3>'.$post->post_title . '</h3></div>';
echo '<div>'.$post->post_content . '</div>';
echo '</div>';
echo '</div>';
}
}
?>

<?php 
echo '<div class="col-md-4">';
dynamic_sidebar('glavni-sidebar');
echo '</div>';
?>

</div>
<?php get_footer(); ?>