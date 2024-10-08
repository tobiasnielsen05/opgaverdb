<?php
/** @var PDO $db */
require "settings/init.php";

if(empty($_GET["opgId"])) {
    header("Location: index.php");
}

$opgId = $_GET["opgId"];
$opgave = $db->sql("SELECT 'Name', `opgId` , `opgNavn`, `opgBeskrivelse`, `opgKlaret`  FROM opgaver WHERE opgId = :opgId", [":opgId" => $opgId]);
$opgave = $opgave[0];
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title><?php echo $opgave->opgNavn; ?></title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark text-white">

<div class="container">
    <div class="row">
        <div class="col col-12 mt-3">
            <?php
            echo "<h1 class='text-primary'>" . $opgave->opgNavn . "</h1>";
            echo "<strong>Beskrivelse:</strong><br>" . $opgave->opgBeskrivelse;
            ?>
        </div>
        <div class="col col-12 mt-5">
            <h2>Ansatte på opgaven</h2>
        </div>
        <div class="col">
            <?php
            $ansatte = $db->sql("SELECT * FROM ansatte INNER JOIN event_team_con ON AnsId = evtecAnsId
                WHERE evtecOpgId = :opgId", [":opgId" => $opgId]);
            foreach($ansatte as $ansat) {
                echo $ansat->Name . "<br>";
                ?>
                <?php
            }
            ?>
        </div>
        </div>
    <div>
        <a class="btn btn-primary mt-3 text-white fw-bold" href="opgaveAddAnsatte.php?opgId=<?php echo $opgave->opgId; ?>">Tilføj Ansatte</a>
    </div>
        <div class="col mt-5 mb-5">
            <strong>Opgave:</strong>
            <?php
            echo $opgave->opgKlaret;
            ?>
        </div>
    </div>
</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
