import { ChainList } from "./chain.js";
import { requestPlayerID, requestChains} from "./request.js"; 

const playCell = () => {
    let newTd = document.createElement("td");
    let newButton = document.createElement("button");
    newButton.innerHTML = "Play";
    newTd.appendChild(newButton);
    return newTd;
}

const chainCell = (chainID) => {
    let newTd = document.createElement("td");
    newTd.innerHTML = chainID;
    return newTd;
}

const wordCell = (word) => {
    let newTd = document.createElement("td");
    newTd.innerHTML = word;
    return newTd;
}

const wordCells = (words) => {
    let newTds = []
    for (let i = 0; i < words.length; i++) {
        newTds.push(wordCell(words[i]));
    }
    return newTds;
}

const updateCell = (chainID, words) => {
    let newTd = document.createElement("td");
    let newA = document.createElement("a");
    let href = "./updatechain.php?";
    href += "chainID=" + chainID;
    for (let i = 1; i <= words.length; i++) {
        href += "&word" + i + "=" + words[i - 1];
    }
    newA.href = href;
    let newButton = document.createElement("button");
    newButton.innerHTML = "Update";
    newA.appendChild(newButton);
    newTd.appendChild(newA);
    return newTd;
}

const deleteCell = (chainID, words) => {
    let newTd = document.createElement("td");
    let newA = document.createElement("a");
    let href = "./deletechain.php?";
    href += "chainID=" + chainID;
    for (let i = 1; i <= words.length; i++) {
        href += "&word" + i + "=" + words[i - 1];
    }
    newA.href = href;
    let newButton = document.createElement("button");
    newButton.innerHTML = "Delete";
    newA.appendChild(newButton);
    newTd.appendChild(newA);
    return newTd;
}

const appendChildren = (newTr, chainID, words) => {
    newTr.appendChild(playCell());
    newTr.appendChild(chainCell(chainID));
    for(let word of wordCells(words)) {
        newTr.appendChild(word);
    }
    newTr.appendChild(updateCell(chainID, words));
    newTr.appendChild(deleteCell(chainID, words));
}

const writeTable = (chainList) => {
    let table = document.getElementById("inventory-table");
    for(let chain of chainList.chains) {
        let newTr = document.createElement("tr");
        let chainID = chain.chainID;
        let words = chain.words;
        appendChildren(newTr, chainID, words);
        table.appendChild(newTr);
    }
}

const loadInventory = () => {
    let chainList;
    // let docElem = document.getElementById("inventory-div");
    // console.log(docElem);
      // first get playerID, then get data, then handle data, then setAll
    requestPlayerID()
    .then(function(playerID) {
        requestChains(playerID)
        .then(function(data) {
            chainList = new ChainList(data[0], data[1]);
            // docElem.innerHTML = getHTML(chainList);
            // console.log(docElem.innerHTML);
            // docElem.innerHTML = "<em>HI<em>";
            writeTable(chainList);
        })
    });

}

document.addEventListener("DOMContentLoaded", loadInventory(), false);