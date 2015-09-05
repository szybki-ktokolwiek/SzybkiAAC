<?php
if (!defined('INIT')) {
    die();
}
$news = array(
    array('title' => 'Test', 'content' => 'Test test test'),
    array('title' => 'Test', 'content' => 'Test test test'),
    array('title' => 'Test', 'content' => 'Test test test'),
    array('title' => 'Test', 'content' => 'Test test test'),
    array('title' => 'Test', 'content' => 'Test test test'),
);

var_dump(executeQuery("INSERT INTO accounts (`name`, `password`, `email`) VALUES ('testowy123', 'testowe123', 'tes123t@test.pl')"));
var_dump(executeQuery("SELECT id FROM accounts LIMIT 1"));
var_dump(executeQuery("SELECT id FROM accounts WHERE id > ? AND id < ? LIMIT 1", 'ii', 2, 4));
//die();
return renderView('home', array('news' => $news));