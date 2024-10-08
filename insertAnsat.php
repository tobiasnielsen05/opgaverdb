<?php
/** @var PDO $db */
require "settings/init.php";

if(!empty($_POST["data"])) {
    $data = $_POST["data"];

    $sql ="INSERT INTO ansatte (Name, Email, Phone) VALUES(:Name, :Email, :Phone)";
    $bind = [":Name" =>$data["Name"], ":Email" =>$data["Email"], ":Phone" =>$data["Phone"]];

    $db->sql($sql, $bind, false);

    echo "<strong>Ansat er nu tilføjet</strong>  <br> <a class='btn btn-primary mt-3 text-white fw-bold' href='insertAnsat.php'>Tilføj en ny ansat</a> <br> ";
    echo "<a class='btn btn-primary mt-3 text-white fw-bold' href='ansatte.php'>Tilbage</a> ";
    exit;
}

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Tilføj Ansat</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark">

<div class="container text-white mt-3">
    <form action="insertAnsat.php" method="post">
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label for="Name" class="form-label">Navn</label>
                <input type="text" class="form-control" id="Name" name="data[Name]" placeholder="Fulde Navn" value="">
            </div>

            <div class="col-12 col-md-6">
                <label for="Email" class="form-label">Email</label>
                <input type="text" class="form-control" id="Email" name="data[Email]" placeholder="Email" value="">
            </div>

            <div class="col-12 col-md-6">
                <label for="Phone" class="form-label">Tlf. Nummer</label>
                <input type="number" class="form-control" id="Phone" name="data[Phone]" placeholder="Tlf. Nummer" value="">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100 text-white fw-bold mt-3">Tilføj Ansat</button>
            </div>
        </div>
    </form>
</div>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
