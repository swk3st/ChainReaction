import { Game } from './game.js';
import { requestChain, requestGame } from './request.js';

let game;
let aboveLetterButton, belowLetterButton;
let aboveField, belowField;
let aboveGuessButton, belowGuessButton;
let word1, word2, word3, word4, word5, word6, word7;
let words;
let row1, row2, row3, row4, row5, row6, row7;
let rows;
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

row1 = document.getElementById('row1');
row2 = document.getElementById('row2');
row3 = document.getElementById('row3');
row4 = document.getElementById('row4');
row5 = document.getElementById('row5');
row6 = document.getElementById('row6');
row7 = document.getElementById('row7');
rows = [row1, row2, row3, row4, row5, row6, row7];



const aLBHandle = () => {
    aboveDefaultHandle();
    game.requestAbove();
    cooldownButtons();
}

const bLBHandle = () => {
    belowDefaultHandle();
    game.requestBelow();
    cooldownButtons();
}

const aGBHandle = () => {
    aboveDefaultHandle();
    const guess = aboveField.value;
    aboveField.value = '';
    game.guessAbove(guess);
}

const bGBHandle = () => {
    belowDefaultHandle();
    const guess = belowField.value;
    belowField.value = '';
    game.guessBelow(guess);
}


const hover = (row) => {
    row.style.backgroundColor = 'floralwhite';
    let textElem = row.firstChild;
    textElem.style.fontWeight = 'bold';
    textElem.style.fontSize = '48px';
    textElem.style.color = 'black';
}

const noHover = (row) => {
    row.style.backgroundColor = '';
    let textElem = row.firstChild;
    textElem.style.fontWeight = '';
    textElem.style.fontSize = '';
    textElem.style.color = '';
}

const aboveHoverHandle = () => {
    let above = game.above;
    let row = rows[above];
    hover(row);
}

const belowHoverHandle = () => {
    let below = game.below;
    let row = rows[below];
    hover(row);
}

const aboveDefaultHandle = () => {
    let above = game.above;
    let row = rows[above];
    noHover(row);
}

const belowDefaultHandle = () => {
    let below = game.below;
    let row = rows[below];
    noHover(row);
}


aboveLetterButton.addEventListener('click', aLBHandle);
belowLetterButton.addEventListener('click', bLBHandle);
aboveGuessButton.addEventListener('click', aGBHandle);
belowGuessButton.addEventListener('click', bGBHandle);

aboveLetterButton.addEventListener('mouseover', aboveHoverHandle);
belowLetterButton.addEventListener('mouseover', belowHoverHandle);
aboveGuessButton.addEventListener('mouseover', aboveHoverHandle);
belowGuessButton.addEventListener('mouseover', belowHoverHandle);

aboveLetterButton.addEventListener('mouseout', aboveDefaultHandle);
belowLetterButton.addEventListener('mouseout', belowDefaultHandle);
aboveGuessButton.addEventListener('mouseout', aboveDefaultHandle);
belowGuessButton.addEventListener('mouseout', belowDefaultHandle);

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
        if (i != 0 && i < game.above || i != words.length - 1 && i > game.below) {
            word.style.color = 'yellow';
        }
        if (i == 0 || i == words.length - 1) {
            word.style.fontStyle = 'italic';
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
        writeTable();
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
        const penalty = game.calculateScore(getUsedTime(timeRemaining));
        scoreElem.innerHTML = "Potential Payout: " + formatter.format(game.score);
        writeTable();
        console.log(game);
    }
}, 1000);
