<?php
/** @var PDO $db */
require "settings/init.php";

if(empty($_GET["evenId"])) {
    header("Location: index.php");
}

$evenId = $_GET["evenId"];
$event = $db->sql("SELECT 'Navn', `evenId` ,`evenName`, `evenLocation`, `evenDescription`, `evenDateTime`  FROM events WHERE evenId = :evenId", [":evenId" => $evenId]);
$event = $event[0];
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title><?php echo $event->evenName; ?></title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark">

<div class="container text-white">
    <div class="row">
        <div class="col col-12 mt-3">
            <?php
            echo "<h1 class='text-primary'>" . $event->evenName . "</h1>";
            echo "<strong>Adresse:</strong> " . $event->evenLocation . "<br>";
            echo "<strong>Dato:</strong> " . date('\d. d-m-Y \k\l. H:i', strtotime($event->evenDateTime)) . "<br><br>";
            echo "<strong>Beskrivelse:</strong><br>" . $event->evenDescription;
            ?>
        </div>
        <div class="col col-12 mt-4">
            <h2>Ansatte tilmeldt sig til eventet</h2>
            <a href="eventsAddAnsatte.php?evenId=<?php echo $event->evenId;?>"><strong class="text-info">Klik her for at tilføje ansatte til evntet</strong></a>
        </div>
        <div class="col-12 mt-3">
            <?php
            $ansatte = $db->sql("SELECT * FROM ansatte INNER JOIN event_team_con ON AnsId = evtecAnsId
                WHERE evtecEvenId = :evenId", [":evenId" => $evenId]);
            foreach($ansatte as $ansat) {
                echo $ansat->Name . "<br>";
                ?>
                <?php
            }
            ?>
        </div>
        <div>
            <a class="btn btn-primary mt-5 text-white" href="events.php">Tilbage</a>
        </div>
    </div>
</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
