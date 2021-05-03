export class User {
    display_name: string;
    email: string;
    earnings: number;
    guesses: number;
    correct: number;
    percent: number;

 
    constructor(display_name: string, email: string, earnings:number, guesses:number, correct: number, percent: number ) {
       this.display_name = display_name;
       this.email = email;
       this.earnings = earnings;
       this.guesses = guesses;
       this.correct = correct;
       this.percent = percent;
    } 
 }
