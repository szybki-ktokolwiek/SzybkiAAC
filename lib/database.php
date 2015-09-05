<?php
if (!defined('INIT')) {
    die();
}

/**
 * @param string $query
 * @param string $types
 * @param        ...$params
 *
 * @return array|null
 */
function executeQuery($query, $types = null, ...$params) {
    if ($types !== null) {
        $stmt = mysqli_prepare(getConnection(), $query);
        if (!mysqli_stmt_bind_param($stmt, $types, ...$params)) {
            die('Could not bind query params.');
        }
        if (!mysqli_stmt_execute($stmt)) {
            die('Could not execute mysqli statement.');
        }
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_free_result($stmt);

        return resultQuery($result);
    }
    $result = mysqli_query(getConnection(), $query);

    return resultQuery($result);
}

/**
 * @param mixed $result
 *
 * @return array|null
 */
function resultQuery($result) {
    if ($result instanceof mysqli_result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        return $data;
    }

    return $result;
}

function getConnection() {
    return connectDatabase();
}

function connectDatabase() {
    static $connection = null;
    if ($connection === null) {
        $config = getConfig('database');
        $connection = mysqli_connect($config['hostname'], $config['user'], $config['password'], $config['database']);

        if (mysqli_connect_errno()) {
            die('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
    }

    return $connection;
}

function disconnectDatabase() {
    if (!mysqli_close(connectDatabase())) {
        die('Could not close mysqli connection.');
    }
}