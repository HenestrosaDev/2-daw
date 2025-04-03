<?php
// Title is set by default because we only have that row in the DB
$sql_get_quiz = "SELECT * FROM quiz WHERE title='Examen unidad 2'";
$sth_get_quiz = $dbh->prepare($sql_get_quiz);
$sth_get_quiz->execute();
$quiz = $sth_get_quiz->fetch(PDO::FETCH_ASSOC);

$sql_get_questions = "SELECT * FROM question WHERE quiz_id=?";
$sth_get_questions = $dbh->prepare($sql_get_questions);
$sth_get_questions->execute(array($quiz["id"]));
$questions = $sth_get_questions->fetchAll(PDO::FETCH_ASSOC);

$sql_get_question_answers = "SELECT * FROM question_answer WHERE quiz_id=?";
$sth_get_question_answers = $dbh->prepare($sql_get_question_answers);
$sth_get_question_answers->execute(array($quiz["id"]));
$question_answers = $sth_get_question_answers->fetchAll(PDO::FETCH_ASSOC);
?>