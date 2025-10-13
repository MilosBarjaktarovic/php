<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_unset(); // briše sve promenljive iz sesije
session_destroy(); // uništava sesiju

header("Location: index.php");
exit;
