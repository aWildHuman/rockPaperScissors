use std::io;
use std::process;
use rand::Rng;

fn header(){
	print!("\x1B[2J");
	println!("--------------------------------------------------------------------------------");
	println!("\n  Rock Paper Scissors SHOOT!");
	println!("\n--------------------------------------------------------------------------------");
}

fn shoot(user_choice: String){
	header();
	if !user_choice.is_empty() {
		if user_choice == "quit" {
			println!("\n\n\n\n\n  Thanks for playing, goodbye!\n\n\n");
			process::exit(0);
		}
		let choices_array = ["rock", "paper", "scissors"];
		let mut valid_choice = false;
		for choice_option in choices_array {
			if user_choice == choice_option {
				valid_choice = true;
			}
		}
		if valid_choice != true {
			println!("\n  \"{}\" is not a valid option.\n",user_choice);
		}else{
			let computer_choice: usize = rand::thread_rng().gen_range(0..=2);
			let computer_choice_string = choices_array[computer_choice];
			let mut result = "YOU LOST";
			if computer_choice_string == user_choice {
				result = "DRAW";
			}else{
				match &user_choice as &str {
					"rock" =>
						if computer_choice_string == "scissors" {
							result = "YOU WON";
						}
					"paper" =>
						if computer_choice_string == "rock" {
							result = "YOU WON";
						}
					_ =>
						if computer_choice_string == "paper" {
							result = "YOU WON";
						}
				}
			}
			println!("  You chose \"{}\".",user_choice);
			println!("  The computer chose \"{}\".",computer_choice_string);
			println!("  ~~~{}~~~",result);
		}
	}else{
		println!("\n  You typed nothing...\n");
	}
	println!("\n  Let's try again!");
	rock_paper_scissors();
}

fn rock_paper_scissors() {
	println!("  Valid options are \"rock\", \"paper\", \"scissors\", or \"quit\":\n");
	println!("Type your choice and press [ENTER]:\n");
	let mut shot = String::new();
	io::stdin().read_line(&mut shot).expect("Failed to record your shot...");
	shoot(shot.trim().to_lowercase());
}

fn main(){
	header();
	println!("\n\n\n\n  Let's play!");
	rock_paper_scissors();
}
