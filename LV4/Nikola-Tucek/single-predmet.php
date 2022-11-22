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
/*
echo '<div class="d-flex justify-content-center">
<a href="'.get_term_link(return_termSlug($post,'godina_taxonomy'),'godina_taxonomy').'">'.return_term($post,'godina_taxonomy').'</a>,  
<a href="'.get_term_link(return_termSlug($post,'semestar_taxonomy'),'semestar_taxonomy').'">'.return_term($post,'semestar_taxonomy').'</a></div><br />';
echo '<div class="container">';
echo '<div class="d-flex justify-content-center"><h3>'.$post->post_title . '</h3></div>';
if(get_the_post_thumbnail_url())
{
echo '<div class="d-flex justify-content-center"><img height="300" width="500" src="'.get_the_post_thumbnail_url().'"/></div> <br />';
}
echo '<div style="text-align:center;">'.$post->post_content . '</div>';
echo '</div> <br />';

$sHtml = '<div class="container">';
$sHtml .= "<table class='table'>";
$sHtml .= '<tr>';
$sHtml .= '<th>Naziv predmeta</th>';
$sHtml .= '<th>ECTS bodova </th>';
$sHtml .= '<th>P</th>';
$sHtml .= '<th>LV</th>';
$sHtml .= '<th>KV</th>';
$sHtml .= '</tr>';
$sHtml .= '</thead>';
$sHtml .= return_predmet_table($post);
$sHtml .= "</table>";
$sHtml .= "</div>";
echo $sHtml;

*/

$info = returnPredmetInfo($post);




echo '<header class="masthead" style="background-image: url('.get_the_post_thumbnail_url(get_the_ID()).')">
<div class="overlay"></div>
<div class="container">
    <div class="row">    
    <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
            <div class="d-flex justify-content-center">
            <a class="mr-1" href="'.get_term_link(return_termSlug($post,'godina_taxonomy'),'godina_taxonomy').'">'.return_term($post,'godina_taxonomy').'</a>|
             <a class="ml-1" href="'.get_term_link(return_termSlug($post,'semestar_taxonomy'),'semestar_taxonomy').'">'.return_term($post,'semestar_taxonomy').'</a>
            </div>
            <h1>'.$post->post_title.'</h1>
            <div class="d-flex justify-content-center">
            <p>
            ECTS: '.$info->ects.' <br>
            Predavanja: '.$info->predavanja.' <br>
            Laboratorijske vježbe: '.$info->labosi.' <br>
            Konstrukcijske vježbe: '.$info->konstrukcijske.'
            </p>
            </div>
        </div>
    </div>
</div>
</header>';

if(!empty($info->profesori))
{
    echo '<h3 class="ml-3">Nastavnici</h3>';
    $args = array(
        'post_type' => 'nastavnik',
        'post__in' => $info->profesori
    );
   $nastavnici = get_posts($args);
    echo '<div class="d-flex ml-3">';
    foreach($nastavnici as $nastavnik)
    {
        echo '<div class="mr-2">';
        echo '<img src="'.get_the_post_thumbnail_url($nastavnik->ID).'"  width="100" height="100" />';
        echo '<p>'.$nastavnik->post_title.'</p>';
        echo '</div>';
    }
    echo '</div>';

}



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