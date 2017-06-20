<?php
require_once 'core/init.php';

$itemInsert = db::getInstance()->update('todo', 3, array(
    'todo' => 'newer todo'
));