<?php

if (!isset($_SESSION['LOGGED_USER'])) {
    echo('You must be logged to do this action.');
    exit;
}

?>