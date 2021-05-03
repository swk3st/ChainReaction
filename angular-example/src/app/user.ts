export class User {
    display_name: string;
    email: string;
    career_earnings: number;
    guesses: number;
    correct_guesses: number;
    percent_guessed_correct: number;

 
    constructor(display_name: string, email: string, career_earnings:number, guesses:number, correct_guesses: number, percent_guessed_correct: number ) {
       this.display_name = display_name;
       this.email = email;
       this.career_earnings = career_earnings;
       this.guesses = guesses;
       this.correct_guesses = correct_guesses;
       this.percent_guessed_correct = percent_guessed_correct;
    } 
 }

