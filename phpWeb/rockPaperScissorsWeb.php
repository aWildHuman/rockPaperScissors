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
			$result="YOU LOSE";
			if($choicesArray[$computerChoice]==$userChoice){
				$result="DRAW";
			}
			switch($userChoice){
				case "Rock":
					if($choicesArray[$computerChoice]=="Scissors"){
						$result="YOU WON";
					}
				break;
				case "Paper":
					if($choicesArray[$computerChoice]=="Rock"){
						$result="YOU WON";
					}
				break;
				default:
					if($choicesArray[$computerChoice]=="Paper"){
						$result="YOU WON";
					}
				break;
			}
			echo "
		<br />
		You chose \"$userChoice\".<br />
		Computer chose \"".$choicesArray[$computerChoice]."\".<br />
		<br />
		<hr />
		<strong>~~~ $result ~~~</strong><br />
		<br />";
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
