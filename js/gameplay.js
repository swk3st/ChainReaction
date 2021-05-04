import { Game } from './game.js';
import { requestChain, requestGame } from './request.js';

let game;
let aboveLetterButton, belowLetterButton;
let aboveField, belowField;
let aboveGuessButton, belowGuessButton;
let chainId, timeData, cooldownData;
let chainWords;
let gameTime, cooldown;
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
        console.log(chainWords);
        const currTime = Math.round(Date.now()/1000);
        gameTime = Math.round((timeData - currTime), 2);
        cooldown = cooldownData;
        game = new Game(chainWords, gameTime, cooldown);
    });
});



aboveLetterButton = document.getElementById('above-letter');
belowLetterButton = document.getElementById('below-letter');
aboveField = document.getElementById('above-field');
belowField = document.getElementById('below-field');
aboveGuessButton = document.getElementById('above-guess');
belowGuessButton = document.getElementById('below-guess');

const aLBHandle = () => {
    game.requestAbove();
    console.log(game.show());
}

const bLBHandle = () => {
    game.requestBelow();
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
}

let timeRemaining = gameTime;
let clockElem = document.getElementById('clock');
let scoreElem = document.getElementById('score');

const getUsedTime = () => gameTime - timeRemaining;


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


// const clock = setInterval(() => {
//     timeRemaining--;
//     clockElem.innerHTML = timeRemaining;
//     if (timeRemaining <= -1) {
//         done = true;
//         disableAll();
//         clearInterval(clock);
//     }
// }, 1000);

const gameTicker = setInterval(() => {
    if (game.isFinished()) {
        done = true;
        disableAll();
        clearInterval(gameTicker);
    } else {
        updateDatabase();
    }

    if (!done) {
        const currentScore = game.calculateScore(getUsedTime());
        scoreElem.innerHTML = game.score;
        console.log(game);
    }
}, 5000);
