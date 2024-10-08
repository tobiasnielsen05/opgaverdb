<?php
/** @var PDO $db */
require "settings/init.php";

if(!empty($_POST["opgId"]) && !empty($_POST["data"])) {
    $data = $_POST["data"];
    $opgaver = $db->sql("UPDATE opgaver SET opgNavn = :opgNavn, opgBeskrivelse = :opgBeskrivelse, opgKlaret = :opgKlaret WHERE opgId = :opgId", [":opgNavn" =>$data["opgNavn"], ":opgBeskrivelse" => $data["opgBeskrivelse"], ":opgKlaret" => $data["opgKlaret"], ":opgId" => $_POST["opgId"]]);

    header("Location: editOpgave.php?success=1&opgId=".$_POST["opgId"]);
    exit;
}

if(empty($_GET["opgId"])) {
    header("Location: index.php");
}
$opgId = $_GET["opgId"];
$opgKlaret = $_GET["opgKlaret"];

$opgaver = $db->sql("SELECT * FROM opgaver WHERE opgId = :opgId", [":opgId" => $opgId]);
$opgaver = $opgaver[0];


?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Opdater Opgave</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark text-white">
<div class="container">
    <?php
    if(!empty($_GET["success"]) && $_GET["success"] == 1) {
        echo "<h4 class='mt-3'>Opgaven er blevet opdateret</h4> <br>";
        echo "<h4><a class='btn btn-primary text-white fw-bold' href='opgaver.php'>Gå tilbage til opgaver</a></h4>";
    }
    ?>
    <form action="editOpgave.php" method="post">
        <div class="row g-3 mt-3">
            <div class="col-12 col-md-4">
                <label for="opgNavn" class="form-label fw-bold">Navn</label>
                <input type="text" class="form-control" id="opgNavn" name="data[opgNavn]" placeholder="navn" value="<?php echo $opgaver->opgNavn ?>">
            </div>

            <div class="col-12">
                <label for="opgBeskrivelse" class="form-label fw-bold">Opgave Beskrivelse</label>
                <textarea class="form-control" name="data[opgBeskrivelse]" id="opgBeskrivelse"><?php echo $opgaver->opgBeskrivelse ?></textarea>
            </div>

            <div class="col-12 col-md-4">
                <label for="opgKlaret" class="form-label fw-bold"></label>
                <select class="form-select" name="data[opgKlaret]" id="opgKlaret">
                    <?php
                    // Assuming these are the possible enum values for `opgKlaret`
                    $opgKlaretOptions = ['Ikke Gennemført', 'I Gang', 'Gennemført'];

                    foreach ($opgKlaretOptions as $option) {
                        // Check if this option is the currently selected value
                        $selected = ($option == $opgaver->opgKlaret) ? 'selected' : '';
                        echo "<option value='$option' $selected>$option</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-12 col-md-5 d-flex offset-md-4 mt-5">
                <button type="submit" class="btn btn-primary w-100 text-white fw-bold">Opdater</button>
            </div>
        </div>
        <input type="hidden" name="opgId" value="<?php echo $opgaver->opgId ?>">
    </form>
</div>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
