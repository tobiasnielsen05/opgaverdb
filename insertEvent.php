<?php
/** @var PDO $db */
require "settings/init.php";

if(!empty($_POST["data"])) {
    $data = $_POST["data"];

    $sql ="INSERT INTO events (evenName, evenDateTime, evenLocation, evenDescription) VALUES(:evenName, :evenDateTime, :evenLocation, :evenDescription)";
    $bind = [":evenName" =>$data["evenName"], ":evenDateTime" =>$data["evenDateTime"], ":evenLocation" =>$data["evenLocation"], ":evenDescription" =>$data["evenDescription"]];

    $db->sql($sql, $bind, false);

    echo "<strong>Eventet er nu oprettet</strong>  <br> <a class='btn btn-primary mt-3 text-white fw-bold' href='insertEvent.php'>Opret en ny opgave</a> <br> ";
    echo "<a class='btn btn-primary mt-3 text-white fw-bold' href='events.php'>Tilbage</a> ";
    exit;
}

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Tilføj Event</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark">

<div class="container text-white mt-3">
    <form action="insertEvent.php" method="post">
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label for="evenName" class="form-label">Event Name</label>
                <input type="text" class="form-control" id="evenName" name="data[evenName]" placeholder="Event Name" value="">
            </div>

            <div class="col-12 col-md-6">
                <label for="evenDateTime" class="form-label">Event Date Time</label>
                <input type="datetime-local" class="form-control" id="evenDateTime" name="data[evenDateTime]" placeholder="Event Date Time" value="">
            </div>

            <div class="col-12 col-md-6">
                <label for="evenLocation" class="form-label">Event Location</label>
                <input type="text" class="form-control" id="evenLocation" name="data[evenLocation]" placeholder="Event Location" value="">
            </div>

            <div class="col-12">
                <label for="opgBeskrivelse" class="form-label">Opgave Beskrivelse</label>
                <textarea class="form-control" name="data[opgBeskrivelse]" id="opgBeskrivelse" placeholder="Opgave Beskrivelse"></textarea>
            </div>

            <div class="col-12 col-md-4 offset-md-8">
                <button type="submit" class="btn btn-primary w-100 text-white fw-bold">Tilføj Event</button>
            </div>
        </div>
    </form>
</div>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
