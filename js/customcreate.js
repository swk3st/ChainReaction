class Chain {
  constructor(chainID, words) {
    if (chainID == undefined && words == undefined) {
      this.chainID = null;
      this.words = ["", "", "", "", "", "", ""];
    } else {
      this.chainID = chainID;
      this.words = words;
    }
  }
}

class ChainList {
  constructor(playerID, chainsData) {
    this.playerID = playerID;
    this.chains = [];
    this.size = 0;
    this.left = -1;
    this.middle = -1;
    this.right = -1;
    this.initalizeChains(chainsData);
  }

  printInd = () => {
    console.log();
    console.log("Left: " + this.left);
    console.log("Middle: " + this.middle);
    console.log("Right: " + this.right);
  }

  initalizeChains = (chainsData) => {
    for(let data in chainsData) {
      let words = []
      let key = "";
      for (let i = 0; i < 8; i++) {
        key = key + i;
        words.push(data[key]);
      }
      let chain_id = data["chain_id"];
      let chain = new Chain(chain_id, words);
      this.chains.push(chain);
      this.size++;
      if(this.size == 1) {
        this.left = 0;
      }
      if(this.size == 2) {
        this.middle = 1;
      }
      if(this.size == 3) {
        this.right = 2;
      }
    }
  }

  shiftLeft = () => {
    if(this.size == 0) {
      return;
    } else if (this.size == 1) {
      if(this.middle == 0) {
        this.left = 0;
        this.middle = -1;
        this.right = -1;
      } else if (this.right == 0) {
        this.left = -1;
        this.middle = 0;
        this.right = -1;
      } else {
        this.left = -1;
        this.middle = -1;
        this.right = 0;
      }
    } else if (this.size == 2) { // -1 become 0, 0 become 1
      if(this.left == 0) { // 0 1 -1
        this.left = 1;
        this.middle = -1
        this.right = 0;
      } else if (this.middle == 0) { // -1 0 1
        this.left = 0;
        this.middle = 1;
        this.right = -1;
      } else { // 1 -1 0
        this.left = -1;
        this.middle = 0;
        this.right = 1;
      }
    } else {
      this.left--;
      this.middle--;
      this.right--;
      this.checkUnders();
    }
  }

  shiftRight = () => { 
    if(this.size == 0) {
      return;
    } else if (this.size == 1) {
      if(this.middle == 0) {
        this.left = -1;
        this.middle = -1;
        this.right = 0;
      } else if (this.left == 0) {
        this.left = -1;
        this.middle = 0;
        this.right = -1;
      } else {
        this.left = 0;
        this.middle = -1;
        this.right = -1;
      }
    } else if (this.size == 2) { // 1 become 0, 0 become -1
      if(this.right == 0) { // 1 -1 0
        this.left = 0;
        this.middle = 1;
        this.right = -1;
      } else if (this.middle == 0) { // -1 0 1 
        this.left = 1;
        this.middle = -1;
        this.right = 0;
      } else { // 0 1 -1
        this.left = -1;
        this.middle = 0;
        this.right = 1;
      }
    } else {
      this.left++;
      this.middle++;
      this.right++;
      this.checkOvers();      
    }
  }

  checkUnders() {
    if (this.under(this.middle)) {
      this.middle = this.size - 1;
    }
    if (this.under(this.left)) {
      this.left = this.size - 1;
    }
    if (this.under(this.right)) {
      this.right = this.size - 1;
    }
  }

  under = (num) => {
    if (num < 0) {
      return true;
    }
    return false;
  }

  checkOvers() {
    if (this.over(this.middle)) {
      this.middle = 0;
    }
    if (this.over(this.left)) {
      this.left = 0;
    }
    if (this.over(this.right)) {
      this.right = 0;
    }
  }

  over = (num) => {
    if (num >= this.size) {
      return true;
    }
    return false;
  }

