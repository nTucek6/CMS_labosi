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
if ( $gallery = get_post_gallery( get_the_ID(), false ) ){

    foreach ( $gallery['src'] as $src ) {
        ?>                
        <img width="200" height="200" src="<?php echo $src; ?>" class="my-custom-class" alt="Gallery image" />
<?php
}
}
  
echo '</div>';
}
}
?>
</main>
<?php
get_footer();
?>