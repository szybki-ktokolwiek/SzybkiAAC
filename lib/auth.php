<?php
if (!defined('INIT')) {
    die();
}

/**
 * @return bool
 */
function isLogged() {
    return isset($_SESSION['account']) && strcmp($_COOKIE['auth'], md5('id=' . getLogged()['id'])) === 0;
}

/**
 * @return array
 */
function getLogged() {
    return getAccountById($_SESSION['account']);
}

/**
 * @param array $account
 */
function login($account) {
    $_SESSION['account'] = $account['id'];
    setcookie('auth', md5('id=' . $account['id']), 86400);
}

function logout() {
    unset($_SESSION['account']);
    setcookie('auth', null);
}

/**
 * @param        string accountName
 * @param string $password
 *
 * @return bool
 */
function auth($accountName, $password) {
    $account = getAccountByName($accountName);
    if (!$account) {
        return false;
    }

    return (strcmp($account['password'], sha1($password)) === 0);
}


