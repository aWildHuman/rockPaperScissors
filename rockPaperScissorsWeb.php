<?php

$userChoice="";
$choicesArray=array(
	"Rock",
	"Paper",
	"Scissors"
);
function rockPaperScissors($userChoice,$choices){
	if($userChoice!==""){
		$again=" again";
	}else{
		$again="";
	}
	echo "
		<form method=\"POST\" action=\"".$_SERVER["PHP_SELF"]."\">
			<fieldset>
				<legend>Let's play$again</legend>";
	foreach($choices as $possibleChoice){
		echo "
				<input type=\"radio\" id=\"$possibleChoice\" name=\"shoot\" value=\"$possibleChoice\" ";
		if($userChoice=="$possibleChoice"){
			echo "checked=\"checked\" ";
		}
		echo "/>
				<label for=\"$possibleChoice\">$possibleChoice</label><br />";
	}
	echo "
				<br />
				<input type=\"submit\" value=\"Shoot!\" />
			</fieldset>
		</form>";
}

echo "
<!DOCTYPE html>
<html lang=\"en-us\">
	<head>
		<meta charset=\"UTF-8\" />
		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
		<title>
			Rock Paper Scissors
		</title>
	</head>
	<body>
		<hr />
		<h3>&nbsp;&nbsp;Rock Paper Scissors SHOOT!</h3>
		<hr />";

if(isset($_POST["shoot"])){
	if((!empty($_POST["shoot"])) && (trim($_POST["shoot"]) !== "")){
		$userChoice=$_POST["shoot"];
		$computerChoice=rand(0,2);
		if(in_array("$userChoice",$choicesArray)){
		$win="
		<hr />
		<strong>~~~ YOU WON ~~~</strong><br />
		<br />
		";
		$lose="
		<hr />
		<strong>~~~ YOU LOST ~~~</strong><br />
		<br />
		";
		$draw="
		<hr />
		<strong>~~~ DRAW ~~~</strong><br />
		<br />
		";
			echo "
		<br />
		You chose \"$userChoice\".<br />
		Computer chose \"".$choicesArray[$computerChoice]."\".<br />
		<br />";
			switch($userChoice){
				case "Rock":
					switch($computerChoice){
						case 0:
							echo "$draw";
						break;
						case 1:
							echo "$lose";
						break;
						default:
							echo "$win";
						break;
					}
				break;
				case "Paper":
					switch($computerChoice){
						case 0:
							echo "$win";
						break;
						case 1:
							echo "$draw";
						break;
						default:
							echo "$lose";
						break;
					}
				break;
				default:
					switch($computerChoice){
						case 0:
							echo "$lose";
						break;
						case 1:
							echo "$win";
						break;
						default:
							echo "$draw";
						break;
					}
				break;
			}
		}else{
			echo "
		\"$userChoice\" is not a valid option<br />
		<br />";
		}
	}else{
		echo "
		Please make a choice below.";
	}
}
rockPaperScissors($userChoice,$choicesArray);

echo "
	</body>
</html>";
?>
