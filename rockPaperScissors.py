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
		print("  You typed nothing...")
	else:
		match user_choice:
			case "quit":
				print("  Thanks for playing, goodbye!\n\n")
				sys.exit()
			case "rock":
				print("  You chose \"rock\"")
				match computer_choice:
					case 1:
						print("  Computer chose \"rock\"\n")
						print("  ~~~ DRAW ~~~\n")
					case 2:
						print("  Computer chose \"paper\"\n")
						print("  ~~~ YOU LOST ~~~\n")
					case _:
						print("  Computer chose \"scissors\"\n")
						print("  ~~~ YOU WON ~~~\n")
			case "paper":
				print("  You chose \"paper\"")
				match computer_choice:
					case 1:
						print("  Computer chose \"rock\"\n")
						print("  ~~~ YOU WON ~~~\n")
					case 2:
						print("  Computer chose \"paper\"\n")
						print("  ~~~ DRAW ~~~\n")
					case _:
						print("  Computer chose \"scissors\"\n")
						print("  ~~~ YOU LOST ~~~\n")
			case "scissors":
				print("  You chose \"scissors\"")
				match computer_choice:
					case 1:
						print("  Computer chose \"rock\"\n")
						print("  ~~~ YOU LOST ~~~\n")
					case 2:
						print("  Computer chose \"paper\"\n")
						print("  ~~~ YOU WON ~~~\n")
					case _:
						print("  Computer chose \"scissors\"\n")
						print("  ~~~ DRAW ~~~\n")
			case _:
				print("  \""+user_choice+"\" is not a valid option.\n\n")
	print("  Let's try again\n")
	rockPaperScissors()

def rockPaperScissors():
	print("  Valid options are \"rock\", \"paper\", \"scissors\", or \"quit\":\n")
	user_choice = input("Type your choice and press [ENTER]:\n\n")
	shoot(user_choice)

header()
rockPaperScissors()
