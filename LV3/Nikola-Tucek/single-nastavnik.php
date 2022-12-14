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

echo '<div class="d-flex justify-content-center">
<a href="'.get_term_link(return_termSlug($post,'naslovno_zvanje'),'naslovno_zvanje').'">'.return_term($post,'naslovno_zvanje').'</a>'; 
echo '</div>';

echo '<div class="container">';
echo '<div class="d-flex justify-content-center"><h3>'.$post->post_title . '</h3></div>';
//echo '<div class="d-flex justify-content-center">'.return_term($post,'naslovno_zvanje').'</div><br />';
if(get_the_post_thumbnail_url())
{
echo '<div class="d-flex justify-content-center"><img height="300" width="500" src="'.get_the_post_thumbnail_url().'"/></div> <br />';
}
echo '<div style="text-align:center;">'.$post->post_content . '</div>';
echo '</div> <br />';
}


}
?>
<div class="d-flex justify-content-center">
<?php previous_post_link( '%link', "<button class='btn btn-secondary m-1'>Previous post</button>", true ); ?>
<?php next_post_link( '%link', "<button class='btn btn-secondary m-1'>Next post</button>", true ); ?>
</div>
</main>
<?php
get_footer();
?>