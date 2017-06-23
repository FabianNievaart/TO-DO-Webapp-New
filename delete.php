<?php
require_once 'core/init.php';

$record = new Record;

try {
    $record->delete(array('id', '=', $_POST['id']));

    Session::flash('success', 'Record deleted successfully');
    Redirect::to('index.php');

} catch (Exception $e) {
    die($e->getMessage());
}