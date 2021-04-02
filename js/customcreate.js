class Chain {
  constructor(chainID, words) {
    this.chainID = chainID;
    this.words = words;
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
    for(let data of chainsData) {
      let chain = new Chain(data[0], data.slice(1));
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

}
let burner = ["lol", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a"];

let arr = []
for (let i = 0; i < 18; i++) {
  arr.push(burner);
}
let chainList = new ChainList("lol", arr);
// chainList.printInd();
// chainList.shiftLeft();
// chainList.shiftLeft();
// chainList.shiftLeft();
// chainList.shiftLeft();
// chainList.shiftRight();
// chainList.shiftRight();
// chainList.printInd();
// console.log(chainList);


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
