import { requestPlayers, requestGame } from './request.js';

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
            }
        });
    }
}, 1000);


button.addEventListener('click', () => {
    location.href = `./matchhistory.php?gameID=${gameID}`;
});