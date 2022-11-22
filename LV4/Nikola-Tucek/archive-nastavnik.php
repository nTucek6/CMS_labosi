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
echo '<h2>Asistenti</h2>';
echo daj_nastavnike( 'asistent' );
echo '<h2>Predavači</h2>';
echo daj_nastavnike( 'predavac' );
echo '<h2>Viši predavači</h2>';

echo daj_nastavnike( 'visi-predavac' );
echo '<h2>Profesori Visoke škole</h2>';
echo daj_nastavnike( 'profesor-visoke-skole' );
?>
</main>
<?php
get_footer();
?>