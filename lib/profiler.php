<?php
if (!defined('INIT')) {
    die();
}

function startProfiler() {
    define('PROFILER_START', microtime(true));
}

function finishProfiler() {
    define('PROFILER_FINISH', microtime(true));
}

function saveProfilerResult() {
}

/**
 * Result in miliseconds
 *
 * @return string
 */
function getProfilerResult() {
    return number_format((microtime(true) - PROFILER_START) * 1000, 2);
}