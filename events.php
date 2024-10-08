<?php
/** @var PDO $db */
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Events</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark">
<div class="container">
    <h1 class="text-center text-white mt-3">Events</h1>
    <div class="row g-4 mt-3">
        <div class="col-12 col-md-6">
            <a class="btn btn-primary text-white fw-bold" href="insertEvent.php">Opret Event</a>
        </div>
    </div>
    <div class="row g-4 mt-3">
        <?php
        $events = $db->sql("SELECT * FROM events ORDER BY evenDateTime ASC");
        foreach($events as $event) {
            ?>
            <div class="col-12 col-md-6">
                <div class="card w-100 h-100">
                    <div class="card-header bg-success text-light py-3">
                        <?php
                        echo "<h2 class='m-0'>".$event->evenName . "<span class='text-secondary'> / " . $event->evenLocation . "</span></h2>";
                        ?>
                    </div>
                    <div class="card-body">
                        <?php
                        echo $event->evenDescription;
                        ?>
                        <br><br>
                        <?php
                        echo "<div class='mt-2'><div class='badge bg-secondary fw-light py-2 px-3 text-dark' style='font-size: 14px;'>" . date('\d. d-m-Y \k\l. H:i', strtotime($event->evenDateTime)) . "</div></div>";
                        ?>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <a class="btn btn-primary text-light" href="infoEvent.php?evenId=<?php echo $event->evenId; ?>" role="button">Læs Mere</a>
                        <a class="btn btn-primary text-light" href="editEvent.php?evenId=<?php echo $event->evenId; ?>" role="button">Rediger</a>
                        <a class="btn btn-danger text-light" href="deleteEvent.php?evenId=<?php echo $event->evenId; ?>" role="button">Slet</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="col-12 mb-4">
            <a class="btn btn-primary text-white fw-bold" href="index.php">Tilbage</a>
        </div>
    </div>
</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
