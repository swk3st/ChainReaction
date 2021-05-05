import { requestGame, requestPlayers, finishGame } from '../js/request.js';
let params = new URLSearchParams(location.search);
let gameID = params.get('gameID');

if (gameID != undefined) {
    const ticker = setInterval(() => {
        requestGame(gameID).then((gameData) => {
            let status = gameData[0][0].gameStatus;
            if (status == 'started') {
                const now = Math.round(Date.now()/1000);
                const gameFinish = gameData[0][0].time;
                if (now > gameFinish) {
                    finishGame(gameID);
                    clearInterval(ticker);
                }
                requestPlayers(gameID).then((players) => {
                    if (players.length == 0) {
                        finishGame(gameID);
                        clearInterval(ticker);
                    }
                });
            } else if (status == 'completed') {
                clearInterval(ticker);
            }
        });
    }, 1000);
}
