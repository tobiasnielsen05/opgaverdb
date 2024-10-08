<?php
/** @var PDO $db */
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Opgaver</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark">
<div class="container">
    <h1 class="text-center text-white mt-3">Opgaver</h1>
    <div class="row g-4 mt-3">
        <div class="col-12 col-md-6">
            <a class="btn btn-primary text-white fw-bold" href="insertOpgave.php">Opret Opgave</a>
        </div>
    </div>
    <div class="row g-4 mt-3">
        <?php
        $opgaver = $db->sql("SELECT * FROM opgaver");
        $ansatte = $db->sql("SELECT * FROM ansatte");
        foreach($opgaver as $opgave) {
            ?>
            <div class="col-12 col-md-6">
                <div class="card w-100">
                    <div class="card-header bg-primary text-light py-3">
                        <?php
                        echo "<h2 class='m-0'>".$opgave->opgNavn . "</h2>";
                        ?>
                    </div>
                    <div class="card-body">
                        <?php
                        echo $opgave->opgBeskrivelse;
                        ?>
                        <br><br>
                        <strong>Opgave:</strong>
                        <?php
                        echo $opgave->opgKlaret;
                        ?>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <a class="btn btn-primary text-light" href="AnsatListe.php?opgId=<?php echo $opgave->opgId; ?>" role="button">Ansatte</a>
                        <a class="btn btn-primary text-light" href="editOpgave.php?opgId=<?php echo $opgave->opgId; ?>" role="button">Rediger</a>
                        <a class="btn btn-danger text-light" href="deleteOpgave.php?opgId=<?php echo $opgave->opgId; ?>" role="button">Slet</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="col-12 mb-4">
            <a class="btn btn-primary text-white fw-bold mt-3" href="index.php">Tilbage</a>
        </div>
    </div>
</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
