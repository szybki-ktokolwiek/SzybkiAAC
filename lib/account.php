<?php
if (!defined('INIT')) {
    die();
}
function accountExists($name) {
    return (bool) executeQuery('SELECT COUNT(`accounts`.`id`) FROM `accounts` WHERE `name` = ?', 's', $name);
}

function accountExistsByEmail($email) {
    return (bool) executeQuery('SELECT COUNT(`accounts`.`id`) FROM `accounts` WHERE `email` = ?', 's', $email);
}

function getAccountsTotalCount() {
    return executeQuery('SELECT COUNT(*) as `count` FROM `accounts`');
}

function getAccountById($id) {
    return executeQuery('SELECT * FROM `accounts` WHERE `id` = ?', 'i', $id);
}

function getAccountByName($name) {
    return executeQuery('SELECT * FROM `accounts` WHERE `name` = ?', 's', $name);
}

function getAccountByEmail($email) {
    return executeQuery('SELECT * FROM `accounts` WHERE `email` = ?', 's', $email);
}

function createAccount($name, $password, $email) {
    return executeQuery('INSERT INTO `accounts` (`name`, `password`, `email`) VALUES (?, ?, ?)', 'sss', $name, sha1($password), $email);
}

function changeAccountEmail($name, $newEmail) {
    return executeQuery('UPDATE `accounts` SET `email` = ? WHERE `name` = ?', 'ss', $newEmail, $name);
}

function changeAccountPassword($name, $newPassword) {
    return executeQuery('UPDATE `accounts` SET `password` = ? WHERE `name` = ?', 'ss', $newPassword, $name);
}

