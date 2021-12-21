<?php
$sql_get_attempts = "
SELECT a.quiz_id, a.id, a.app_user_id, u.username, a.score, a.attempt_no 
FROM attempt AS a 
INNER JOIN app_user AS u 
	ON a.app_user_id = u.id";
$sth_get_attempts = $dbh->prepare($sql_get_attempts);
$sth_get_attempts->execute();
$attempts = $sth_get_attempts->fetchAll(PDO::FETCH_ASSOC);

$sql_attempt_answers = "
SELECT question_id, question_answer_id
FROM attempt_answer
WHERE attempt_id = ?";
$sth_attempt_answers = $dbh->prepare($sql_attempt_answers);
?>