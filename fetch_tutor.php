<?php
require("configure.php");
$subject_id = ($_REQUEST["subject_id"] <> "") ? trim($_REQUEST["subject_id"]) : "";
if ($subject_id <> "") {
$sql ="SELECT t.tutor_id,t.tutor_name FROM tutor t where t.status<>'pending' and t.subject like '%$subject_id%'";

try {
$stmt = $DB->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();
} catch (Exception $ex) {
    echo($ex->getMessage());
}
if (count($results) > 0) {
?>
<?php foreach ($results as $rs) { ?>
<h3>
<a href="#<?=$rs["tutor_id"];?>" onclick="f(this);" id="<?=$rs["tutor_id"];?>"><?=$rs["tutor_name"]; ?></a></h3><br>

<?php
}
}
}
?>