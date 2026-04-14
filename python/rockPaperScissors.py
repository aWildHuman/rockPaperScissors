import sys
import os
import random

def header():
    print("\033[H\033[J", end="") 
    print("-" * 80)
    print("\n  Rock Paper Scissors SHOOT!")
    print("\n" + "-" * 80 + "\n")

def get_result(user, computer):
    if user == computer:
        return "DRAW"
    
    winners = {
        "rock": "scissors",
        "paper": "rock",
        "scissors": "paper"
    }
    
    if winners[user] == computer:
        return "YOU WON"
    return "YOU LOST"

def main():
    choices = ["rock", "paper", "scissors"]
    header()
    print("  Let's play!\n")

    while True:
        print('  Valid options: "rock", "paper", "scissors", or "quit":')
        user_input = input("Type your choice and press [ENTER]:\n\n").strip().lower()

        if user_input == "quit":
            print("  Thanks for playing, goodbye!\n")
            break
        
        if not user_input:
            header()
            print("  You typed nothing...\n")
            continue

        if user_input not in choices:
            header()
            print(f'  "{user_input}" is not a valid option.\n')
            continue

        computer_choice = random.choice(choices)
        result = get_result(user_input, computer_choice)

        header()
        print(f'  You chose "{user_input}"')
        print(f'  Computer chose "{computer_choice}"')
        print(f'  ~~~{result}~~~')
        print("\n  Let's try again!\n")

if __name__ == "__main__":
    try:
        main()
    except KeyboardInterrupt:
        print("\n\n  Game exited.")
        sys.exit()
