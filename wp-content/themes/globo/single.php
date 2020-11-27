<?php
// Título do artigo
$GLOBALS["titulo"] = get_the_title();

get_header();

?>

<?php

echo "<br>";
echo get_the_title();
echo "<br>";
echo get_the_content();
echo "<br>";

?>

<?php
get_footer();

?>
