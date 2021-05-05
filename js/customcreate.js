import { ChainList } from "./chain.js";
import { requestPlayerID, requestChains} from "./request.js"; 

let chainList;

function handleData(playerID, jsonData) {
  if (playerID == undefined || jsonData == undefined) {
    return false;
  }
  chainList = new ChainList(playerID, jsonData);
  return true;
}

function getDOMObjects(setName) {
  var arr = []
  for(var i = 1; i <= 7; i++) {
    var id = setName + i.toString();
    var id_elem = document.getElementById(id);
    arr.push(id_elem);
  }
  return arr;
}

function setLeft() {
  let objects = getDOMObjects("left");
  let words = chainList.getLeft();
  for(var i = 0; i < words.length; i++) {
    objects[i].innerHTML = words[i];
  }
}

function setMid() {
  let objects = getDOMObjects("mid");
  let words = chainList.getMiddle();
  for(var i = 0; i < words.length; i++) {
    objects[i].innerHTML = words[i];
  }
  current_chain = chainList.getMiddleId();
}

function setRight() {
  let objects = getDOMObjects("right");
  let words = chainList.getRight();
  for(var i = 0; i < words.length; i++) {
    objects[i].innerHTML = words[i];
  }
}

function setAll() {
  setLeft();
  setMid();
  setRight();
}


function loadChains() {
  // first get playerID, then get data, then handle data, then setAll
  requestPlayerID() // returns a promise
  .then(function(playerID) {
    console.log("Requesting chains!");
    requestChains(playerID)
    .then(function(data) {
      console.log("Handling data!");
      return handleData(data[0], data[1]);
    })
    .then(function(haveData) {
      if(haveData) {
        console.log("Setting data!");
        setAll();
      }
    })
  });
}

function shiftLeft() {
  chainList.shiftLeft();
  setAll();
}

function shiftRight() {
  chainList.shiftRight();
  setAll();
}


function changeText() {
  var chain_string = "";
  for(var i = 1; i <= 7; i++) {
    var id = "mid" + i.toString();
    chain_string += document.getElementById(id).innerHTML;
    if(i != 7) {
      chain_string += " - ";
    }
  }
  chain_msg.innerHTML = chain_string.toUpperCase();
}
var chain_msg = document.getElementById("chain-text");
var confirm_button = document.getElementById("use-button");
let current_chain = undefined;

document.addEventListener('DOMContentLoaded', loadChains(), false);
document.getElementById("leftBtn").addEventListener("click", shiftLeft, false);
document.getElementById("rightBtn").addEventListener("click", shiftRight, false);
confirm_button.addEventListener("mouseover", changeText, false);
confirm_button.addEventListener('click', () => {
  if(current_chain != undefined) {
    location.href = "./creategame.php?chainID=" + current_chain;
  }
});