<?php
$sql_user_attempts = "
SELECT attempt_no 
FROM attempt 
WHERE app_user_id=? 
ORDER BY id DESC LIMIT 1";
$sth_user_attempts = $dbh->prepare($sql_user_attempts);
$sth_user_attempts->execute(array($_SESSION["app_user_id"]));
$attempt_no = $sth_user_attempts->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
if (!empty($attempt_no[0]) && $attempt_no[0] > 0) {
	$_SESSION["attempt_no"] = $attempt_no[0];
} else {
	$_SESSION["attempt_no"] = 0;
}
?>