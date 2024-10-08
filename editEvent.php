<?php
/** @var PDO $db */
require "settings/init.php";

if(!empty($_POST["evenId"]) && !empty($_POST["data"])) {
    $data = $_POST["data"];
    $events = $db->sql("UPDATE events SET evenName = :evenName, evenDateTime = :evenDateTime, evenLocation = :evenLocation, evenDescription = :evenDescription WHERE evenId = :evenId", [":evenName" =>$data["evenName"], ":evenDateTime" => $data["evenDateTime"], ":evenLocation" => $data["evenLocation"], ":evenDescription" => $data["evenDescription"], ":evenId" => $_POST["evenId"]]);

    header("Location: editEvent.php?success=1&evenId=".$_POST["evenId"]);
    exit;
}

if(empty($_GET["evenId"])) {
    header("Location: index.php");
}
$evenId = $_GET["evenId"];

$events = $db->sql("SELECT * FROM events WHERE evenId = :evenId", [":evenId" => $evenId]);
$events = $events[0];

?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Opdater Event</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark">
<div class="container text-white">
    <?php
    if(!empty($_GET["success"]) && $_GET["success"] == 1) {
        echo "<h4 class='mt-3'>Eventet er nu opdateret</h4>";
        echo "<h4><a class='btn btn-primary text-white fw-bold' href='events.php'>Gå tilbage til events</a></h4>";
    }
    ?>
    <form action="editEvent.php" method="post">
        <div class="row g-3 mt-3">
            <div class="col-12 col-md-4">
                <label for="evenName" class="form-label">Name</label>
                <input type="text" class="form-control" id="evenName" name="data[evenName]" placeholder="Name" value="<?php echo $events->evenName ?>">
            </div>

            <div class="col-12 col-md-4">
                <label for="evenDateTime" class="form-label">Date</label>
                <input type="datetime-local" class="form-control" id="evenDateTime" name="data[evenDateTime]" placeholder="Date" value="<?php echo $events->evenDateTime ?>">
            </div>

            <div class="col-12 col-md-4">
                <label for="evenLocation" class="form-label">Location</label>
                <input type="text" class="form-control" id="evenLocation" name="data[evenLocation]" placeholder="Location" value="<?php echo $events->evenLocation ?>">
            </div>

            <div class="col-12">
                <label for="evenDescription" class="form-label">Description</label>
                <textarea class="form-control" name="data[evenDescription]" id="evenDescription"><?php echo $events->evenDescription ?></textarea>
            </div>

            <div class="col-12 col-md-4 d-flex offset-md-4">
                <button type="submit" class="btn btn-primary w-100 text-white fw-bold">Opdater</button>
            </div>
        </div>
        <input type="hidden" name="evenId" value="<?php echo $events->evenId ?>">
    </form>
</div>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
