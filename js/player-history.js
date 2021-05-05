import { requestPlayers, requestGame, finishGame } from './request.js';

let table = document.getElementById('matches-table');
let params = new URLSearchParams(location.search);
let playerID = params.get('playerID');

const clearTable = () => {
    for(let i = table.rows.length - 1; i > 0; i--) {
        table.deleteRow(i);
    }
};

const addRow = (displayName, payout, date, link) => {
    let row = document.createElement('tr');
    let displayNameElem = document.createElement('td');
    let payoutElem = document.createElement('td');
    let dateElem = document.createElement('td');
    let linkElem = document.createElement('td');
    displayNameElem.innerHTML = displayName;
    payoutElem.innerHTML = payout;
    dateElem.innerHTML = date;
    linkElem.innerHTML = `<a href='${link}'>View Match</a>`;
    row.appendChild(displayNameElem);
    row.appendChild(payoutElem);
    row.appendChild(dateElem);
    row.appendChild(linkElem);
    table.appendChild(row);
};

const addRows = (matces) => {
    for (let match of matches) {
        let displayName = match.display_name;
        let payout = match.payout;
        addRow(displayName, payout);
    }
};

const writeTable = () => {
    requestPlayers(gameID).then((players) => {
        clearTable();
        addRows(players);
    });
}

const ticker = setInterval(() => {
    if (gameID != undefined) {
        writeTable();
        requestGame(gameID).then((gameData) => {
            let gameInfo = gameData[0][0];
            let status = gameInfo.gameStatus;
            if (status == 'completed') {
                let warning = document.createElement('p');
                warning.style.color = 'red';
                warning.innerHTML = '<em>THIS GAME IS FINISHED. YOU CAN MOVE ON.</em>';
                let elems = document.getElementsByClassName('heads-up');
                elems[0].appendChild(warning);
                clearInterval(ticker);
            } else {
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
            }
        });
    }
}, 1000);
