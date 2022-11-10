<?php
get_header();
?>
<main>
<?php
if ( have_posts() )
{
while ( have_posts() )
{
the_post();
echo '<div class="container">';
//echo '<div><h3>'.$post->post_title . '</h3></div>';
echo '<div >'.$post->post_content . '</div>';
echo '</div>';
}
}
?>
</main>
<?php
get_footer();
?>
