<?php
	foreach ($model as $answer) {
		echo $answer->reviewQuestions->title."<br />";
		echo "Ans : ".$answer->answers."<br />";
	}
?>