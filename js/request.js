function requestPlayerID() {
    var xmlhttp = new XMLHttpRequest();
    return new Promise ((resolve, reject) => {
      let playerID = "";
  
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          playerID = JSON.parse(xmlhttp.responseText);
          return resolve(playerID);
        }
      }
      let playerIDUrl = "../php/sessiondata.php?var=playerID";

      var loc = window.location.pathname;
      var dir = loc.substring(loc.lastIndexOf('/'));
      console.log(dir);
      if (dir == "/inventory.php") {
        playerIDUrl = "../../php/sessiondata.php?var=playerID";
      }     

      xmlhttp.open("GET", playerIDUrl, true);
      xmlhttp.send();
    });
    }

    function requestDisplayName() {
      var xmlhttp = new XMLHttpRequest();
      return new Promise ((resolve, reject) => {
        let dN = "";
    
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            dN = JSON.parse(xmlhttp.responseText);
            return resolve(dN);
          }
        }
        let dNUrl = "../php/sessiondata.php?var=displayName";
  
        var loc = window.location.pathname;
        var dir = loc.substring(loc.lastIndexOf('/'));
        console.log(dir);
        if (dir == "/inventory.php") {
          dNUrl = "../../php/sessiondata.php?var=displayName";
        }     
  
        xmlhttp.open("GET", dNUrl, true);
        xmlhttp.send();
      });
      }
  
  function requestChains(playerID) {
    var xmlhttp = new XMLHttpRequest();
    return new Promise ((resolve, reject) => {
  
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          var data = JSON.parse(xmlhttp.responseText);
          resolve([playerID, data]);
        }
      }
      let url = "../php/loadcustomcreate.php?playerID=";

      var loc = window.location.pathname;
      var dir = loc.substring(loc.lastIndexOf('/'));
      if (dir == "/inventory.php") {
        url = "../../php/loadcustomcreate.php?playerID=";
      }

      let request = playerID;
      xmlhttp.open("GET", url+request, true);
      xmlhttp.send();
    })
  }

  function requestGame(gameId) {
    var xmlhttp = new XMLHttpRequest();
    return new Promise ((resolve, reject) => {
  
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          var data = JSON.parse(xmlhttp.responseText);
          resolve(data);
        }
      }
      let url = "../php/gamedata.php?gameID=";

      var loc = window.location.pathname;
      var dir = loc.substring(loc.lastIndexOf('/'));
      if (dir == "/inventory.php") {
        url = "../../php/gamedata.php?gameID=";
      }

      let request = gameId;
      xmlhttp.open("GET", url+request, true);
      xmlhttp.send();
    });
  }

  function playerJoin(gameId, playerId, displayName) {
    var xmlhttp = new XMLHttpRequest();
    return new Promise ((resolve, reject) => {      
      let url = "../php/playerjoin.php";

      var loc = window.location.pathname;
      var dir = loc.substring(loc.lastIndexOf('/'));
      if (dir == "/inventory.php") {
        url = "../../php/playerjoin.php";
      }

      xmlhttp.open("POST", url, true);
      xmlhttp.setRequestHeader('Content-Type', 'application/json');
      
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          resolve();
        }
      }
      let data = {'gameID': gameId, 'playerID': playerId, 'displayName': displayName};
      console.log(JSON.stringify(data));
      xmlhttp.send(JSON.stringify(data));
    });
  }

  function startGame(gameId) {
    var xmlhttp = new XMLHttpRequest();
    return new Promise ((resolve, reject) => {      
      let url = "../php/gameupdate.php";

      var loc = window.location.pathname;
      var dir = loc.substring(loc.lastIndexOf('/'));
      if (dir == "/inventory.php") {
        url = "../../php/gameupdate.php";
      }

      xmlhttp.open("POST", url, true);
      xmlhttp.setRequestHeader('Content-Type', 'application/json');
      
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          resolve();
        }
      }
      let data = {'gameID': gameId};
      xmlhttp.send(JSON.stringify(data));
    });
  }

  function requestStatus(gameId) {
    var xmlhttp = new XMLHttpRequest();
    return new Promise ((resolve, reject) => {
  
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          var data = JSON.parse(xmlhttp.responseText);
          resolve(data);
        }
      }
      let url = "../php/gamestatus.php?gameID=";

      var loc = window.location.pathname;
      var dir = loc.substring(loc.lastIndexOf('/'));
      if (dir == "/inventory.php") {
        url = "../../php/gamestatus.php?gameID=";
      }

      let request = gameId;
      xmlhttp.open("GET", url+request, true);
      xmlhttp.send();
    });
  }

  function requestPlayers(gameId) {
    var xmlhttp = new XMLHttpRequest();
    return new Promise ((resolve, reject) => {
  
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          var data = JSON.parse(xmlhttp.responseText);
          resolve(data);
        }
      }
      let url = "../php/players.php?gameID=";

      var loc = window.location.pathname;
      var dir = loc.substring(loc.lastIndexOf('/'));
      if (dir == "/inventory.php") {
        url = "../../php/players.php?gameID=";
      }

      let request = gameId;
      xmlhttp.open("GET", url+request, true);
      xmlhttp.send();
    });
  }

  function leaveGame(playerId, gameId) {
    var xmlhttp = new XMLHttpRequest();
    return new Promise ((resolve, reject) => {      
      let url = "../php/leavegame.php";

      var loc = window.location.pathname;
      var dir = loc.substring(loc.lastIndexOf('/'));
      if (dir == "/inventory.php") {
        url = "../../php/leavegame.php";
      }

      xmlhttp.open("POST", url, true);
      xmlhttp.setRequestHeader('Content-Type', 'application/json');
      
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          resolve();
        }
      }
      let data = {'playerID': playerId, 'gameID': gameId};
      xmlhttp.send(JSON.stringify(data));
    });
  }

  function requestChain(chainId) {
    var xmlhttp = new XMLHttpRequest();
    return new Promise ((resolve, reject) => {
  
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          var data = JSON.parse(xmlhttp.responseText);
          resolve(data);
        }
      }
      let url = "../php/chaindata.php?chainID=";

      var loc = window.location.pathname;
      var dir = loc.substring(loc.lastIndexOf('/'));
      if (dir == "/inventory.php") {
        url = "../../php/chaindata.php?chainID=";
      }

      let request = chainId;
      xmlhttp.open("GET", url+request, true);
      xmlhttp.send();
    });
  }

  export { requestPlayerID, requestDisplayName, requestChains, 
    requestGame, playerJoin, startGame, requestStatus, 
    requestPlayers, leaveGame, requestChain };