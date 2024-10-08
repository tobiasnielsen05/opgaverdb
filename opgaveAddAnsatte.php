<?php
/** @var PDO $db */
require "settings/init.php";

if(!empty($_POST["opgId"])) {
    $db->sql("DELETE FROM event_team_con WHERE evtecOpgId = :evtecOpgId", [":evtecOpgId"=>$_POST["opgId"]]);

    foreach($_POST["ansatte"] as $ansat) {
        $db->sql("INSERT INTO event_team_con (evtecOpgId, evtecAnsId) VALUES (:evtecOpgId, :evtecAnsId)", [":evtecOpgId"=>$_POST["opgId"], ":evtecAnsId" => $ansat]);
    }

    header("Location: opgaver.php");

    exit;
}

if(empty($_GET["opgId"])) {
    header("Location: index.php");
}
$opgId = $_GET["opgId"]
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Tilføj ansatte</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark">
<div class="container mt-4">
    <form action="opgaveAddAnsatte.php" method="post">
        <select name="ansatte[]" class="form-select" multiple aria-label="Teams" style="height: 350px;">
            <?php
            $ansatte = $db->sql("SELECT AnsId, Name, evtecOpgId FROM ansatte LEFT JOIN event_team_con ON AnsId = evtecAnsId
                AND evtecOpgId = :opgId", [":opgId" => $opgId]);
            foreach($ansatte as $ansat) {
                ?>
                <option value="<?php echo $ansat->AnsId; ?>" <?php echo (!empty($ansat->evtecOpgId)) ? "selected" : ""; ?>><?php echo $ansat->Name; ?></option>
                <?php
            }
            ?>
        </select>

        <input type="hidden" name="opgId" value="<?php echo $opgId; ?>">

        <button type="submit" class="btn btn-primary text-white fw-bold mt-4">Tilføj Ansat</button>

    </form>
</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
