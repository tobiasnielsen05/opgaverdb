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
?>

    <!DOCTYPE html>
    <html lang="da">
    <head>
        <meta charset="utf-8">

        <title>Admin - Events Update</title>

        <meta name="robots" content="All">
        <meta name="author" content="Udgiver">
        <meta name="copyright" content="Information om copyright">

        <link href="css/styles.css" rel="stylesheet" type="text/css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="text-white bg-dark">
    <div class="container">
        <?php
        echo " <h2 class='mt-4'>Eventet er nu slettet.</h2> <br> <a class='btn btn-primary fw-bold text-white' href='events.php'>Tilbage</a> ";
        exit;
        }
        ?>
</div>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
