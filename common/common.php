<?php

/**
 * get the root of the project
 * @return string
 */
function getRoot(){
    return realpath(__DIR__ . '/..');
}

/**
 * get the full path for database
 * @return string
 */
function getDbPath(){
    return getRoot() . '/data/data.sqlite';
}

/**
 * Get the DSN for the SQLite connection.
 * @return string
 */
function getDsn(){
    return 'sqlite:' . getDbPath();
}

/**
 * gets the PDO object for db access
 * @return \PDO
 */
function getPDO(){
    $pdo = new PDO(getDSN());
    $result = $pdo->query('PRAGMA foreign_keys = on');
    if ($result === false) {
        throw new Exception("could not turn on foreign keys");
    }
    return $pdo;
}
