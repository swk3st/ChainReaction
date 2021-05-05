import { requestPlayers } from './request.js';

let table = document.getElementById('in-game');
let params = new URLSearchParams(location.search);
let gameID = params.get('gameID');

const clearTable = () => {
    while(table.firstChild != table.lastChild) {
        table.removeChild(table.lastChild);
    }
};

const addRow = (displayName, payout) => {
    let row = document.createElement('tr');
    let displayNameElem = document.createElement('td');
    let payoutElem = document.createElement('td');
    displayNameElem.innerHTML = displayName;
    payoutElem.innerHTML = payout;
    table.appendChild(row);
};

const addRows = (players) => {
    for (let player of players) {
        let displayName = player.displayName;
        let payout = player.payout;
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
    }
}, 1000);