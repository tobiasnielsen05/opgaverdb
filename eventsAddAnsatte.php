<?php
/** @var PDO $db */
require "settings/init.php";

if(!empty($_POST["evenId"])) {
    $db->sql("DELETE FROM event_team_con WHERE evtecEvenId = :evtecEvenId", [":evtecEvenId"=>$_POST["evenId"]]);

    foreach($_POST["ansatte"] as $ansat) {
        $db->sql("INSERT INTO event_team_con (evtecEvenId, evtecAnsId) VALUES (:evtecEvenId, :evtecAnsId)", [":evtecEvenId"=>$_POST["evenId"], ":evtecAnsId" => $ansat]);
    }

    header("Location: events.php");

    exit;
}

if(empty($_GET["evenId"])) {
    header("Location: index.php");
}
$evenId = $_GET["evenId"]
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
    <form action="eventsAddAnsatte.php" method="post">
        <select name="ansatte[]" class="form-select" multiple aria-label="Events" style="height: 350px;">
            <?php
            $ansatte = $db->sql("SELECT AnsId, Name, evtecEvenId FROM ansatte LEFT JOIN event_team_con ON AnsId = evtecAnsId
                AND evtecEvenId = :evenId", [":evenId" => $evenId]);
            foreach($ansatte as $ansat) {
                ?>
                <option value="<?php echo $ansat->AnsId; ?>" <?php echo (!empty($ansat->evtecEvenId)) ? "selected" : ""; ?>><?php echo $ansat->Name; ?></option>
                <?php
            }
            ?>
        </select>

        <input type="hidden" name="evenId" value="<?php echo $evenId; ?>">

        <button type="submit" class="btn btn-primary text-white fw-bold mt-4">Tilføj Ansat</button>

    </form>
</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
