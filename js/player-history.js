import { requestPlayers, requestGame, finishGame, requestAllCompletedGames, requestMatchData } from './request.js';

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

const addRows = (matches) => {
    for (let match of matches) {
        let displayName = match.display_name;
        let gameID = match.game_id;
        let time = match.time;
        requestMatchData(gameID, playerID).then((matchData) => {
            let payout = matchData[0].payout;
            let date = new Date(time * 1000);
            let formattedTime = date.toLocaleString();
            let link = `./matchhistory.php?gameID=${gameID}`;
            console.log(matchData);
            addRow(displayName, payout, formattedTime, link);
        });
    }
};

const writeTable = () => {
    requestAllCompletedGames(playerID).then((matches) => {
        clearTable();
        // console.log(matches);
        addRows(matches);
    });
}

if (playerID != undefined) {
    writeTable();
}
