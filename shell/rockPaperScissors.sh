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
	if [ -z $userChoice ]; then
		echo -e "  You typed nothing...\n\n";
	else
		if [ $userChoice == "quit" ]; then
			echo -e "\n\n\n\n\n\n\n\n\n  Thanks for playing, goodbye!\n\n";
			exit;
		fi
		case $computerChoice in
			1)
				computerChoiceText="rock";
				;;
			2)
				computerChoiceText="paper";
				;;
			*)
				computerChoiceText="scissors";
				;;
		esac
		result="YOU LOST";
		if [ $computerChoiceText == $userChoice ]; then
			result="DRAW";
		else
			case $userChoice in
				"rock")
					if [ $computerChoiceText == "scissors" ]; then
						result="YOU WON";
					fi
					;;
				"paper")
					if [ $computerChoiceText == "rock" ]; then
						result="YOU WON";
					fi
					;;
				"scissors")
					if [ $computerChoiceText == "paper" ]; then
						result="YOU WON";
					fi
					;;
				*)
					echo -e "\n  \"$userChoice\" is not a valid option.\n\n\n\n";
						result="INVALID";
					;;
			esac
		fi
		if [ "$result" != "INVALID" ]; then
			echo -e "  You chose \"$userChoice\".\n";
			echo -e "  Computer chose \"$computerChoiceText\".\n";
			echo -e "  ~~~$result~~~\n";
		fi
	fi
	echo -e "  Let's try again!\n";
	rockPaperScissors;
};

function rockPaperScissors {
	echo -e "  Valid options are \"rock\", \"paper\", \"scissors\", or \"quit\":\n";
	echo -e "Type your choice and press [ENTER]:\n";
	read userChoice;
	shoot $userChoice;
};

header;
echo -e "\n\n\n\n\n\n  Let's play!\n";
rockPaperScissors;
