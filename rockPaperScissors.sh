#!/bin/sh

function header {
	clear;
	echo -e "\n--------------------------------------------------------------------------------";
	echo -e "\n  Rock Paper Scissors SHOOT!";
	echo -e "\n--------------------------------------------------------------------------------\n";
};

function shoot {
	header;
	userChoice="$1";
	computerChoice=$[ $RANDOM % 3 + 1 ];
	#1 rock
	#2 paper
	#3 scissors
	if [ -z $userChoice ]; then
		echo -e "  You typed nothing...";
	else
		case $userChoice in
			"quit")
				echo -e "  Thanks for playing, goodbye!\n\n";
				exit;
				;;
			"rock")
				echo -e "  You chose \"rock\".";
				case $computerChoice in
					1)
						echo -e "  Computer chose \"rock\".\n";
						echo -e "  ~~~ DRAW ~~~\n";
						;;
					2)
						echo -e "  Computer chose \"paper\".\n";
						echo -e "  ~~~ YOU LOST ~~~\n";
						;;
					*)
						echo -e "  Computer chose \"scissors\".\n";
						echo -e "  ~~~ YOU WON ~~~\n";
						;;
				esac
				;;
			"paper")
				echo -e "  You chose \"paper\".";
				case $computerChoice in
					1)
						echo -e "  Computer chose \"rock\".\n";
						echo -e "  ~~~ YOU WON ~~~\n";
						;;
					2)
						echo -e "  Computer chose \"paper\".\n";
						echo -e "  ~~~ DRAW ~~~\n";
						;;
					*)
						echo -e "  Computer chose \"scissors\".\n";
						echo -e "  ~~~ YOU LOST ~~~\n";
						;;
				esac
				;;
			"scissors")
				echo -e "  You chose \"scissors\".";
				case $computerChoice in
					1)
						echo -e "  Computer chose \"rock\".\n";
						echo -e "  ~~~ YOU LOST ~~~\n";
						;;
					2)
						echo -e "  Computer chose \"paper\".\n";
						echo -e "  ~~~ YOU WON ~~~\n";
						;;
					*)
						echo -e "  Computer chose \"scissors\".\n";
						echo -e "  ~~~ DRAW ~~~\n";
						;;
				esac
				;;
			*)
				echo -e "  \"$userChoice\" is not a valid option.\n\n";
				;;
		esac
	fi
	echo -e "  Let's try again\n";
	rockPaperScissors;
};

function rockPaperScissors {
	echo -e "  Valid options are \"rock\", \"paper\", \"scissors\", or \"quit\":\n";
	echo -e "Type your choice and press [ENTER]:\n"
	read userChoice;
	shoot $userChoice;
};

header;
rockPaperScissors;
