<?php
/** @var PDO $db */
require "settings/init.php";

$ansatte = $db->sql("SELECT * FROM ansatte");

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Ansatte</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark">
<div class="container">
    <h1 class="text-light mt-3">Liste over ansatte</h1>
    <div class="col-12 mb-4">
        <a class="btn btn-primary text-white fw-bold" href="insertAnsat.php">Tilføj Ansat</a>
    </div>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Navn</th>
            <th>Mail</th>
            <th>Telefon</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach($ansatte as $ansat) {
                ?>
                <tr>
                    <td><?php echo $ansat->AnsId?></td>
                    <td><?php echo $ansat->Name?></td>
                    <td><?php echo $ansat->Email?></td>
                    <td><?php echo $ansat->Phone?></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <div class="col-12 mb-4">
        <a class="btn btn-primary text-white fw-bold" href="index.php">Tilbage</a>
    </div>
</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
