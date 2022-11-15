<?php
get_header();
?>
<header class="masthead">
<div class="overlay"></div>
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-10 mx-auto">
<div class="site-heading">
<h1>Nastavnici Visoke škole</h1>
</div>
</div>
</div>
</div>
</header>
<main>
<?php
echo '<div class="container">';
echo '<h2>1. godina, I semestar</h2>';
echo daj_predmete( '1-godina',"i-semestar" );

echo '<h2>1. godina, II semestar</h2>';
echo daj_predmete( '1-godina',"ii-semestar" );

echo '<h2>2. godina, III semestar</h2>';
echo daj_predmete( '2-godina',"iii-semestar" );

echo '<h2>2. godina, IV semestar</h2>';
echo daj_predmete( '2-godina',"iv-semestar" );

echo '<h2>3. godina, V semestar</h2>';
echo daj_predmete( '3-godina',"v-semestar" );

echo '<h2>3. godina, VI semestar</h2>';
echo daj_predmete( '3-godina',"vi-semestar" );
echo '</div>';

?>
</main>
<?php
get_footer();
?>