  getMiddle = () => {
    if (this.middle == -1) {
      let defaultChain = new Chain();
      return defaultChain.words;
    } else {
      return this.chains[this.middle].words;
    }
  }

  getLeft = () => {
    if (this.left == -1) {
      let defaultChain = new Chain();
      return defaultChain.words;
    } else {
      return this.chains[this.left].words;
    }
  }

  getRight = () => {
    if (this.right == -1) {
      let defaultChain = new Chain();
      return defaultChain.words;
    } else {
      return this.chains[this.right].words;
    }
  }

}

let chainList;

function handleData(playerID, jsonData) {
  chainList = new ChainList(playerID, jsonData);
}

function requestPlayerID(callback) {
  var playerID = "";
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      playerID = JSON.parse(xmlhttp.responseText);
      // console.log(playerID);
    }
  }
  xmlhttp.onload = function () {
    callback(playerID);
  };
  let playerIDUrl = "../php/sessiondata.php?var=playerID";
  xmlhttp.open("GET", playerIDUrl, true);
  xmlhttp.send();
}

function requestChains(playerID) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      var data = JSON.parse(xmlhttp.responseText);
      // console.log(data);
      handleData(data);
    }
  }
  let url = "../php/loadcustomcreate.php?playerID=";
  let request = playerID;
  xmlhttp.open("GET", url+request, true);
  xmlhttp.send();
}

function loadChains() {
  requestPlayerID(requestChains);
}

document.addEventListener('DOMContentLoaded', loadChains(), false);
// let burner = ["lol", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a"];
// let burner2 = ["LMAO", "a", "a", "b", "a", "a", "b", "a", "a", "b", "a"];

// let arr = []
// for (let i = 0; i < 1; i++) {
//   arr.push(burner);
//   arr.push(burner2);
// }
// let chainList = new ChainList("lol", arr);
// chainList.shiftLeft();
// console.log(chainList.getMiddle());


// changeText = () => {
//     var chain_string = "";
//     for(var i = 1; i <= 7; i++) {
//       var id = "mid" + i.toString();
//       chain_string += document.getElementById(id).innerHTML;
//       if(i != 7) {
//           chain_string += " - ";
//       }
//     }
//     chain_msg.innerHTML = chain_string.toUpperCase();
//   }
//   var chain_msg = document.getElementById("chain-text");
//   var confirm_button = document.getElementById("use-button");
//   var defaults = ["default1", "default2", "default3","default4", "default5", "default6", "default7"];

//   getSet = (setName) => {
//     var arr = []
//     for(var i = 1; i <= 7; i++) {
//       var id = setName + i.toString();
//       var id_elem = document.getElementById(id);
//       arr.push(id_elem);
//     }
//     return arr;
//   }

//   getAllSets = () => {
//     var left = getSet("left");
//     var mid = getSet("mid");
//     var right = getSet("right");
//     var arr = [left, mid, right];
//     return arr;
//   }

//   dirToInd = (dir) => {
//     if (dir == "left") {
//       return 0;
//     } else if (dir == "mid") {
//       return 1;
//     } else {
//       return 2;
//     }
//   }

//   shift = (from, into) => {
//     var sets = getAllSets();
//     var setDest = getSet(into);
//     var setSrc = getSet(from);
//     var dest = dirToInd(into);
//     var src = dirToInd(from);
//     for(var i = 0; i < setDest.length; i++) {
//       sets[dest][i].innerHTML = sets[src][i].innerHTML;
//     }
//   }

//   shiftLeft = () => {
//     shift("mid", "left");
//     shift("right", "mid");
//     setToDefault("right");
//   }

//   shiftRight = () => {
//     shift("mid", "right");
//     shift("left", "mid");
//     setToDefault("left");
//   }

//   setToDefault = (name) => {
//     var side = getSet(name);
//     for(var i = 0; i < side.length; i++) {
//       side[i].innerHTML = defaults[i];
//     }
//   }
