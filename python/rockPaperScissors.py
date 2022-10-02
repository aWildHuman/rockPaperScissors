import sys
import os
import random

def header():
	if os.name == "nt":
		os.system("cls")
	else:
		os.system("clear")
	print("\n--------------------------------------------------------------------------------")
	print("\n  Rock Paper Scissors SHOOT!")
	print("\n--------------------------------------------------------------------------------\n")

def shoot(user_choice):
	header()
	computer_choice=random.randrange(1,4)
	#1 rock
	#2 paper
	#3 scissors
	if user_choice == '':
		print("\n  You typed nothing...\n")
	else:
		if user_choice == 'quit':
			print("  Thanks for playing, goodbye!\n\n")
			sys.exit()
		match computer_choice:
			case 1:
				computer_choice_text="rock"
			case 2:
				computer_choice_text="paper"
			case _:
				computer_choice_text="scissors"
		result="YOU LOST"
		if computer_choice_text == user_choice:
			result="DRAW"
		else:
			match user_choice:
				case "rock":
					if computer_choice_text == "scissors":
						result="YOU WON"
				
				case "paper":
					if computer_choice_text == "rock":
						result="YOU WON"
				
				case "scissors":
					if computer_choice_text == "paper":
						result="YOU WON"
				case _:
					print("  \""+user_choice+"\" is not a valid option.\n\n")
					result="INVALID"
		if result != "INVALID":
			print("  You chose \""+user_choice+"\"")
			print("  Computer chose \""+computer_choice_text+"\"")
			print("  ~~~"+result+"~~~")
	print("  Let's try again!\n")
	rockPaperScissors()

def rockPaperScissors():
	print("  Valid options are \"rock\", \"paper\", \"scissors\", or \"quit\":\n")
	user_choice = input("Type your choice and press [ENTER]:\n\n")
	shoot(user_choice)

header()
print("  Let's play!\n")
rockPaperScissors()
