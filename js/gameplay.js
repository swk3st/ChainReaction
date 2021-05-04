import { Game } from './game.js';
import { requestChain, requestGame } from './request';

let game;
let aboveLetterButton, belowLetterButton;
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


game = new Game();
aboveLetterButton = document.getElementById('above-letter');
belowLetterButton = document.getElementById('below-letter');

