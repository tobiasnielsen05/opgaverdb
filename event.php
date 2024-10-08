<?php
/** @var PDO $db */
require "settings/init.php";

if(empty($_GET["eventId"])) {
    header("Location: index.php");
}

$eventId = $_GET["eventId"];
$event = $db->sql("SELECT * FROM events WHERE evenId = :eventId", [":eventId" => $eventId]);
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

<body>
    <div class="container">
        <?php
        echo "<h1 class='text-primary'>" . $event->evenName . "</h1>";
        echo "<strong>Location</strong>: " . $event->evenLocation . "<br>";
        echo "<strong>Date:</strong> " . date('\d. d-m-Y \k\l. H:i', strtotime($event->evenDateTime)) . "<br><br>";
        echo "<strong>Description:</strong><br>" . $event->evenDescription;
        ?>
        
        <div class="mt-4">
            <h2>Teams</h2>
            <div class="row g-4 mt-2">
                <?php
                $teams = $db->sql("SELECT * FROM teams");
                foreach($teams as $team) {
                    ?>
                    
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
