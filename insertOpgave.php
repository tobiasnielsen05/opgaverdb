<?php
/** @var PDO $db */
require "settings/init.php";

if(!empty($_POST["data"])) {
    $data = $_POST["data"];

    $sql ="INSERT INTO opgaver (opgNavn, opgBeskrivelse, opgKlaret) VALUES(:opgNavn, :opgBeskrivelse, :opgKlaret)";
    $bind = [":opgNavn" =>$data["opgNavn"], ":opgBeskrivelse" =>$data["opgBeskrivelse"], ":opgKlaret" =>$data["opgKlaret"]];

    $db->sql($sql, $bind, false);


    echo "<h2 class='mt-3'>Opgaven er nu tilføjet</h2>  <br> <a class='btn btn-primary mt-1 text-white fw-bold' href='insertOpgave.php'>Lav en ny opgave</a> <br> ";
    echo "<a class='btn btn-primary mt-5 text-white fw-bold' href='opgaver.php'>Tilbage</a> ";
    exit;
}


?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Opret Opgave</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark">

<div class="container">
    <form action="insertOpgave.php" method="post">
        <h1 class="text-white fw-bold mt-3">Opret Opgave</h1>
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label for="opgNavn" class="form-label">Opgave Navn</label>
                <input type="text" class="form-control" id="opgNavn" name="data[opgNavn]" placeholder="Opgave Navn" value="">
            </div>

            <div class="col-12">
                <label for="opgBeskrivelse" class="form-label">Opgave Beskrivelse</label>
                <textarea class="form-control" name="data[opgBeskrivelse]" id="opgBeskrivelse" placeholder="Opgave Beskrivelse"></textarea>
            </div>

            <div class="col-12 col-md-6">
                <label for="opgKlaret" class="form-label">Status</label>
                <select class="form-select" name="data[opgKlaret]" id="opgKlaret">
                    <?php
                    // Assuming these are the possible enum values for `opgKlaret`
                    $opgKlaretOptions = ['Ikke Gennemført', 'I Gang', 'Gennemført'];

                    foreach ($opgKlaretOptions as $option) {
                        echo "<option value='$option'>$option</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-12 col-md-4 offset-md-8">
                <button type="submit" class="btn btn-primary w-100 text-white fw-bold">Opret Opgave</button>
            </div>
        </div>
    </form>
</div>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
