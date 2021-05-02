class Game {
    constructor(chain) {
        this.chain = chain;
        this.max = 0;
        this.totalChars = 0;
        this.currentChars = 0;
        this.pct = 1;
        this.calculateMax();
        this.score = this.max;
        this.board = [];
        this.initalizeBoard();
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
        board[0] = chain[0];
        board[1] = "";
        board[2] = "";
        board[3] = "";
        board[4] = "";
        board[5] = "";
        board[6] = chain[6];
    }

    checkGuess = (guess, index) => {
        return guess == chain[index];
    }

    guess = (attempt, index) => {
        
    }
}