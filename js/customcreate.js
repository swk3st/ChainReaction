changeText = () => {
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
  var defaults = ["default1", "default2", "default3","default4", "default5", "default6", "default7"];

  getSet = (setName) => {
    var arr = []
    for(var i = 1; i <= 7; i++) {
      var id = setName + i.toString();
      var id_elem = document.getElementById(id);
      arr.push(id_elem);
    }
    return arr;
  }

  getAllSets = () => {
    var left = getSet("left");
    var mid = getSet("mid");
    var right = getSet("right");
    var arr = [left, mid, right];
    return arr;
  }

  dirToInd = (dir) => {
    if (dir == "left") {
      return 0;
    } else if (dir == "mid") {
      return 1;
    } else {
      return 2;
    }
  }

  shift = (from, into) => {
    var sets = getAllSets();
    var setDest = getSet(into);
    var setSrc = getSet(from);
    var dest = dirToInd(into);
    var src = dirToInd(from);
    for(var i = 0; i < setDest.length; i++) {
      sets[dest][i].innerHTML = sets[src][i].innerHTML;
    }
  }

  shiftLeft = () => {
    shift("mid", "left");
    shift("right", "mid");
    setToDefault("right");
  }

  shiftRight = () => {
    shift("mid", "right");
    shift("left", "mid");
    setToDefault("left");
  }

  setToDefault = (name) => {
    var side = getSet(name);
    for(var i = 0; i < side.length; i++) {
      side[i].innerHTML = defaults[i];
    }
  }
