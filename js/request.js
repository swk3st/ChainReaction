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

  export { requestPlayerID, requestChains };