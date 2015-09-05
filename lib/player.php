<?php
if (!defined('INIT')) {
    die();
}

function playerExists($name) {
    return (bool) executeQuery('SELECT COUNT(`players`.`id`) FROM `players` WHERE `name` = ?', 's', $name);
}

function getPlayersTotalCount() {
    return executeQuery('SELECT COUNT(*) as `count` FROM `players`');
}

function getPlayersByAccountId($accountId) {
    return executeQuery('SELECT * FROM `players` WHERE `account_id` = ?', 'i', $accountId);
}

function getPlayersByAccountName($accountName) {
    return executeQuery('SELECT p.* FROM `accounts` a RIGHT JOIN `players` p ON p.account_id = a.id WHERE a.name = ?', 's', $accountName);
}

function getPlayersCountByAccountId($accountId) {
    return executeQuery('SELECT COUNT(*) as `count` FROM `players` WHERE `account_id` = ?', 'i', $accountId);
}

function getPlayersCountByAccountName($accountName) {
    return executeQuery('SELECT COUNT(p.*) as `count` FROM `accounts` a RIGHT JOIN `players` p ON p.account_id = a.id WHERE a.name = ?', 's', $accountName);
}

function createPlayer() {

}
