<?php
$sql_get_quiz_statistic = "SELECT * FROM quiz_statistic";
$sth_get_quiz_statistic = $dbh->prepare($sql_get_quiz_statistic);
$sth_get_quiz_statistic->execute();
$quiz_statistic = $sth_get_quiz_statistic->fetchAll(PDO::FETCH_ASSOC);
?>