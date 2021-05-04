import { Game } from './game.js';
import { requestChain, requestGame } from './request.js';

let game;
let aboveLetterButton, belowLetterButton;
let aboveField, belowField;
let aboveGuessButton, belowGuessButton;
let word1, word2, word3, word4, word5, word6, word7;
let words;
let chainId, timeData, cooldownData;
let chainWords;
let gameTime, cooldown, timeRemaining;
let params = new URLSearchParams(location.search);
let gameId = params.get('gameID');
let playerId = params.get('playerID');
let done = false;

requestGame(gameId).then((data) => {
    let info  = data[0][0];
    chainId = info.chain_id;
    timeData = info.time;
    cooldownData = info.cooldown;
    requestChain(chainId).then((chain) => {
        chainWords = [];
        chainWords.push(chain[0].word1);
        chainWords.push(chain[0].word2);
        chainWords.push(chain[0].word3);
        chainWords.push(chain[0].word4);
        chainWords.push(chain[0].word5);
        chainWords.push(chain[0].word6);
        chainWords.push(chain[0].word7);
        const currTime = Math.round(Date.now()/1000);
        gameTime = Math.round((timeData - currTime), 2);
        cooldown = cooldownData;
        game = new Game(chainWords, gameTime, cooldown);
        timeRemaining = gameTime;
    });
});



aboveLetterButton = document.getElementById('above-letter');
belowLetterButton = document.getElementById('below-letter');
aboveField = document.getElementById('above-field');
belowField = document.getElementById('below-field');
aboveGuessButton = document.getElementById('above-guess');
belowGuessButton = document.getElementById('below-guess');

word1 = document.getElementById('word1');
word2 = document.getElementById('word2');
word3 = document.getElementById('word3');
word4 = document.getElementById('word4');
word5 = document.getElementById('word5');
word6 = document.getElementById('word6');
word7 = document.getElementById('word7');
words = [word1, word2, word3, word4, word5, word6, word7];



const aLBHandle = () => {
    game.requestAbove();
    cooldownButtons();
    console.log(game.show());
}

const bLBHandle = () => {
    game.requestBelow();
    cooldownButtons();
    console.log(game.show());
}

const aGBHandle = () => {
    const guess = aboveField.value;
    aboveField.value = '';
    game.guessAbove(guess);
    console.log(game.show());
}

const bGBHandle = () => {
    const guess = belowField.value;
    belowField.value = '';
    game.guessBelow(guess);
    console.log(game.show());
}


aboveLetterButton.addEventListener('click', aLBHandle);
belowLetterButton.addEventListener('click', bLBHandle);
aboveGuessButton.addEventListener('click', aGBHandle);
belowGuessButton.addEventListener('click', bGBHandle);

const disableAll = () => {
    aboveLetterButton.disabled = true;
    belowLetterButton.disabled = true;
    aboveField.disabled = true;
    belowField.disabled = true;
    aboveGuessButton.disabled = true;
    belowGuessButton.disabled = true;
};

const lockButtons = () => {
    aboveLetterButton.disabled = true;
    belowLetterButton.disabled = true;
    styleButton(aboveLetterButton, true);
    styleButton(belowLetterButton, true);
};

const unlockButtons = () => {
    aboveLetterButton.disabled = false;
    belowLetterButton.disabled = false;
    styleButton(aboveLetterButton, false);
    styleButton(belowLetterButton, false);

}

const cooldownButtons = () => {
    lockButtons();
    setTimeout(unlockButtons, cooldown*1000);
}

const styleButton = (button, stylize) => {
    if (stylize) {
        button.style.backgroundColor = 'black';
        button.style.opacity = '0.1';
    } else {
        button.style.backgroundColor = '';
        button.style.opacity = '1';
    }
}

let clockElem = document.getElementById('clock');
let scoreElem = document.getElementById('score');

const getUsedTime = (timeLeft) => {
    return gameTime - timeLeft;
};


const updateDatabase = () => {
    // const timeUsed = getUsedTime();
    // const payout = game.calculatePayout(timeUsed);
    // make an ajax call to update the playing table
};

const writeToHistory = () => {
    const timeUsed = getUsedTime();
    const payout = game.calculatePayout(timeUsed);
    // make an ajax call to insert the data into history table
    // make an ajax call to remove a player from the playing table
};

const writeTable = () => {
    let i = 0;
    for (let word of words) {
        if (game.board[i].current.length == 0) {
            word.innerHTML = '.';
        } else {
            word.innerHTML = game.board[i].current;
        }
        i++;
    }
}


const clock = setInterval(() => {
    timeRemaining--;
    clockElem.innerHTML = "Clock: " + timeRemaining;
    if (timeRemaining <= -1) {
        done = true;
        disableAll();
        clearInterval(clock);
    }
}, 1000);

const gameTicker = setInterval(() => {
    if (game.isFinished()) {
        done = true;
        disableAll();
        clearInterval(gameTicker);
    } else {
        updateDatabase();
    }

    if (!done) {
        var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0, 
          });
        const currentScore = game.calculateScore(getUsedTime(timeRemaining));
        scoreElem.innerHTML = "Potential Payout: " + formatter.format(game.score);
        writeTable();
        console.log(game);
    }
}, 1000);
