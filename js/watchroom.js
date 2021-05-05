import { requestPlayers } from './request.js';

let table = document.getElementById('in-game');
let button = document.getElementById('match-button');
let params = new URLSearchParams(location.search);
let gameID = params.get('gameID');

const clearTable = () => {
    for(let i = table.rows.length - 1; i > 0; i--) {
        table.deleteRow(i);
    }
};

const addRow = (displayName, payout) => {
    let row = document.createElement('tr');
    let displayNameElem = document.createElement('td');
    let payoutElem = document.createElement('td');
    displayNameElem.innerHTML = displayName;
    payoutElem.innerHTML = payout;
    row.appendChild(displayNameElem);
    row.appendChild(payoutElem);
    table.appendChild(row);
};

const addRows = (players) => {
    for (let player of players) {
        let displayName = player.display_name;
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


button.addEventListener('click', () => {
    location.href = `./matchhistory.php?gameID=${gameID}`;
});