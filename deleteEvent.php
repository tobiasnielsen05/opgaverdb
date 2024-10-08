<?php
/** @var PDO $db */
require "settings/init.php";
$evenId = $_GET["evenId"];

if(empty($_GET["evenId"])) {
    header("Location: admin.php");
}

if(!empty($_GET["evenId"])) {

    $sql = "DELETE FROM events WHERE evenId = '$evenId'";

    $db->sql($sql);

    echo " <h2 class='mt-4'>Eventet er nu slettet.</h2> <br> <a class='btn btn-primary fw-bold text-white' href='events.php'>Tilbage</a> ";
    exit;
}

