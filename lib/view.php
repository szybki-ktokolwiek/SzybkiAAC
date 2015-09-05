<?php
if (!defined('INIT')) {
    die();
}
/**
 * @param string $name
 * @param array  $params
 *
 * @return string
 */
function renderView($name, $params = array()) {
    foreach ($params as $key => $value) {
        ${$key} = $value;
    }
    ob_clean();
    include(VIEW_DIR . $name . '.htm.php');

    return ob_get_contents();
}

/**
 * DO NOT USE IT!
 *
 * @param string $name
 * @param string $content
 *
 * @return string
 */
function renderTemplate($name, $content) {
    ob_clean();
    include(TEMPLATE_DIR . $name . '/main.htm.php');

    return ob_get_clean();
}