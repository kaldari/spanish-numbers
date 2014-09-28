<?php
$numbers = array(
	1 => 'uno',
	2 => 'dos',
	3 => 'tres',
	4 => 'quatro',
	5 => 'cinco',
	6 => 'seis',
	7 => 'siete',
	8 => 'ocho',
	9 => 'nueve',
	10 => 'diez',
	11 => 'once',
	12 => 'doce',
	13 => 'trece',	
	14 => 'catorce',
	15 => 'quince',
	16 => 'dieciseis',
	17 => 'diecisiete',
	18 => 'dieciocho',
	19 => 'diecinueve',
	20 => 'veinte',
	30 => 'treinta',
	40 => 'cuarenta',
	50 => 'cincuenta',
	60 => 'sesenta',
	70 => 'setenta',
	80 => 'ochenta',
	90 => 'noventa',
	100 => 'cien'
);
	
function pickNumber() {
	$choices = array(
		1 => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ), // 1-10
		2 => array( 11, 12, 13, 14, 15, 16, 17, 18, 19, 20 ), // 11-20
		3 => array( 10, 20, 30, 40, 50, 60, 70, 80, 90, 100 ), // 10-100
		4 => array( 4, 5, 6, 7, 14, 15, 40, 50 ) // hard
	);
	$choiceRand = rand( 1, 4 );
	$choiceSet = $choices[$choiceRand];
	return $choiceSet[array_rand($choiceSet)];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Spanish Numbers</title>
	<script src="jquery-1.10.1.min.js"></script> 
	<script>
		function ask() {
			document.getElementById( 'answer' ).focus();
		}
		function test(e) {
			if ( e.keyCode == 13 ) {
				document.getElementById( 'quiz' ).submit();
			}
		}
	</script>
	<style>
	body {
		text-align: center;
		margin: 1em;
	}
	input {
		font-size: 7em;
	}
	.question {
		font-size: 10em;
	}
	.win {
		font-size: 6em;
		color: green;
	}
	.lose {
		font-size: 6em;
		color: #cc0000;
	}
	</style>
</head>
<body onload="ask();">
<?php
	if ( $_POST['answer'] ) {
		if ( $_POST['answer'] !== $numbers[$_POST['question']] ) {
			print '<p class="lose">Wrong</p>';
			$number = $_POST['question'];
		} else {
			print '<p class="win">Correct</p>';
			$number = pickNumber();
		}
	} else {
		print '<p class="win">&nbsp;</p>';
		$number = pickNumber();
	}
	print '<p class="question">'.$number.'</p>';
?>
<p>
<form id="quiz" action="index.php" method="post">
	<input type="text" id="answer" name="answer" size="10" autocomplete="off" onkeypress="test(e);"/>
	<input type="hidden" id="question" name="question" value="<?php print $number; ?>"/>
</form>
</p>
</body>
</html>
