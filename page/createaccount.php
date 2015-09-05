<?php
if (!defined('INIT')) {
    die();
}

if (count($_POST)) {
    $errors = array();
    //@todo
    if (!count($errors)) {
        return renderView('createaccount/success');
    }
    return renderView('createaccount/form', array('errors' => $errors));
}

return renderView('createaccount/form');