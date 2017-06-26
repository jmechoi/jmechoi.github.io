<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict/dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv ="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Final Grade Calculator</title>
		<link rel="stylesheet" href="../style.css" type="text/css" />
		<link rel="stylesheet" href="formstyle.css" type="text/css" />
		<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css' />
	</head>

	<body>
		<div id="maincontent">
			<div id ="labcontent">

				<?php

					$finalGrade = 0;
					define("MAXGRADE", 100);
					echo "<div id='results'>";

					$earnedP = $_POST['earnedParticipation'];
					$maxP = $_POST['maxParticipation'];
					$weightP = $_POST['weightParticipation'];

					$pGrade = calculatedGrade($earnedP, $maxP);
					echo "<p>You earned a ", $pGrade, "% for Participation, with a weighted value of ", $weightP, "%</p>";
					$pGrade = weightedGrade($pGrade, $weightP);


					$earnedQ = $_POST['earnedQuiz'];
					$maxQ = $_POST['maxQuiz'];
					$weightQ = $_POST['weightQuiz'];

					$qGrade = calculatedGrade($earnedQ, $maxQ);
					echo "<p>You earned a ", $qGrade, "% for Quizzes, with a weighted value of ", $weightQ,"%</p>";
					$qGrade = weightedGrade($qGrade, $weightQ);


					$earnedL = $_POST['earnedLab'];
					$maxL = $_POST['maxLab'];
					$weightL = $_POST['weightLab'];

					$lGrade = calculatedGrade($earnedL, $maxL);
					echo "<p>You earned a ", $lGrade, "% for Labs, with a weighted value of ", $weightL,"%</p>";
					$lGrade = weightedGrade($lGrade, $weightL);

					$earnedPr = $_POST['earnedPracticum'];
					$maxPr = $_POST['maxPracticum'];
					$weightPr = $_POST['weightPracticum'];

					$prGrade = calculatedGrade($earnedPr, $maxPr);
					echo "<p>You earned a ", $prGrade, "% for Practicums, with a weighted value of ", $weightPr,"%</p>";
					$prGrade = weightedGrade($prGrade, $weightPr);


					function calculatedGrade($earnedGrade, $maxGrade) {
						$grade = ($earnedGrade / $maxGrade) * MAXGRADE;

						return $grade;
					}

					function weightedGrade($grade, $weight) {
						$weightGrade = $grade * ($weight / MAXGRADE);

						return $weightGrade;
					}


					$finalGrade = $pGrade + $qGrade + $lGrade + $prGrade;

					if ($finalGrade >= 97){
						$letterGrade = "A+";
					} elseif ($finalGrade >= 93 && $finalGrade < 97) {
						$letterGrade = "A";
					} elseif ($finalGrade >= 90 && $finalGrade < 93) {
						$letterGrade = "A-";
					} elseif ($finalGrade >= 87 && $finalGrade < 90) {
						$letterGrade = "B+";
					} elseif ($finalGrade >= 83 && $finalGrade < 87) {
						$letterGrade = "B";
					} elseif ($finalGrade >= 80 && $finalGrade < 83) {
						$letterGrade = "B-";
					} elseif ($finalGrade >= 77 && $finalGrade < 80) {
						$letterGrade = "C+";
					} elseif ($finalGrade >= 73 && $finalGrade < 77) {
						$letterGrade = "C";
					} elseif ($finalGrade >= 70 && $finalGrade < 73) {
						$letterGrade = "C-";
					} elseif ($finalGrade >= 60 && $finalGrade < 70) {
						$letterGrade = "D";
					} elseif ($finalGrade < 60) {
						$letterGrade = "F";
					}


					echo "<p><strong>Your Final Grade is a ", $finalGrade, "%, which is a ", $letterGrade, ".</strong></p><br /></div>";

				?>
			</div>
		</div>


	</body>
</html>