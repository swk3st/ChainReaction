class Word {
    constructor(word) {
        this.word = word;
        this.chars = word.split().reverse();
        this.current = "";
        this.completed = this.chars.length == 0;
    }

    equals = (string) => {
        return this.word == string;
    }

    addLetter = () => {
        let char = chars.pop();
        if (char != undefined) {
            this.current += char;
            return true;
        }
        this.completed = true;
        return false;
    }

    guessWord = (guess) => {
        if (this.equals(guess)) {
            this.chars = [];
            this.current = this.word;
            this.completed = true;
            return true;
        } else {
            return false;
        }
    }

    complete = () => {
        this.chars = [];
        this.current = this.word;
        this.completed = true;
    }
}

class Game {
    constructor(chain) {
        this.chain = chain;
        this.max = 0;
        this.totalChars = 0;
        this.currentChars = 0;
        this.calculateMax();
        this.score = this.max;
        this.board = [];
        this.initalizeBoard();
        this.above = 1;
        this.below = 5;
        this.guesses = 0;
        this.correct = 0;
    }

    calculateMax = () => {
        let max = 0;
        for (let i = 1; i < this.chain.length - 1; i++) {
            max += chain[i].length;
        }
        this.totalChars = max;
        this.max = max * 10000;
    }

    initalizeBoard = () => {
        for (let i = 0; i < this.chain.length; i++) {
            board.push(new Word(this.chain[i]))
        }
        this.board[0].complete();
        this.board[6].complete();
    }

    isFinished = () => {
        return this.board.reduce((result, x) => result && x.complete);
    }

    guessAbove = (guess) => {
        this.guesses++;
        let success = this.board[this.above].guess(guess);
        if (success) {
            this.correct++;
            this.above++;
        }
        return isFinished();
    }

    guessBelow = (guess) => {
        this.guesses++;
        let success = this.board[this.below].guess(guess);
        if (success) {
            this.correct++;
            this.below--;
        }
        return isFinished();
    }

    requestAbove = () => {
        this.guesses++;
        let completedWord = this.board[this.above].addLetter();
        if (completedWord) {
            this.above++;
        }
    }

    requestBelow = () => {
        this.guesses++;
        let completedWord = this.board[this.below].addLetter();
        if (completedWord) {
            this.below++;
        }
    }

    calculatePayout = () => {
        return (this.currentChars / this.totalChars * this.score).toFixed(2);
    }
}