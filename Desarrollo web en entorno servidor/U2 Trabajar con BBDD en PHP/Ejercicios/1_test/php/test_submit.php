<?php
if (!empty($_POST["test_submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
	require_once("../../php/connect_db.php");
	session_status() === PHP_SESSION_ACTIVE ?: session_start();
	include "./setup_quiz.php";
	$score = 0;

	$sql_get_index_questions = "SELECT MIN(id) AS min_id, MAX(id) AS max_id FROM question WHERE quiz_id = {$quiz["id"]}";
	$sth_get_index_questions = $dbh->prepare($sql_get_index_questions);
	$sth_get_index_questions->execute();
	$index_questions = $sth_get_index_questions->fetch(PDO::FETCH_ASSOC);

	for ($i = $index_questions["min_id"]; $i <= $index_questions["max_id"]; $i++) {
		$attempt_answer = $_POST["answer_for_question_{$i}"];
		$attempt_answers[$i] = $attempt_answer;
		if (!isset($attempt_answer) || empty($attempt_answer)) continue; //Preventing invalid answers

		foreach ($question_answers as $question_answer) { 
			if ($question_answer["question_id"] == $i) { 
				if ($question_answer["is_correct"] == 1 && $attempt_answer == $question_answer["id"]) {
					foreach ($questions as $question) {
						if ($question["id"] == $question_answer["question_id"]) {
							$score += $question["score"]; 
							break;
						}
					}
				}
			}
		}
	}

	$sql_insert_attempt = "INSERT INTO attempt (app_user_id, quiz_id, score, attempt_no) VALUES (?, ?, ?, ?)";
	$sth_insert_attempt = $dbh->prepare($sql_insert_attempt);
	$sth_insert_attempt->execute(array($_SESSION["app_user_id"], $quiz["id"], $score, ++$_SESSION["attempt_no"]));

	$sql_get_attempt_id = "SELECT MAX(id) AS attempt_id FROM attempt WHERE app_user_id=?";
	$sth_get_attempt_id = $dbh->prepare($sql_get_attempt_id);
	$sth_get_attempt_id->execute(array($_SESSION["app_user_id"]));
	$attempt_id = $sth_get_attempt_id->fetch(PDO::FETCH_ASSOC);

	$sql_insert_attempt_answer = "INSERT INTO attempt_answer (attempt_id, question_id, question_answer_id) VALUES (?, ?, ?)";
	$sth_insert_attempt_answer = $dbh->prepare($sql_insert_attempt_answer);
	foreach ($attempt_answers as $question_id => $question_answer_id) {
		$sth_insert_attempt_answer->execute(array($attempt_id["attempt_id"], $question_id, $question_answer_id));
	}

	header("Location: ../user.php");
}
?>