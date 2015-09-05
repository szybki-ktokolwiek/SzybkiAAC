<?php
if (!defined('INIT')) {
    die();
}
/**
 * @param string $name
 *
 * @return mixed
 */
function getConfig($name) {
    static $cache = array();
    if (!isset($cache[$name])) {
        $cache[$name] = include_once(CONFIG_DIR . $name . '.cfg.php');
    }

    return $cache[$name];
}

/**
 * @param string $name
 * @param string $value
 *
 * @return mixed
 */
function getConfigValue($name, $value) {
    return getConfig($name)[$value];
}