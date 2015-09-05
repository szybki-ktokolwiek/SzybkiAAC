<?php
define('INIT', true);

define('PAGE_DIR', __DIR__ . '/page/');
define('CONFIG_DIR', __DIR__ . '/config/');
define('LIB_DIR', __DIR__ . '/lib/');
define('TEMPLATE_DIR', __DIR__ . '/template/');
define('VIEW_DIR', PAGE_DIR . 'view/');

ob_start();
session_start();

function loadLib($name) {
    require_once(LIB_DIR . $name . '.php');
}

loadLib('profiler');
startProfiler();

foreach (array('account', 'auth', 'config', 'database', 'view') as $lib) {
    loadLib($lib);
}

connectDatabase();

/* @var $pages array */
$pages = getConfig('pages');
/* @var $page string */
$page = 'home';
if (isset($_GET['page']) && isset($pages[$_GET['page']])) {
    $page = $_GET['page'];
}
/* @var $content string */
$content = include_once(PAGE_DIR . $pages[$page]);
echo renderTemplate(getConfigValue('main', 'template'), $content);

disconnectDatabase();
finishProfiler();
saveProfilerResult();
