class Word {
    constructor(word) {
        this.word = word;
        this.chars = word.split("").reverse();
        this.current = "";
        this.completed = this.chars.length == 0;
    }

    equals = (string) => {
        return this.word == string;
    }

    addLetter = () => {
        let char = this.chars.pop();
        if (this.chars.length == 0) {
            this.completed = true;
        }
        if (char != undefined) {
            this.current += char;
            return this.completed;
        }
        return this.completed;
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
    constructor(chain, time, cooldown) {
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
        this.requests = 0;
        this.time = time;
        this.cooldown = cooldown;
        this.timePenalty = 1/time;
        this.letterPenalty = cooldown * this.timePenalty;
    }

    calculateMax = () => {
        let max = 0;
        for (let i = 1; i < this.chain.length - 1; i++) {
            max += this.chain[i].length;
        }
        this.totalChars = max;
        this.max = max * 10000;
    }

    initalizeBoard = () => {
        for (let i = 0; i < this.chain.length; i++) {
            this.board.push(new Word(this.chain[i]))
        }
        this.board[0].complete();
        this.board[6].complete();
    }

    isFinished = () => {
        return this.board.reduce((result, x) => result && x.completed);
    }

    guessAbove = (guess) => {
        this.guesses++;
        let success = this.board[this.above].guessWord(guess);
        if (success) {
            this.correct++;
            this.above++;
        }
        return this.isFinished();
    }

    guessBelow = (guess) => {
        this.guesses++;
        let success = this.board[this.below].guessWord(guess);
        if (success) {
            this.correct++;
            this.below--;
        }
        return this.isFinished();
    }

    requestAbove = () => {
        this.guesses++;
        this.requests++;
        let completedWord = this.board[this.above].addLetter();
        if (completedWord) {
            this.above++;
        }
    }

    requestBelow = () => {
        this.guesses++;
        this.requests++;
        let completedWord = this.board[this.below].addLetter();
        if (completedWord) {
            this.below--;
        }
    }

    recalculateCurrentChars = () => {
        let sum = 0;
        for (let i = 1; i < this.chains.length - 1; i++) {
            sum += this.board[i].current.length;
        }
        this.currentChars = sum;
    }

    calculateScore = (timeUsed) => {
        this.score = this.max - (timeUsed * this.timePenalty + this.requests * this.letterPenalty);
    }

    calculatePayout = (timeUsed) => {
        this.calculateScore(timeUsed);
        this.recalculateCurrentChars();
        return (this.currentChars / this.totalChars * this.score).toFixed(2);
    }

    show = () => {
        let words = [];
        for (let word of this.board) {
            words.push(word.current);
        }
        console.log(words);
        return words;
    }
}

export { Game };