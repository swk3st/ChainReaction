import { Game } from './game.js';
import { requestChain, requestGame } from './request';

let game;
let aboveLetterButton, belowLetterButton;
let aboveField, belowField;
let aboveGuessButton, belowGuessButton;
let chainId, timeData, cooldownData;
let chainWords;
let params = new URLSearchParams(location.search);
let gameId = params.get('gameID');
let playerId = params.get('playerID');

requestGame(gameId).then((data) => {
    let info  = data[0][0];
    chainId = info.chain_id;
    timeData = info.time;
    cooldownData = info.cooldown;
    requestChain(chainId).then((chain) => {
        chainWords.push(chain[0].word1);
        chainWords.push(chain[0].word2);
        chainWords.push(chain[0].word3);
        chainWords.push(chain[0].word4);
        chainWords.push(chain[0].word5);
        chainWords.push(chain[0].word6);
        chainWords.push(chain[0].word7);
    });
});

let d = new Date();
let gameTime = Math.round((timeData - d.now())/1000);
let cooldown = cooldownData;

game = new Game(chainWords, gameTime, cooldown);


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