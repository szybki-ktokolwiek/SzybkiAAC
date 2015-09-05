<?php
if (!defined('INIT')) {
    die();
}
?>
    home tutaj jest

<?php
foreach ($news as $one):
    echo $one['title'] . PHP_EOL;
endforeach;
?>