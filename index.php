<?php
/** @var PDO $db */
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Forside</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark p-5 m-5">
<h1 class="text-white text-center">Velkommen til startsiden</h1>
<div class="container justify-content-center d-flex mt-5">
    <div class="row">
        <div class="col col-md-4 mt-3">
            <a href="opgaver.php"><button class="btn btn-primary p-5 fs-1 fw-bold text-white w-100">Opg.</button></a><br>
        </div>
        <div class="col col-md-4 mt-3">
            <a href="events.php"><button class="btn btn-primary p-5 fs-1 fw-bold text-white">Events</button></a><br>
        </div>
        <div class="col col-md-4 mt-3">
            <a href="ansatte.php"><button class="btn btn-primary p-5 fs-1 fw-bold text-white">Ansatte</button></a><br>
        </div>
    </div>

</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
